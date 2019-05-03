<?php

namespace App\Exceptions;

use App;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use League\OAuth2\Server\Exception\OAuthServerException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Auth\Access\AuthorizationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        $data = (object)[]; 

        if ($request->ajax()) {
            return response()->json(['error' => $exception->getMessage()], 200);
        }

        if($exception instanceof OAuthServerException){
            return response()->json([
               'data' => $data,
               'statusCode' => (int)$exception->getHttpStatusCode(),
               'message' => trans('errorcode.'.(int)$exception->getHttpStatusCode()),
               'detailedInfo' => $exception->getHint().'. '.class_basename( $exception ).' in '.basename($exception->getFile()).' line '.$exception->getLine().': ' .$exception->getMessage(),
            ],(int)$exception->getHttpStatusCode());
        }

        if($exception instanceof RequestException){
            return response()->json([
               'data' => $data,
               'statusCode' => (int)$exception->getResponse()->getStatusCode(),
               'message' => trans('errorcode.'.$exception->getResponse()->getStatusCode()),
               'detailedInfo' => $exception->getResponse()->getReasonPhrase().'. '.class_basename( $exception ).' in '.basename($exception->getFile()).' line '.$exception->getLine().': ' .$exception->getMessage(),
            ],(int)$exception->getResponse()->getStatusCode());
        }
        
        if($exception instanceof AuthorizationException){
            return response()->json([
               'data' => $data,
               'statusCode' => (int)403,
               'message' => trans('errorcode.403'),
               'detailedInfo' => sprintf('%s in %s line %s : %s',class_basename($exception),basename($exception->getFile()),$exception->getLine(),$exception->getMessage()),
            ],(int)403);
        }

        if($this->isHttpException($exception)) {
            
            /*if($exception instanceof MethodNotAllowedHttpException){
                dd('sd');
            }*/

            if(!empty($exception->getStatusCode())) {
                if ($request->is('api*')) {
                    return response()->json([
                       'data' => $data,
                       'statusCode' => (int)$exception->getStatusCode(),
                       'message' => trans('errorcode.'.$exception->getStatusCode()),
                       'detailedInfo' => class_basename( $exception ).' in '.basename($exception->getFile()).' line '.$exception->getLine().': ' .$exception->getMessage(),
                    ],(int)$exception->getStatusCode());
                }
                return \Response::view('errors.'.$exception->getStatusCode());
            }
            return $this->renderHttpException($exception);
        }
        
        if ($exception instanceof \Illuminate\Session\TokenMismatchException){
            return redirect()->back()->withInput($request->except('_token'));
        }

        if ($exception instanceof Exception && !($exception instanceof AuthenticationException)) {
            //dd($exception);
            $errorExceptionMessage = sprintf('%s in %s line %s : %s',class_basename($exception),basename($exception->getFile()),$exception->getLine(),$exception->getMessage());
            if ($request->is('api*')) {
                return response()->json([
                    'data' => $data,
                    'statusCode' => 500,
                    'message' => trans('errorcode.500'),
                    'detailedInfo' => $errorExceptionMessage,
                ],500);
            } else {
                $environmentsArr = ['production'];
                if (config('app.debug') && (in_array(config('app.env'),$environmentsArr)) ) {
                    // die($errorExceptionMessage);
                }
            }
        }
        return parent::render($request, $exception);
    }

    /**
     * Convert an authentication exception into an unauthenticated response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Auth\AuthenticationException  $exception
     * @return \Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        $data = (object)[];
        $locale = App::getLocale();
        if ($request->expectsJson()) {
            return response()->json(['statusCode' => 401,'message' => trans('errorcode.401'), "data"=>$data], 401);
        }
        $guard = array_get($exception->guards(), 0);
        
        switch ($guard) {
            case 'admin':
                $login = 'admin.login';
                break;

            case 'api':
                return response()->json(['statusCode' => 401,'message' => trans('errorcode.401'), "data"=>$data], 401);
                break;

            case 'api-v1':
                return response()->json(['statusCode' => 401,'message' => trans('errorcode.401'), "data"=>$data], 401);
                break;
                
            default:
                $login = 'user.login';
                break;
        }
        
        return redirect()->guest(route($login));
    }

    /**
     * Render an exception using Whoops.
     * 
     * @param  \Exception $e
     * @return \Illuminate\Http\Response
     */
    protected function convertExceptionToResponse(Exception $e)
    {
        $environmentsArr = ['development','local'];
        if (config('app.debug') && (in_array(env('APP_ENV'),$environmentsArr)) ) {
            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);

            return response()->make(
                $whoops->handleException($e),
                method_exists($e, 'getStatusCode') ? $e->getStatusCode() : 500,
                method_exists($e, 'getHeaders') ? $e->getHeaders() : []
            );
        }

        return parent::convertExceptionToResponse($e);
    }
}

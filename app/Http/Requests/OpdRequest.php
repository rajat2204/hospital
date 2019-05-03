<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class OpdRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "patientTitle" => 'required',
            "patientName" => 'required',
            "regNum" => 'required',
            "regDate" =>'required',
            "regAmount"=>'required',
            "contactNum"=>'required',
            "address" => 'required',
            "Age" =>'required',
            "gender" => 'required',
            "consultant" => 'required',
            "otherConsultant" =>'required',
            "department" =>'required',
        ];
    }
}

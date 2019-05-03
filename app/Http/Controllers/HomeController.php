<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\OpdModel;
use App\Model\IpdModel;
use App\Model\OtModel;
use App\Model\PhysiotherapyModel;
use App\Model\YogaModel;
use App\Model\BloodExaminationModel;
use App\Model\GeneralBloodModel;
use App\Model\SemeneExaminationModel;
use App\Model\SerumOfWidalModel;
use App\Model\StoolExaminationModel;
use App\Model\UrineExaminationModel;
use App\Model\XRayModel;
use App\Model\EcgExaminationModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {

        $opd = OpdModel::where('dltStatus','N')->get()->count();
        $ipd = IpdModel::where('dltStatus','N')->get()->count();
        $ot = OtModel::where('dltStatus','N')->get()->count();
        $physiotherpy = PhysiotherapyModel::all()->count();
        $yoga = YogaModel::where('dltStatus','N')->get()->count();
        $bloodexamination = BloodExaminationModel::all()->count();
        $generalblood = GeneralBloodModel::all()->count();
        $semenexamination = SemeneExaminationModel::all()->count();
        $serumofwidal = SerumOfWidalModel::all()->count();
        $stoolexamination = StoolExaminationModel::all()->count();
        $urineexamination = UrineExaminationModel::all()->count();
        $xray = XRayModel::all()->count();
        $ecg = EcgExaminationModel::all()->count(); 
        return view('hms.dashboard',compact('opd','ipd','ot','physiotherpy','yoga','bloodexamination','generalblood','semenexamination','serumofwidal','stoolexamination','urineexamination','xray','ecg'));
    }
}

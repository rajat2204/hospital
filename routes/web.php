<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();
Route::group(['prefix'=>'hms','middleware'=>['auth']],function(){

     Route::get('/dashboard', 'HomeController@index')->name('dashborad');
     Route::resource('/opd', 'OpdModelController');
     Route::get('/opd-filter', 'OpdModelController@opdFilter')->name('opd.filter');
     Route::post('/filter-search', 'OpdModelController@opdFilterSearch')->name('filter.search');
     Route::post('/opd/search', 'OpdModelController@search')->name('opd.regsearch');
     Route::post('/opd/value', 'OpdModelController@opd')->name('opd.value');
     Route::post('/opd/check', 'OpdModelController@opdCheck')->name('opd.regcheck');
     Route::post('/opd/delete', 'OpdModelController@delete')->name('opd.delete');
     Route::get('/opd-all-patient', 'OpdModelController@opdAllPatient')->name('opd.allPatient');
     Route::post('/opd-view', 'OpdModelController@opdPatientDetails')->name('opd.opdPatientDetails');
     Route::post('/opd-add-patient', 'OpdModelController@opdAddTreatment')->name('opd.opdAddTreatment');

     Route::resource('/opd-treatment', 'OpdTreatmentModelController');
     Route::post('/opd-treatment-edit', 'OpdTreatmentModelController@opdEditTreatment')->name('opdtreatment.edit');
     Route::post('/opd-treatment/delete', 'OpdTreatmentModelController@des')->name('opdtreatment.delete');
     Route::PUT('/opd-treatment/update/{id}', 'OpdTreatmentModelController@update')->name('opdtreatment.update');
   
     Route::resource('/ipd', 'IpdModelController');
     Route::post('/ipd/delete', 'IpdModelController@delete')->name('ipd.delete');
     Route::post('/ipd-view', 'IpdModelController@ipdView')->name('ipdView');
     Route::post('/ipd-discharge', 'IpdModelController@ipdDischarge')->name('ipdDischarge');
     Route::get('/ipd-filter', 'IpdModelController@ipdFilter')->name('ipd.filter');
     Route::post('/ipd/search', 'IpdModelController@IpdRegCheck')->name('ipd.regsearch');
     Route::post('/ipd/bed-available/check', 'IpdModelController@bedAvailableCheck')->name('ipd.bedAvailableCheck');
     Route::get('/ipd-filter-search', 'IpdModelController@ipdFilterData')->name('ipdFilter.data');
     
     Route::get('/ipd-treatment','IpdTreatmentModelController@index')->name('ipd-treatment.index');
     Route::post('/ipd-treatment/store','IpdTreatmentModelController@store')->name('ipd-treatment.store');
     Route::get('/ipd-treatment/edit/{id}','IpdTreatmentModelController@edit')->name('ipd-treatment.edit');
     Route::PUT('/ipd-treatment/update/{id}','IpdTreatmentModelController@update')->name('ipd-treatment.update');
     Route::DELETE('/ipd-treatment/destroy/{id}','IpdTreatmentModelController@destroy');

     Route::resource('/ot', 'OtModelController');
     Route::get('/ot/delete/{id}', 'OtModelController@delete')->name('ot.delete');
     Route::post('/ot-view', 'OtModelController@otView');
     Route::post('/ot-value', 'OtModelController@otValue')->name('ot.value');
     Route::get('/ot-filter', 'OtModelController@otFilter')->name('otFilter');
     Route::get('/ot-filter-search', 'OtModelController@otFilterData')->name('otFilter.data');

     Route::group(['prefix'=>'test-report'],function() {

          Route::resource('/blood-examination','BloodExaminationModelController');
          Route::get('blood/filter','BloodExaminationModelController@filter')->name('blood.filter');
          Route::get('/bloodfilter/data','BloodExaminationModelController@bloodData')->name('blood.filterData');
     	  Route::post('/bloodpatient/view','BloodExaminationModelController@reportView')->name('blood.reportView');

          Route::resource('/general-blood','GeneralBloodModelController');
          Route::get('generalblood/filter','GeneralBloodModelController@generalBloodFilter')->name('generalblood.filter');
          Route::get('/generalbloodfilter/data','GeneralBloodModelController@generalBloodData')->name('generalblood.filterData');
     	  Route::post('/generalbloodpatient/view','GeneralBloodModelController@generalBloodReportView')->name('generalblood.reportView');
        
     	  Route::resource('/semene-examination','SemeneExaminationModelController');
          Route::get('semeneexam/filter','SemeneExaminationModelController@semeneExamFilter')->name('semeneexam.filter');
          Route::get('/semeneexamfilter/data','SemeneExaminationModelController@semeneExamData')->name('semeneexam.filterData');
          Route::post('/semeneexampatient/view','SemeneExaminationModelController@semeneExamReportView')->name('semeneexam.reportView');

     	  Route::resource('/stool-examination','StoolExaminationModelController');
          Route::get('stoolexamination/filter','StoolExaminationModelController@stoolExamFilter')->name('stoolexam.filter');
          Route::get('/stoolexaminationfilter/data','StoolExaminationModelController@stoolExamData')->name('stoolexam.filterData');
          Route::post('/stoolexaminationpatient/view','StoolExaminationModelController@stoolExamReportView')->name('stoolexam.reportView');


     	  Route::resource('/urine-examination','UrineExaminationModelController');
          Route::get('urineexamination/filter','UrineExaminationModelController@urineExamFilter')->name('urineexam.filter');
          Route::get('/urineexaminationfilter/data','UrineExaminationModelController@urineExamData')->name('urineexam.filterData');
          Route::post('/urineexaminationpatient/view','UrineExaminationModelController@urineExamReportView')->name('urineexam.reportView');

          Route::resource('/ecg-examination','EcgExaminationModelController');
          Route::get('ecgexamination/filter','EcgExaminationModelController@ecgExamFilter')->name('ecgexam.filter');
          Route::get('/ecgexaminationfilter/data','EcgExaminationModelController@ecgExamData')->name('ecgexam.filterData');
          Route::post('/ecgexaminationpatient/view','EcgExaminationModelController@ecgExamReportView')->name('ecgexam.reportView');


          Route::resource('/ultrasound','ultraSoundModelController');
          Route::get('ultrasound/filter','ultraSoundModelController@ultraSoundFilter')->name('ultrasound.filter');
          Route::get('/ultrasoundfilter/data','ultraSoundModelController@ultraSoundFilterData')->name('ultrasound.filterData');

          Route::resource('/lab','labController');
          Route::get('lab/filter','labController@labFilter')->name('lab.filter');
          Route::get('/labfilter/data','labController@labData')->name('lab.filterData');


          Route::resource('/x-ray','XRayModelController');
          Route::get('xray-examination/filter','XRayModelController@xrayExamFilter')->name('xrayexam.filter');
          Route::get('/xray-examinationfilter/data','XRayModelController@xrayExamData')->name('xrayexam.filterData');
          Route::post('/xray-examinationpatient/view','XRayModelController@xrayExamReportView')->name('xrayexam.reportView');
          
          Route::resource('/serun','SerumOfWidalModelController');
          Route::get('serun-examination/filter','SerumOfWidalModelController@serunExamFilter')->name('serunexam.filter');
          Route::get('/serun-examinationfilter/data','SerumOfWidalModelController@serunExamData')->name('serunexam.filterData');
          Route::post('/serun-examinationpatient/view','SerumOfWidalModelController@serunExamReportView')->name('serunexam.reportView');
     });

     Route::group(['prefix'=>'report'],function() {

        Route::get('opddate-wise','ReportController@opdDateWiseView')->name('report.opddatewise.view');
        Route::post('opddate-wise-search','ReportController@opdDateWiseFilter')->name('report.opddatewise.search');
        Route::get('opdmonth-wise','ReportController@opdReport')->name('opdExamReport');
        Route::post('opdmonth-wise-search','ReportController@opdReportSearch')->name('opdExamReport.search');
        Route::get('ipdmonth-wise','ReportController@ipdReport')->name('ipdExamReport');
        Route::post('ipdmonth-wise-search','ReportController@ipdReportSearch')->name('ipdExamReport.search');
        Route::get('ipddate-wise','ReportController@ipdDateWiseView')->name('report.ipddatewise.view');
        Route::post('ipddate-wise-search','ReportController@ipdDateWiseFilter')->name('report.ipddatewise.search');
        Route::get('opdtreatment-list','ReportController@opdTreatmentView')->name('report.treatmentlist.view');
        Route::post('opdtreatment-search','ReportController@opdTreatmentListFilter')->name('report.treatmentlist.search');
        Route::get('yoga-report','ReportController@yogaReport')->name('yogaReport');
        Route::post('yogareport-search','ReportController@yogaReportSearch')->name('yogaReport.search');
        Route::get('ecg-report','ReportController@ecgReport')->name('ecgReport');
        Route::post('ecg-report-search','ReportController@ecgReportSearch')->name('ecgReport.search'); 
        Route::get('urineexamamintion-report','ReportController@urineReport')->name('urineReport');
        Route::post('urineexamamintion-search','ReportController@urineReportSearch')->name('urineReport.search');
        Route::get('stoolexamamintion-report','ReportController@stoolReport')->name('stoolReport');
        Route::post('stoolexamamintion-search','ReportController@stoolReportSearch')->name('stoolReport.search');
        Route::get('serunexamamintion-report','ReportController@serunReport')->name('serunReport');
        Route::post('serunexamamintion-search','ReportController@serunReportSearch')->name('serunReport.search');
        Route::get('semeneexamamintion-report','ReportController@semeneReport')->name('semeneReport');
        Route::post('semeneexamamintion-search','ReportController@semeneReportSearch')->name('semeneReport.search');
        Route::get('generalbloodexam-report','ReportController@generalbloodReport')->name('generalbloodReport');
        Route::post('generalbloodexam-search','ReportController@generalbloodReportSearch')->name('generalbloodReport.search');
        Route::get('bloodexam-report','ReportController@bloodReport')->name('bloodexamReport');
        Route::post('bloodexam-search','ReportController@bloodReportSearch')->name('bloodexamReport.search');
        Route::get('xrayexam-report','ReportController@xrayReport')->name('xrayExamReport');
        Route::post('xrayexam-search','ReportController@xrayReportSearch')->name('xrayExamReport.search');
        Route::post('opdtreatment-view','ReportController@treatmentView')->name('treatmentView');

     });
     Route::group(['prefix'=>'management'],function() {

          Route::resource('doctor','DoctorModelController');
          Route::post('doctor-delete','DoctorModelController@delete')->name('doctor.delete');
          Route::get('doctor-list','DoctorModelController@doctorList')->name('doctor.list');
          Route::post('doctor-update','DoctorModelController@updateDoctor')->name('updateDoctor');

          Route::get('potency','PotencyModelController@index')->name('potency.index');
          Route::post('potency-store','PotencyModelController@store')->name('potency.store');
          Route::get('potency-list','PotencyModelController@potencyList')->name('potency.list');
          Route::post('potency-update','PotencyModelController@updatePotency')->name('update.potency');
          Route::post('potency-destroy','PotencyModelController@delete')->name('potency.delete');

          Route::get('department','DepartmentModelController@index')->name('department.index');
          Route::post('department-store','DepartmentModelController@store')->name('department.store');
          Route::get('department-list','DepartmentModelController@departmentList')->name('department.list');
          Route::post('department-update','DepartmentModelController@updateDepartment')->name('department.update');
          Route::post('department-destroy','DepartmentModelController@delete')->name('department.delete');

          Route::get('investigation','InvestigationModelController@index')->name('investigation.index');
          Route::post('investigation-store','InvestigationModelController@store')->name('investigation.store');
          Route::get('investigation-list','InvestigationModelController@investigationList')->name('investigation.list');
          Route::post('investigation-update','InvestigationModelController@updateinvestigation')->name('investigation.update');
          Route::post('investigation-destroy','InvestigationModelController@delete')->name('investigation.delete');

          Route::get('dietplan','DietPlanModelController@index')->name('dietplan.index');
          Route::post('dietplan-store','DietPlanModelController@store')->name('dietplan.store');
          Route::get('dietplan-list','DietPlanModelController@dietplanList')->name('dietplan.list');
          Route::post('dietplan-update','DietPlanModelController@updatedietplan')->name('dietplan.update');
          Route::post('dietplan-destroy','DietPlanModelController@delete')->name('dietplan.delete');

          Route::get('medicine','MedicineModelController@index')->name('medicine.index');
          Route::post('medicine-store','MedicineModelController@store')->name('medicine.store');
          Route::get('medicine-list','MedicineModelController@medicineList')->name('medicine.list');
          Route::post('medicine-update','MedicineModelController@updatemedicine')->name('medicine.update');
          Route::post('medicine-destroy','MedicineModelController@delete')->name('medicine.delete');

          Route::get('yogalist','YogaListModelController@index')->name('yogalist.index');
          Route::post('yogalist-store','YogaListModelController@store')->name('yogalist.store');
          Route::get('yogalist-list','YogaListModelController@yogalistList')->name('yogalist.list');
          Route::post('yogalist-update','YogaListModelController@updateyogalist')->name('yogalist.update');
          Route::post('yogalist-destroy','YogaListModelController@delete')->name('yogalist.delete');

          Route::get('physiotherpy','PhysiotherapylistModelController@index')->name('physiotherpy.index');
          Route::post('physiotherpy-store','PhysiotherapylistModelController@store')->name('physiotherpy.store');
          Route::get('physiotherpy-list','PhysiotherapylistModelController@physiotherpyList')->name('physiotherpy.list');
          Route::post('physiotherpy-update','PhysiotherapylistModelController@updatephysiotherpy')->name('physiotherpy.update');
          Route::post('physiotherpy-destroy','PhysiotherapylistModelController@delete')->name('physiotherpy.delete');

          Route::get('disease','DiseaseModelController@index')->name('disease.index');
          Route::post('disease-store','DiseaseModelController@store')->name('disease.store');
          Route::get('disease-list','DiseaseModelController@diseaseList')->name('disease.list');
          Route::post('disease-update','DiseaseModelController@updatedisease')->name('disease.update');
          Route::post('disease-destroy','DiseaseModelController@delete')->name('disease.delete');

          Route::get('ward','WardModelController@index')->name('ward.index');
          Route::post('ward-store','WardModelController@store')->name('ward.store');
          Route::get('ward-list','WardModelController@wardList')->name('ward.list');
          Route::post('ward-update','WardModelController@updateward')->name('ward.update');
          Route::post('ward-destroy','WardModelController@delete')->name('ward.delete');

          Route::get('therapyDisease','TherapyDiseaseModelController@index')->name('therapyDisease.index');
          Route::post('therapyDisease-store','TherapyDiseaseModelController@store')->name('therapyDisease.store');
          Route::get('therapyDisease-list','TherapyDiseaseModelController@therapyDiseaseList')->name('therapyDisease.list');
          Route::post('therapyDisease-update','TherapyDiseaseModelController@updatetherapyDisease')->name('therapyDisease.update');
          Route::post('therapyDisease-destroy','TherapyDiseaseModelController@delete')->name('therapyDisease.delete');

     });
     Route::get('/patient', 'PatientHistoryController@index')->name('patientHistory');
     Route::get('/all-patient-history', 'PatientHistoryController@AllPatientData')->name('AllPatientData');
     Route::post('/patient/view', 'PatientHistoryController@patientHistoryView')->name('patient.history.view');

     Route::resource('yoga', 'YogaModelController');
     Route::post('yoga-value', 'YogaModelController@yogaValue')->name('yogaValue');
     Route::get('/yoga-filter', 'YogaModelController@yogaFilter')->name('yogaFilter');
     Route::get('/yoga-filter-search', 'YogaModelController@yogaFilterData')->name('yogaFilter.data');
     Route::post('/yoga-report-View', 'YogaModelController@yogaReportView')->name('yoga.reportView');

     Route::resource('invoice', 'invoiceController');
     Route::get('/invoice-filter', 'invoiceController@invoiceFilter')->name('invoice.filter');
     Route::get('/invoicefilter/data','invoiceController@invoiceData')->name('invoice.filterData');

     Route::resource('phyiotherapy', 'PhysiotherapyModelController');
     Route::post('phyiotherapy-value', 'PhysiotherapyModelController@phyiotherapyValue')->name('phyiotherapyValue');
     Route::get('/phyiotherapy-filter', 'PhysiotherapyModelController@phyiotherapyFilter')->name('phyiotherapyFilter');
     Route::get('/phyiotherapy-filter-search', 'PhysiotherapyModelController@phyiotherapyFilterData')->name('phyiotherapyFilter.data');
     Route::post('/phyiotherapy-report-View', 'PhysiotherapyModelController@phyiotherapyReportView')->name('phyiotherapy.reportView');

});
 
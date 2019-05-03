<?php 

use App\Model\MedicineModel;
use App\Model\PotencyModel;
use App\Model\DiseaseModel;
use App\Model\TherapyDiseaseModel;
use App\Model\DepartmentModel;



 function __medicine() {

		$arr = [ 1 =>"Abies Nig",2 =>"Abrotanum",3=>"Absinthium",4 =>"Acetic Acid",5 =>"Acid Benz",6=>"Acid Carb",7 =>"Acid Lact",
	         8 =>"Acid mur",9 =>"Acid Oxalic",10 =>"Acid Salicy", 11 =>"Acid Sulph", 12 =>"Acid Uricum", 13 =>"Acide Phos", 14 =>"Aconite Nap",15 =>"Actea Spicata", 16 =>"Aesculus Hip",17 =>"Agarigus Mus", 18 =>"Aleterus Feri", 19 =>"Allium Cepa", 20 =>"Allium Sat",21 =>"Aloe Soco", 22=>"Alumen"
	     ];

	 	foreach ($arr as $key => $value) {
		 	$medicine = new MedicineModel();
		 	$medicine->name = $value;
		 	$medicine->save();
	 }
		 	return 'Data save successfully!!';
}

	 function __potency() {
                        $arr = [1=>"6",2=>"30",3=>"200",4=>"1M",5=>"10M",6=>"50M",7=>"1X",8=>"3X",9=>"6X",10=>"12X",11=>"Q",];
                         
                        foreach ($arr as $key => $value) {
					 	$potency = new PotencyModel();
					 	$potency->name = $value;
					 	$potency->save();
	
			}
					 	return 'Potency Data save successfully!!'; 
	}

		 function __yogaDisease() {

                        $arr = [  1=>"Abdominal disorder", 2=>"Arthritis",3=>"Asthma", 4=>"Backache", 5=>"Bronchitis", 6=>"cold",
	                              7=>"Constipation", 8=>"Depression", 9=>"Diabeties",  10=>"Eyestrain",  11=>"Gall Bladder Disorder",
	                              12=>"Headache", 13=>"Indigestion",  14=>"Insomnia",  15=>"Kedney Disorder", 16=>"Liver Disorder",
	                              17=>"Menopouse Disorder",  18=>"Neurosthenia",  19=>"Obesity",  20=>"Piles",  21=>"Poor Posture",
	                              22=>"Prostate",  23=>"Reproductive",  24=>"Rheumatism",  25=>"Sciatica",  26=>"Sexual Disability",
	                              27=>"Sinus",  28=>"Skin Disease",  29=>"Throat Discorder",  30=>"Thyroid Discorder",  31=>"Varicose Vein",
	                              32=>"Wind Pain ", 33=>"Wrenkles",
                          ];
                         
                        foreach ($arr as $key => $value) {
					 	$yogaDisease = new DiseaseModel();
					 	$yogaDisease->name = $value;
					 	$yogaDisease->save();
			}
					 	return 'Disease Data save successfully!!'; 

	}

     function __wardName() {

		$arr = [ 1 =>"General Ward Male",2 =>"General Ward Female",3=>"Obs / Gyne Ward",4 =>"Surgical Ward",5 =>"Pediatric Ward",6=>"Post Operative",
	         
	     ];

	 	foreach ($arr as $key => $value) {
		 	$wardName = new WardModel();
		 	$wardName->name = $value;
		 	$wardName->save();
	 }
		 	return 'Ward Name  save successfully!!';
} 

function __physiotherapyDisease() {
	$arr = [  1=>"Arthrits", 2=>"Backache&amp; Stiffness",3=>"Bodyache", 4=>"Cervical  Pain",5=>"Dulness",6=>"Frozen Shoulder",
                7=>"Knee Joint Pain", 8=>"Lumber Spine",  9=>"Pain During Waking",  10=>"Pain In Ankle Joint",  11=>"Pain In Leg",
              12=>"Pain In Lower Extremities",  13=>"Pain in Neck",  14=>"Pain In Rt Hand &amp; Stiffness",  15=>"Pain In Shoulder",
              16=>"Pain In Upper Extremities", 17=>"Pain In Wrist Joint",  18=>"Planter Fasciculitis",  19=>"Sciatica",
              20=>"Spondylitis Cervical",
	         
	     ];

	 	foreach ($arr as $key => $value) {
		 	$medicine = new TherapyDiseaseModel();
		 	$medicine->therapy_disease = $value;
		 	$medicine->save();
	 }
            return 'Therapy Disease  save successfully!!'; 
}
function __department() {
	$arr = [  1=>"Medicine", 2=>"Surgery",3=>"Obs / Gyne", 4=>"Pediatric",5=>"Others"];

	 	foreach ($arr as $key => $value) {
		 	$department = new DepartmentModel();
		 	$department->name = $value;
		 	$department->save();
	 }
            return 'Department  save successfully!!'; 
}
function __investigation() {

                                                              
                                                       
	$arr = [ 1=>"BLOOD GROUP &amp; RH TYPE",  2=>"BLOOD SUGAR",  3=>"BLOOD UREA",  4=>"BLOOD WIDAL TEST",
	          5=>"BT/CT", 6=>"CBC",  7=>"CBP",  8=>"CBP&amp;ESR",  9=>"ECG",
	          11=>"ESR",  21=>"HEMOGLOBIN (HB%)",  31=>"LFT",
	          41=>"PS FOR MP",  51=>"RA FACTORE",  61=>"REFFERED TO OTHER PATHOLOGY",
	          71=>"RFT",  15=>"SEMEN ANALYSIS",  16=>"SERUM BILIRUBIN",  17=>"SERUM CALCIUM",  18=>"SERUM CREATININE",
	          19=>"STOOL R/M",  91=>"T3 T4 TSH",  92=>"TOTAL LIPIDS PROFILE",
	          62=>"URINE FOR BILE SALT / BILE PIGMENT",  43=>"URINE R/M",
	          12=>"X-RAY ",
	      	];

	 	foreach ($arr as $key => $value) {
		 	$investigation = new InvestigationModel();
		 	$investigation->name = $value;
		 	$investigation->save();
	 }
            return 'investigation  save successfully!!'; 
}
                                                 
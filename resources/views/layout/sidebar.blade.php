    <aside class="app-sidebar" style="margin-top: 20px;">
        <div class="app-sidebar__user">
            <div class="dropdown user-pro-body">
              <div>
               <img src="{{asset('assets/images/faces/male/40.jpg')}}" alt="Profile-img" class="avatar avatar-md brround img-responsive"style="width:60px;height: 60px;">
                <a href="editprofile.html" class="profile-img">
                  <span class="fa fa-pencil" aria-hidden="true"></span>
                </a>
              </div>
              <div class="user-info mb-2">
                <h4 class="font-weight-semibold text-dark mb-1">{{ucfirst(Auth::user()->name)}}</h4>
                <span class="mb-0 text-muted">Ui Designer</span>
              </div>
              <a href="#" title="settings" class="user-button"><i class="fa fa-cog"></i></a>
              <a href="#" title="Comments" class="user-button"><i class="fa fa-comments"></i></a>
              <a href="#" title="logout" class="user-button"><i class="fa fa-power-off"></i></a>
            </div>
          </div>
         <ul class="side-menu" >
        <li class="active">
          <a class="side-menu__item" href="{{route('dashborad')}}">
              <i class="side-menu__icon fa fa-dashboard"></i>
              <span class="side-menu__label">Dashboard</span>
          </a>
        </li>
        <li>
          <a class="side-menu__item" href="{{route('opd.index')}}">
              <i class="side-menu__icon fa fa-users"></i>
              <span class="side-menu__label">OPD</span>
          </a>
        </li>
        <li>
          <a class="side-menu__item" href="{{route('ipd.index')}}">
              <i class="side-menu__icon fa fa-check"></i>
              <span class="side-menu__label">IPD</span>
          </a>
        </li>
        <li>
          <a class="side-menu__item" href="{{route('ot.index')}}">
              <i class="side-menu__icon fa fa-check"></i>
              <span class="side-menu__label">OT</span>
          </a>
        </li>
        <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#">
            <i class="side-menu__icon fa fa-circle-o"></i>
            <span class="side-menu__label">Test Reports</span>
            <i class="angle fa fa-angle-right"></i></a>
          <ul class="slide-menu">
            <li>
              <a href="{{ route('blood-examination.index') }}" class="slide-item">Blood Examination</a>
            </li>
            <li>
              <a href="{{ route('general-blood.index') }}" class="slide-item">General Blood</a>
            </li>
            <li>
              <a href="{{ route('semene-examination.index') }}" class="slide-item">Semen Examination</a>
            </li>
            <li>
              <a href="{{ route('serun.index') }}" class="slide-item">Serun of widal</a>
            </li>
            <li>
              <a href="{{ route('stool-examination.index') }}" class="slide-item">Stool Examination</a>
            </li>
            <li>
              <a href="{{ route('urine-examination.index') }}" class="slide-item">Urine Examination</a>
            </li>

            <li>
              <a href="{{ route('x-ray.index') }}" class="slide-item">X-Ray</a>
            </li>
            <li>
              <a href="{{ route('ecg-examination.index') }}" class="slide-item">ECG</a>
            </li>
            <li>
              <a href="{{ route('ultrasound.index') }}" class="slide-item">Ultrasound</a>
            </li>
            <li>
              <a href="{{ route('lab.index') }}" class="slide-item">Lab</a>
            </li>
            
          </ul>
        </li>
        <li>
            <a class="side-menu__item" href="{{ route('phyiotherapy.index') }}">
                <i class="side-menu__icon fa fa-list"></i>
                <span class="side-menu__label">Physiotherpy</span>
            </a>
        </li>

        <li>
          <a class="side-menu__item" href="{{ route('invoice.index') }}">
            <i class="side-menu__icon fa fa-list"></i>
            <span class="side-menu__label">Invoice</span>
          </a>
        </li>

        <li>
            <a class="side-menu__item" href="{{ route('yoga.index' )}}">
                <i class="side-menu__icon fa fa-list"></i>
                <span class="side-menu__label">Yoga</span>
            </a>
       </li>
       <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#">
            <i class="side-menu__icon fa fa-circle-o"></i>
            <span class="side-menu__label"> Reports</span>
            <i class="angle fa fa-angle-right"></i></a>
          <ul class="slide-menu">
            {{-- <li>
              <a href="" class="slide-item">  OPD Report</a>
            </li> --}}
            <li>
              <a href="{{ route('report.opddatewise.view') }}" class="slide-item"> OPD Date Wise</a>
            </li>
            <li>
              <a href="{{ route('opdExamReport') }}" class="slide-item">OPD Month Wise</a>
            </li>
            <li>
              <a href="{{ route('report.ipddatewise.view') }}" class="slide-item">  IPD Date Wise</a>
            </li>
            <li>
              <a href="{{ route('ipdExamReport') }}" class="slide-item"> IPD Month Wise</a>
            </li>
            <li>
              <a href="{{ route('report.treatmentlist.view') }}" class="slide-item">OPD Treatment List</a>
            </li>

            <li>
              <a href="{{ route('xrayExamReport') }}" class="slide-item"> X-Ray Report</a>
            </li>
            <li>
              <a href="{{ route('bloodexamReport') }}" class="slide-item"> Blood Examination Report</a>
            </li>
            <li>
                <a href="{{ route('generalbloodReport') }}" class="slide-item">General Blood Report</a>
              </li>
              <li>
                <a href="{{ route('semeneReport') }}" class="slide-item"> Semen Examination Report</a>
              </li>
              <li>
                <a href="{{ route('serunReport') }}" class="slide-item"> Serum of widal Report</a>
              </li>
              <li>
                <a href="{{ route('stoolReport') }}" class="slide-item"> Stool Examination Report</a>
              </li>
      
              <li>
                <a href="{{ route('urineReport') }}" class="slide-item"> Urine Examination Report</a>
              </li>
              <li>
                <a href="{{ route('ecgReport') }}" class="slide-item">  ECG Report</a>
              </li>
              <li>
                  <a href="gallery.html" class="slide-item">  Physiotherpy Report</a>
                </li>
                <li>
                  <a href="{{ route('yogaReport') }}" class="slide-item">  Yoga Report</a>
                </li>
          </ul>
        </li>
        
        <li>
          <a class="side-menu__item" href="{{ route('patientHistory') }}">
            <i class="side-menu__icon fa fa-list"></i>
            <span class="side-menu__label">Patient History</span>
          </a>
        </li>


        <li class="slide">
          <a class="side-menu__item" data-toggle="slide" href="#">
            <i class="side-menu__icon fa fa-circle-o"></i>
            <span class="side-menu__label">Mangement List</span>
            <i class="angle fa fa-angle-right"></i></a>
          <ul class="slide-menu">
            <li>
              <a href="{{ route('doctor.index') }}" class="slide-item">Add Doctor</a>
            </li>
            <li>
              <a href="{{ route('potency.index') }}" class="slide-item">Add Potency</a>
            </li>
            <li>
              <a href="{{ route('department.index') }}" class="slide-item">Add Department</a>
            </li>
            <li>
              <a href="{{ route('investigation.index') }}" class="slide-item">Add Investigation</a>
            </li>
            <li>
              <a href="{{ route('dietplan.index') }}" class="slide-item">Add DietPlan</a>
            </li>
            <li>
              <a href="{{ route('medicine.index') }}" class="slide-item">Add Medicine</a>
            </li>
            <li>
              <a href="{{ route('disease.index') }}" class="slide-item">Add Disease</a>
            </li>

            <li>
              <a href="{{ route('yogalist.index') }}" class="slide-item">Add Yoga</a>
            </li>
            <li>
              <a href="{{ route('ward.index') }}" class="slide-item">Add Ward</a>
            </li>
            <li>
              <a href="{{ route('physiotherpy.index') }}" class="slide-item">Add Physiotherpy</a>
            </li>
            <li>
              <a href="{{ route('therapyDisease.index') }}" class="slide-item">Add Physiotherpy Disease</a>
            </li>
            
          </ul>
        </li>
      </ul>
</aside>
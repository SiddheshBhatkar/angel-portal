<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item">
            <div class="d-flex sidebar-profile">
              <div class="sidebar-profile-image">
                <img src="{{ asset('images/faces/face29.png')}}" alt="image">
                <span class="sidebar-status-indicator"></span>
              </div>
              <div class="sidebar-profile-name">
                <p class="sidebar-name">
                  {{ ucwords(session('name')) }}
                </p>
                <p class="sidebar-designation" style="color:#fff;">
                 {{ ucwords(session('designation')) }}
                </p>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
              <i class="typcn typcn-device-desktop menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="typcn typcn-flow-merge menu-icon"></i>
              <span class="menu-title">Master</span>
              <i class="typcn typcn-chevron-right menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('subject') }}">Subjects</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('standard') }}">Standards</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('classroom') }}">Classrooms</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('teacher') }}">Teachers</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
              <i class="fa fa-window-maximize menu-icon"></i>
              <span class="menu-title">Teacher</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"><a class="nav-link" href="{{ route('show-assign-class-teacher') }}">Assign Class-Teacher</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('manage-assign-class-teachers') }}">Manage Assigned-Teachers</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <i class="fa fa-book menu-icon menu-icon"></i>
              <span class="menu-title">Student</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('student') }}">Add Student</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('manage-students') }}">Manage Students</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
              <i class="typcn typcn-cog-outline menu-icon"></i>
              <span class="menu-title">Settings</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('manage-profile') }}">Manage Profile</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout-user') }}">
              <i class="typcn typcn-power menu-icon"></i>
              <span class="menu-title">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
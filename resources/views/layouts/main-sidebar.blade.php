 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Logo -->
     <a href="" class="brand-link">
         <img src="{{ asset('assets/img/1519896307464.jpg') }}" alt="Mashreq University"
             class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light">Mashreq University</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('assets/img/user.png') }}" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">{{ Auth::user()->name }}</a>
             </div>
         </div>

         <!-- SidebarSearch Form -->
         <div class="form-inline">
             <div class="input-group" data-widget="sidebar-search">
                 <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                     aria-label="Search">
                 <div class="input-group-append">
                     <button class="btn btn-sidebar">
                         <i class="fas fa-search fa-fw"></i>
                     </button>
                 </div>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <li class="nav-item">
                     <a href="{{ route('dashboard') }}" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Dashboard

                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('colleges.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-university"></i>
                         <p>
                             Colleges
                         </p>
                     </a>
                 </li>

                 <li class="nav-item">
                     <a href="{{ route('departments.index') }}" class="nav-link">
                         <i class="nav-icon fa fa-building"></i>
                         <p>
                             Departments
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="nav-icon far fa-calendar-alt"></i>
                         <p>
                             Academic years
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('years.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Years</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ route('semesters.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Semester</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="nav-icon far fa-plus-square"></i>
                         <p>
                             Courses
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ route('courses.index') }}" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>All Courses</p>
                             </a>
                         </li>

                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Curriculums</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="" class="nav-link">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Teachers of Courses</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="nav-icon fas fa-chalkboard-teacher"></i>
                         <p>
                             Teachers
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="nav-icon fas fa-table"></i>
                         <p>
                             Tables
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="nav-icon fas fa-user-graduate"></i>
                         <p>
                             Students
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="nav-icon fas fa-calendar-alt"></i>
                         <p>
                             Attendance
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('calendars.index') }}" class="nav-link">
                         <i class="nav-icon far fa-calendar-alt"></i>
                         <p>
                             Calendar
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="nav-icon fas fa-clipboard-list"></i>
                         <p>
                             Result
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ route('news.index') }}" class="nav-link">
                         <i class="nav-icon fas fa-book-reader"></i>
                         <p>
                             News
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="nav-icon fas fa-users"></i>
                         <p>
                             Users
                         </p>
                     </a>
                 </li>
                 {{-- <li class="nav-item">
                     <a href="{{ route('sliders.index') }}" class="nav-link">
                         <i class="nav-icon far fa-images"></i>
                         <p>
                             Sliders
                         </p>
                     </a>
                 </li> --}}
                 <li class="nav-item">
                     <a href="" class="nav-link">
                         <i class="nav-icon fas fa-cogs"></i>
                         <p>
                             Settings
                         </p>
                     </a>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>

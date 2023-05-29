 @auth
     <aside class="col-lg-3">
         <div class="card">
             @if (auth()->user()->role == 0)
                 <div class="card-header">
                     <h2 class="page-title text-center mt-1">Admin Dashboard</h2>
                 </div>
                 <div class="list-group p-3">
                     <a href="/admin"
                         class="list-group-item list-group-item-action sidebar-link{{ request()->is('admin') ? ' active' : '' }}">
                         <i data-feather="activity"></i>
                         <span>Dashboard</span>
                     </a>
                     <a href="/admin/teachers"
                         class="list-group-item list-group-item-action sidebar-link{{ request()->is('admin/teachers') ? ' active' : '' }}">
                         <i data-feather="user"></i>
                         <span>Teachers</span>
                     </a>
                     <a href="/admin/students"
                         class="list-group-item list-group-item-action sidebar-link{{ request()->is('admin/students') ? ' active' : '' }}">
                         <i data-feather="users"></i>
                         <span>Students</span>
                     </a>
                     <a href="/admin/course"
                         class="list-group-item list-group-item-action sidebar-link{{ request()->is('admin/course') ? ' active' : '' }}">
                         <i data-feather="archive"></i>
                         <span>Courses</span>
                     </a>
                 </div>
             @elseif (auth()->user()->role == 1)
                 <div class="card-header">
                     <h2 class="page-title text-center mt-1">Teacher Dashboard</h2>
                 </div>
                 <div class="list-group p-3">
                     <a href="/teacher"
                         class="list-group-item list-group-item-action sidebar-link{{ request()->is('teacher') ? ' active' : '' }}">
                         <i data-feather="activity"></i>
                         <span>Dashboard</span>
                     </a>
                     <a href="/teacher/courses/{{ auth()->user()->id }}"
                         class="list-group-item list-group-item-action sidebar-link{{ request()->is('teacher/*') ? ' active' : '' }}">
                         <i data-feather="archive"></i>
                         <span>Courses</span>
                     </a>
                 </div>
             @endif
         </div>
     </aside>
 @endauth
 @guest


     <aside class="col-lg-5 align-self-center">
         <h1 class="text-center">
             Lorem ipsum dolor sit amet.
         </h1>
         <p class="text-center">
             Lorem ipsum dolor sit amet.
         </p>
         <div class="text-center">
             <button class="btn btn-info">
                 learn now!
             </button>
         </div>

     </aside>
 @endguest

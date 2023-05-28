 @auth
<aside class="col-lg-3">
    <div class="card">
        <div class="card-header">
            <h2 class="page-title text-center mt-1">Admin Dashboard</h2>
        </div>
        <div class="list-group p-3">
            <a href="/admin" class="list-group-item list-group-item-action sidebar-link{{ request()->is('dashboard') ? ' active' : '' }}">
                <i data-feather="activity"></i>
                <span>Dashboard</span>
            </a>
            <a href="/admin/teachers" class="list-group-item list-group-item-action sidebar-link{{ request()->is('teachers') ? ' active' : '' }}">
                <i data-feather="user"></i>
                <span>Teachers</span>
            </a>
            <a href="/admin/students" class="list-group-item list-group-item-action sidebar-link{{ request()->is('students') ? ' active' : '' }}">
                <i data-feather="users"></i>
                <span>Students</span>
            </a>
            <a href="/admin/course" class="list-group-item list-group-item-action sidebar-link{{ request()->is('course') ? ' active' : '' }}">
                <i data-feather="archive"></i>
                <span>Courses</span>
            </a>
        </div>
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
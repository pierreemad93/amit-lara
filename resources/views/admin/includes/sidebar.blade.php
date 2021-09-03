<div class="sidebar" data-color="purple" data-background-color="black" data-image="adminpanel/img/sidebar-2.jpg">
    <div class="logo">
        <a href="" class="simple-text logo-normal">
            Hello {{ Auth::user()->name}}
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active">
                {{-- {{url('/admin')}}  --}}
                <a class="nav-link" href="{{route('dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('user.index')}}">
                    <i class="material-icons">person</i>
                    <p>Users</p>
                </a>
            </li>
         
            <li class="nav-item ">
                <a class="nav-link" href="">
                    <i class="material-icons">library_books</i>
                    <p>Posts</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{ route('role.index') }}">
                    <i class="material-icons">library_books</i>
                    <p>Roles</p>
                </a>
            </li>

        
            <!-- <li class="nav-item active-pro ">
        <a class="nav-link" href="./upgrade.html">
            <i class="material-icons">unarchive</i>
            <p>Upgrade to PRO</p>
        </a>
    </li> -->
        </ul>
    </div>
</div>
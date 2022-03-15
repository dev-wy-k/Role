<div class="col-12 col-lg-3 col-xl-2 vh-100 sidebar">
    <div class="d-flex justify-content-between align-items-center py-2 mt-3 nav-brand">
        <div class="d-flex align-items-center">
            <span class="bg-primary p-2 rounded d-flex justify-content-center align-items-center mr-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-coffee"><path d="M18 8h1a4 4 0 0 1 0 8h-1"></path><path d="M2 8h16v9a4 4 0 0 1-4 4H6a4 4 0 0 1-4-4V8z"></path><line x1="6" y1="1" x2="6" y2="4"></line><line x1="10" y1="1" x2="10" y2="4"></line><line x1="14" y1="1" x2="14" y2="4"></line></svg>
            </span>
            <span class="font-weight-bolder h4 mb-0 text-uppercase text-primary">DashBoard</span>
        </div>
        <button class="hide-sidebar-btn btn btn-transparent d-block d-lg-none">
            <i class="feather-x text-primary" style="font-size: 2em;"></i>
        </button>
    </div>
    <div class="nav-menu">
        <ul>
            <x-menu-spacer></x-menu-spacer>

            <x-menu-item link="{{ route('home') }}" class="feather-home" name="Home"></x-menu-item>

            <x-menu-title title="My Test Menu"></x-menu-title>

            <x-menu-item name="Create New Item" class="feather-plus-circle"></x-menu-item>

            <x-menu-item name="Item List" class="feather-list" count="54"></x-menu-item>

            <x-menu-spacer></x-menu-spacer>

            @if(Auth::user()->role == 0)
            <x-menu-title title="User Management"></x-menu-title>

            <x-menu-item name="User" class="feather-users" link="{{ route('user-manager.index') }}"></x-menu-item>

            <x-menu-spacer></x-menu-spacer>
            @endif

            <x-menu-title title="User Profile"></x-menu-title>

            <x-menu-item name="Your Profile" class="feather-user" link="{{ route('profile') }}"></x-menu-item>
            <x-menu-item name="Change Password" class="feather-refresh-ccw" link="{{ route('profile.edit.password') }}"></x-menu-item>
            <x-menu-item name="Update Info" class="feather-message-square" link="{{ route('profile.edit.name.email') }}"></x-menu-item>
            <x-menu-item name="Update Photo" class="feather-image" link="{{ route('profile.edit.photo') }}"></x-menu-item>

            <x-menu-spacer></x-menu-spacer>


            <a class="btn btn-outline-primary w-100" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
            </a>

        </ul>
    </div>
</div>



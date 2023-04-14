<div class="sidebar" data-color="black" data-active-color="primary">
    <div class="logo">
        <a href="#  " class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/user.gif">
            </div>
        </a>
        <a href="{{ route('page.index', 'dashboard') }}" class="simple-text logo-normal">
            {{ __('Robot Shop') }}
            
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="{{ $elementActive == 'dashboard' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'dashboard') }}">
                    <i class="nc-icon nc-vector"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'profile' ? 'active' : '' }}">
                <a href="{{ route('profile.edit') }}">
                    <i class="nc-icon nc-circle-10"></i>
                    <span class="sidebar-normal">{{ __(auth()->user()->name)}}</span>
                </a>
            </li>
            <li class="{{ $elementActive == 'icons' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'icons') }}">
                    <i class="nc-icon nc-diamond"></i>
                    <p>{{ __('Icons') }}</p>
                </a>
            </li>
            <li class="{{ $elementActive == 'conocenos' ? 'active' : '' }}">
                <a href="{{ route('page.index', 'conocenos') }}" >
                    <i class="nc-icon nc-favourite-28"></i>
                    <p>{{ __('Conocenos') }}</p>
                </a>
            </li>
            
        </ul>
    </div>
</div>

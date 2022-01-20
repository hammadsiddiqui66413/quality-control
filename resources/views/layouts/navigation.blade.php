<ul class="nav flex-column pt-3 pt-md-0">
    @if(Illuminate\Support\Str::contains(Route::currentRouteName(), 'client'))
    <li class="nav-item">
        <a href="{{ route('client.dashboard') }}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon me-1">
                <img src="{{ asset('images/Quality-Control.jpg') }}" height="30" width="35" alt="Volt Logo">
            </span>
            <span class="mt-1 ms-1 sidebar-text">
                Dashboard
            </span>
        </a>
    </li>

    <li class="nav-item bt-1 {{ request()->routeIs('client.terms') ? 'active' : '' }}">
        <a href="{{ route('client.terms') }}" class="nav-link">
            <span class="sidebar-icon me-3">
                <i class="fa fa-terminal"></i>
            </span>
            <span class="sidebar-text">{{ __('Terminals') }}</span>
        </a>
    </li>

    <li class="nav-item bt-1 {{ request()->routeIs('client.jobs') ? 'active' : '' }}">
        <a href="{{ route('client.jobs') }}" class="nav-link">
            <span class="sidebar-icon me-3">
                <i class="fa fa-tasks"></i>
            </span>
            <span class="sidebar-text">{{ __('Jobs') }}</span>
        </a>
    </li>

    <li class="nav-item bt-1 {{ request()->routeIs('client.invoice') ? 'active' : '' }}">
        <a href="{{ route('client.invoice') }}" class="nav-link">
            <span class="sidebar-icon me-3">
                <i class="fa fa-list-alt" aria-hidden="true"></i>
            </span>
            <span class="sidebar-text">{{ __('Invoice') }}</span>
        </a>
    </li>

    @elseif(Illuminate\Support\Str::contains(Route::currentRouteName(), 'terminal'))

    <li class="nav-item">
        <a href="{{ route('terminal.dashboard') }}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon me-1">
                <img src="{{ asset('images/Quality-Control.jpg') }}" height="30" width="35" alt="Volt Logo">
            </span>
            <span class="mt-1 ms-1 sidebar-text">
                Dashboard
            </span>
        </a>
    </li>

    <li class="nav-item bt-1 {{ request()->routeIs('terminal.jobs') ? 'active' : '' }}">
        <a href="{{ route('terminal.jobs') }}" class="nav-link">
            <span class="sidebar-icon me-3">
                <i class="fa fa-tasks"></i>
            </span>
            <span class="sidebar-text">{{ __('Jobs') }}</span>
        </a>
    </li>

    @else
    <li class="nav-item">
        <a href="{{ route('home') }}" class="nav-link d-flex align-items-center">
            <span class="sidebar-icon me-1">
                <img src="{{ asset('images/Quality-Control.jpg') }}" height="30" width="35" alt="Volt Logo">
            </span>
            <span class="mt-1 ms-1 sidebar-text">
                Dashboard
            </span>
        </a>
    </li>

    <li class="nav-item bt-1 {{ request()->routeIs('plans.index') ? 'active' : '' }}">
        <a href="{{ route('plans.index') }}" class="nav-link">
            <span class="sidebar-icon">
                <i class="fa fa-bar-chart" aria-hidden="true"></i>
            </span>
            <span class="sidebar-text">{{ __('Plans') }}</span>
        </a>
    </li>

    <li class="nav-item bt-1 {{ request()->routeIs('tests.index') ? 'active' : '' }}">
        <a href="{{ route('tests.index') }}" class="nav-link">
            <span class="sidebar-icon">
                <i class="fa fa-list" aria-hidden="true"></i>
            </span>
            <span class="sidebar-text">{{ __('Tests') }}</span>
        </a>
    </li>

    <li class="nav-item bt-1 {{ request()->routeIs('users.index') ? 'active' : '' }}">
        <a href="{{ route('users.index') }}" class="nav-link">
            <span class="sidebar-icon me-3">
                <i class="fas fa-user-alt fa-fw"></i>
            </span>
            <span class="sidebar-text">{{ __('Users') }}</span>
        </a>
    </li>
    @endif
{{--
    <li class="nav-item">
        <span class="nav-link d-flex justify-content-between align-items-center" data-bs-toggle="collapse"
            data-bs-target="#submenu-app">
            <span>
                <span class="sidebar-icon me-3">
                    <i class="fas fa-circle fa-fw"></i>
                </span>
                <span class="sidebar-text">Two-level menu</span>
            </span>
            <span class="link-arrow">
                <svg class="icon icon-sm" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd">
                    </path>
                </svg>
            </span>
        </span>
        <div class="multi-level collapse" role="list" id="submenu-app" aria-expanded="false">
            <ul class="flex-column nav">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="sidebar-icon">
                            <i class="fas fa-circle"></i>
                        </span>
                        <span class="sidebar-text">Child menu</span>
                    </a>
                </li>
            </ul>
        </div>
    </li> --}}
</ul>

<ul class="navbar-nav ml-auto">
    @auth
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right text-white text-left">
                <a href="{{ route('account.index') }}" class="dropdown-item">
                    <i class="fas fa-fw fa-user"></i>
                    {{ JetAdminLte::title('account.index') }}
                </a>
                <a href="{{ route('password.edit') }}" class="dropdown-item">
                    <i class="fas fa-fw fa-lock"></i>
                    {{ JetAdminLte::title('password.edit') }}
                </a>
                @if(JetAdminLte::hasSocialLoginFeature())
                <a href="{{ route('social-accounts') }}" class="dropdown-item">
                    <i class="fas fa-fw fa-link"></i>
                    {{ JetAdminLte::title('social-accounts') }}
                </a>
                @endif
                @if(JetAdminLte::hasTwoFactorFeature())
                    <a href="{{ route('two-factor-auth') }}" class="dropdown-item">
                        <i class="fas fa-fw fa-qrcode"></i>
                        {{ JetAdminLte::title('two-factor-auth') }}
                    </a>
                @endif
                <a href="{{ route('security') }}" class="dropdown-item">
                    <i class="fa-fw fas fa-user-shield"></i>
                    {{ JetAdminLte::title('security') }}
                </a>
                <div class="dropdown-divider"></div>
                <form class="dropdown-item p-0" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-block btn-default border-0 rounded-0 px-3 text-left">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        {{ JetAdminLte::title('logout') }}
                    </button>
                </form>
            </div>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
                {{ JetAdminLte::title('login') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">
                {{ JetAdminLte::title('register') }}
            </a>
        </li>
    @endauth
</ul>

<ul class="navbar-nav ml-auto">
    @auth
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-user"></i>
                {{ Auth::user()->name }}
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right text-white text-left">
                <a href="{{ route('account.index') }}" class="dropdown-item">
                    <i class="fa fa-fw fa-user"></i>
                    {{ __('jet-adminlte::adminlte.account') }}
                </a>
                <a href="{{ route('password.edit') }}" class="dropdown-item">
                    <i class="fa fa-fw fa-lock"></i>
                    {{ __('jet-adminlte::adminlte.password_change') }}
                </a>
                <div class="dropdown-divider"></div>
                <form class="dropdown-item p-0" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-block btn-default border-0 rounded-0 px-3 text-left">
                        <i class="fas fa-fw fa-sign-out-alt"></i>
                        {{ __('jet-adminlte::adminlte.log_out') }}
                    </button>
                </form>
            </div>
        </li>
    @else
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
                {{ __('jet-adminlte::adminlte.sign_in') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">
                {{ __('jet-adminlte::adminlte.register_message') }}
            </a>
        </li>
    @endauth
</ul>

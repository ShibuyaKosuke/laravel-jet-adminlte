<x-guest-layout>
    <x-jet-adminlte::widget.login-box>
        <x-jet-adminlte::widget.card class="card-outline card-primary">
            <x-slot name="header">
                <a href="{{ route('welcome') }}" class="h1">
                    {{ config('app.name') }}
                </a>
            </x-slot>

            <p class="login-box-msg">{{ __('jet-adminlte::adminlte.login_message') }}</p>

            <x-jet-adminlte::forms.form action="{{ route('login') }}" method="post">

                <div class="input-group mb-3">
                    <input type="email"
                           id="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           placeholder="{{ __('jet-adminlte::adminlte.email') }}"
                           value="{{ old('email') }}"
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <span id="email-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" id="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder={{ __('jet-adminlte::adminlte.password') }}>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span id="password-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember"
                                   @if(old('remember')) checked @endif>
                            <label for="remember">
                                {{ __('jet-adminlte::adminlte.remember_me') }}
                            </label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('jet-adminlte::adminlte.sign_in') }}
                        </button>
                    </div>
                </div>

            </x-jet-adminlte::forms.form>

            <x-jet-adminlte::widget.social-auth-login/>

            <p class="mb-1">
                <a href="{{ route('password.email') }}">
                    {{ __('jet-adminlte::adminlte.i_forgot_my_password') }}
                </a>
            </p>
            <p class="mb-0">
                <a href="{{ route('register') }}" class="text-center">
                    {{ __('jet-adminlte::adminlte.register_a_new_membership') }}
                </a>
            </p>

        </x-jet-adminlte::widget.card>
    </x-jet-adminlte::widget.login-box>
</x-guest-layout>

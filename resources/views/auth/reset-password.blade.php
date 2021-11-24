<x-guest-layout>
    <x-jet-adminlte::widget.login-box>
        <x-jet-adminlte::widget.card class="card-outline card-primary">
            <x-slot name="header">
                <a href="{{ route('dashboard') }}" class="h1">
                    {{ config('app.name') }}
                </a>
            </x-slot>

            <p class="login-box-msg">You are only one step a way from your new password, recover your password now.</p>

            <x-jet-adminlte::forms.form action="{{ route('password.update') }}" method="post">

                <div class="input-group mb-3">
                    <input type="password" name="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="{{ __('jet-adminlte::adminlte.password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span id="password-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation"
                           class="form-control @error('password_confirmation') is-invalid @enderror"
                           placeholder="{{ __('jet-adminlte::adminlte.password_confirmation') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password_confirmation')
                    <span id="password-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('jet-adminlte::adminlte.reset_password') }}
                        </button>
                    </div>
                </div>

            </x-jet-adminlte::forms.form>

            <p class="mt-3 mb-1">
                <a href="{{ route('login') }}">{{ __('jet-adminlte::adminlte.sign_in') }}</a>
            </p>
        </x-jet-adminlte::widget.card>
    </x-jet-adminlte::widget.login-box>
</x-guest-layout>

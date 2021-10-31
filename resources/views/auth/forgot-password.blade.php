<x-guest-layout>
    <x-jet-adminlte::widget.login-box>
        <x-jet-adminlte::widget.card class="card-outline card-primary">
            <x-slot name="header">
                <a href="{{ route('dashboard') }}" class="h1"><b>Admin</b>LTE</a>
            </x-slot>

            <p class="login-box-msg">{{ __('jet-adminlte::adminlte.password_reset_message') }}</p>

            <x-jet-adminlte::forms.form action="{{ route('password.email') }}" method="post">

                <div class="input-group mb-3">
                    <input type="email"
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

                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('jet-adminlte::adminlte.send_password_reset_link') }}
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

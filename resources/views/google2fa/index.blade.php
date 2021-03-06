<x-guest-layout>
    <x-jet-adminlte::widget.login-box>
        <x-jet-adminlte::widget.card class="card-outline card-primary">
            <x-slot name="header">
                <a href="{{ route('welcome') }}" class="h1">
                    {{ config('app.name') }}
                </a>
            </x-slot>

            <p class="login-box-msg">{{ __('jet-adminlte::adminlte.2fa_login_message') }}</p>

            <x-jet-adminlte::forms.form action="{{ route('two-factor.store') }}" method="post">

                <input type="hidden" name="user" value="{{ old('user', Auth::id() ?: $user) }}">

                <div class="input-group mb-3">
                    <input type="text"
                           id="one_time_password"
                           name="one_time_password"
                           class="form-control @error('one_time_password') is-invalid @enderror"
                           placeholder="{{ __('jet-adminlte::adminlte.one_time_password') }}"
                           autofocus
                    >
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-key"></span>
                        </div>
                    </div>
                    @error('one_time_password')
                    <span id="secret_key-error" class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="row">
                    <div class="col-4 offset-8">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('jet-adminlte::adminlte.sign_in') }}
                        </button>
                    </div>
                </div>

            </x-jet-adminlte::forms.form>
        </x-jet-adminlte::widget.card>
    </x-jet-adminlte::widget.login-box>
</x-guest-layout>

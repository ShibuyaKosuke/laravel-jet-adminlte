<x-guest-layout>
    <x-jet-adminlte::widget.login-box>
        <x-jet-adminlte::widget.card class="card-outline card-primary">
            <x-slot name="header">
                <a href="{{ route('dashboard') }}" class="h1"><b>Admin</b>LTE</a>
            </x-slot>

            <p class="login-box-msg">{{ __('jet-adminlte::adminlte.register_a_new_membership') }}</p>

            <x-jet-adminlte::forms.form action="{{ route('register') }}" method="post">

                <div class="input-group mb-3">
                    <input name="name" type="text" class="form-control @error('name') is-invalid @enderror"
                           placeholder="{{ __('jet-adminlte::adminlte.full_name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('name')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input name="email" type="email" class="form-control @error('email') is-invalid @enderror"
                           placeholder="{{ __('jet-adminlte::adminlte.email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input name="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           placeholder="{{ __('jet-adminlte::adminlte.password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                    <span class="error invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group mb-3">
                    <input type="password" class="form-control"
                           placeholder="{{ __('jet-adminlte::adminlte.retype_password') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-8">
                        @if (JetAdminLte::hasTermsAndPrivacyPolicyFeature() && Route::has('terms.show'))
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms"
                                       class="custom-control-input @error('terms') is-invalid @enderror"
                                       name="terms"
                                       value="1">
                                <label for="agreeTerms">
                                    {!! __('jet-adminlte::adminlte.i_agree_to_the', ['href' => route('terms.show'),'terms' => trans('jet-adminlte::adminlte.terms')]) !!}
                                </label>
                                @error('terms')
                                <span class="error invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('jet-adminlte::adminlte.register') }}
                        </button>
                    </div>
                </div>

            </x-jet-adminlte::forms.form>

            <x-jet-adminlte::widget.social-auth-login/>

            <a href="{{ route('login') }}" class="text-center">
                {{ __('jet-adminlte::adminlte.i_already_have_a_membership') }}
            </a>

        </x-jet-adminlte::widget.card>
    </x-jet-adminlte::widget.login-box>
</x-guest-layout>

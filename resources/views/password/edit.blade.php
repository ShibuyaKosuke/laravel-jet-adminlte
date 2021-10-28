<x-app-layout>
    <x-slot name="title">
        {{ __('jet-adminlte::adminlte.password_change') }}
    </x-slot>

    <div class="row">
        <div class="col-sm-12 col-md-10 offset-md-1 col-lg-6 offset-lg-3">
            <x-jet-adminlte::forms.form method="put" action="{{ route('password.update', ['account' => $user]) }}">

                <x-jet-adminlte::widget.card class="card-outline card-primary">
                    <x-slot name="header">
                        <h3 class="card-title">
                            <i class="fa fa-lock"></i>
                            {{ __('jet-adminlte::adminlte.password_change') }}
                        </h3>
                    </x-slot>

                    <x-jet-adminlte::forms.input
                        type="password"
                        name="current_password"
                        label="{{ __('jet-adminlte::adminlte.current_password') }}"
                    />

                    <x-jet-adminlte::forms.input
                        type="password"
                        name="new_password"
                        label="{{ __('jet-adminlte::adminlte.new_password') }}"
                    />

                    <x-slot name="footer">
                        <button class="btn btn-md btn-primary">{{ __('jet-adminlte::adminlte.submit') }}</button>
                    </x-slot>
                </x-jet-adminlte::widget.card>

            </x-jet-adminlte::forms.form>
        </div>
    </div>

</x-app-layout>

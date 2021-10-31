<x-app-layout>
    <div class="row">
        <div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <x-jet-adminlte::forms.form method="put" action="{{ route('account.update') }}">

                <x-jet-adminlte::widget.card class="card-outline card-primary">
                    <x-slot name="header">
                        <h3 class="card-title">
                            <i class="fa fa-user-edit"></i>
                            {{ __('jet-adminlte::adminlte.account_edit') }}
                        </h3>
                    </x-slot>

                    <x-jet-adminlte::forms.input
                        name="name"
                        label="{{ __('jet-adminlte::columns.users.name') }}"
                        value="{{ $user->name }}"
                    />

                    <x-jet-adminlte::forms.input
                        name="email"
                        label="{{ __('jet-adminlte::columns.users.email') }}"
                        value="{{ $user->email }}"
                    />

                    <x-slot name="footer">
                        <button class="btn btn-md btn-primary">{{ __('jet-adminlte::adminlte.submit') }}</button>
                    </x-slot>
                </x-jet-adminlte::widget.card>

            </x-jet-adminlte::forms.form>
        </div>
    </div>

</x-app-layout>

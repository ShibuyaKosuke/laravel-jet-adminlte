<x-app-layout>
    <x-slot name="title">
        {{ __('jet-adminlte::adminlte.account_edit') }}
    </x-slot>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8">
            <x-jet-adminlte::forms.form method="put" action="{{ route('account.update', ['account' => $user]) }}">

                <x-jet-adminlte::widget.card class="card-outline card-primary">
                    <x-slot name="header">
                        <h3 class="card-title">
                            <i class="fa fa-user-edit"></i>
                            {{ __('jet-adminlte::adminlte.account_edit') }}
                        </h3>
                    </x-slot>

                    <x-jet-adminlte::forms.input
                        name="name"
                        label="{{ __('columns.user.name') }}"
                        value="{{ $user->name }}"
                    />

                    <x-jet-adminlte::forms.input
                        name="email"
                        label="{{ __('columns.user.email') }}"
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

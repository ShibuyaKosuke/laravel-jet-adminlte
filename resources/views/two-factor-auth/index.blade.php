<x-app-layout>
    <div class="row">
        <div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <x-jet-adminlte::forms.form method="post" action="{{ route('two-factor-auth.store') }}">

                <x-jet-adminlte::widget.card class="card-outline card-primary">
                    <x-slot name="header">
                        <h3 class="card-title">
                            <i class="fa fa-qrcode"></i>
                            {{ JetAdminLte::title() }}
                        </h3>
                    </x-slot>

                    <button class="btn btn-md btn-primary">{{ __('jet-adminlte::adminlte.enable') }}</button>
                    <button class="btn btn-md btn-secondary">{{ __('jet-adminlte::adminlte.disable') }}</button>

                </x-jet-adminlte::widget.card>

            </x-jet-adminlte::forms.form>
        </div>
    </div>

</x-app-layout>

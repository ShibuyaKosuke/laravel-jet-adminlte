<x-app-layout>
    <div class="row">

        @if(JetAdminLte::hasTwoFactorFeature())

            <div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <x-jet-adminlte::forms.form method="post" action="{{ route('two-factor-auth.store') }}">
                    <x-jet-adminlte::widget.card class="card-outline card-primary">
                        <x-slot name="header">
                            <h3 class="card-title">
                                <i class="fa fa-qrcode"></i>
                                {{ JetAdminLte::title() }}
                            </h3>
                        </x-slot>

                        @if(true)
                            <button class="btn btn-md btn-primary">
                                {{ __('jet-adminlte::adminlte.enable') }}
                            </button>
                        @else
                            <button class="btn btn-md btn-secondary">
                                {{ __('jet-adminlte::adminlte.disable') }}
                            </button>
                        @endif

                    </x-jet-adminlte::widget.card>
                </x-jet-adminlte::forms.form>
            </div>

        @else

            <div class="col-12">
                <x-jet-adminlte::widget.alert class="alert-warning" title="Warning" icon="exclamation-triangle">
                    <p>Two factor feature is not enabled.</p>
                </x-jet-adminlte::widget.alert>
            </div>

        @endif

    </div>

</x-app-layout>

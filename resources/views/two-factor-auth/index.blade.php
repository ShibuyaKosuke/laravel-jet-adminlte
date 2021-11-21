<x-app-layout>
    <div class="row">

        @if(JetAdminLte::hasTwoFactorFeature())

            <div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
                <x-jet-adminlte::widget.card class="card-outline card-primary">
                    <x-slot name="header">
                        <h3 class="card-title">
                            <i class="fa fa-qrcode"></i>
                            {{ JetAdminLte::title() }}
                        </h3>
                    </x-slot>

                    <x-jet-adminlte::widget.alert class="alert-info" icon="check">
                        {{ __('jet-adminlte::adminlte.two-factor-message') }}
                    </x-jet-adminlte::widget.alert>

                    <div class="row">
                        <div class="col-3">
                            @if($qrCodeUrl)
                                <img src="{{ $qrCodeUrl }}" alt="gr code" class="img-fluid">
                            @endif
                        </div>
                    </div>

                    <x-slot name="footer">
                        @if($qrCodeUrl)
                            <x-jet-adminlte::forms.form method="delete" action="{{ route('two-factor-auth.destroy') }}">
                                <button class="btn btn-md btn-secondary">
                                    {{ __('jet-adminlte::adminlte.disable') }}
                                </button>
                            </x-jet-adminlte::forms.form>
                        @else
                            <x-jet-adminlte::forms.form method="post" action="{{ route('two-factor-auth.store') }}">
                                <button class="btn btn-md btn-primary">
                                    {{ __('jet-adminlte::adminlte.enable') }}
                                </button>
                            </x-jet-adminlte::forms.form>
                        @endif
                    </x-slot>

                </x-jet-adminlte::widget.card>
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

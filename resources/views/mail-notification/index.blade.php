<x-app-layout>
    <div class="row">
        <div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <x-jet-adminlte::widget.card class="card-outline card-primary">
                <x-slot name="header">
                    <h3 class="card-title">
                        <i class="fa fa-bell"></i>
                        {{ JetAdminLte::title() }}
                    </h3>
                </x-slot>

            </x-jet-adminlte::widget.card>
        </div>
    </div>
</x-app-layout>

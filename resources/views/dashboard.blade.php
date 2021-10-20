<x-app-layout>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="row">
        <div class="col-12">
            <x-jet-adminlte::widget.card class="card-outline card-primary" collapsible>
                <x-slot name="header">
                    <h3 class="card-title">
                        <i class="fa fa-chart-line"></i>
                        Title
                    </h3>
                </x-slot>

                Body

                <x-slot name="footer">
                    footer
                </x-slot>
            </x-jet-adminlte::widget.card>
        </div>
    </div>

</x-app-layout>

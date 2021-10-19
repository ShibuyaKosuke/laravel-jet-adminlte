<x-app-layout>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>

    <x-jet-adminlte::widget.alert class="alert-danger" title="title" icon="ban" dismissible>
        ここに内容を記述します
    </x-jet-adminlte::widget.alert>

    <x-jet-adminlte::widget.callout class="callout-warning" title="title">
        ここに内容を記述します
    </x-jet-adminlte::widget.callout>

    <div class="row">
        <div class="col-12">
            <x-jet-adminlte::widget.card class="card-outline card-primary" collapsible removable expandable>
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

<x-app-layout>
    <x-slot name="title">
        {{ __('Dashboard') }}
    </x-slot>

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <x-jet-adminlte::widget.info-box
                iconType="red"
                title="お気に入り"
                icon="heart"
                number="12,345"
            />
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
            <x-jet-adminlte::widget.small-box
                iconType="red"
                title="お気に入り"
                icon="shopping-cart"
                number="12,345"
            />
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <x-jet-adminlte::widget.card
                class="card-outline card-primary"
                collapsible
            >
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

<x-app-layout>
    <div class="row">
        <div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <x-jet-adminlte::widget.card class="card-outline card-primary">
                <x-slot name="header">
                    <h3 class="card-title">
                        <i class="fa fa-user-shield"></i>
                        {{ JetAdminLte::title() }}
                    </h3>
                </x-slot>

                @if($userAgents->isNotEmpty())
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                        @foreach($userAgents as $userAgent)
                            <li class="item">
                                <div class="product-img py-2">
                                    <i class="{{ $userAgent->icon }}"></i>
                                </div>
                                <div class="product-info">
                                    {{ $userAgent->route_name }} {{ $userAgent->browser }} on {{ $userAgent->platform }} ({{ $userAgent->device }})
                                    <span class="product-description text-sm">
                                        Login date: {{ $userAgent->updated_at->toDateString() }} / Remote IP: {{ $userAgent->remote_ip }}
                                    </span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif

                @if($userAgents->hasPages())
                    <x-slot name="footer">
                        {{ $userAgents->links() }}
                    </x-slot>
                @endif

            </x-jet-adminlte::widget.card>
        </div>
    </div>
</x-app-layout>

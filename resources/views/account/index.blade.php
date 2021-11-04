<x-app-layout>
    <div class="row">
        <div class="col-sm-12 col-md-10 offset-md-1 col-lg-8 offset-lg-2">
            <x-jet-adminlte::widget.card class="card-outline card-primary">
                <x-slot name="header">
                    <h3 class="card-title">
                        <i class="fa fa-user"></i>
                        {{ __('jet-adminlte::adminlte.account') }}
                    </h3>
                </x-slot>

                <x-slot name="tools">
                    <a href="{{ route('account.edit') }}" class="btn btn-sm btn-primary my-n2">
                        <i class="fas fa-pen"></i>
                        {{ JetAdminLte::title('account.edit') }}
                    </a>
                </x-slot>

                <dl class="row">
                    <dt class="col-sm-3">{{ __('jet-adminlte::columns.users.name') }}</dt>
                    <dd class="col-sm-9">{{ $user->name }}</dd>
                    <dt class="col-sm-3">{{ __('jet-adminlte::columns.users.email') }}</dt>
                    <dd class="col-sm-9">{{ $user->email ?: '----'}}</dd>
                    <dt class="col-sm-3">{{ __('jet-adminlte::columns.users.created_at') }}</dt>
                    <dd class="col-sm-9">{{ $user->created_at }}</dd>
                    <dt class="col-sm-3">{{ __('jet-adminlte::columns.users.updated_at') }}</dt>
                    <dd class="col-sm-9">{{ $user->updated_at }}</dd>
                </dl>
            </x-jet-adminlte::widget.card>

            @if(JetAdminLte::hasSocialLoginFeature())
                <x-jet-adminlte::widget.card class="card-outline card-default">
                    <x-slot name="header">
                        <h3 class="card-title">{{ __('jet-adminlte::adminlte.oauth_login') }}</h3>
                    </x-slot>

                    <x-jet-adminlte::widget.alert class="alert-warning">
                        {{ __('jet-adminlte::adminlte.oauth_caution') }}
                    </x-jet-adminlte::widget.alert>

                    @foreach (JetAdminLte::socialServices() as $social => $value)
                        <div class="row align-items-center mb-3">
                            <div class="col-3">
                                <i class="fab fa-fw fa-{{ $social }} mr-2"></i>
                                {{ ucfirst($social) }}
                            </div>
                            <div class="col-3">
                                @if($user->hasSocialAccount($social))
                                    <form action="{{ route('oauth.destroy', ['provider' => $social]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="{{ Arr::toCssClasses([
                                            'btn',
                                            'btn-default',
                                            'btn-block',
                                            'disabled' => $user->linkedSocialAccounts->count() === 1 && is_null($user->email)
                                        ]) }}">
                                            {{ __('jet-adminlte::adminlte.sns.disconnect') }}
                                        </button>
                                    </form>
                                @else
                                    <a href="{{ route('oauth', ['provider' => $social]) }}"
                                       class="btn btn-primary btn-block">
                                        {{ __('jet-adminlte::adminlte.sns.connect') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    @endforeach

                </x-jet-adminlte::widget.card>
            @endif
        </div>
    </div>

</x-app-layout>

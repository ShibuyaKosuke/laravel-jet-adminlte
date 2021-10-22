<x-app-layout>
    <x-slot name="title">
        {{ __('jet-adminlte::adminlte.account') }}
    </x-slot>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8">
            <x-jet-adminlte::widget.card class="card-outline card-primary">
                <x-slot name="header">
                    <h3 class="card-title">
                        <i class="fa fa-user-edit"></i>
                        {{ __('jet-adminlte::adminlte.account') }}
                    </h3>
                </x-slot>

                <x-slot name="tools">
                    <a href="{{ route('account.edit', ['account' => $user]) }}" class="btn btn-tool">
                        <i class="fas fa-pen"></i>
                    </a>
                </x-slot>

                <dl class="row">
                    <dt class="col-sm-4">{{ __('columns.users.name') }}</dt>
                    <dd class="col-sm-8">{{ $user->name }}</dd>
                    <dt class="col-sm-4">{{ __('columns.users.email') }}</dt>
                    <dd class="col-sm-8">{{ $user->email }}</dd>
                    <dt class="col-sm-4">{{ __('columns.users.created_at') }}</dt>
                    <dd class="col-sm-8">{{ $user->created_at }}</dd>
                    <dt class="col-sm-4">{{ __('columns.users.updated_at') }}</dt>
                    <dd class="col-sm-8">{{ $user->updated_at }}</dd>
                </dl>
            </x-jet-adminlte::widget.card>
        </div>
    </div>

</x-app-layout>

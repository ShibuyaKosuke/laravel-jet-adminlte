@if (session('failure_message'))
    <x-jet-adminlte::widget.alert class="alert-danger" title="Failure!" icon="check" dismissible>
        {{ session('failure_message') }}
    </x-jet-adminlte::widget.alert>
@endif

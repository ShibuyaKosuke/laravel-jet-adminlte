@if (session('success_message'))
    <x-jet-adminlte::widget.alert class="alert-success" title="Success!" icon="check" dismissible>
        {{ session('success_message') }}
    </x-jet-adminlte::widget.alert>
@endif

<form method="{{ $method === 'get' ? 'get' : 'post' }}"
    @if(isset($action))action="{{ $action }}"
    @endif @if(isset($class))class="{{ $class }}"@endif>
    @if(!in_array($method, ['get', 'post']))
        @method($method)
    @endif

    @if($method !== 'get')
        @csrf
    @endif

    {{ $slot }}
</form>

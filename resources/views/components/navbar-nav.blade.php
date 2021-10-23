<ul class="navbar-nav">
    @if($pushMenu ?? true)
        <x-jet-adminlte::widget.pushmenu/>
    @endif
<!--
    <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
    </li>
-->
</ul>

<ol class="breadcrumb float-sm-right">
    @if(isset($breadcrumbs) && $breadcrumbs->isNotEmpty())
        @foreach($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item"><a href="#">{{ $breadcrumb }}</a></li>
        @endforeach
    @endif
</ol>

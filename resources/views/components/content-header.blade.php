<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            @isset($title)
                <div class="col-sm-6">
                    <h1 class="m-0">{{ $title ?? 'Undefined Title' }}</h1>
                </div>
            @endisset
            <div class="@isset($title) col-sm-6 @else col-sm-6 offset-md-6 @endisset">
                <x-jet-adminlte::widget.breadcrumbs/>
            </div>
        </div>
    </div>
</div>

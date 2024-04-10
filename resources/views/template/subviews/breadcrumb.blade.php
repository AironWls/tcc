<div class="container">
    <nav aria-label="breadcrumb mb-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            @if ( isset($model) && !is_null($model) )
                <li class="breadcrumb-item"><a href="#">{{ $model }}</a></li>
            @endif
            @if ( isset($action) && !is_null($action) )
                <li class="breadcrumb-item active" aria-current="page">{{ $action }}</li>
            @endif
        </ol>
    </nav>
</div>

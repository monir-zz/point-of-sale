<div class="sub-menu pull-right">
    @if($logged_user->hasAccess('products.index'))
        @if( in_array($current_route, ['products.create', 'products.edit']) )
        <a href="{{ route('products.index') }}" class="btn btn-xs btn-success"><i class="fa fa-arrow-left"></i> Back To List</a>
        @endif
    @endif

    @if($logged_user->hasAccess('products.create'))
        @if( in_array($current_route, ['products.index', 'products.edit']) )
        <a href="{{ route('products.create') }}" class="btn btn-xs btn-success"><i class="fi-page-add"></i> New</a>
        @endif
    @endif

    @if($logged_user->hasAccess('products.index'))
        @if( in_array($current_route, ['products.index']) )
        <a href="#" class="btn btn-xs btn-primary filter-toggle"><i class="fi-filter"></i> Filter</a>
        @endif
    @endif
</div>

<!--<div class="btn-group dropleft">
    <button type="button" class="btn btn-ghost-primary dropdown rounded" data-toggle="dropdown" aria-expanded="false">
        <i class="bi bi-three-dots-vertical"></i>
    </button>
    <div class="dropdown-menu">
        <a target="_blank" href="{{ route('sales.pos.pdf', $data->id) }}" class="dropdown-item">
            <i class="bi bi-file-earmark-pdf mr-2 text-success" style="line-height: 1;"></i> POS Invoice
        </a> -->
     <!--   @can('access_sale_payments')
            <a href="{{ route('sale-payments.index', $data->id) }}" class="dropdown-item">
                <i class="bi bi-cash-coin mr-2 text-warning" style="line-height: 1;"></i> Show Payments
            </a>
        @endcan -->
    <!--    @can('access_sale_payments')
            @if($data->due_amount > 0)
            <a href="{{ route('sale-payments.create', $data->id) }}" class="dropdown-item">
                <i class="bi bi-plus-circle-dotted mr-2 text-success" style="line-height: 1;"></i> Add Payment
            </a>
            @endif
        @endcan -->
        @can('edit_sales')
            <a href="{{ route('sales.edit', $data->id) }}" class="btn btn-info btn-sm">
            <i class="bi bi-eye"> View </i>
            </a>
        @endcan
      <!--  @can('show_sales')
    <a href="{{ route('sales.show', $data->id) }}" class="btn btn-info btn-sm">
    <i class="bi bi-printer">Details</i> 
    </a>
@endcan -->
       <!-- @can('show_sales')
            <a href="{{ route('sales.show', $data->id) }}" class="dropdown-item">
                <i class="bi bi-eye mr-2 text-info" style="line-height: 1;"></i> Receipt
            </a>
        @endcan
        @can('delete_sales')
            <button id="delete" class="dropdown-item" onclick="
                event.preventDefault();
                if (confirm('Are you sure? It will delete the data permanently!')) {
                document.getElementById('destroy{{ $data->id }}').submit()
                }">
                <i class="bi bi-trash mr-2 text-danger" style="line-height: 1;"></i> Delete
                <form id="destroy{{ $data->id }}" class="d-none" action="{{ route('sales.destroy', $data->id) }}" method="POST">
                    @csrf
                    @method('delete')
                </form>
            </button>
        @endcan
    </div>
</div> -->




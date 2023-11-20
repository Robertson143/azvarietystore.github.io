@extends('layouts.app')

@section('title', 'Products')

@section('third_party_stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">Products</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <a href="{{ route('products.create') }}" class="btn btn-primary">
                            Add New Product <i class="bi bi-plus"></i>
                        </a>
                       <!-- <a href="{{ route('units.create') }}" class="btn btn-primary">
                            Add Unit <i class="bi bi-plus"></i>
                        </a> -->
  
                        <a href="{{ route('product-categories.index') }}" class="btn btn-primary" style="margin-left: 710px;">
                            Categories <i class="bi bi-eye"></i>
                        </a>

                        <h1 style="text-align: center; margin-top: -35px; text-shadow: 2px 2px violet; font-family: 'Times New Roman', serif;"> LIST OF PRODUCTS </h1>
                        <hr>

                        <div class="table-responsive">
                            {!! $dataTable->table() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('page_scripts')
    {!! $dataTable->scripts() !!}
@endpush

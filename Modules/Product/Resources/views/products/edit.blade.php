@extends('layouts.app')

@section('title', 'Edit Product')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid mb-4">
        <form id="product-form" action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row">
                <div class="col-lg-12">
                    
                    
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_name">Product Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="product_name" required value="{{ $product->product_name }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_code">Product Code <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="product_code" required value="{{ $product->product_code }}">
                                    </div>
                                </div> 
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="category_id">Category <span class="text-danger">*</span></label>
                                        <select class="form-control" name="category_id" id="category_id" required>
                                            @foreach(\Modules\Product\Entities\Category::all() as $category)
                                                <option {{ $category->id == $product->category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="barcode_symbology">Expiration Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="product_barcode_symbology" id="barcode_symbology" required value="{{ $product->product_barcode_symbology }}">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                               
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="product_tax_type">Section</label>
                                       <select class="form-control" name="product_tax_type" id="product_tax_type">
                                           <option value="" selected>None</option>
                                           <option {{ $product->product_tax_type == 1 ? 'selected' : '' }}  value="1">Section 1</option>
                                           <option {{ $product->product_tax_type == 2 ? 'selected' : '' }} value="2">Section 2</option>
                                           <option {{ $product->product_tax_type == 3 ? 'selected' : '' }} value="3">Section 3</option>
                                           <option {{ $product->product_tax_type == 4 ? 'selected' : '' }} value="4">Section 4</option>
                                           <option {{ $product->product_tax_type == 5 ? 'selected' : '' }} value="5">Section 5</option>
                                           <option {{ $product->product_tax_type == 6 ? 'selected' : '' }} value="6">Section 6</option>
                                           <option {{ $product->product_tax_type == 7 ? 'selected' : '' }} value="7">Section 7</option>
                                           <option {{ $product->product_tax_type == 8 ? 'selected' : '' }} value="8">Section 8</option>
                                           <option {{ $product->product_tax_type == 9 ? 'selected' : '' }} value="9">Section 9</option>
                                           <option {{ $product->product_tax_type == 10 ? 'selected' : '' }} value="10">Section 10</option>   
                                       </select>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="product_unit">Unit <i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="This short text will be placed after Product Quantity."></i> <span class="text-danger">*</span></label>
                                       <select class="form-control" name="product_unit" id="product_unit" required>
                                           <option value="" selected >Select Unit</option>
                                           @foreach(\Modules\Setting\Entities\Unit::all() as $unit)
                                               <option {{ $product->product_unit == $unit->short_name ? 'selected' : '' }} value="{{ $unit->short_name }}">{{ $unit->name . ' | ' . $unit->short_name . ' | ' . $unit->operation_value  }}</option>
                                           @endforeach
                                       </select>
                                   </div>
                               </div> 
                               </div> 
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_cost">Retail Price <span class="text-danger">*</span></label>
                                        <input id="product_cost" type="text" class="form-control" min="0" name="product_cost" required value="{{ $product->product_cost }}">
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_price">Selling Price <span class="text-danger">*</span></label>
                                        <input id="product_price" type="text" class="form-control" min="0" name="product_price" required value="{{ $product->product_price }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_quantity">Product Quantity <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="product_quantity" required value="{{ $product->product_quantity }}" min="1">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_stock_alert">Alert Quantity <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="product_stock_alert" required value="{{ $product->product_stock_alert }}" min="0">
                                    </div>
                                </div>
                            </div>

                         
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_order_tax"></label>
                                        <input type="hidden" class="form-control" name="product_order_tax" value="{{ $product->product_order_tax }}" min="0" max="100">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-8" style="margin-top: -40px; margin-left: 160px;">
                            <div class="form-group">
                                <h6 for="product_note" style="margin-left: 300px;">Description</h6>
                                <textarea name="product_note" id="product_note" rows="4 " class="form-control">{{ $product->product_note }}</textarea>
                            </div>
                        </div>
                    
                    <!--    <div class="justify-content-center" style="margin-top: 10px;" style="color: black;">
                            <div class="form-group">
                            <div class="drop" style="margin-left: 100px; margin-top: -120px;">
                               <div class="dropzone " id="document-dropzone" style=" margin-top: -180px; margin-left: -100px; background: transparent;"> 
                                    <div  class="dz-message" data-dz-message>
                                   </div>
                                      
                                    </div>

                                </div>
                            </div>
                    </div> -->
                @include('utils.alerts')
                        <div class="form-group">
                        <button class="btn btn-primary" style="margin-left: 850px;">Update Product <i class="bi bi-check"></i></button>
                    </div>
            </div>
        </form>
    </div> 
@endsection

@section('third_party_scripts')
    <script src="{{ asset('js/dropzone.js') }}"></script>
@endsection

@push('page_scripts')
    <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: '{{ route('dropzone.upload') }}',
            maxFilesize: 1,
            acceptedFiles: '.jpg, .jpeg, .png',
            maxFiles: 3,
            addRemoveLinks: true,
            dictRemoveFile: "<i class='bi bi-x-circle text-danger'></i> remove",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">');
                uploadedDocumentMap[file.name] = response.name;
            },
            removedfile: function (file) {
                file.previewElement.remove();
                var name = '';
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name;
                } else {
                    name = uploadedDocumentMap[file.name];
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove();
            },
            init: function () {
                @if(isset($product) && $product->getMedia('images'))
                var files = {!! json_encode($product->getMedia('images')) !!};
                for (var i in files) {
                    var file = files[i];
                    this.options.addedfile.call(this, file);
                    this.options.thumbnail.call(this, file, file.original_url);
                    file.previewElement.classList.add('dz-complete');
                    $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">');
                }
                @endif
            }
        }
    </script>

    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#product_cost').maskMoney({
                prefix:'{{ settings()->currency->symbol }}',
                thousands:'{{ settings()->currency->thousand_separator }}',
                decimal:'{{ settings()->currency->decimal_separator }}',
            });
            $('#product_price').maskMoney({
                prefix:'{{ settings()->currency->symbol }}',
                thousands:'{{ settings()->currency->thousand_separator }}',
                decimal:'{{ settings()->currency->decimal_separator }}',
            });

            $('#product_cost').maskMoney('mask');
            $('#product_price').maskMoney('mask');

            $('#product-form').submit(function () {
                var product_cost = $('#product_cost').maskMoney('unmasked')[0];
                var product_price = $('#product_price').maskMoney('unmasked')[0];
                $('#product_cost').val(product_cost);
                $('#product_price').val(product_price);
            });
        });
    </script>
@endpush


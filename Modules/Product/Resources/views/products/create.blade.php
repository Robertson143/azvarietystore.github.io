@extends('layouts.app')

@section('title', 'Create Product')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}">Products</a></li>
        <li class="breadcrumb-item active">Add New Products</li>
    </ol>
@endsection



@section('content')

    <div class="container-fluid">
        <form id="product-form" action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                  
                </div>
                @php
    $product_max_id = \Modules\Product\Entities\Product::max('id') + 1;
    $product_code = "PR_" . str_pad($product_max_id, 2, '0', STR_PAD_LEFT)
@endphp
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="product_name">Product Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="product_name" required value="{{ old('product_name') }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="product_code">Product Code <span class="text-danger">*</span></label> 
                                        <input type="text" class="form-control" name="product_code" required value="{{ $product_code }}"> 
                                    </div> 
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="category_id">Category <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <select class="form-control" name="category_id" id="category_id" required>
                                            <option value="" selected disabled>Select Category</option>
                                            @foreach(\Modules\Product\Entities\Category::all() as $category)
                                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        <div class="input-group-append d-flex">
                                            <button data-toggle="modal" data-target="#categoryCreateModal" class="btn btn-outline-primary" type="button">
                                                Add Category
                                            </button> 
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="barcode_symbology">Expiration Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="product_barcode_symbology" id="barcode_symbology" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                              
                                
                              <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="product_tax_type">Section<span class="text-danger">*</span></label>
                                       <select class="form-control" name="product_tax_type" id="product_tax_type">
                                           <option value="" selected >Select Section</option>
                                           <option value="1">Section 1 Baby Essentials</option>
                                           <option value="2">Section 2 Beer, Wine & Spirits</option>
                                           <option value="3">Section 3 Beverages</option>
                                           <option value="4">Section 4 Bread & Bakery</option>
                                           <option value="5">Section 5 Canned Goods & Soups</option>
                                           <option value="6">Section 6 Condiments/Spices & Bake</option>
                                           <option value="7">Section 7 Cookies Snacks & Candy </option>
                                           <option value="8">Section 8 Deli & Signature Cafe</option>
                                           <option value="9">Section 9 Healthy & Beauty Personal Care & Pharmacy</option>
                                           <option value="10">Section 10 Paper Products</option>
                                           <option value="11">Section 10 Pet Care</option>
                                       </select>
                                   </div>
                               </div> 
                               <div class="col-md-6">
                                   <div class="form-group">
                                       <label for="product_unit">Unit<i class="bi bi-question-circle-fill text-info" data-toggle="tooltip" data-placement="top" title="This short text will be placed after Product Quantity."></i> <span class="text-danger">*</span></label>
                                       <select class="form-control" name="product_unit" id="product_unit">
                                           <option value="" selected >Select Unit</option>
                                           @foreach(\Modules\Setting\Entities\Unit::all() as $unit)
                                               <option value="{{ $unit->short_name }}">{{ $unit->name . ' | ' . $unit->short_name . ' | ' . $unit->operation_value }}</option>
                                           @endforeach
                                       </select>
                                   </div>
                               </div> 
                            </div>
                           <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_cost">Retail Price<span class="text-danger">*</span></label>
                                        <input id="product_cost" type="text" class="form-control" name="product_cost" required value="{{ old('product_cost') }}">
                                    </div>
                                </div> 


                               <!-- <div class="form-row">
                                   <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="product_unit">Expiration Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="product_unit" id="product_unit" placeholder="Select Date" required value="{{ old('product_unit') }}">
                                        </div>
                                    </div>  -->
    
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_price">Selling Price <span class="text-danger">*</span></label>
                                        <input id="product_price" type="text" class="form-control" name="product_price" required value="{{ old('product_price') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_quantity">Product Quantity <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="product_quantity" required value="{{ old('product_quantity') }}" min="1">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_stock_alert">Alert Quantity<span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="product_stock_alert" required value="{{ old('product_stock_alert', 0) }}" min="0" max="100">
                                    </div>
                                </div>
                            </div>
            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_order_tax"></label>
                                        <input type="hidden" class="form-control" name="product_order_tax" value="{{ old('product_order_tax') }}" min="0">
                                    </div>
                                </div> 
                            </div> 
                              
                            <div class="col-md-8" style="margin-top: -50px; margin-left: 150px;">
                            <div class="form-group">
                                <h6 for="product_note" style="margin-left: 300px;">Description</h6>
                                <textarea name="product_note" id="product_note" rows="4 " class="form-control"></textarea>
                            </div>
                        </div>
                    
              <!--  <div class="col-md-3">
                            <div class="form-group">
                            <div class="drop" style="margin-right: 50px; margin-top: -140px;">
                                <div class="dropzone" id="document-dropzone" style="height: 5px;">
                                    <div  class="dz-message" data-dz-message>
                                    <label  for="image">Insert Image <i class="bi bi-question-circle-fill text-info text-center" data-toggle="tooltip" data-placement="top" title="Max Files: 3, Max File Size: 1MB, Image Size: 400x400"></i></label>
                                       <i class="bi bi-cloud-arrow-up" style="width: -50px; "></i>  
                                       
                                    </div>
                                </div> 
                            </div>
                        </div>
                       
                    </div> -->
                     
                </form>
                @include('utils.alerts')
                    <div class="form-group">
                        <button class="btn btn-primary" style="margin-left: 850px;">Create Product <i class="bi bi-check"></i></button>
                    </div> 
            </div>
    

    <!-- Create Category Modal -->
    @include('product::includes.category-modal')
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
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
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
                $.ajax({
                    type: "POST",
                    url: "{{ route('dropzone.delete') }}",
                    data: {
                        '_token': "{{ csrf_token() }}",
                        'file_name': `${name}`
                    },
                });
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

            $('#product-form').submit(function () {
                var product_cost = $('#product_cost').maskMoney('unmasked')[0];
                var product_price = $('#product_price').maskMoney('unmasked')[0];
                $('#product_cost').val(product_cost);
                $('#product_price').val(product_price);
            });
        });
    </script>
@endpush


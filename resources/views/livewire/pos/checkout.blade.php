
   
    <div class="card border-0 shadow-lg" style="background: #f5f7ff;">
        <div class="card-body">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert" >
                        <div class="alert-body">
                            <span>{{ session('message') }}</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <!--<span aria-hidden="true">×</span> -->
                            </button>
                        </div>
                    </div>
                @endif
                
          <!--    <div class="form-group"> -->
                  <!--  <label for="customer_id">Cashier<span class="text-danger">*</span></label> -->
                    <!--<div class="input-group">
                        <div class="input-group-prepend">
                            <!--<a href="{{ route('profile.edit') }}" class="btn btn-primary">
                                <i class="bi bi-person-plus"></i>
                            </a> -->
                       <!-- </div>
                        <select wire:model.lazy="customer_id" id="customer_id" class="form-control">
                            @foreach($customers as $customer)
                               <option value="">Select Cashier</option>
                                <option value="{{ $customer->id }}">{{ auth()->user()->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> -->
                
             <div class="form-group">
    <label for="customer_name"><span class="text-danger"></span></label>
    <div class="input-group">
        <div class="input-group-prepend">
          <!--  <a href="{{ route('profile.edit') }}" class="btn btn-primary">
                <i class="bi bi-person-plus"></i>
            </a> -->
        </div>
        <input wire:model.lazy="customer_id" name="customer_id" id="customer_id" class="form-control" type="hidden" value="1">
    </div>
</div>

            <div class="table-responsive" style="margin-top: -45px;">
    <table class="table">
        <thead>
            <tr class="text-center">
                <th class="align-middle">Product</th>
                <th class="align-middle">Price</th>
                <th class="align-middle">Quantity</th>
                <th class="align-middle">Action</th>
            </tr>
        </thead>
        <tbody>
            @if($cart_items->isNotEmpty())
                @foreach($cart_items as $cart_item)
                    <tr>
                        <td class="align-middle">
                            {{ $cart_item->name }} <br>
                            
                          <!-- <span class="badge badge-success">
                                {{ $cart_item->options->code }}
                            </span> -->
                           
                        </td>
                        <td class="align-middle">
                            {{ format_currency($cart_item->price) }}
                        </td>

                        <td class="align-middle">
                            @include('livewire.includes.product-cart-quantity')
                        </td>

                        <td class="align-middle text-center">
                            <a href="#" wire:click.prevent="removeItem('{{ $cart_item->rowId }}')">
                                <i class="bi bi-x-circle font-2xl text-danger"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="align-middle text-center">
                        <button wire:click="resetCart" type="button" class="btn btn-pill btn-danger"><!--<i class="bi bi-x"></i>-->Clear</button>
                    </td>
                </tr>
            @else
                            <tr>
                                <td colspan="8" class="text-center">
                                    <span class="text-danger">
                                        Please search & select products!
                                    </span>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped">
                <tr>
                    <th>Selected Items</th>
                    <td>
                        <strong  style="margin-left: 160px;">
                            {{ Cart::instance($cart_instance)->count() }}
</strong>
                    </td>
                </tr>
                
                     <tr>
                                <th>Sub Total</th>
                              
                                @php
                                    $total_with_shipping = Cart::instance($cart_instance)->total() + (float) $shipping
                                @endphp
                                    
                                <td>
                                <strong  style="margin-left: 160px;">
                                    {{ format_currency($total_with_shipping) }}
                                    </strong>
                                </td>
                            </tr>
              <!--  <tr>
                    <th>Discount ({{ $global_discount }}%)</th>
                    <td>
                        <span class="badge badge-success" style="margin-left: 160px;">
                            (-) {{ format_currency(Cart::instance($cart_instance)->discount()) }}
                        </span>
                    </td>
                </tr> -->
                @php
                    $total_product_tax = 0;
                @endphp
                <!-- Display the total VAT -->
                <tr>
                    <th>Total VAT (12%)</th>
                    <td>
                    <strong  style="margin-left: 160px;">
                         ₱1.12
</strong>
                    </td>
                </tr>

                <!-- Display the shipping cost 
                <tr>
                    <th>Delivery</th>
                    <input type="hidden" value="{{ $shipping }}" name="shipping_amount">
                    <td>(+) {{ format_currency($shipping) }}</td>
                </tr> -->

                <!-- Calculate and Display the Grand Total -->
                @php
                $total_products = Cart::instance($cart_instance)->count();

                if ($total_products > 0) {
                    $total_with_shipping = Cart::instance($cart_instance)->total() + (float) $shipping;

                    // Calculate the grand total
                    $initial_grand_total = $total_with_shipping + $total_product_tax;
                    $additional_amount = 1.12;
                    $grand_total = $initial_grand_total + $additional_amount;
                } else {
                    // If no products are selected, set the Grand Total to 0
                    $grand_total = 0;
                }
            @endphp

            <tr class="text-primary">
                <th>Grand Total</th>
                <td>
                    <strong  style="margin-left: 160px;">
                         {{ format_currency($grand_total) }}
            </strong>
                </td>
            </tr>
        </table>
    </div>
</div>

            <!--<div class="form-row">
                <div class="col-lg-3" style="margin-left: 60px;">
                    <div class="form-group">
                        <label for="tax_percentage">VAT (%)</label>
                        <input wire:model.lazy="global_tax" type="number" class="form-control" min="0" max="100" value="{{ $total_product_tax }}" required>
                    </div>
                </div> -->
                <div class="col-lg-3" style="margin-left: 95px;">
                    <div class="form-group" style="margin-top: -147px;">
                   <!--     <label for="discount_percentage">Discount (%)</label> -->
                        <input wire:model.lazy="global_discount" type="hidden" class="form-control" min="0" max="100" value="{{ $global_discount }}" required>
                    </div>
                </div>
                <!--<div class="col-lg-4">
                    <div class="form-group">
                        <label for="shipping_amount">Delivery</label>
                        <input wire:model.lazy="shipping" type="number" class="form-control" min="0" value="0" required step="0.01">
                    </div>
                </div> -->
            </div>


            <form id="checkout-form" action="{{ route('app.pos.store') }}" method="POST">
                @csrf
                    @if (session()->has('checkout_message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <div class="alert-body">
                                <span>{{ session('checkout_message') }}</span>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                   <!-- <span aria-hidden="true">×</span> -->
                                </button>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-8">
                        @php
                            // Calculate the total_product_tax_percentage only if $total_amount is not zero
                           $total_product_tax_percentage = $total_amount !== 0 ? ($total_product_tax / $total_amount) * 100 : 0;
                        @endphp
                            <input type="hidden" value="1" name="customer_id">
                            <input type="hidden" value="{{ intval($total_product_tax_percentage) }}" name="tax_percentage">
                            <input type="hidden" value="{{ $global_discount }}" name="discount_percentage">
                            <input type="hidden" value="{{ $shipping }}" name="shipping_amount">
                            <div class="form-row">
                            <div class="col-lg-5" style="margin-left: 350px; margin-top: 30px;">
                                    <div class="form-group">
                                        <label for="payment_method"><span class="text-danger"></span></label>
                                        <input style="background: green; color: white;" id="payment_method" type="hidden" class="form-control" name="payment_method" value="Cash" readonly required>
                                        <label for="total_amount">Total Amount: <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">₱</span>
                                            </div>
                                        <input id="total_amount" type="text" class="form-control" name="total_amount" value="{{ $grand_total }}" readonly required>
                                    </div>
                                    </div>
                                </div>
                               
                                <div class="col-lg-6" style="margin-left: 10px; margin-top: -80px;">
                                    <div class="form-group">
                                        <label for="paid_amount">Received Amount: <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">₱</span>
                                            </div>
                                        <input id="paid_amount" type="number" class="form-control" name="paid_amount" value=" {{ $total_amount }}" required>
                                    </div>
                                </div>
                            </div>
                                
                                <div class="col-lg-6" style="margin-left: 170px; margin-top: -80px;">
                                    <div class="form-group">
                                        <label for="change_amount">Change Amount: <span class="text-danger"></span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">₱</span>
                                            </div>
                                            <input id="change_amount" type="text" class="form-control" name="change_amount" value="{{ $total_amount }}" readonly>
                                        </div>
                                    </div>  
                                </div>
                                <h6 style="margin-left: 335px; margin-top: -40px;">=</h6>
                                
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-left: 380px; margin-top: 10px;">Submit</button>
                        </div>
                    </div>
                </div>
            </form>

            <script>
   document.addEventListener('DOMContentLoaded', function () {
    const paidAmountInput = document.getElementById('paid_amount');
    const totalAmountInput = document.getElementById('total_amount');
    const changeAmountInput = document.getElementById('change_amount');
    const customerIdInput = document.getElementById('customer_id'); // Add this line

    paidAmountInput.addEventListener('input', function () {
        const paidAmount = parseFloat(paidAmountInput.value) || 0;
        const totalAmount = parseFloat(totalAmountInput.value) || 0;
        const changeAmount = paidAmount - totalAmount;

        changeAmountInput.value = changeAmount.toFixed(2); // Format change amount to 2 decimal places
    });

    // Add a click event listener to the "Submit" button
    const submitButton = document.querySelector('button[type="submit"]');
    submitButton.addEventListener('click', function () {
        // If the customer is not selected, set it to the value of 'customer_id' input
        if (!customerIdInput.value) {
            customerIdInput.value = '1'; // Set a default value or any value you prefer
        }
    });
});


    const grandTotalElement = document.getElementById('grandTotal');
    const initialGrandTotal = parseFloat(grandTotalElement.textContent.replace('(=) ', '').replace('₱', ''));
    const additionalAmount = 4.20;

    function updateGrandTotal() {
        const updatedGrandTotal = initialGrandTotal + additionalAmount;
        grandTotalElement.textContent = `(=) ₱${updatedGrandTotal.toFixed(2)}`;
    }
</script>



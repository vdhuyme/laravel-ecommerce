<div>
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Thanh toán</h3>
                        <ul>
                            <li><a href="/">Trang chủ</a></li>
                            <li>Thanh toán</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if ($cartProducts->count() > 0)
        <div class="checkout-area">
            <div class="container container-default-2 custom-container">
                <div class="row">
                    <div class="col-lg-6 col-10">
                        <div class="checkbox-form">
                            <h3>Giao hàng đến</h3>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    @foreach ($shippingAddresses as $address)
                                        <div class="form-check">
                                            <input class="form-check-input" id="shippingAddressId" type="radio"
                                                   value="{{ $address->id }}" wire:model="shippingAddressId">
                                            <label class="form-check-label">
                                                <address>
                                                    <p>Người nhận: {{ $address->userName }}. <br>
                                                        Địa chỉ: {{ $address->houseNumber }},
                                                        {{ $address->ward->wardName }},
                                                        {{ $address->district->districtName }},
                                                        {{ $address->province->provinceName }}.
                                                    </p>
                                                    <p>Email: {{ $address->email }}</p>
                                                    <p>SĐT: {{ $address->phoneNumber }}.</p>
                                                </address>
                                            </label>
                                        </div>
                                    @endforeach
                                    @error('shippingAddressId')
                                    <span class="text-danger">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Ghi chú</label>
                                        <textarea wire:model="note" placeholder="Ghi chú cho đơn hàng" type="text"
                                                  class="border rounded-0 w-100 custom-textarea input-area" rows="4"></textarea>
                                        @error('note')
                                        <span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-14">
                        <div class="your-order">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th class="cart-product-name">Sản phẩm</th>
                                        <th class="cart-product-total">Giá mua</th>
                                        <th class="cart-product-total">Tổng cộng</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($cartProducts as $product)
                                        <tr class="cart_item">
                                            <td class="cart-product-name">{{ $product->product->productName }}<strong
                                                        class="product-quantity">
                                                    × {{ $product->quantity }}</strong></td>
                                            <td class="cart-product-total text-center"><span
                                                        class="amount"><strong>{{ number_format($product->product->sellingPrice, 0, '.', '.') }}</strong></span>
                                            </td>
                                            <td class="cart-product-total text-center">
                                                <span class="amount"><strong>{{ number_format($product->product->sellingPrice * $product->quantity,  0, '.', '.')}} VNĐ</strong></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>

                                    <tfoot>
                                    <tr class="cart-subtotal">
                                        <th>Phí giao hàng</th>
                                        <td class="text-center">
                                            <span class="amount"><strong>35.000 VNĐ</strong></span>
                                        </td>
                                    </tr>

                                    <tr class="order-total">
                                        <th>Thành tiền</th>
                                        <td class="text-center">
                                            <strong>
                                                <span class="amount">{{number_format($total+35000, 0, '.', '.')}} VNĐ</span>
                                            </strong>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div class="row">
                                        <div class="card">
                                            <div class="card-header" id="#payment-1">
                                                <h5 class="panel-title mb-2">
                                                    <input type="radio" value="cod" wire:model="paymentMode">
                                                    <span class="" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                          aria-expanded="true" aria-controls="collapseOne">
                                                    Cash On Delivery (COD)
                                                </span>
                                                </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                                <div class="card-body mb-2 mt-2">
                                                    <p>Bạn chỉ phải thanh toán khi nhận được hàng. Chúng tôi luôn
                                                        đảm
                                                        bảo
                                                        quyền lợi tốt nhất cho khách hàng</p>

                                                    <div class="order-button-payment mb-3 mt-3">
                                                        @if ($paymentMode === "cod")
                                                            <button class="btn obrien-button primary-btn"
                                                                    wire:loading.attr="disabled" wire:loading.class="bg-secondary"
                                                                    type="submit" wire:click="codOrder">Đặt hàng ngay</button>
                                                        @endif
                                                    </div>
                                                </div>

                                                <div wire:loading wire:target="codOrder"
                                                     class="spinner-border text-success spinner-border-sm" role="status">
                                                </div>
                                                <div wire:loading wire:target="codOrder">
                                                    Đang xử lý...
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card" wire:ignore>
                                            <div class="card-header" id="#payment-3" wire:ignore>
                                                <h5 class="panel-title mb-2">
                                                    <input type="radio" value="paypal" id="paymentMode"
                                                           wire:model="paymentMode">
                                                    <span class="collapsed" data-bs-toggle="collapse"
                                                          data-bs-target="#collapseThree" aria-expanded="false"
                                                          aria-controls="collapseThree">
                                                    PayPal
                                                </span>
                                                </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion" wire:ignore>
                                                <div class="card-body mb-2 mt-2">
                                                    <p>Chúng tôi có hợp tác với Paypal để sử dụng dịch vụ thanh toán
                                                        điện tử
                                                        nhanh hơn và tiện hơn.</p>

                                                    <div>
                                                        <div id="paypal-button-container"></div>
                                                    </div>
                                                    <div wire:loading class="spinner-border text-success spinner-border-sm"
                                                         role="status">
                                                    </div>
                                                    <div wire:loading>
                                                        Đang xử lý...
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @error('paymentMode')
                                        <p><span class="text-danger">
                                            <strong>{{ $message }}</strong>
                                        </span></p>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <h3 class="text-center mt-text mb-text"><strong>Chưa có sản phẩm nào để thanh toán</strong></h3>
    @endif
</div>

@section('scripts')
    <script
            src="https://www.paypal.com/sdk/js?client-id=AbBUat9YSgxW2p2IpuGuc-hgxqfXlw0rVfWZ2MpIArMZa5PaVWVzXFnui0UiskvmwlejOTBhIvivzfAM&currency=USD">
    </script>
    <script>
        paypal.Buttons({
            onClick: function()  {
                if (!document.getElementById('shippingAddressId').checked
                    || !document.getElementById('paymentMode').checked)
                {
                    Livewire.emit('validation');
                    return false;
                }else{
                @this.set('shippingAddressId',document.getElementById('shippingAddressId').value);
                @this.set('paymentMode',document.getElementById('paymentMode').value);
                }
            },

            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: {{$totalCurrencyExchange}}
                        }
                    }]
                });
            },

            onApprove: (data, actions) => {
                return actions.order.capture().then(function(orderData){
                    console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                    const transaction = orderData.purchase_units[0].payments.captures[0];

                    if (transaction.status == "COMPLETED") {
                        Livewire.emit('transaction', transaction.id)
                    }
                });
            }
        }).render('#paypal-button-container');
    </script>
@endsection
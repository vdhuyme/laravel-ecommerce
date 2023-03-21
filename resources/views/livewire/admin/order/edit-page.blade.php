<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Order Details</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('orders')}}">Orders</a></li>
                            <li class="breadcrumb-item active">Order Details</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row justify-content-center">
            <div class="col-xxl-9">
                <div class="card" id="demo">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card-header border-bottom-dashed p-4">
                                <div class="d-flex">
                                    <div class="flex-grow-1">
                                        <img src="admin/assets/images/logo-mail.png" class="card-logo card-logo-dark"
                                            alt="logo dark" height="50">
                                    </div>
                                </div>
                            </div>
                            <!--end card-header-->
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <div class="card-body p-4">
                                <div class="row g-3">
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Tracking No</p>
                                        <h5 class="fs-14 mb-0">#<span id="invoice-no">{{$trackingNumber}}</span></h5>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Date</p>
                                        <h5 class="fs-14 mb-0"><span
                                                id="invoice-date">{{$created_at->format('d')}}-{{$created_at->format('m')}},
                                                {{$created_at->format('Y')}}</span> <small class="text-muted"
                                                id="invoice-time">{{$created_at->format('g:i A')}}</small></h5>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Payment Method</p>
                                        <span class="badge badge-soft-success fs-11" id="payment-status">
                                            @if ($paymentMode === "cod")
                                            COD
                                            @else
                                            Paypal
                                            @endif
                                        </span>
                                    </div>
                                    <!--end col-->
                                    <div class="col-lg-3 col-6">
                                        <p class="text-muted mb-2 text-uppercase fw-semibold">Total Amount</p>
                                        <h5 class="fs-14 mb-0"><span id="total-amount">{{number_format($total+35000, 0,
                                                '.',
                                                '.')}} VNĐ</span></h5>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <div class="card-body p-4 border-top border-top-dashed">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <h6 class="text-muted text-uppercase fw-semibold mb-3">Shipping Address</h6>
                                        <p class="fw-medium mb-2" id="billing-name">{{$userName}},</p>
                                        <p class="text-muted mb-1" id="billing-address-line-1">{{$shippingAddress}}
                                        </p>
                                        <p class="text-muted mb-1"><span>Phone: +</span><span
                                                id="billing-phone-no">{{$phoneNumber}}</span></p>
                                        <p class="text-muted mb-0"><span>Email: </span><span
                                                id="billing-tax-no">{{$userEmail}}</span> </p>
                                    </div>
                                    <!--end col-->
                                </div>
                                <!--end row-->
                            </div>
                            <!--end card-body-->
                        </div>
                        <!--end col-->
                        <div class="col-lg-12">
                            <div class="card-body p-4">
                                <div class="table-responsive">
                                    <table class="table table-borderless text-center table-nowrap align-middle mb-0">
                                        <thead>
                                            <tr class="table-active">
                                                <th scope="col" style="width: 50px;">#</th>
                                                <th scope="col">Product Details</th>
                                                <th scope="col">Rate</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col" class="text-end">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody id="products-list">
                                            @foreach ($orderProducts as $key => $product)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td class="text-start">
                                                    <span class="fw-medium">{{$product->products->productName}}</span>
                                                </td>
                                                <td>{{number_format($product->purchasePrice, 0, '.',
                                                    '.')}} VNĐ </td>
                                                <td>{{$product->quantity}}</td>
                                                <td class="text-end">
                                                    {{number_format($product->purchasePrice*$product->quantity, 0,
                                                    '.',
                                                    '.')}} VNĐ</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </div>
                                <div class="border-top border-top-dashed mt-2">
                                    <table class="table table-borderless table-nowrap align-middle mb-0 ms-auto"
                                        style="width:250px">
                                        <tbody>
                                            <tr>
                                                <td>Sub Total</td>
                                                <td class="text-end">{{number_format($total, 0, '.',
                                                    '.')}} VNĐ</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping Fee</td>
                                                <td class="text-end">35.000 VNĐ</td>
                                            </tr>
                                            <tr class="border-top border-top-dashed fs-15">
                                                <th scope="row">Total Amount</th>
                                                <th class="text-end">{{number_format($total+35000, 0, '.',
                                                    '.')}} VNĐ</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!--end table-->
                                </div>
                                <div class="mt-3">
                                    <h6 class="text-muted text-uppercase fw-semibold mb-3">Payment Details:</h6>
                                    @if ($paymentMode === "cod")
                                    <p class="text-muted mb-1">Payment Method: <span class="fw-medium"
                                            id="payment-method">COD (Cash On Delivery)</span></p>
                                    <p class="text-muted">Total Amount:
                                        <span id="card-total-amount">{{number_format($total+35000, 0, '.',
                                            '.')}} VNĐ</span>
                                    </p>
                                    @else
                                    <p class="text-muted mb-1">Payment Method: <span class="fw-medium"
                                            id="payment-method">Paypal</span></p>
                                    <p class="text-muted">Total Amount: <span class="fw-medium" id="">$</span><span
                                            id="card-total-amount">{{number_format(($total+35000)/23000, 2, '.',
                                            '')}}</span></p>
                                    @endif
                                </div>
                                <div class="mt-4">
                                    <div class="alert alert-danger">
                                        <p class="mb-0"><span class="fw-semibold">NOTES:</span>
                                            @if ($note !== null)
                                            <br>
                                            <span id="note">{{$note}}
                                            </span>
                                            @else
                                            <br>
                                            <span id="note">Do not have value</span>
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!--end card-body-->
                            <div class="card-body">
                                <div class="col-lg-3 col-sm-6">
                                    <label>Status</label>
                                    <select wire:model.defer="status" class="form-control bg-light border-0">
                                        <option value="pending">Pending</option>
                                        <option value="accepted">Accepted</option>
                                        <option value="inDelivery">In Delivery</option>
                                        <option value="success">Success</option>
                                        <option value="cancel">Cancel</option>
                                        <option value="refund">Refund</option>
                                    </select>
                                </div>

                                <div class="hstack gap-2 justify-content-end d-print-none mt-4">
                                    <button data-bs-toggle="modal" data-bs-target=".updateModal"
                                        data-bs-backdrop="static" class="btn btn-warning">Update Invoice</button>

                                    <span wire:target="exportInvoice" wire:click="exportInvoice({{$this->isEditId}})"
                                        class="btn btn-danger">Export
                                        PDF <div wire:loading wire:target="exportInvoice"
                                            class="spinner-border text-success spinner-border-sm" role="status">
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
    </div>

    <!-- Update Modal -->
    <div wire:ignore.self class="modal fade zoomIn updateModal" id="updateModal" tabindex="-1" data-bs-backdrop="static"
        aria-labelledby="updateModalExtra" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="updateModalExtra"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateOrder">
                        <div class="mt-2 text-center">
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">A confirmation email will be sent to the
                                    customer</p>
                            </div>
                            <div wire:loading wire:target="updateOrder"
                                class="spinner-border text-success spinner-border-sm" role="status">
                            </div>
                            <div wire:loading wire:target="updateOrder">
                                Processing...
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn w-sm btn-danger" id="delete-notification">Yes, I
                                know
                                It!</button>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
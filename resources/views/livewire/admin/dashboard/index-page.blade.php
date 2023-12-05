<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="h-100">
                    <div class="row mb-3 pb-1">
                        <div class="col-12">
                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                <div class="flex-grow-1">
                                    <h4 class="fs-16 mb-1">Hello, {{ Auth::user()->firstName }}
                                        {{ Auth::user()->lastName }}!</h4>
                                    <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                                </div>
                                <div class="mt-3 mt-lg-0">
                                    <form action="javascript:void(0);">
                                        <div class="row g-3 mb-0 align-items-center">
                                            <div class="col-auto">
                                                <a href="{{ route('create-product') }}" class="btn btn-soft-success"><i
                                                            class="ri-add-circle-line align-middle me-1"></i> Add
                                                    Product</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-4 col-md-8">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Total
                                                Earnings</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                                                                  data-target="{{ $this->totalEarnings }}">0</span>VNĐ</h4>
                                            <a class="text-decoration-underline">Revenue</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-success rounded fs-3">
                                                <i class="bx bx-dollar-circle text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-8">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Orders</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                                                                  data-target="{{ $allOrders->count() }}">0</span></h4>
                                            <a href="{{ route('orders') }}" class="text-decoration-underline">View all
                                                orders</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-info rounded fs-3">
                                                <i class="bx bx-shopping-bag text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div><
                        </div>

                        <div class="col-xl-4 col-md-8">
                            <div class="card card-animate">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 overflow-hidden">
                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Customers
                                            </p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                        <div>
                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                                                                  data-target="{{ $users->count() }}">0</span></h4>
                                            <a href="{{ route('users') }}" class="text-decoration-underline">See
                                                details</a>
                                        </div>
                                        <div class="avatar-sm flex-shrink-0">
                                            <span class="avatar-title bg-soft-warning rounded fs-3">
                                                <i class="bx bx-user-circle text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12">
                            <div class="card">
                                <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Recent Orders</h4>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive table-card">
                                        <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                            <thead class="text-muted table-light">
                                            <tr>
                                                <th scope="col">Tracking Number</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Created At</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if ($pendingOrders->count() > 0)
                                                @foreach ($pendingOrders as $order)
                                                    <tr>
                                                        <td>{{$order->trackingNumber}}</td>
                                                        <td>{{$order->userEmail}}</td>
                                                        <td>{{$order->userName}}</td>
                                                        <td>@if ($order->status === "pending")
                                                                <span class="text-center badge badge-soft-warning">Pending</span>
                                                            @elseif($order->status === "accepted")
                                                                <span class="text-center badge badge-soft-primary">Accepted</span>
                                                            @elseif($order->status === "inDelivery")
                                                                <span class="text-center badge badge-soft-info">In Delivery</span>
                                                            @elseif($order->status === "success")
                                                                <span class="text-center badge badge-soft-success">Success
                                                        </span>
                                                            @elseif($order->status === "cancel")
                                                                <span class="text-center badge badge-soft-danger">Cancel</span>
                                                            @elseif($order->status === "refund")
                                                                <span class="text-center badge badge-soft-danger">Refund</span>
                                                            @endif
                                                        </td>
                                                        <td>{{ date('j F, Y', strtotime($order->created_at))}}
                                                            {{ $order->created_at->format('g:i A') }}</td>
                                                        <td>
                                                            <div class="hstack gap-3 fs-15">
                                                                <a href="{{ route('edit-order', ['id'=>$order->id]) }}"
                                                                   class="link-warning"><i class="ri-edit-2-line"></i></a>


                                                                <a wire:click="deleteOrder({{ $order->id }})"
                                                                   class=" link-danger" style="cursor: pointer"><i
                                                                            class="ri-delete-bin-2-line" data-bs-toggle="modal"
                                                                            data-bs-target=".deleteModal"
                                                                            data-bs-backdrop="static"></i></a>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <th class="text-center" colspan="10">Do not have value</th>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-body">
                                    {{ $pendingOrders->onEachSide(1)->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div wire:ignore.self class="modal fade zoomIn deleteModal" id="deleteModal" tabindex="-1"
         aria-labelledby="deleteModalExtra" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                            id="deleteModalExtra"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="destroyOrder">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                       colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this order ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                It!</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

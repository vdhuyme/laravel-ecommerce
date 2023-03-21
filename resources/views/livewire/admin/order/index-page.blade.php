<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Orders</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('orders')}}">Orders</a></li>
                            <li class="breadcrumb-item active">Orders of List</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin.components.alerts')

        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="invoiceList">
                    <div class="card-body bg-soft-light border border-dashed border-start-0 border-end-0">
                        <div class="row g-3">
                            <div class="col-xxl-12 col-sm-12">
                                <div class="search-box">
                                    <input type="text" wire:model="searchTerm"
                                        class="form-control search bg-light border-light"
                                        placeholder="Search for customer, email, tracking number or something...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle table-nowrap mb-0">
                                <thead>
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
                                    @if ($orders->count() > 0)
                                    @foreach ($orders as $order)
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
                                        <td>{{$order->created_at->format('d/m/Y')}}</td>
                                        <td>
                                            <div class="hstack gap-3 fs-15">
                                                <a href="{{ route('edit-order', ['id'=>$order->id]) }}"
                                                    class="link-warning"><i class="ri-edit-2-line"></i></a>


                                                <a wire:click="deleteOrder({{ $order->id }})" class=" link-danger"
                                                    style="cursor: pointer"><i class="ri-delete-bin-2-line"
                                                        data-bs-toggle="modal" data-bs-target=".deleteModal"
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
                    </div><!-- end card-body -->

                    <div class="card-body">
                        {{$orders->onEachSide(1)->links()}}
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div><!-- container-fluid -->

    <!-- Delete Modal -->
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

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
<!-- End Page-content -->

@section('scripts')
<script>
    window.addEventListener('hidden-modal', event =>{
            $('#deleteModal').modal('hide');
        });
</script>

<script>
    flatpickr("#filterFromDay");
    flatpickr("#filterToDay");
</script>
@endsection
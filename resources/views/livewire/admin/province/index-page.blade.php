<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Provinces</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('provinces')}}">Provinces</a></li>
                            <li class="breadcrumb-item active">Provinces of list</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin.components.alerts')

        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row g-4">
                        <div class="col-sm-auto">
                            <div>
                                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target=".storeModal"
                                    data-bs-backdrop="static"><i class="ri-add-line align-bottom me-1"></i> Add
                                    Province</button>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input wire:model="searchTerm" type="text" class="form-control"
                                        id="searchProductList" placeholder="Search province...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered align-middle table-nowrap mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Province Name</th>
                                    <th scope="col">Have Many Districts</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($provinces->count() > 0)
                                @foreach ($provinces as $province)
                                <tr>
                                    <td class="fw-medium">{{$province->id}}</td>
                                    <td>{{$province->firstName}} {{$province->provinceName}}</td>
                                    <td>{{$province->districts->count()}}</td>
                                    <td>
                                        <div class="hstack gap-3 fs-15">
                                            <a wire:click="editProvince({{ $province->id }})" class="link-warning"
                                                style="cursor: pointer"><i class="ri-edit-2-line" data-bs-toggle="modal"
                                                    data-bs-target=".updateModal" data-bs-backdrop="static"></i></a>

                                            <a wire:click="deleteProvince({{ $province->id }})" class="link-danger"
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
                    {{$provinces->onEachSide(1)->links()}}
                </div>
            </div><!-- end card -->
        </div><!-- end col -->
    </div>

    <!-- Store Modal -->
    <div wire:ignore.self class="modal fade storeModal" id="storeModal" tabindex="-1" data-bs-backdrop="static"
        aria-labelledby="storeModalCenter" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="storeModalCenter">NEW PROVINCE</h5>
                    <button wire:click="closeModal" type="button" class="btn-close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="storeProvince">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3 form-label">
                                            <label class="form-label" for="provinceName">Province Name</label>
                                            <input type="text"
                                                class="form-control @error('provinceName') is-invalid @enderror"
                                                id="provinceName" placeholder="Enter name"
                                                wire:model.defer="provinceName">

                                            @error('provinceName') <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary w-sm">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Update Modal -->
    <div wire:ignore.self class="modal fade updateModal" id="updateModal" tabindex="-1" data-bs-backdrop="static"
        aria-labelledby="updateModalExtra" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalExtra">UPDATE PROVINCE</h5>
                    <button type="button" class="btn-close" wire:click="closeModal"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="updateProvince">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3 form-label">
                                            <label class="form-label" for="provinceName">Province Name</label>
                                            <input type="text"
                                                class="form-control @error('provinceName') is-invalid @enderror"
                                                id="provinceName" placeholder="Enter Name"
                                                wire:model.defer="provinceName">

                                            @error('provinceName') <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary w-sm">Submit</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card -->
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Delete Modal -->
    <div wire:ignore.self class="modal fade zoomIn deleteModal" id="deleteModal" tabindex="-1"
        aria-labelledby="deleteModalExtra" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" wire:click="closeModal" aria-label="Close"
                        id="deleteModalExtra"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="destroyProvince">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this product type ?</p>
                            </div>
                        </div>
                        <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                            <button type="button" class="btn w-sm btn-light" wire:click="closeModal">Close</button>
                            <button type="submit" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete
                                It!</button>
                        </div>
                    </form>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>

@section('scripts')
<script>
    window.addEventListener('hidden-modal', event =>{
            $('#storeModal').modal('hide');
            $('#updateModal').modal('hide');
            $('#deleteModal').modal('hide');
        });
</script>
@endsection
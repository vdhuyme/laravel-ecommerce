<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Banners</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('banners')}}">Banners</a></li>
                            <li class="breadcrumb-item active">Banners of list</li>
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
                                <a href="{{route('create-banner')}}" class="btn btn-primary"><i
                                        class="ri-add-line align-bottom me-1"></i> Add
                                    Banner</a>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input wire:model="searchTerm" type="text" class="form-control"
                                        id="searchProductList" placeholder="Search banner...">
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
                                    <th scope="col">Title</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Created at</th>
                                    <th scope="col">Updated at</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($banners->count() > 0)
                                @foreach ($banners as $banner)
                                <tr>
                                    <td class="fw-medium">{{$banner->id}}</td>
                                    <td>{{$banner->bannerTitle}}</td>
                                    <td><img src="{{$banner->bannerImage}}" alt="" class="rounded avatar-xs"></td>
                                    <td>{{$banner->created_at->format('d/m/Y')}}</td>
                                    <td>{{$banner->updated_at->format('d/m/Y')}}</td>
                                    <td>
                                        <div class="hstack gap-3 fs-15">
                                            <a href="{{ route('edit-banner', ['id'=>$banner->id]) }}"
                                                class="link-warning"><i class="ri-edit-2-line"></i></a>

                                            <a wire:click="deleteBanner({{ $banner->id }})" class=" link-danger"
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
                    {{$banners->onEachSide(1)->links()}}
                </div>
            </div><!-- end card -->
        </div><!-- end col -->
    </div>

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
                    <form wire:submit.prevent="destroyBanner">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this banner ?</p>
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

@section('scripts')
<script>
    window.addEventListener('hidden-modal', event =>{
            $('#deleteModal').modal('hide');
        });
</script>
@endsection
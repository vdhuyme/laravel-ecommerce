<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Products</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('products')}}">Products</a></li>
                            <li class="breadcrumb-item active">Products of list</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin.components.alerts')

        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex mb-3">
                            <div class="flex-grow-1">
                                <h5 class="fs-16">Filters</h5>
                            </div>
                        </div>


                        <div class="search-box search-box-sm">
                            <input type="text" class="form-control bg-light border-0" placeholder="Search Products..."
                                wire:model="searchTerm">
                            <i class="ri-search-line search-icon"></i>
                        </div>
                    </div>

                    <div class="accordion accordion-flush filter-accordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingBrands">
                                <button class="accordion-button bg-transparent shadow-none" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseBrands"
                                    aria-expanded="true" aria-controls="flush-collapseBrands">
                                    <span class="text-muted text-uppercase fs-12 fw-medium">Categories</span> <span
                                        class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                </button>
                            </h2>

                            <div id="flush-collapseBrands" class="accordion-collapse collapse show"
                                aria-labelledby="flush-headingBrands">
                                <div class="accordion-body text-body pt-0">
                                    <div class="d-flex flex-column gap-2 mt-3 filter-check">
                                        @if ($categories->count() > 0)
                                        @foreach ($categories as $category)
                                        <div class="form-check">
                                            <input class="form-check-input" wire:model="filterTerm" type="checkbox"
                                                value="{{$category->id}}" id="{{$category->categoryName}}">
                                            <label class="form-check-label"
                                                for="{{$category->categoryName}}">{{$category->categoryName}}
                                                ({{$category->products->count()}})</label>
                                        </div>
                                        @endforeach
                                        @else
                                        <p>Do not have categories</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion-item -->

                        <div class="accordion-item" wire:ignore>
                            <h2 class="accordion-header" id="flush-headingDiscount">
                                <button class="accordion-button bg-transparent shadow-none collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#flush-collapseDiscount"
                                    aria-expanded="true" aria-controls="flush-collapseDiscount">
                                    <span class="text-muted text-uppercase fs-12 fw-medium">Sort By Price</span>
                                    <span class="badge bg-success rounded-pill align-middle ms-1 filter-badge"></span>
                                </button>
                            </h2>
                            <div id="flush-collapseDiscount" class="accordion-collapse collapse"
                                aria-labelledby="flush-headingDiscount">
                                <div class="accordion-body text-body pt-1">
                                    <div class="d-flex flex-column gap-2 filter-check">
                                        <div class="form-check">
                                            <input wire:model="sortTerm" class="form-check-input" type="radio" value=""
                                                id="productdiscountRadio6">
                                            <label class="form-check-label" for="productdiscountRadio6">
                                                Default
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input wire:model="sortTerm" class="form-check-input" type="radio"
                                                value="lowToHight" id="productdiscountRadio5">
                                            <label class="form-check-label" for="productdiscountRadio5">
                                                Low to hight
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input wire:model="sortTerm" class="form-check-input" type="radio"
                                                value="hightToLow" id="productdiscountRadio4">
                                            <label class="form-check-label" for="productdiscountRadio4">
                                                High to low
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion-item -->
                    </div>
                </div>
                <!-- end card -->
            </div>

            <div class="col-xl-9 col-lg-8">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <div>
                                    <a href="{{route('create-product')}}" class="btn btn-primary"><i
                                            class="ri-add-line align-bottom me-1"></i> Add
                                        Product</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle table-nowrap mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Created At</th>
                                            <th scope="col">Updated At</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($products->count() > 0)
                                        @foreach ($products as $product)
                                        <tr>
                                            <td class="fw-medium">{{$product->id}}</td>
                                            <td>{{$product->productName}}</td>
                                            <td>
                                                @if ($product->productImages->count() > 0)
                                                @foreach ($product->productImages as $image)<img
                                                    src="{{$image->productImage}}" alt="" class="rounded avatar-xs">
                                                @endforeach
                                                @else
                                                Do not have image
                                                @endif
                                            </td>
                                            <td>{{$product->created_at->format('d/m/Y')}}</td>
                                            <td>{{$product->updated_at->format('d/m/Y')}}</td>
                                            <td>
                                                <div class="hstack gap-3 fs-15">
                                                    <a href="{{ route('edit-product', ['id'=>$product->id]) }}"
                                                        class="link-warning"><i class="ri-edit-2-line"></i></a>

                                                    <a wire:click="deleteProduct({{ $product->id }})"
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
                        </div><!-- end card-body -->

                        <div class="card-body">
                            {{$products->onEachSide(1)->links()}}
                        </div>
                    </div>
                </div>
            </div><!-- end card -->
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
                        <form wire:submit.prevent="destroyProduct">
                            <div class="mt-2 text-center">
                                <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                    colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px">
                                </lord-icon>
                                <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                    <h4>Are you sure ?</h4>
                                    <p class="text-muted mx-4 mb-0">Are you sure you want to remove this product ?</p>
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
</div>



@section('scripts')
<script>
    window.addEventListener('hidden-modal', event =>{
            $('#deleteModal').modal('hide');
        });
</script>
@endsection
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
                            <li class="breadcrumb-item active">Edit Product</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        @include('admin.components.alerts')

        <form wire:submit.prevent="updateProduct" wire:ignore.self>
            <div class="row">
                <div class="col-xxl-6">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                                <li class="nav-item">
                                    <a wire:ignore class="nav-link active" data-bs-toggle="tab" href="#element"
                                        role="tab">
                                        Basic Elements
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a wire:ignore class="nav-link" data-bs-toggle="tab" href="#image" role="tab">
                                        Images
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a wire:ignore class="nav-link" data-bs-toggle="tab" href="#seo" role="tab">
                                        SEO
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content text-muted">
                                <div wire:ignore.self class="tab-pane active" id="element" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 ms-2">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="mb-3 form-label">
                                                                <label for="choices-publish-status-input"
                                                                    class="form-label">Category</label>
                                                                <select
                                                                    class="form-select @error('categoryId') is-invalid @enderror"
                                                                    wire:model="categoryId">
                                                                    <option value="">Choose a category</option>
                                                                    @foreach ($categories as $category)
                                                                    <option value="{{$category->id}}">
                                                                        {{$category->categoryName}}</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('categoryId') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="mb-3 form-label">
                                                                <label for="choices-publish-status-input"
                                                                    class="form-label">Status</label>
                                                                <select
                                                                    class="form-select @error('productStatus') is-invalid @enderror"
                                                                    wire:model="productStatus">
                                                                    <option value="">Choose a status</option>
                                                                    <option value="published">Published</option>
                                                                    <option value="unPublished">Un Published</option>
                                                                </select>

                                                                @error('productStatus') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="mb-3 form-label">
                                                                <label for="choices-publish-status-input"
                                                                    class="form-label">Featured Product</label>
                                                                <select
                                                                    class="form-select @error('featuredProduct') is-invalid @enderror"
                                                                    wire:model="featuredProduct">
                                                                    <option value="">Choose a status</option>
                                                                    <option value="no">Normal</option>
                                                                    <option value="yes">Featured</option>
                                                                </select>

                                                                @error('featuredProduct') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end card body -->
                                            </div>

                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3 form-label">
                                                                <label class="form-label" for="productName">Name</label>
                                                                <input type="text"
                                                                    class="form-control @error('productName') is-invalid @enderror"
                                                                    id="productName" wire:model="productName"
                                                                    placeholder="Enter Name" wire:keyup='generateSlug'>

                                                                @error('productName') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="mb-3 form-label">
                                                                <label class="form-label" for="productSlug">Slug</label>
                                                                <input type="text"
                                                                    class="form-control @error('productSlug') is-invalid @enderror"
                                                                    id="productSlug" placeholder="Enter Slug"
                                                                    wire:model="productSlug">

                                                                @error('productSlug') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 form-label">
                                                        <label class="form-label" for="description">Description</label>
                                                        <textarea type="text" rows="7"
                                                            class="form-control @error('description') is-invalid @enderror"
                                                            id="description" placeholder="Enter Description"
                                                            wire:model="description">
                                                        </textarea>

                                                        @error('description') <span class="text-danger">{{ $message
                                                            }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card">
                                                <!-- end card header -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <div class="mb-3 form-label">
                                                                <label class="originalPrice"
                                                                    for="meta-title-input">Original
                                                                    Price</label>
                                                                <input type="text" x-mask:dynamic="$money($input, ',')"
                                                                    x-data
                                                                    class="form-control @error('originalPrice') is-invalid @enderror"
                                                                    placeholder="Original Price" id="originalPrice"
                                                                    wire:model="originalPrice">

                                                                @error('originalPrice') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="mb-3 form-label">
                                                                <label class="form-label" for="sellingPrice">Selling
                                                                    Price</label>
                                                                <input type="text" x-mask:dynamic="$money($input, ',')"
                                                                    x-data
                                                                    class="form-control @error('sellingPrice') is-invalid @enderror"
                                                                    placeholder="Selling Price" id="sellingPrice"
                                                                    wire:model="sellingPrice">

                                                                @error('sellingPrice') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="mb-3 form-label">
                                                                <label for="stock" class="form-label">Stock</label>
                                                                <select
                                                                    class="form-select @error('stock') is-invalid @enderror"
                                                                    wire:model="stock">
                                                                    <option value="">Choose stock</option>
                                                                    <option value="inStock">In Stock</option>
                                                                    <option value="outStock">Out Stock</option>
                                                                </select>

                                                                @error('stock') <span class="text-danger">{{ $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->
                                                </div>
                                            </div>
                                            <!-- end card -->
                                        </div>
                                    </div>
                                </div>
                                <div wire:ignore.self class="tab-pane" id="image" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 ms-2">
                                            <div class="card">
                                                <div class="card-body">
                                                    <figcaption class="figure-caption">
                                                        <h6>Product Images</h6>
                                                    </figcaption>
                                                    @if ($productOldImages->count() > 0)
                                                    @foreach ($productOldImages as $productOldImage)
                                                    <figure class="figure text-center">
                                                        <img src="{{$productOldImage->productImage}}"
                                                            class="rounded-circle avatar-xl" alt="Old Image">

                                                        <p wire:click="deleteProductImage({{ $productOldImage->id }})"
                                                            class="mt-2 mb-lg-0 text-center" data-bs-toggle="modal"
                                                            data-bs-target=".deleteModal" data-bs-backdrop="static"><a
                                                                class="mt-2 mb-lg-0 link-danger"
                                                                style="cursor: pointer"><i
                                                                    class="ri-delete-bin-2-line"></i> Remove</a></p>
                                                    </figure>
                                                    @endforeach
                                                    @else
                                                    <p class="text-center">Do not have images</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <div wire:ignore x-data x-init="                            
                                                        FilePond.registerPlugin(FilePondPluginImagePreview);
                                                        FilePond.registerPlugin(FilePondPluginFileValidateType);
                                                        FilePond.registerPlugin(FilePondPluginFileValidateSize);
                                                        FilePond.create($refs.input);
                                                        FilePond.setOptions({
                                                            allowMultiple: true,
                                                            acceptedFileTypes: ['image/*'],
                                                            server: {
                                                                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                                    @this.upload('productNewImages', file, load, error, progress)
                                                                    
                                                                },
                                                                revert: (filename, load) => {
                                                                    @this.removeUpload('productNewImages', filename, load)
                                                                },
                                                            },
                                                        });
                                                        ">
                                                        <label>Upload New Images</label>
                                                        <input type="file" x-ref="input" wire:model="productNewImages">
                                                    </div>

                                                    @error('productNewImages') <span class="text-danger">{{ $message
                                                        }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div wire:ignore.self class="tab-pane" id="seo" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 ms-2">
                                            <div class="card">
                                                <!-- end card header -->
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3 form-label">
                                                                <label class="form-label" for="meta-title-input">Meta
                                                                    title</label>
                                                                <input type="text"
                                                                    class="form-control @error('metaTitle') is-invalid @enderror"
                                                                    placeholder="Meta title" id="meta-title-input"
                                                                    wire:model="metaTitle">

                                                                @error('metaTitle') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="mb-3 form-label">
                                                                <label class="form-label" for="meta-keywords-input">Meta
                                                                    Keywords</label>
                                                                <input type="text"
                                                                    class="form-control @error('metaKey') is-invalid @enderror"
                                                                    placeholder="Meta keywords" id="meta-keywords-input"
                                                                    wire:model="metaKey">

                                                                @error('metaKey') <span class="text-danger">{{ $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->

                                                    <div class="form-label">
                                                        <label class="form-label" for="meta-description-input">Meta
                                                            Description</label>
                                                        <textarea
                                                            class="form-control @error('metaDescription') is-invalid @enderror"
                                                            id="meta-description-input" placeholder="Meta description"
                                                            rows="7" wire:model="metaDescription"></textarea>

                                                        @error('metaDescription') <span class="text-danger">{{ $message
                                                            }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary w-sm">Submit</button>
                                </div>
                            </div>
                        </div><!-- end card-body -->
                    </div><!-- end card -->
                </div>
            </div>
            <!-- end row -->
        </form>
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
                    <form wire:submit.prevent="destroyProductImage">
                        <div class="mt-2 text-center">
                            <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop"
                                colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                            <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                                <h4>Are you sure ?</h4>
                                <p class="text-muted mx-4 mb-0">Are you sure you want to remove this category ?</p>
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
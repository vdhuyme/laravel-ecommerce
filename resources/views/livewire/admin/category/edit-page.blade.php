<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Categories</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{route('categories')}}">Categories</a></li>
                            <li class="breadcrumb-item active">Edit Category</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <form wire:submit.prevent="updateCategory">
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
                                                    <div class="mb-3 form-label">
                                                        <figcaption class="figure-caption">
                                                            <h6>Category Image</h6>
                                                        </figcaption>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <figure class="figure">
                                                                <img src="{{$showOldImage}}"
                                                                    class="rounded-circle avatar-xl" alt="Old Image">
                                                            </figure>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 form-label">
                                                        <div wire:ignore x-data x-init="                            
                                                        FilePond.registerPlugin(FilePondPluginImagePreview);
                                                        FilePond.registerPlugin(FilePondPluginFileValidateType);
                                                        FilePond.registerPlugin(FilePondPluginFileValidateSize);
                                                        FilePond.create($refs.input);
                                                        FilePond.setOptions({
                                                            acceptedFileTypes: ['image/*'],
                                                            server: {
                                                                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                                                    @this.upload('newCategoryImage', file, load, error, progress)
                                                                    
                                                                },
                                                                revert: (filename, load) => {
                                                                    @this.removeUpload('newCategoryImage', filename, load)
                                                                },
                                                            },
                                                        });
                                                        ">
                                                            <label>Upload New Image</label>
                                                            <input type="file" data-max-file-size="3MB" x-ref="input"
                                                                wire:model="newCategoryImage">
                                                        </div>
                                                        @error('newCategoryImage') <span class="text-danger">{{ $message
                                                            }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3 form-label">
                                                                <label class="form-label" for="nameCat">Category
                                                                    Name</label>
                                                                <input type="text"
                                                                    class="form-control @error('categoryName') is-invalid @enderror"
                                                                    id="nameCat" wire:model="categoryName"
                                                                    placeholder="Enter Name" wire:keyup='generateSlug'>

                                                                @error('categoryName') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="mb-3 form-label">
                                                                <label class="form-label" for="slugCat">Category
                                                                    Slug</label>
                                                                <input type="text"
                                                                    class="form-control @error('categorySlug') is-invalid @enderror"
                                                                    id="slugCat" placeholder="Enter Slug"
                                                                    wire:model="categorySlug">

                                                                @error('categorySlug') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <div class="mb-3 form-label">
                                                                <label for="choices-publish-status-input"
                                                                    class="form-label">Status</label>
                                                                <select
                                                                    class="form-select @error('featuredCategory') is-invalid @enderror"
                                                                    wire:model.defer="featuredCategory">
                                                                    <option>Choose a status</option>
                                                                    <option value="no">Normal</option>
                                                                    <option value="yes">Featured</option>
                                                                </select>

                                                                @error('featuredCategory') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end card -->
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
                                                            <!-- end col -->
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
                                                            <!-- end col -->
                                                        </div>

                                                        <div class="form-label">
                                                            <label class="form-label" for="meta-description-input">Meta
                                                                Description</label>
                                                            <textarea rows="7"
                                                                class="form-control @error('metaDescription') is-invalid @enderror"
                                                                id="meta-description-input"
                                                                placeholder="Meta description" rows="2"
                                                                wire:model="metaDescription"></textarea>

                                                            @error('metaDescription') <span class="text-danger">{{
                                                                $message
                                                                }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- end card -->
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
        </form>
    </div>
</div>
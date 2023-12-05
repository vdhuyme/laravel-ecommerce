<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Banners</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('banners') }}">Banners</a></li>
                            <li class="breadcrumb-item active">Edit Banner</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <form wire:submit.prevent="updateBanner">
            <div class="card">
                <div class="card-body">
                    <figcaption class="figure-caption">
                        <h6>Banner Image</h6>
                    </figcaption>
                    <div class="d-flex justify-content-center align-items-center">
                        <figure class="figure">
                            <img src="{{ asset($showOldImage) }}" class="rounded-circle avatar-xl" alt="Old Image">
                        </figure>
                    </div>
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
                            acceptedFileTypes: ['image/*'],
                            server: {
                                process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                                    @this.upload('newBannerImage', file, load, error, progress)

                                },
                                revert: (filename, load) => {
                                    @this.removeUpload('newBannerImage', filename, load)
                                },
                            },
                        });
                        ">
                        <label>Upload New Image</label>
                        <input type="file" data-max-file-size="3MB" x-ref="input" wire:model="newBannerImage">
                    </div>
                    @error('newBannerImage') <span class="text-danger">{{ $message }}</span>
                    @enderror

                    <div class="row mt-3">
                        <div class="col-sm-6">
                            <div class="mb-3 form-label">
                                <label class="form-label" for="nameCat">Title</label>
                                <textarea type="text" class="form-control @error('bannerTitle') is-invalid @enderror"
                                          id="nameCat" wire:model.defer="bannerTitle" placeholder="Enter Title" rows="7"></textarea>

                                @error('bannerTitle') <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 form-label">
                                <label class="form-label" for="slugCat">Sub Title</label>
                                <textarea type="text" class="form-control @error('bannerSubTitle') is-invalid @enderror"
                                          id="slugCat" placeholder="Sub Title" wire:model.defer="bannerSubTitle"
                                          rows="7"></textarea>

                                @error('bannerSubTitle') <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mb-3 form-label">
                                <label for="choices-publish-status-input" class="form-label">Status</label>
                                <select class="form-select @error('bannerStatus') is-invalid @enderror"
                                        wire:model.defer="bannerStatus">
                                    <option>Choose a status</option>
                                    <option value="show">Showing</option>
                                    <option value="hide">Not Showing</option>
                                </select>

                                @error('bannerStatus') <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-sm">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
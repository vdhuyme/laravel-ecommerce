<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Articles</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('articles') }}">Articles</a></li>
                            <li class="breadcrumb-item active">Edit Article</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <form wire:submit.prevent="updateArticle">
            <div class="row">
                <div class="col-xxl-6">
                    <div class="card">
                        <div class="card-body">
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

                            <div class="tab-content text-muted">
                                <div wire:ignore.self class="tab-pane active" id="element" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 ms-2">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="mb-3 form-label">
                                                        <figcaption class="figure-caption">
                                                            <h6>Article Image</h6>
                                                        </figcaption>
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <figure class="figure">
                                                                <img src="{{ $showOldImage }}"
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
                                                                    @this.upload('newArticleImage', file, load, error, progress)

                                                                },
                                                                revert: (filename, load) => {
                                                                    @this.removeUpload('newArticleImage', filename, load)
                                                                },
                                                            },
                                                        });
                                                        ">
                                                            <label>Upload New Image</label>
                                                            <input type="file" data-max-file-size="3MB" x-ref="input"
                                                                   wire:model="newArticleImage">
                                                        </div>
                                                        @error('newArticleImage') <span class="text-danger">{{ $message
                                                            }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3 form-label">
                                                                <label class="form-label" for="title">Title</label>
                                                                <input type="text"
                                                                       class="form-control @error('articleTitle') is-invalid @enderror"
                                                                       id="title" wire:model="articleTitle"
                                                                       placeholder="Enter Title" wire:keyup='generateSlug'>

                                                                @error('articleTitle') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="mb-3 form-label">
                                                                <label class="form-label" for="slug">Slug</label>
                                                                <input type="text"
                                                                       class="form-control @error('articleSlug') is-invalid @enderror"
                                                                       id="slug" placeholder="Enter Slug"
                                                                       wire:model="articleSlug">

                                                                @error('articleSlug') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-label mb-3">
                                                                <label for="choices-publish-status-input"
                                                                       class="form-label">Status</label>
                                                                <select
                                                                        class="form-select @error('featuredArticle') is-invalid @enderror"
                                                                        wire:model.defer="featuredArticle">
                                                                    <option>Choose a status</option>
                                                                    <option value="no">Normal</option>
                                                                    <option value="yes">Featured</option>
                                                                </select>

                                                                @error('featuredArticle') <span class="text-danger">{{
                                                                    $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="mb-3 form-label">
                                                        <label class="form-label" for="shortContent">Short
                                                            Content</label>
                                                        <textarea wire:model.defer="shortContent"
                                                                  class="form-control @error('shortContent') is-invalid @enderror"
                                                                  id="shortContent" placeholder="Short Content"
                                                                  rows="7"></textarea>

                                                        @error('shortContent') <span class="text-danger">{{ $message
                                                            }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="card-body" wire:ignore>
                                                    <label for="articleContent">Content</label>
                                                    <textarea id="content" wire:model.defer="articleContent"></textarea>
                                                    <script>
                                                        function elFinderBrowser (callback, value, meta) {
                                                            tinymce.activeEditor.windowManager.openUrl({
                                                                title: 'File Manager',
                                                                url: 'elfinder/tinymce5',
                                                                onMessage: function (dialogApi, details) {
                                                                    if (details.mceAction === 'fileSelected') {
                                                                        const file = details.data.file;

                                                                        // Make file info
                                                                        const info = file.name;

                                                                        // Provide file and text for the link dialog
                                                                        if (meta.filetype === 'file') {
                                                                            callback(file.url, {text: info, title: info});
                                                                        }

                                                                        // Provide image and alt text for the image dialog
                                                                        if (meta.filetype === 'image') {
                                                                            callback(file.url, {alt: info});
                                                                        }

                                                                        // Provide alternative source and posted for the media dialog
                                                                        if (meta.filetype === 'media') {
                                                                            callback(file.url);
                                                                        }

                                                                        dialogApi.close();
                                                                    }
                                                                }
                                                            });
                                                        }
                                                    </script>

                                                    <script>
                                                        tinymce.init({
                                                            selector: '#content',
                                                            setup: function (editor) {
                                                                editor.on('init change', function () {
                                                                    editor.save();
                                                                });

                                                                editor.on('blur', function (e) {
                                                                @this.set('articleContent', editor.getContent());
                                                                });
                                                            },

                                                            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount fullscreen',
                                                            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat | fullscreen',
                                                            image_class_list: [
                                                                {title: 'Responsive', value: 'img-fluid'}
                                                            ],
                                                            file_picker_callback: elFinderBrowser
                                                        });
                                                    </script>
                                                </div>

                                                @error('articleContent') <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div wire:ignore.self class="tab-pane" id="seo" role="tabpanel">
                                    <div class="d-flex">
                                        <div class="flex-grow-1 ms-2">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="mb-3 form-label">
                                                                <label class="form-label" for="meta-title-input">Meta
                                                                    title</label>
                                                                <input type="text"
                                                                       class="form-control @error('metaTitle') is-invalid @enderror"
                                                                       placeholder="Meta title" id="meta-title-input"
                                                                       wire:model.defer="metaTitle">

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
                                                                       wire:model.defer="metaKey">

                                                                @error('metaKey') <span class="text-danger">{{ $message
                                                                    }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-label">
                                                            <label class="form-label" for="meta-description-input">Meta
                                                                Description</label>
                                                            <textarea
                                                                    class="form-control @error('metaDescription') is-invalid @enderror"
                                                                    id="meta-description-input"
                                                                    placeholder="Meta description" rows="7"
                                                                    wire:model.defer="metaDescription"></textarea>

                                                            @error('metaDescription') <span class="text-danger">{{
                                                                $message
                                                                }}</span>
                                                            @enderror
                                                        </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
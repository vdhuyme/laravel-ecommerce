<div class="page-content">
    <div class="container-fluid">
        <x-admin.breadcrumb
                pageTitle="Sản phẩm"
                :breadcrumbs="[
                    ['label' => 'Sản phẩm', 'url' => route('products')],
                    ['label' => 'Cập nhật sản phẩm', 'url' => ''],
                ]" />
        <x-form wire:submit.prevent="update">
            <div class="row">
                <div class="col-lg-8">
                    <x-admin.card>
                        <x-admin.card.body>
                            <div class="mb-3">
                                <x-admin.input
                                        name="name"
                                        id="name"
                                        model="name"
                                        placeholder="Nhập tên sản phẩm"
                                        label="Tên sản phẩm" />
                            </div>

                            <div class="mb-3">
                                <x-admin.input
                                        name="slug"
                                        id="slug"
                                        model="slug"
                                        placeholder="Nhập liên kết cố định"
                                        label="Liên kết cố định"
                                        :require="false" />
                            </div>

                            <div class="mb-3">
                                <x-admin.editor
                                        :label="__('Mô tả sản phẩm')"
                                        type="text"
                                        id="description"
                                        name="description"
                                        model="description"
                                        rows="7"
                                        placeholder="{{ __('Nhập mô tả sản phẩm') }}"
                                >
                                </x-admin.editor>
                            </div>
                        </x-admin.card.body>
                    </x-admin.card>

                    <x-admin.card>
                        <x-admin.card.header>
                            <h5 class="card-title mb-0">{{ __('Ảnh sản phẩm') }}</h5>
                        </x-admin.card.header>
                        <x-admin.card.body>
                            <div class="mb-3">
                                <p class="text-muted">{{ __('Thêm ảnh') }}</p>
                                <div class="mb-3">
                                    <x-filepond
                                            model="images"
                                            name="images"
                                            id="images"
                                            :multiple="true" />

                                    <div class="row">
                                        @forelse($oldImages as $image)
                                            <div class="col-lg-3 col-6">
                                                <div class="position-relative">
                                                    <x-admin.old-image :url="$image->url" />
                                                    <x-admin.delete-button
                                                            method="delete({{ $image->id }})"
                                                            class="position-absolute top-50 start-50 translate-middle" />
                                                </div>
                                            </div>
                                        @empty
                                            <div class="col-12">
                                                <p class="text-muted">{{ __('Không có ảnh cũ') }}</p>
                                            </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </x-admin.card.body>
                    </x-admin.card>
                </div>

                <div class="col-lg-4">
                    <x-admin.card>
                        <x-admin.card.header>
                            <h5 class="card-title mb-0">{{ __('Giá sản phẩm') }}</h5>
                        </x-admin.card.header>
                        <x-admin.card.body>
                            <div class="row">
                                <div class="mb-3">
                                    <x-admin.input
                                            placeholder="Nhập giá gốc"
                                            label="Giá gốc"
                                            id="originalPrice"
                                            name="originalPrice"
                                            model="originalPrice" />
                                </div>

                                <div class="mb-3">
                                    <x-admin.input
                                            placeholder="Nhập giá bán (giá sale)"
                                            label="Giá bán"
                                            id="sellingPrice"
                                            name="sellingPrice"
                                            model="sellingPrice"
                                            :require="false" />
                                </div>
                            </div>
                        </x-admin.card.body>
                    </x-admin.card>

                    <x-admin.card>
                        <x-admin.card.header>
                            <h5 class="card-title mb-0">{{ __('Công bố') }}</h5>
                        </x-admin.card.header>
                        <div class="card-body">
                            <div class="mb-3">
                                <x-admin.input.select
                                        name="status"
                                        model="status"
                                        label="Trạng thái"
                                        :options="['draft' => 'DRAFT', 'active' => 'ACTIVE']" />

                            </div>

                            <div class="mb-3">
                                <x-admin.input.select
                                        name="isFeatured"
                                        model="isFeatured"
                                        label="Nổi bật"
                                        :options="['1' => 'Có', '0' => 'Không']" />
                            </div>
                        </div>
                    </x-admin.card>

                    <x-admin.card>
                        <x-admin.card.header>
                            <h5 class="card-title mb-0">{{ __('Danh mục') }}</h5>
                        </x-admin.card.header>
                        <x-admin.card.body>
                            <div class="mb-3">
                                <x-admin.input.select
                                        name="categoryId"
                                        model="categoryId"
                                        label="Danh mục sản phẩm"
                                        :options="$categories" />
                            </div>

                            <div class="text-end mb-3">
                                <x-admin.button
                                        type="submit"
                                        class="btn btn-primary">{{ __('Cập nhật') }}</x-admin.button>
                            </div>
                        </x-admin.card.body>
                    </x-admin.card>
                </div>
            </div>
        </x-form>
    </div>
</div>
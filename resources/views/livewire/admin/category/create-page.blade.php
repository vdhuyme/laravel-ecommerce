<div class="page-content">
    <div class="container-fluid">
        <x-admin.breadcrumb
                pageTitle="Danh mục"
                :breadcrumbs="[
                    ['label' => 'Danh mục', 'url' => route('categories')],
                    ['label' => 'Thêm danh mục', 'url' => ''],
                ]" />

        <x-form wire:submit.prevent="store">
            <div class="row">
                <div class="col-lg-12">
                    <x-admin.card>
                        <x-admin.card.body>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <x-admin.input
                                                name="name"
                                                id="name"
                                                model="name"
                                                placeholder="Nhập tên danh mục"
                                                label="Tên danh mục" />
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <x-admin.input
                                                name="slug"
                                                id="slug"
                                                model="slug"
                                                placeholder="Nhập slug"
                                                label="Slug" />
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <x-admin.input.checkbox
                                            model="isFeatured"
                                            name="isFeatured"
                                            id="isFeatured"
                                            value="true">{{ __('Xuất hiện ở trang chủ') }}</x-admin.input.checkbox>
                                </div>

                                <div class="col-lg-6">
                                    <x-filepond
                                            model="image"
                                            name="image"
                                            id="image" />
                                </div>

                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <x-admin.button type="submit" clickMethod="store">{{ __('Thêm mới') }}</x-admin.button>
                                    </div>
                                </div>
                            </div>
                        </x-admin.card.body>
                    </x-admin.card>
                </div>
            </div>
        </x-form>
    </div>
</div>
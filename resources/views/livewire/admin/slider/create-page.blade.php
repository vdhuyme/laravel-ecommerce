<div class="page-content">
    <div class="container-fluid">
        <x-admin.breadcrumb
                pageTitle="Hình ảnh"
                :breadcrumbs="[
                    ['label' => 'Hình ảnh', 'url' => route('sliders')],
                    ['label' => 'Thêm hình ảnh', 'url' => ''],
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
                                                name="title"
                                                id="title"
                                                model="title"
                                                placeholder="Nhập tiêu đề ảnh"
                                                label="Tiêu đề" />
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <x-admin.input
                                                name="subtitle"
                                                id="subtitle"
                                                model="subtitle"
                                                placeholder="Nhập phụ đề ảnh"
                                                label="Phụ đề" />
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="mb-3">
                                        <x-admin.input.checkbox
                                                model="isFeatured"
                                                name="isFeatured"
                                                id="isFeatured"
                                                value="true">{{ __('Xuất hiện ở trang chủ') }}</x-admin.input.checkbox>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <x-filepond
                                            model="image"
                                            name="image"
                                            id="image" />
                                </div>

                                <div class="col-lg-12">
                                    <div class="text-center">
                                        <x-admin.button
                                                type="submit"
                                                class="btn btn-primary">{{ __('Thêm mới') }}</x-admin.button>
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
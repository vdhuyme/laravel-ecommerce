<div class="page-content">
    <div class="container-fluid">
        <x-admin.breadcrumb
                pageTitle="Danh mục"
                :breadcrumbs="[
                    ['label' => 'Danh mục', 'url' => route('categories')],
                    ['label' => 'Danh sách danh mục', 'url' => ''],
                ]" />

        <div class="col-xl-12">
            <x-admin.card>
                <x-admin.card.header>
                    <div class="row g-4">
                        <div class="col-sm-auto">
                            <x-link
                                    :to="route('create-category')"
                                    class="btn btn-primary">{{ __('Thêm danh mục mới') }}</x-link>
                        </div>

                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <x-admin.input
                                            wire:model.live="searchTerm"
                                            type="text"
                                            id="search"
                                            placeholder="Nhập tên danh mục">
                                        <i class="ri-search-line search-icon"></i>
                                    </x-admin.input>
                                </div>
                            </div>
                        </div>
                    </div>
                </x-admin.card.header>

                <x-admin.card.body>
                    <x-admin.table
                            type="table-bordered"
                            :headers="['STT', 'Tên', 'Ngày thêm', 'Hành động']">
                        <x-admin.table.body>
                            @forelse($categories as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>
                                        <x-link
                                                :to="route('edit-category', ['id' => $category->id])"
                                                class="badge badge-soft-warning link-warning">{{ __('Sửa') }}</x-link>

                                        <x-admin.delete-button method="delete({{ $category->id }})"/>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="100%">{{ __('Không có dữ liệu') }}</td>
                                </tr>
                            @endforelse
                        </x-admin.table.body>
                    </x-admin.table>

                    {{ $categories->links() }}
                </x-admin.card.body>
            </x-admin.card>
        </div>
    </div>
</div>
<div class="page-content">
    <div class="container-fluid">
        <x-admin.breadcrumb
                pageTitle="Sản phẩm"
                :breadcrumbs="[
                    ['label' => 'Sản phẩm', 'url' => route('products')],
                    ['label' => 'Danh sách sản phẩm', 'url' => ''],
                ]" />

        <div class="row">
            <div class="col-xl-3 col-lg-4">
                <x-admin.card>
                    <x-admin.card.header>
                        <div class="search-box search-box-sm">
                            <x-admin.input
                                    wire:model.live="searchTerm"
                                    type="text"
                                    id="search"
                                    placeholder="Nhập tên sản phẩm">
                                <i class="ri-search-line search-icon"></i>
                            </x-admin.input>
                        </div>
                    </x-admin.card.header>

                    <div class="accordion accordion-flush filter-accordion">
                        <div class="card-body border-bottom">
                            <div>
                                <p class="text-muted text-uppercase fs-12 fw-medium mb-2">{{ __('Danh mục') }}</p>
                                <ul class="list-unstyled mb-0 filter-list">
                                    @forelse ($categories as $category)
                                        <li>
                                            <div class="d-flex py-1 align-items-center">
                                                <div class="flex-grow-1">
                                                    <h5 class="fs-13 mb-0 listname">
                                                        <x-admin.input.checkbox
                                                                wire:model.live="filterTerm"
                                                                name="filterTerm"
                                                                :value="$category->id"
                                                                :id="$category->name">
                                                            {{ __(':name', ['name' => $category->name]) }}
                                                        </x-admin.input.checkbox>
                                                    </h5>
                                                </div>
                                                <div class="flex-shrink-0 ms-2">
                                                    <span class="badge bg-light text-muted">{{ __(':count', ['count' => $category->products_count]) }}</span>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        <p>{{ __('Không có dữ liệu') }}</p>
                                    @endforelse
                                </ul>
                            </div>
                        </div>

                        <div class="card-body border-bottom">
                            <div>
                                <p class="text-muted text-uppercase fs-12 fw-medium mb-2">{{ __('Giá') }}</p>
                                <ul class="list-unstyled mb-0 filter-list">
                                    <li>
                                        <x-admin.input.radio
                                                wire:model.live="sortTerm"
                                                name="sortTerm"
                                                id="default"
                                                value="">
                                            {{ __('Mặc định') }}
                                        </x-admin.input.radio>
                                    </li>

                                    <li>
                                        <x-admin.input.radio
                                                wire:model.live="sortTerm"
                                                name="sortTerm"
                                                id="lowToHigh"
                                                value="lowToHigh">
                                            {{ __('Thấp đến cao') }}
                                        </x-admin.input.radio>
                                    </li>

                                    <li>
                                        <x-admin.input.radio
                                                wire:model.live="sortTerm"
                                                name="sortTerm"
                                                id="highToLow"
                                                value="highToLow">
                                            {{ __('Cao đến thấp') }}
                                        </x-admin.input.radio>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </x-admin.card>
            </div>

            <div class="col-xl-9 col-lg-8">
                <x-admin.card>
                    <x-admin.card.header>
                        <div class="row g-4">
                            <div class="col-sm-auto">
                                <x-link
                                        :to="route('create-product')"
                                        class="btn btn-primary">{{ __('Thêm sản phẩm') }}</x-link>
                            </div>
                        </div>
                    </x-admin.card.header>

                    <x-admin.card.body>
                        <x-admin.table
                                type="table-bordered"
                                :headers="['STT', 'Tên', 'Hình ảnh', 'Giá gốc', 'Giá sale', 'Hành động']">
                            <x-admin.table.body>
                                @forelse($products as $index => $product)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            <img
                                                    src="{{ $product->featured_image }}"
                                                    alt="{{ $product->name }}" class="avatar-xs">
                                        </td>
                                        <td>{{ FormatCurrencyHelper::formatCurrency($product->original_price) }}</td>
                                        <td>{{ FormatCurrencyHelper::formatCurrency($product->selling_price) }}</td>
                                        <td>
                                            <x-link
                                                    :to="route('edit-product', ['id' => $product->id])"
                                                    class="badge badge-soft-warning link-warning">{{ __('Sửa') }}</x-link>

                                            <x-admin.delete-button method="delete({{ $product->id }})"/>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center" colspan="100%">{{ __('Không có dữ liệu') }}</td>
                                    </tr>
                                @endforelse
                            </x-admin.table.body>
                        </x-admin.table>

                        {{ $products->onEachSide(1)->links() }}
                    </x-admin.card.body>
                </x-admin.card>
            </div>
        </div>
    </div>
</div>

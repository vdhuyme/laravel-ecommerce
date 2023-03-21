@if ($paginator->hasPages())
@php(isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ?
$this->numberOfPaginatorsRendered[$paginator->getPageName()]++ :
$this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1)
<div class="row">
    <div class="col-sm-12 col-custom">
        <div class="toolbar-bottom mt-30">
            <nav class="pagination pagination-wrap mb-10 mb-sm-0">
                <ul class="pagination">
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <span class="page-link-custom" aria-hidden="true">&lsaquo;</span>
                    </li>
                    @else
                    <li class="page-item">
                        <button type="button"
                            dusk="previousPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                            class="page-link-custom" wire:click="previousPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled" rel="prev"
                            aria-label="@lang('pagination.previous')">&lsaquo;</button>
                    </li>
                    @endif

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link-custom">{{ $element
                            }}</span>
                    </li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                    @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                    <li class="page-item active"
                        wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}"
                        aria-current="page"><span class="page-link-custom">{{ $page }}</span></li>
                    @else
                    <li class="page-item"
                        wire:key="paginator-{{ $paginator->getPageName() }}-{{ $this->numberOfPaginatorsRendered[$paginator->getPageName()] }}-page-{{ $page }}">
                        <button type="button" class="page-link-custom"
                            wire:click="gotoPage({{ $page }}, '{{ $paginator->getPageName() }}')">{{ $page }}</button>
                    </li>
                    @endif
                    @endforeach
                    @endif
                    @endforeach

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <button type="button"
                            dusk="nextPage{{ $paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName() }}"
                            class="page-link-custom" wire:click="nextPage('{{ $paginator->getPageName() }}')"
                            wire:loading.attr="disabled" rel="next"
                            aria-label="@lang('pagination.next')">&rsaquo;</button>
                    </li>
                    @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <span class="page-link-custom" aria-hidden="true">&rsaquo;</span>
                    </li>
                    @endif
                </ul>
            </nav>

            <p class="desc-content text-center text-sm-right">{{ $paginator->firstItem() }}-{{
                $paginator->lastItem() }}/{{ $paginator->total() }}</p>
        </div>
    </div>
</div>
@endif
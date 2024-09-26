@if ($paginator->hasPages())
    <div class="col-md-12">
        <nav class="pagination-outer" aria-label="Page navigation">
            <ul class="pagination">
                <!-- Previous Page Link -->
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                        <a class="page-link" aria-hidden="true">&laquo;</a>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"
                           aria-label="@lang('pagination.previous')">&laquo;</a>
                    </li>
                @endif

                {{--             Always show first page--}}
                <li class="page-item {{ $paginator->currentPage() == 1 ? 'active' : '' }}">
                    <a class="page-link" href="{{ $paginator->url(1) }}">1</a>
                </li>


                @php
                    $startPage = max($paginator->currentPage() - 1, 2);
                    $endPage = min($paginator->currentPage() + 1, $paginator->lastPage() - 1);
                @endphp

                @if ($startPage > 2)
                    <li class="page-item dot">
                        <a class="page-link dot"><i class='bx bx-dots-horizontal-rounded'></i></a>
                    </li>
                @endif

                <!-- Pagination Elements -->
                @if($paginator->lastPage() > 2)
                    @foreach ($paginator->getUrlRange($startPage, $endPage) as $page => $url)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach
                @endif

                @if ($endPage < $paginator->lastPage() - 1)
                    <li class="page-item dot">
                        <a class="page-link dot"><i class='bx bx-dots-horizontal-rounded'></i></a>
                    </li>
                @endif
                {{--             Always show last page--}}
                <li class="page-item {{ $paginator->currentPage() == $paginator->lastPage() ? 'active' : '' }}">
                    <a class="page-link"
                       href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a>
                </li>

                <!-- Next Page Link -->
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"
                           aria-label="@lang('pagination.next')">&raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <a class="page-link" aria-hidden="true">&raquo;</a>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
@endif

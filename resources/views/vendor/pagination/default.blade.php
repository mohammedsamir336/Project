@if ($paginator->hasPages())
<nav class="d-flex justify-content-center mt-5">
  <ul class="pagination pagination-circle pg-teal mb-0">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
            <li class="page-item disabled">
              <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" mdbWavesEffect>&laquo;</a>
            </li>
            @else
                <li class="page-item">
                  <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" mdbWavesEffect>
                  <span  aria-hidden="true">&laquo;</span>
                  <span class="sr-only text-dark">Previous</span>
                </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page">
                          <a class="page-link hov-btn1">{{ $page }}</a>
                        </li>
                        @else
                            <li class="page-item">
                              <a class="flex-c-c pagi-item hov-btn1 trans-03 m-all-7" href="{{ $url }}">
                                {{ $page }}
                              </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&raquo;</span>
            </li>

            @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
            </li>
            @endif
        </ul>
    </nav>
@endif

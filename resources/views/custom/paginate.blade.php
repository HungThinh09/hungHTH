
    @if ($paginator->hasPages())
    <ul >
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">&lsaquo;</span>
            </li>
           
        @else
            <li>
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active" aria-current="page"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li>
                <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif

<style>
    .phantrang {
    text-align: center;
    --a:10px;
    --b:5px;
}
.phantrang ul{
    list-style: none;
    }
    .phantrang ul li{
    display: inline-table;
    }
    .phantrang ul li.active span{
    padding: 6px 12px;
    background-color: rgba(225, 177, 44,.9);
    border-radius: 50%;
    }
    .phantrang ul li a{
        padding: var(--b) var(--a);
    background-color: rgba(76, 209, 55,.9);
    border-radius: 50%;
    color: antiquewhite;
    width: 40px;
    }
    .phantrang2 ul li {
        border: 1px solid white;
    }
    .phantrang2 ul li.active span{
    background-color: black;
    border-radius: 0;
    color: white;
    }
    .phantrang2 ul li a{
    background-color:rgb(102, 100, 100);
    border-radius: 0;
       
    }
</style>
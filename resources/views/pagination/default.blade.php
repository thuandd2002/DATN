<style>
    .pagination .active a { color: white !important;}
</style>
@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><a rel="nofollow" class="isDisabled" href="javascript:void(0)"> Trang trước </a></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="nofollow"> Trang trước </a></li>
        @endif

        @if (is_array($elements))
            @foreach ($elements as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active"><a rel="nofollow" class="item" href="javascript:void(0)">{{ $page }}</a></li>
                @else
                    <li><a rel="nofollow" class="item" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="nofollow"> Trang sau</a></li>
        @else
            <li class="disabled"><a href="javascript:void(0)" rel="nofollow" class="isDisabled">Trang sau</a></li>
        @endif
    </ul>
@endif

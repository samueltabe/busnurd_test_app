@php
    $last = $products->lastPage();
    $current = $products->currentPage();
    $start = max(1, $current - 2);
    $end = min($last, $current + 2);
@endphp
<nav class="w-full sm:w-auto sm:mr-auto">
    <ul class="pagination">
        <li class="page-item {{ $current == 1 ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $products->url(1) }}">«</a>
        </li>
        <li class="page-item {{ $products->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $products->previousPageUrl() ?: '#' }}">‹</a>
        </li>

        @if($start > 1)
            <li class="page-item"> <a class="page-link" href="{{ $products->url(1) }}">1</a> </li>
            @if($start > 2)
                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
            @endif
        @endif

        @for($i = $start; $i <= $end; $i++)
            <li class="page-item {{ $current == $i ? 'active' : '' }}"> <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a> </li>
        @endfor

        @if($end < $last)
            @if($end < $last - 1)
                <li class="page-item"> <a class="page-link" href="#">...</a> </li>
            @endif
            <li class="page-item"> <a class="page-link" href="{{ $products->url($last) }}">{{ $last }}</a> </li>
        @endif

        <li class="page-item {{ $products->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $products->nextPageUrl() ?: '#' }}">›</a>
        </li>
        <li class="page-item {{ $current == $last ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $products->url($last) }}">»</a>
        </li>
    </ul>
</nav>

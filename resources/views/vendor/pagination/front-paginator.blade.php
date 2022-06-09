
@if ($paginator->hasPages())
<ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <!-- <li class="disabled"><span>&laquo;</span></li> -->
    @else
    <li><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">Précédent</a></li>
    @endif
    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li class="disabled"><a><span>{{ $element }}</span></a></li>
    @endif
    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="page-item active"><a class="page-link">{{ $page }}</a></li>
    @else
    <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="page-item"><a class="page-link" class="next" href="{{ $paginator->nextPageUrl() }}" rel="next">Suivant</a></li>
    @else
    <!-- <li class="disabled"><span>&raquo;</span></li> -->
    @endif
</ul>
@endif
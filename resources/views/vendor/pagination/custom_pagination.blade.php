
@if ($paginator->hasPages())
<ul class="btn-group">
    @if ($paginator->onFirstPage())
       <span class="pagebot disabled btn btn-danger">Previous</span>
    @else
        <a class="pagebot btn btn-danger" href="{{ $paginator->previousPageUrl() }}" rel="prev">Previous</a>
    @endif



    @foreach ($elements as $element)

        @if (is_string($element))
            <span class="pagebot btn btn-danger disabled">{{ $element }}</span>
        @endif



        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="pagebot btn btn-danger active my-active">{{ $page }}</span>
                @else
                    <a class="pagebot btn btn-danger" href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach



    @if ($paginator->hasMorePages())
        <a class="pagebot btn btn-danger" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
    @else
        <span class="pagebot disabled btn btn-danger">Next</span>
    @endif
</ul>
@endif

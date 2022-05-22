@if ($paginator->hasPages())
    <ul class="pager btn-group">

        @if ($paginator->onFirstPage())
            <li class="btn btn-outline-secondary disabled"><span>←</span></li>
        @else
            <li><a class="btn btn-outline-secondary" href="{{ $paginator->previousPageUrl() }}" rel="prev">←</a></li>
        @endif



        @foreach ($elements as $element)

            @if (is_string($element))
                <li class="btn btn-outline-secondary disabled"><span>{{ $element }}</span></li>
            @endif



            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="btn btn-outline-secondary active my-active"><span>{{ $page }}</span></li>
                    @else
                        <li><a class="btn btn-outline-secondary" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach



        @if ($paginator->hasMorePages())
            <li><a class="btn btn-outline-secondary" href="{{ $paginator->nextPageUrl() }}" rel="next">→</a></li>
        @else
            <li class="btn btn-outline-secondary disabled"><span>→</span></li>
        @endif
    </ul>
@endif

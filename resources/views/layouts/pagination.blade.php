@if ($paginator->hasPages())

    <ul class="pagination">

        {{-- Previous Page Link --}}

        @if ($paginator->onFirstPage())

            <li class="page-item disabled"><a href="#" class="page-link"> Previous</a></li>

        @else

            <li class="page-item"><a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="page-link">Previous</a></li>

        @endif


        {{-- Pagination Elements --}}

        @foreach ($elements as $element)

            {{-- "Three Dots" Separator --}}

            @if (is_string($element))

                <li class="page-item disabled"><a class="page-link" >{{ $element }}</a></li>

            @endif


            {{-- Array Of Links --}}

            @if (is_array($element))

                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())

                        <li class="active page-item"><a class="page-link">{{ $page }}</a></li>

                    @else

                        <li class="page-item"><a href="{{ $url }}" class="page-link">{{ $page }}</a></li>

                    @endif

                @endforeach

            @endif

        @endforeach


        {{-- Next Page Link --}}

        @if ($paginator->hasMorePages())

            <li class="page-item"><a href="{{ $paginator->nextPageUrl() }}" rel="next" class="page-link">Next</a></li>

        @else

            <li class="page-item disabled"><a href="#" class="page-link">Next</a></li>

        @endif

    </ul>

@endif
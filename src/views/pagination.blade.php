@if ($paginator->hasPages())
    <div class="row text-right mr-2">
        <nav aria-label="Page navigation" class="ml-auto">
            <ul class="pagination">

                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())

                    <li class="page-item">
                        <a class="page-link"
                           href="#"
                           aria-label="Previous">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                @else
                    <li class="page-item">
                        <a class="page-link"
                           href="{{ $paginator->previousPageUrl() }}"
                           aria-label="Previous">
                            <span aria-hidden="true">«</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                @endif



                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="page-item"><a class="page-link active" href="#">{{ $page }}</a></li>
                            @else
                                <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach


                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())

                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}"
                           aria-label="Next">
                            <span aria-hidden="true">»</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>

                @else
                    <li class="page-item">
                        <a class="page-link" href="#"
                           aria-label="Next">
                            <span aria-hidden="true">»</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
@endif

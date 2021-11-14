<p class="text-end my-2">
  Showing {{ $paginator->firstItem() ?? 0 }} to {{ $paginator->lastItem() ?? 0 }} of {{ $paginator->total() }} results
</p>
@if ($paginator->hasPages())
  <nav>
    <ul class="pagination justify-content-center">
      <li class="page-item {{$paginator->onFirstPage() ? 'disabled' : ''}}">
        <a class="page-link" href="{{ $paginator->previousPageUrl()}}">Previous</a>
      </li>
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
              <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
            @else
              <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
            @endif
          @endforeach
        @endif
      @endforeach
      <li class="page-item {{$paginator->hasMorePages() ? '' : 'disabled'}}">
        <a class="page-link" href="{{$paginator->nextPageUrl()}}">Next</a>
      </li>
    </ul>
  </nav>
@endif

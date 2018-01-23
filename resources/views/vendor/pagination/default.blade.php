@push('scripts')
    <script type="text/javascript" src="{{ asset('js/paginator.js') }}"></script>
@endpush

@if ($paginator->hasPages())
    <ul class="pagination">
         @if(1 == $paginator->currentPage())
            <li class="active"><span>1</span></li>
        @else
            <li><a href="{{ $paginator->url(1) }}">1</a></li>
        @endif

        <li id="triple"><span onclick="pressBtn([
            @for ($i = 2; $i <= $paginator->lastPage() - 1; $i++)
                @if($i == $paginator->currentPage())
                    '<li class=\&quot;active\&quot;><span>{{ $i }}</span></li>',
                @else
                    '<li><a href=\&quot;{{$paginator->url($i)}}\&quot;>{{$i}}</a></li>',
                @endif
            @endfor
                    ])">...</span></li>

        @if($paginator->lastPage() == $paginator->currentPage())
            <li class="active" id="last"><span>{{$paginator->lastPage()}}</span></li>
        @else
            <li id="last"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{$paginator->lastPage()}}</a></li>
        @endif

</ul>
@endif




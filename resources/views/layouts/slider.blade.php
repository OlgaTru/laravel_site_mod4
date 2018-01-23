@push('stylesheets')
    <link href="{{ asset('css/slider.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('js/slider.js') }}"></script>
@endpush

<div class="container-fluid">
    <br>
    <div id="custom_carousel" class="carousel slide" data-ride="carousel" data-interval="2500">
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            @foreach($slider_articles as $index=>$article)
                @if($index == 0)
                    <div class="item active">
                @else
                    <div class="item">
                @endif
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-3"><img src="{{$article->img}}" class="img-responsive"/></div>
                                <div class="col-md-9">
                                    <h2><a class="article-name" href="{{route('showArticle', ['id' => $article->id])}}">{{$article->title}}</a></h2>
                                    <p>{{$article->description}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
            @endforeach
                    </div>

        <div class="controls">
            <ul class="nav">
                @foreach($slider_articles as $index=>$article)
                    @if($index == 0)
                        <li data-target="#custom_carousel" data-slide-to="0" class="active"><a href="#"><img src="{{$article->img}}" width="60" ><small>{{$article->title}}</small></a></li>
                    @else
                        <li data-target="#custom_carousel" data-slide-to="{{$index}}"><a href="#"><img src="{{$article->img}}" width="60" ><small>{{$article->title}}</small></a></li>
                    @endif
                @endforeach
            </ul>
        </div>

        </div>
    </div>
</div>




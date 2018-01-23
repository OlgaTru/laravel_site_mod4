<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                {{ config('app.name', 'Laravel') }}
            </a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('/') ? "active" : "" }}"><a href="{{route('showHomePage')}}">Home</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">Категории<span class="caret"></span></a>
                    <ul class="dropdown-menu">

                    @foreach($categories as $category)
                    <li><a href="{{route('showCategory', ['id' => $category->id])}}">{{$category->category}}</a></li>
                    @endforeach

                        <li class="dropdown-submenu">
                            <a tabindex="-1" href="#">Последние новости</a>
                            <ul class="dropdown-menu">
                                @foreach($latest_articles as $article)
                                    <li><a href="{{route('showArticle', ['id' => $article->id])}}">{{$article->title}}</a></li>
                                @endforeach
                           </ul>
                        </li>
                    </ul>
                </li>
                <li><a href="{{route('articleList')}}">Статьи</a></li>
                <li><a href="{{route('analytics')}}">Аналитика</a></li>
                <li>@include('layouts.search-navbar')</li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                @if (Route::has('login'))
                 <!-- Right Side Of Navbar -->
                         <!-- Authentication Links -->
                            @guest

                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            @else
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                    @endif
                                @endguest







            </ul>

        </div><!--/.nav-collapse -->
    </div>
</nav>

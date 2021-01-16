<nav class="navbar navbar-expand-lg  bg-danger">
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{ route('frontend.landing') }}" rel="tooltip" title="Coded by Creative Tim"
                data-placement="bottom" >
                5dmat-Web
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <!-- Example single danger button -->


                <li class="nav-item">
                    <div class="btn-group">

                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Categories
                        </a>
                        <div class="dropdown-menu">
                            @foreach ($categories as $category)
                                <a class="dropdown-item" href="{{ route('front.category', ['id' => $category->id]) }}"
                                    value=''>{{ $category->name }}</a>
                            @endforeach


                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <div class="btn-group">

                        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Skills
                        </a>
                        <div class="dropdown-menu">
                            @foreach ($skills as $skill)
                                <a class="dropdown-item" href="{{ route('front.skill', ['id' => $skill->id]) }}"
                                    value=''>{{ $skill->name }}</a>
                            @endforeach
                        </div>
                    </div>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                        <div class="btn-group">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('front.profile' , ['id'=>auth()->user()->id , 'slug' => slug(auth()->user()->name)]) }}">                                      
                                    My Profile
                                </a>

                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </div>
                    </li>
                @endguest
                <li>
                    <form class="form-inline ml-auto mt-3" action="{{route('home')}}">
                        <div class="form-group has-white">
                          <input type="text" name="search" class="form-control" placeholder="Search">
                        </div>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

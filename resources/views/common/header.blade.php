<nav class="navbar navbar-expand-lg">
    <div class="container-fluid d-block">
        <div class="row">
            <div class="col-12">
                <div class="header-content text-end">
                     <div class="collapse navbar-collapse ">
                        <div class="d-flex align-items-center ms-auto">
                          @auth
                            <div class="dropdown">
                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                    <strong class="text-white">Welcome {{auth()->user()->name}}</strong> <i class="fa fa-user text-white"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item"onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                       </form>
                                    </li>
                                </ul>
                            </div>
                          @endauth
                        </div>
                        
                    </div>
                     @guest
                      <a href="{{route('login')}}"><i class="fas fa-sign-in-alt"></i></a>
                     <!--  <a class="ms-4"><i class="fas fa-envelope"></i></a> -->
                     @endguest
                   
                </div>
            </div>
        </div>
    </div>
</nav>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" >
		
    <!-- Main CSS -->
	<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <section id="header">
        <div class="container-fluid">
            <!-- first -->
            <div class="row py-3">
                <div class="col-6 d-flex justify-content-start">
                    <h3 class="ml-5">Casino</h3>
                </div>
                <div class="col-6 d-flex justify-content-between">
                    <div>
                        <button class="btn rounded-pill mx-2">
                            <h6>
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                                <a href="{{ url('/') }}" class="@yield('home_select')">Home</a>
                            </h6>
                        </button>
                        <button class="btn btn-white rounded-pill mx-2">
                            <h6>
                                <i class="fa fa-heart-o" aria-hidden="true"></i> 
                                <a href="{{ url('result') }}" class="@yield('result_select')">Results</a>
                            </h6>
                        </button>
                        <button class="btn btn-white rounded-pill mx-2">
                            <h6>
                                <i class="fa fa-bell-o" aria-hidden="true"></i>
                                Upcoming
                            </h6>
                        </button>
                        <button class="btn btn-white rounded-pill mx-2">
                            <h6>
                                <i class="fa fa-bell-o" aria-hidden="true"></i>
                                <a href="{{ url('completed') }}" class="@yield('completed_select')">Completed</a>
                            </h6>
                        </button>
                    </div>
                    <div>
                        <button class="btn btn-dark rounded-pill mx-2">
                            @if (session()->has('USER_LOGIN'))
                                <h6>
                                    <a href="{{ url('logout') }}" class="text-white">LOGOUT</a>
                                </h6>
                            @else
                                <h6>
                                    <a href="{{ url('login') }}" class="text-white">SIGN IN</a>
                                </h6>
                            @endif
                        </button>
                    </div>
                </div>
            </div>
            <hr>
            <h1 class="text-center py-5">@yield('heading')</h1>
        </div>
    </section>
    <section>
        <div class="container-fluid">
                @section('container')
                @show 
        </div>
    </section>
</body>
</html>
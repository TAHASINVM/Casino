<!DOCTYPE html> 
<html lang="en">
	
<head>
		<meta charset="utf-8">
		<title>Casino</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
		
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
	
	</head>
	<body>

		<!-- Main Wrapper -->
		<div>
			
			<!-- Page Content -->
				<div class="container-fluid vh-100">	
                    <!-- Login Tab Content -->
                        <div class="row align-items-center justify-content-center h-100 bg-dark">
                            <div class="col-md-12 col-lg-6 login-right shadow rounded p-4 bg-light">
                                <div class="login-header">
                                    <h3>User Login</h3>
                                </div>
                                <form action="{{ url('loginProcess') }}" method="post">
                                    @csrf
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Email</label>
                                        <input name="email" type="text" class="form-control">
                                        @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group form-focus">
                                        <label class="focus-label">Password</label>
                                        <input name="password" type="password" class="form-control">
                                        @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}  
                                        </div> 
                                    @endif
                                    
                                    <div class="text-right">
                                        <a class="forgot-link" href="#">Forgot Password ?</a>
                                    </div>
                                    <button class="btn btn-primary btn-block btn-lg login-btn my-3" type="submit">Login</button>
                                    <div class="text-center dont-have">Don’t have an account? <a href="#">Register</a></div>

                                </form>
                            </div>
                        </div>
                    <!-- /Login Tab Content -->
				</div>
			<!-- /Page Content -->
   		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
        <script src="jquery-3.6.0.min.js"></script>

		<!-- Bootstrap Core JS -->
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
		
		<!-- Custom JS -->
		<script src="{{ asset('front/js/script.js') }}"></script>
		
	</body>

<!-- Paithrukam/login.html   20 APR 2022 04:12:20  -->
</html>
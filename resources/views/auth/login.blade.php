<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Balivisas | Admin Login</title>

    <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('backend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">BV</h1>

            </div>
            <h3>Welcome to Balivisas Admin Login</h3>
            <img src="{{asset('balivisas.png')}}" alt="" width="100px">
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" method="POST" action="{{route('login')}}">
                @csrf
                <div class="form-group">
                    <input type="email" class="form-control" name="email" placeholder="Username" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  required="">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>
                <div class="form-group">
                    <input  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="">Create an account</a>
            </form>
            <p class="m-t"> <small>Balivisas &copy; {{date('Y')}}</small> </p>
        </div>
    </div>


    <!-- Mainly scripts -->
    <script src="{{asset('backend/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('backend/js/popper.min.js')}}"></script>
    <script src="{{asset('backend/js/bootstrap.js')}}"></script>

</body>


<!-- Mirrored from webapplayers.com/inspinia_admin-v2.8/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 17 Sep 2019 16:23:21 GMT -->
</html>

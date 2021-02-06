@extends('layouts.app')

@section('content')
    <body class="register-page sidebar-collapse">
    <div class="page-header" style="background-image: url('/assets/frontend/img/login-image.jpg');">
        <div class="filter"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 ml-auto mr-auto">
                    <div class="card card-register">
                        <h3 class="title mx-auto">Welcome</h3>
                        <div class="social-line text-center">
                            <a href="{{ url('auth/facebook') }}" class="btn btn-neutral btn-facebook btn-just-icon">
                                <i class="fa fa-facebook-square"></i>
                            </a>
                            <a href="{{ url('auth/google') }}" class="btn btn-neutral btn-google btn-just-icon">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a href="{{ url('auth/twitter') }}" class="btn btn-neutral btn-twitter btn-just-icon">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </div>
                        <form class="register-form" action="{{route('login')}}" method="POST">
                            {{csrf_field()}}
                            <label>@lang('site.email')</label>
                            <input type="text" name="email" value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" placeholder="@lang('site.email')">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <label>@lang('site.password')</label>
                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="@lang('site.password')">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            <button class="btn btn-white btn-block btn-round">@lang('site.login')</button>
                        </form>
                        <div class="forgot">
                            <a href="#" style="color: #c09f59;
    background-color: black;
    border-color: black;" class="btn btn-link btn-danger">Forgot password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer register-footer text-center">
            {{--<h6>©--}}
                {{--<script>--}}
                    {{--document.write(new Date().getFullYear())--}}
                {{--</script>, made with <i class="fa fa-heart heart"></i> Smart Solution</h6>--}}
        </div>
    </div>
@endsection

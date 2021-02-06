@extends('layouts.app')

@section('title')
    {{$user->name}}
@endsection

@section('content')
    <div class="page-header page-header-xs" data-parallax="true" style="background-image: url(&quot;/assets/frontend/img/fabio-mangione.jpg&quot;); transform: translate3d(0px, 0px, 0px);">
        <div class="filter"></div>
    </div>
    <div class="section profile-content" style="margin-top: 0px">
        <div class="container">
            <div class="owner">
                <div class="avatar">
                    <img src="{{  isset($user->provider_id)?  $user->image : asset('uploads/user_images/'.$user->image)}}" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                </div>
                <div class="name">
                    <h4 class="title">{{ucfirst($user->name)}}
                        <br>
                    </h4>
                    <h6 class="description">{{$user->group}}</h6>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 ml-auto mr-auto text-center">
                    <p> Email: {{$user->email}} </p>
                    <br>
                    @if(auth()->user() && auth()->user()->id == $user->id)
                        <button onclick="$(this).closest('.profile-content').next('div').toggle(1000); $('html,body').animate({scrollTop: $('#update_profile').offset().top},'slow'); return false" class="btn btn-outline-default btn-round" ><i class="fa fa-cog"></i> @lang('site.settings')</button>
                    @endif
                </div>
            </div>
            <br>
        </div>
    </div>

    <div class="card card-nav-tabs col-md-12" id="update_profile" style="display: none">

        <div class="card-header card-header-warning">
            <h5 style="display: inline-block"><i class="fa fa-edit" ></i> @lang('site.edit') @lang('site.profile')</h5>
        </div>
        <div class="card-body">
            <form action="{{route('profile.update', ['id'=> $user->id, 'slug'=> slug($user->name)])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">@lang('site.name')</label>
                            <input type="text" name="name" value="{{ isset($user) ? $user->name : old('name') }}" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            <script>
                                scroll();
                            </script>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">@lang('site.email')</label>
                            <input type="email" name="email" value="{{ isset($user) ? $user->email : old('email') }}" class="form-control @error('email') is-invalid @enderror">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            <script>
                                scroll();
                            </script>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">@lang('site.password')</label>
                            <input type="password" name="password"  class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            <script>
                                scroll();
                            </script>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating">@lang('site.repeat_password')</label>
                            <input type="password" name="password_confirmation" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            <script>
                                scroll();
                            </script>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group bmd-form-group">
                            <label>@lang('site.image')</label>
                            <input type="file" name="image" class="form-control image @error('image') is-invalid @enderror">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-3" width="90px" height="50px">
                        <div class="form-group bmd-form-group">
                            <img src="{{ isset($user->provider_id)?  $user->image : asset('uploads/user_images/'.$user->image)}}" width="100px" height="60px" class="img-thumbnail img-preview">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 ml-auto mr-auto text-right">
                        <button type="submit" class="btn btn-outline-default btn-round"><i class="fa fa-edit"></i> @lang('site.edit')</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


@endsection
<script>
    //when errors scroll to form
    function scroll() {
        document.getElementById('update_profile').style.display="";
        document.location.href="#update_profile";
    }
</script>

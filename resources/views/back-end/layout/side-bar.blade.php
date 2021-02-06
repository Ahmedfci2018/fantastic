<div class="sidebar" data-color="purple" data-background-color="black" data-image="/assets/img/sidebar-2.jpg">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="{{url('/website')}}" class="simple-text logo-normal" target="_blank">
            Technical Videos
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{is_active('home')}}">
                <a class="nav-link" href="{{route('home.index')}}">
                    <i class="material-icons">dashboard</i>
                    <p>@lang('site.home')</p>
                </a>
            </li>

            {{--<li class="nav-item {{is_active('users')}}">--}}
                {{--<a class="nav-link" href="{{route('users.index')}}">--}}
                    {{--<i class="material-icons">person</i>--}}
                    {{--<p>@lang('site.users')</p>--}}
                {{--</a>--}}
            {{--</li>--}}

            <li class="nav-item {{is_active('categories')}}">
                <a class="nav-link" href="{{route('categories.index')}}">
                    <i class="material-icons">library_books</i>
                    <p>@lang('site.categories')</p>
                </a>
            </li>


            <li class="nav-item {{is_active('tags')}}">
                <a class="nav-link" href="{{route('tags.index')}}">
                    <i class="material-icons">map</i>
                    <p>@lang('site.tags')</p>
                </a>
            </li>

            <li class="nav-item {{is_active('sliders')}}">
                <a class="nav-link" href="{{route('sliders.index')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>@lang('site.sliders')</p>
                </a>
            </li>


            <li class="nav-item {{is_active('clients')}}">
                <a class="nav-link" href="{{route('clients.index')}}">
                    <i class="material-icons">persons</i>
                    <p>@lang('site.clients')</p>
                </a>
            </li>

            <li class="nav-item {{is_active('services')}}">
                <a class="nav-link" href="{{route('services.index')}}">
                    <i class="material-icons">announcement</i>
                    <p>News</p>
                </a>
            </li> 

            <li class="nav-item {{is_active('projects')}}">
                <a class="nav-link" href="{{route('projects.index')}}">
                    <i class="material-icons">tv</i>
                    <p>@lang('site.projects')</p>
                </a>
            </li>

            <li class="nav-item {{is_active('messages')}}">
                <a class="nav-link" href="{{route('messages.index')}}">
                    <i class="material-icons">messages</i>
                    <p>@lang('site.messages')</p>
                </a>
            </li>

            <!-- your sidebar here -->
        </ul>
    </div>
</div>

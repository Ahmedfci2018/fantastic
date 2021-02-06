<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <!-- <h1 class="logo mr-auto"><a href="{{url('/')}}"><span>Com</span>pany</a></h1> -->

      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{ url('/') }}" class="logo mr-auto"><img style="width: 174px;
        height: 92px;
        max-height: 85px;
        margin: -11px;" src="{{asset('fantastic/assets/img/logo.png')}}" alt="" class="img-fluid"></a>

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li class="active"><a href="{{url('/')}}">Home</a></li>
          <li><a href="{{route('front.about')}}">About Us</a></li>
          <li class="drop-down"><a href="">Products</a>
            <ul>
            @foreach(App\Models\Category::all() as $category)
              <li><a href="{{route('front.all_project',$category->id)}}">{{$category->name}}</a></li>
            @endforeach
            </ul>
          </li>

          <li><a href="{{route('front.services')}}">News</a></li>
          <li><a href="{{route('front.contact')}}">Contact Us</a></li>
        </ul>
      </nav><!-- .nav-menu -->

      <i><div id="google_translate_element"></div></i>
      <div id="google_translate_element2" style="display: none!important;"></div>

      <select style="width: 94px;border:none; display: block;margin-inline-start:auto;"  onchange="doGTranslate(this);">
        <option>Language</option>
        <option value="en|en">English</option>

        <option value="en|ar">Arabic</option>

        <!-- <option value="en|fr">French</option> -->

      </select>
      <div class="header-social-links">
        <a  target="_blank" href="#" class="twitter"><i class="icofont-twitter"></i></a>
        <a  target="_blank" href="https://www.facebook.com/Fantastic.Trade/?ref=page_internal" class="facebook"><i class="icofont-facebook"></i></a>
        <a  target="_blank" href="#" class="instagram"><i class="icofont-instagram"></i></a>
        <a target="_blank" href="https://api.whatsapp.com/send?phone=+201012337750" class="linkedin"><i class="icofont-whatsapp"></i></i></a>
      </div>

    </div>
  </header><!-- End Header -->

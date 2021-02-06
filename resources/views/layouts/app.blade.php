<!doctype html>
<html lang="en">

<head>
<meta name="google-site-verification" content="FVs03OvnYny_NU2IbhLnnAAYVTFUGnB0q30M-o8xnp0" />
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title')</title>
    <link rel="icon" href="img/favicon.png">

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <!-- <meta content="Architecture Architect Architectural firm Architectural consultant Architectural design Urban design Interior design Construction Egyptian architects Decoration Planning Facade design " name="description"/>
    <meta content="Architecture Architect Architectural firm Architectural consultant Architectural design Urban design Interior design Construction Egyptian architects Decoration Planning Facade design " name="keywords" /> -->

        <!-- Favicons -->
    <link href="{{asset('fantastic/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('fantastic/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('fantastic/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('fantastic/assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('fantastic/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('fantastic/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('fantastic/assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('fantastic/assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('fantastic/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('fantastic/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('fantastic/assets/css/style.css')}}" rel="stylesheet">

    {{--noty--}}
    <link rel="stylesheet" href="{{asset('assets/plugins/noty/noty.css')}}">
    <script src="{{asset('assets/plugins/noty/noty.min.js')}}"></script>
    <style>
              #goog-gt-tt{
                display: none!important;
                visibility: hidden;
            }
            /*.active {*/
                /*background-color: #0097cf;*/
                /*font-weight: bold;*/
            /*}*/

            .goog-te-banner-frame.skiptranslate{display:none!important;}
            body{top: 0px!important;}

            .list{
                display: flex;
            }
        </style>
    @stack('style')


</head>


<body>
<!-- Navbar -->
@include('layouts.nav-bar')
<!-- End Navbar -->
<div>

    @yield('content')
    @include('partials._session')
    @include('layouts.footer')
</div>
<!-- jquery plugins here-->
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->

  <script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit2"></script>

<script type="text/javascript">
        function googleTranslateElementInit2() {new google.translate.TranslateElement({pageLanguage: 'en',autoDisplay: false}, 'google_translate_element2');}
    </script>
<script>
    var s = document.createElement("script");
s.src = "https://www.googletagmanager.com/gtag/js?id=UA-154651076-1";
$("head").append(s);
window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());

gtag('config', 'UA-154651076-1');
</script>


<script type="text/javascript">
/* <![CDATA[ */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('6 7(a,b){n{4(2.9){3 c=2.9("o");c.p(b,f,f);a.q(c)}g{3 c=2.r();a.s(\'t\'+b,c)}}u(e){}}6 h(a){4(a.8)a=a.8;4(a==\'\')v;3 b=a.w(\'|\')[1];3 c;3 d=2.x(\'y\');z(3 i=0;i<d.5;i++)4(d[i].A==\'B-C-D\')c=d[i];4(2.j(\'k\')==E||2.j(\'k\').l.5==0||c.5==0||c.l.5==0){F(6(){h(a)},G)}g{c.8=b;7(c,\'m\');7(c,\'m\')}}',43,43,'||document|var|if|length|function|GTranslateFireEvent|value|createEvent||||||true|else|doGTranslate||getElementById|google_translate_element2|innerHTML|change|try|HTMLEvents|initEvent|dispatchEvent|createEventObject|fireEvent|on|catch|return|split|getElementsByTagName|select|for|className|goog|te|combo|null|setTimeout|500'.split('|'),0,{}))
/* ]]> */
</script>


  <script src="{{asset('fantastic/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('fantastic/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('fantastic/assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
  <script src="{{asset('fantastic/assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('fantastic/assets/vendor/jquery-sticky/jquery.sticky.js')}}"></script>
  <script src="{{asset('fantastic/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('fantastic/assets/vendor/venobox/venobox.min.js')}}"></script>
  <script src="{{asset('fantastic/assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
  <script src="{{asset('fantastic/assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('fantastic/assets/vendor/aos/aos.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('fantastic/assets/js/main.js')}}"></script>

@stack('script')
</body>

</html>


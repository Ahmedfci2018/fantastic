@extends('layouts.app')

@push('style')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
   .portfolio-container{
       height: auto ;
   }
  </style>
@endpush
@section('title') Fantastic @endsection
@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

      <div class="carousel-inner" role="listbox">

        @foreach ($sliders as $index=>$item)
            <div class="carousel-item {{$index==0 ? 'active':''}}" style="background-image: url({{asset('uploads/slider_images/'.$item->image)}});">
             @if(isset($item->title) &&  $item->title != '')
                <div class="carousel-container">
                <div class="carousel-content animate__animated animate__fadeInUp">
                <h2>{{$item->title}}</h2>
                    <p>{{$item->description}}</p>
                    {{-- <div class="text-center"><a href="about.html" class="btn-get-started">Read More</a></div> --}}
                </div>
                </div>
@endif
            </div>
        @endforeach


      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon bx bx-left-arrow" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon bx bx-right-arrow" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</strong></h2>
        </div>

        <div class="row content">
            <div class="col-lg-4" data-aos="fade-right">
          <img style="width: 98%;    position: sticky;top: 42%;" src="{{asset('fantastic/assets/img/logo.png')}}">
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0" data-aos="fade-left">
              <p>
                  <h5 style="color: #8fb133;font-weight: 900;">About Us:</h5>

                  Fantastic Trade is an Egyptian Corporate in the field of Hospitality supplies, which provides different kinds of local and imported products to Hotels and Cafes.
                  We are specialized in Turkish and Italian Glass products as well as high quality and purity local products. In addition, we provide safe to use natural wooden products including Acrylic, Stainless and Silver, among which we provide Kitchen, Buffet and Patisserie supplies.
              </p>
              <p>
                  <h5 style="color: #8fb133;font-weight: 900;">Mission:</h5>
                  Our Mission is to provide A Class products with reasonable price that matches our local market.
                  We aim to always follow up with our clients and provide them with the best; our services distinguish with accuracy, high-pace and integrity.
                  We guarantee products that are up-to-date, innovative, practical, environmental & human friendly.
              </p>
              <p>
                  <h5 style="color: #8fb133;font-weight: 900;">Vision:</h5>
                  We aim to fulfill our future vision through firstly, by supporting Egyptian Industry; and secondly, by growing our entity and achieving a major expansion.
                  We also aim to reinforce our client's trust and to assure that we always work around the best for our clients. Fantastic Trade success is measured by the success of our clients.
              </p>
              {{-- <ul>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequa</li>
                <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
                <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in</li>
              </ul>
              <p class="font-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p> --}}
            </div>
          </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= News Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

      <div class="section-title">
              <h2>Latest News</h2>
      </div>

        <div class="row">

            @foreach ($news->reverse() as $item)
                <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-box iconbox-blue">
                      <a href="{{route('front.goToNew',$item->id)}}">
                        <img class="img-rounded" src="{{asset('uploads/service_images/'.$item->image)}}" style="width: 100%; height: 200px;margin-bottom: 15px;">
                      </a>
                    <h4><a href="">{{$item->name}}</a></h4>
                    <!-- <p>{{$item->description}}</p> -->
                    </div>
                </div>

            @endforeach

        </div>
        <div style="position: absolute;left: 50%;">
          {!! $news->links() !!}
        </div>
      </div>

    </section><!-- End Services Section -->


    <!-- ======= Portfolio Section ======= -->
    <section style="background: #f7f7f7" id="portfolio" class="portfolio">
        <div class="container" id="table_data">

             @include('front-end.pagination_data')

        </div>
      </section><!-- End Portfolio Section -->

     <!-- ======= Our Clients Section ======= -->
     <section id="clients" class="clients">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>A selection of our references</h2>
          </div>

          <div class="row no-gutters clients-wrap clearfix" data-aos="fade-up">

              @foreach($clients as $client)
                  <div class="col-lg-3 col-md-4 col-6">
                      <div class="client-logo">
                      <img title="{{$client->name}}" style="width: 100%; height: 100%;" src="{{asset('uploads/client_images/'.$client->image)}}" class="img-fluid" alt="">
                      </div>
                  </div>
              @endforeach

          </div>

        </div>
      </section><!-- End Our Clients Section -->

@endsection

@push('script')

<script>
    $(document).ready(function(){

     $(document).on('click', '.pagination a', function(event){
      event.preventDefault();
      var page = $(this).attr('href').split('page=')[1];
      fetch_data(page);
     });

     function fetch_data(page)
     {
      $.ajax({
       url:"/website/fetch_data?page="+page,
       success:function(data)
       {
        $('#table_data').html(data);
       }
      });
     }

    });
    </script>

@endpush


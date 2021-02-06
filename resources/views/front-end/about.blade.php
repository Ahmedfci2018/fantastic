@extends('layouts.app')
@section('title') Fantastic - About Us @endsection
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>About</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>About</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="row content">
          <div class="col-lg-4" data-aos="fade-right">
          <img style="width: 98%;    position: sticky;top: 29%;" src="{{asset('fantastic/assets/img/logo.png')}}">
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

  </main><!-- End #main -->
@endsection

@extends('layouts.app')

@section('title') {{$service->title}} @endsection
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>New Details</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>New Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="portfolio-details-container col-md-6">

          <div class="owl-carousel portfolio-details-carousel">
            <img style="width: 90%; height: 400px;"  src="{{asset('uploads/service_images/'.$service->image)}}" class="img-fluid" alt="">  
          </div>

        </div>

        <div class="portfolio-description col-md-6">
          <h2>{{$service->name}}</h2>
          <p>
            {{$service->description}}
          </p>
        </div>
        </div>

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
@endsection



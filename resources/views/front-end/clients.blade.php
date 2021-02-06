@extends('layouts.app')
@section('title') Fantastic - Clients @endsection
@section('content')
<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Clients</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Clients</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


    {

    <!-- ======= Our Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Clients</h2>
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

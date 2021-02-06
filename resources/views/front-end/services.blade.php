@extends('layouts.app')


@section('title') Fantastic - Services @endsection
@section('content')
<main id="main">

<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2>News</h2>
      <ol>
        <li><a href="{{url('/')}}">Home</a></li>
        <li>News</li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs -->

<!-- ======= News Section ======= -->
<section id="services" class="services section-bg">
  <div class="container" data-aos="fade-up">

  <div class="section-title">
          <h2>News</h2>
  </div>

    <div class="row">

        @foreach ($rows->reverse() as $item)
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
      {{$rows->links()}}
    </div>
  </div>

</section><!-- End Services Section -->



</main><!-- End #main -->

@endsection



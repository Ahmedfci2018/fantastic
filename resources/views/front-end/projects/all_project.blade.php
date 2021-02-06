@extends('layouts.app')

@section('title') Fantastic - All Products @endsection
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Products</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Products</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container">

        <div class="row" data-aos="fade-up">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              @foreach ($selectedTags as $item)
                <li data-filter=".filter-{{$item->tag->id}}">{{$item->tag->name}}</li>
              @endforeach

            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up">

            @foreach ($projects as $item)

                 <div  class="col-lg-2 col-md-6 portfolio-item filter-{{$item->tag->id}}">
                      <a href="{{ route('front.goToProject', $item->id) }}">
                      <img style="height: 180px;width: 160px; border: groove;" src="{{asset('uploads/project_images/'.$item->image)}}" class="img-fluid" alt="">
                      </a>
                      <div class="portfolio-info">
                      <h4>{{$item->title}}</h4>
                      <p>{{$item->price}}</p>
                      <a href="{{asset('uploads/project_images/'.$item->image)}}" data-gall="portfolioGallery" class="venobox preview-link" title="{{$item->title}}"><i class="bx bx-plus"></i></a>
                      <a href="{{ route('front.goToProject', $item->id) }}" class="details-link" title="More Details"><i class="bx bx-link"></i></a>
                      </div>
                  </div>

            @endforeach

        </div>

      <div style="position: absolute;left: 50%;">
      </div>
      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->
  @endsection

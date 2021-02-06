@extends('layouts.app')

@section('title') {{$project->title}} @endsection
@section('content')

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Product Details</h2>
          <ol>
            <li><a href="{{url('/')}}">Home</a></li>
            <li>Product Details</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
      <div class="container" data-aos="fade-up">

      <div class="row">
        <div class="portfolio-details-container col-md-4">
          <div class="owl-carousel portfolio-details-carousel">
            <img style="width: 160px; height: auto;"  src="{{asset('uploads/project_images/'.$project->image)}}" class="img-fluid" alt="">
            @foreach ($project->images as $item)
                <img style="width: 160px; height: auto;" src="{{asset('uploads/project_images/'.$item->image)}}" class="img-fluid" alt="">
            @endforeach
          </div>
        </div>
          <div class="portfolio-info col-md-8">
            <h3>Product information</h3>
            <ul>
              <li><strong>Category</strong>: {{$project->category->name}}</li>
              <li><strong>Description</strong>: {{$project->description}}</li>
              <!-- <li><strong>Tag</strong>: {{$project->tag->name}}</li> -->
              <li><strong>Code</strong>: <span style="color: #a6ce39;" >{{$project->code}}</span></li>
              @if (isset($project->catalog) && $project->catalog !='')
                <li><strong>Catalog</strong>: <a target="_blank" href="{{asset('uploads/products_catalog/'.$project->catalog)}}" >download</a></li>
              @endif


            </ul>
          </div>
        
        </div>

        <!-- <div class="portfolio-description">
          <h2>{{$project->title}}</h2>
          <p>
            {{$project->description}}
          </p>
        </div> -->

      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->
@endsection



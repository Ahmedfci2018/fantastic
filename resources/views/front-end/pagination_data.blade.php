
    <div class="section-title">
        <h2>Latest Products</strong></h2>
      </div>
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

  <div class="row portfolio-container" style="height: auto !important"  data-aos="fade-up">

    @foreach ($data->reverse() as $item)

        <div  class="col-lg-2 col-md-6 portfolio-item filter-{{$item->tag->id}}">
            <a href="{{ route('front.goToProject', $item->id) }}">
            <img style="height: 180px;width: 160px; border: ridge;" src="{{asset('uploads/project_images/'.$item->image)}}" class="img-fluid" alt="">
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
    {!! $data->links() !!}

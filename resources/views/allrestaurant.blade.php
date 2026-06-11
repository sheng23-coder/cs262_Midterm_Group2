@extends ('layout.header1')
@section('content')


</div>

<section class="about_section layout_padding">

    <div class="container">

        <div class="heading_container heading_center mb-5">
            <h2 class="text-white">All Restaurants</h2>
            <p class="text-white">
                Here are all the restaurants available.
            </p>
        </div>

        <!-- KHMER -->
        <h3 class="text-white mb-4">🇰🇭 Khmer Restaurants</h3>

        <div class="row g-4 mb-5">
            @foreach($restaurants->where('cuisine_type', 'Khmer') as $r)
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow h-100">

                        <img src="{{ $r->image_path ? asset('storage/'.$r->image_path) : asset('images/r1.jpg') }}"
                             class="card-img-top"
                             style="height:220px; object-fit:cover;">

                        <div class="card-body text-center">
                            <h4>{{ $r->name }}</h4>
                            <p>{{ $r->description }}
                                @php $avg = $r->reviews->count() > 0 ? round($r->reviews->avg('rating')) : 0; @endphp
<div class="mb-2">
    @for($i = 1; $i <= 5; $i++)
        <i class="fa fa-star{{ $i <= $avg ? '' : '-o' }}" style="color:#f5a623;"></i>
    @endfor
    <small style="color:#666;">({{ $r->reviews->count() }} reviews)</small>
</div>
                            </p>

                            <a href="/restaurant/{{ $r->id }}"
                               class="btn btn-success">
                                View Details
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- KOREAN -->
        <h3 class="text-white mb-4">🇰🇷 Korean Restaurants</h3>

        <div class="row g-4 mb-5">
            @foreach($restaurants->where('cuisine_type', 'Korean') as $r)
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow h-100">

                        <img src="{{ $r->image_path ? asset('storage/'.$r->image_path) : asset('images/r1.jpg') }}"
                             class="card-img-top"
                             style="height:220px; object-fit:cover;">

                        <div class="card-body text-center">
                            <h4>{{ $r->name }}</h4>
                            <p>{{ $r->description }}</p>

                            <a href="/restaurant/{{ $r->id }}"
                               class="btn btn-success">
                                View Details
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- JAPANESE -->
        <h3 class="text-white mb-4">🇯🇵 Japanese Restaurants</h3>

        <div class="row g-4 mb-5">
            @foreach($restaurants->where('cuisine_type', 'Japanese') as $r)
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow h-100">

                        <img src="{{ $r->image_path ? asset('storage/'.$r->image_path) : asset('images/r1.jpg') }}"
                             class="card-img-top"
                             style="height:220px; object-fit:cover;">

                        <div class="card-body text-center">
                            <h4>{{ $r->name }}</h4>
                            <p>{{ $r->description }}
                                @php $avg = $r->reviews->count() > 0 ? round($r->reviews->avg('rating')) : 0; @endphp
<div class="mb-2">
    @for($i = 1; $i <= 5; $i++)
        <i class="fa fa-star{{ $i <= $avg ? '' : '-o' }}" style="color:#f5a623;"></i>
    @endfor
    <small style="color:#666;">({{ $r->reviews->count() }} {{ $r->reviews->count() == 1 ? 'review' : 'reviews' }})</small>
</div>
                            </p>

                            <a href="/restaurant/{{ $r->id }}"
                               class="btn btn-success">
                                View Details
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

        <!-- CHINESE -->
        <h3 class="text-white mb-4">🇨🇳 Chinese Restaurants</h3>

        <div class="row g-4 mb-5">
            @foreach($restaurants->where('cuisine_type', 'Chinese') as $r)
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow h-100">

                        <img src="{{ $r->image_path ? asset('storage/'.$r->image_path) : asset('images/r1.jpg') }}"
                             class="card-img-top"
                             style="height:220px; object-fit:cover;">

                        <div class="card-body text-center">
                            <h4>{{ $r->name }}</h4>
                            <p>{{ $r->description }}
                                @php $avg = $r->reviews->count() > 0 ? round($r->reviews->avg('rating')) : 0; @endphp
<div class="mb-2">
    @for($i = 1; $i <= 5; $i++)
        <i class="fa fa-star{{ $i <= $avg ? '' : '-o' }}" style="color:#f5a623;"></i>
    @endfor
    <small style="color:#666;">({{ $r->reviews->count() }} {{ $r->reviews->count() == 1 ? 'review' : 'reviews' }})</small>
</div>
                            </p>

                            <a href="/restaurant/{{ $r->id }}"
                               class="btn btn-success">
                                View Details
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>
    <h3 class="text-white mb-4">🍽️ Other Restaurants</h3>

        <div class="row g-4 mb-5">
            @foreach($restaurants->where('cuisine_type', 'Other') as $r)
                <div class="col-lg-3 col-md-6">
                    <div class="card shadow h-100">

                        <img src="{{ $r->image_path ? asset('storage/'.$r->image_path) : asset('images/r1.jpg') }}"
                             class="card-img-top"
                             style="height:220px; object-fit:cover;">

                        <div class="card-body text-center">
                            <h4>{{ $r->name }}</h4>
                            <p>{{ $r->description }}
                                @php $avg = $r->reviews->count() > 0 ? round($r->reviews->avg('rating')) : 0; @endphp
<div class="mb-2">
    @for($i = 1; $i <= 5; $i++)
        <i class="fa fa-star{{ $i <= $avg ? '' : '-o' }}" style="color:#f5a623;"></i>
    @endfor
    <small style="color:#666;">({{ $r->reviews->count() }} {{ $r->reviews->count() == 1 ? 'review' : 'reviews' }})</small>
</div>
                            </p>

                            <a href="/restaurant/{{ $r->id }}"
                               class="btn btn-success">
                                View Details
                            </a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    </div>

</section>

<section class="app_section">
  <div class="container">
    <div class="col-md-9 mx-auto">
      <div class="row">

        <div class="col-md-7 col-lg-8">
          <div class="detail-box">

            <h2>
              <span> Get the</span> <br>
              Delfood App
            </h2>

            <p>
              Discover the best restaurants in Phnom Penh with Delfood App. 
              Explore Khmer, Chinese, Japanese, and Korean cuisines, browse restaurant recommendations, 
              check restaurant locations and opening hours, and find your next favorite place to eat anytime.
            </p>

            <div class="app_btn_box">

              <a href="" class="mr-1">
                <img src="images/google_play.png" class="box-img" alt="">
              </a>

              <a href="">
                <img src="images/app_store.png" class="box-img" alt="">
              </a>

            </div>

            <a href="" class="download_btn">
              Download Now
            </a>

          </div>
        </div>

        <div class="col-md-5 col-lg-4">
          <div class="img-box">
            <img src="images/mobile.png" class="box-img" alt="">
          </div>
        </div>

      </div>
    </div>
  </div>
</section>


<!-- footer section -->

<footer class="footer_section">
  <div class="container">

    <p>
      &copy; <span id="displayYear"></span> All Rights Reserved By
      Delfood Team <br>

      Discover Restaurants • Explore Foods • Enjoy Dining
    </p>

  </div>
</footer>


    <!-- footer section -->

  </div>
  <!-- jQery -->
 
      <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- slick  slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha256-Zr3vByTlMGQhvMfgkQ5BtWRSKBGa2QlspKYJnkjZTmo=" crossorigin="anonymous"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
 

</body>

</html>
@endsection


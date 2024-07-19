@extends('layouts.public.app')

@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
  <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

    <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    <div class="carousel-inner" role="listbox">
      @if (!empty($home->hero))
        <!-- Slide 1 -->
        <div class="carousel-item active">
          <br><br>
          <img src="{{ asset('storage/'.$home->hero) }}" class="d-block w-100" alt="">
        </div>
      @else
        <div class="carousel-item active">
        <br><br><br><br>
        <br><br><br><br>
          <h1 style="color:white; text-align:center;">Data not available.</h1>
        </div>
      @endif

    </div>

  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= Recent Photos Section ======= -->
  <section id="recent-photos" class="recent-photos">
    <div class="container">

      <div class="section-title">
        <h2>Recent Photos</h2>
        @if (!empty($home->deskripsi))
          <p>{{ $home->deskripsi }}</p>
        @else
          <h1>Data not available.</h1>
        @endif
      </div>

      <div class="recent-photos-slider swiper">
        <div class="swiper-wrapper align-items-center">
          @if (!empty($home->foto1))
            <div class="swiper-slide">
              <a href="{{ asset('storage/'.$home->foto1) }}" class="glightbox">
                <img src="{{ asset('storage/'.$home->foto1) }}" class="img-fluid" alt="">
              </a>
            </div>
          @endif
          <div class="swiper-slide"><a href="{{('img/recent-photos/-photos-1.jpg')}}" class="glightbox"><img src="{{('img/recent-phot-photos-1.jpg')}}" class="img-fluid" alt=""></a></div>
          
          @if (!empty($home->foto2))
            <div class="swiper-slide">
              <a href="{{ asset('storage/'.$home->foto2) }}" class="glightbox">
                <img src="{{ asset('storage/'.$home->foto2) }}" class="img-fluid" alt="">
              </a>
            </div>
          @endif
          
          @if (!empty($home->foto3))
            <div class="swiper-slide">
              <a href="{{ asset('storage/'.$home->foto3) }}" class="glightbox">
                <img src="{{ asset('storage/'.$home->foto3) }}" class="img-fluid" alt="">
              </a>
            </div>
          @endif

          @if (empty($home->foto1) && empty($home->foto2) && empty($home->foto3))
            <div class="swiper-slide">
              <h1>No recent photos available.</h1>
            </div>
          @endif
          
        </div>
        <div class="swiper-pagination"></div>
      </div>

    </div>
  </section><!-- End Recent Photos Section -->

</main><!-- End #main -->

@endsection

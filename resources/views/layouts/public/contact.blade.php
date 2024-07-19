@extends('layouts.public.app')

@section('content')
<br><br><br>
<!-- ======= Contact Us Section ======= -->
<section id="contact-us" class="contact-us">
  <div class="container">

    <div>
      <iframe style="border:0; width: 100%; height: 270px;" src="https://maps.google.com/maps?q=universitas+mercu+buana+yogyakarta&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" allowfullscreen></iframe>
    </div>

    <div class="row mt-5">
      <div class="col-lg-4">
        <div class="info">
          @if($contact)
          <div class="address mb-4">
            <i class="bi bi-geo-alt"></i>
            <h4>Location:</h4>
            <p>{{ $contact->location }}</p>
          </div>

          <div class="email mb-4">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>{{ $contact->email }}</p>
          </div>

          <div class="phone mb-4">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>{{ $contact->phone }}</p>
          </div>
          @else
          <div class="address mb-4">
            <i class="bi bi-geo-alt"></i>
            <h4>Location:</h4>
            <p>Data not available</p>
          </div>

          <div class="email mb-4">
            <i class="bi bi-envelope"></i>
            <h4>Email:</h4>
            <p>Data not available</p>
          </div>

          <div class="phone mb-4">
            <i class="bi bi-phone"></i>
            <h4>Call:</h4>
            <p>Data not available</p>
          </div>
          @endif
        </div>
      </div>

      <div class="col-lg-8 mt-5 mt-lg-0">
        @if(session('success'))
        <div class="alert alert-success">
          {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
          {{ session('error') }}
        </div>
        @endif

        <form action="{{ route('email.store') }}" method="POST">
          @csrf
          <div class="row">
            <div class="col-md-6 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              <div class="validate"></div>
            </div>
            <div class="col-md-6 form-group mt-3 mt-md-0">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              <div class="validate"></div>
            </div>
          </div>
          <div class="form-group mt-3">
            <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            <div class="validate"></div>
          </div>
          <div class="form-group mt-3">
            <textarea class="form-control" name="new_message" rows="5" placeholder="Message" required></textarea>
            <div class="validate"></div>
          </div>

          <div><button class="btn btn-primary btn-lg text-center" type="submit">Send Message</button></div>
        </form>
      </div>
    </div>
  </div>
</section><!-- End Contact Us Section -->
@endsection
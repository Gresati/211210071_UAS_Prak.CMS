@extends('layouts.public.app')

@section('content')
<section id="event-list" class="event-list">
  <br><br><br>
  <div class="container">
    <div class="row justify-content-center text-center"> <!-- Menambahkan class justify-content-center dan text-center -->
      @forelse($profiles as $profile)
      <div class="col-md-6 mb-4"> <!-- Menggunakan class mb-4 untuk memberikan margin bottom -->
        <div class="card mx-auto"> 
          <img src="{{ asset('images/' . $profile->image) }}" class="card-img-top img-fluid" alt="Profile Image">
          <div class="card-body">
            <h5 class="card-title">{{ $profile->name }}</h5>
            <p class="fst-italic">{{ $profile->ttl }}</p>
            <p class="card-text">{{ $profile->description }}</p>
            <p class="card-text">
              <strong>Soft Skill:</strong><br>
              @foreach(explode(',', $profile->soft_skill) as $skill)
              - {{ $skill }} <br>
              @endforeach
              <br>
              <strong>Hard Skill:</strong><br>
              @foreach(explode(',', $profile->hard_skill) as $skill)
              - {{ $skill }} <br>
              @endforeach
            </p>
          </div>
        </div>
      </div>
      @empty
      <div class="col-md-12 text-center">
        <h1>Data not available.</h1>
      </div>
      @endforelse
    </div>
  </div>
</section><!-- End Event List Section -->
@endsection

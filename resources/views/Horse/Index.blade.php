@extends('main')
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <main id="main">

<!-- ======= Breadcrumbs ======= -->
<div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/team-header.jpg');">
  <div class="container position-relative d-flex flex-column align-items-center">

    <h2>Horses</h2>
    <ol>
      <li><a href="/competitions">Competitions</a></li>
      <li><a href="/riders">Riders</a></li>
    </ol>

  </div>
</div><!-- End Breadcrumbs -->
    
@section('navbar')
@endsection
@section('content')
<main id="hero">
    <!-- ======= Horse Section ======= -->
    <section id="team" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>My horses</h2>
        </div>

        <div class="row gy-4">
        @foreach($models as $model)
          <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="team-member">
              <div class="member-img">
                <img src="{{ $model->PhotoURL}}" class="horse-img">
                <div class="social">
                  <a href="{{ url()->current()}}/edit/{{ $model->Id}}">Edit</a>
                  <a href="{{ url()->current()}}/delete/{{ $model->Id}}" onclick="return confirm('Are you sure you want to delete this horse?')">Delete</a>
                </div>
              </div>
              <div class="member-info">
                <h4>{{ $model->Name}}</h4>
                <span>{{ $model->Gender}}</span>
                <span>{{ $model->Coat}}</span>
                <span>{{ $model->Height}} cm</span>
                <span>{{ $model->Birthdate}}</span>
                <span>{{ $model->age() }} years</span>
              </div>             
            </div>
          </div>
          <!-- End Horse Info -->
          @endforeach
        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->
@endsection
@section('scripts')
@endsection
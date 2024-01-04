@extends('main')
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
       
        
@section('content')           
  
<body class="page-index">

@section('navbar')
@endsection

<section id="hero" class="hero d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-xl-4">
        <h2 data-aos="fade-up">Focus On What Matters</h2>
        <blockquote data-aos="fade-up" data-aos-delay="100">
          <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perspiciatis cum recusandae eum laboriosam voluptatem repudiandae odio, vel exercitationem officiis provident minima. </p>
        </blockquote>
        <div class="d-flex" data-aos="fade-up" data-aos-delay="200">
          <a href="/competition-entries/create" class="btn-get-started">Enter Competition</a>
        </div>

      </div>
    </div>
  </div>
</section>
           
    </body>
</html>
@endsection
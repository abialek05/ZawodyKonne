@extends('main')
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <main id="main" class="main">
    <link href="{{ asset('css/adminstyle.css') }}" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
@section('navbar')
@endsection
@section('content')
<div class="pagetitle">
  <h1>Competitions</h1>

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class="card-body">
          <div class="datatable-top">
            <div>
              <div class="mx-auto pull-right">
                <div class="">
                  <form action="{{ route('competition-entries.index') }}" method="GET" role="search">

                    <div class="input-group">

                      <input type="text" class="datatable-input" name="item" placeholder="Search by name" id="item">
                      <a href="{{ route('competition-entries.index') }}" class=" mt-1">
                      </a> 
                      <div style="margin:auto; padding: 10px">  
                      <a href="/competition-entries">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#212529" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41zm-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9z"></path>
                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5.002 5.002 0 0 0 8 3zM3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9H3.1z"></path>
                          </svg></a>
                        </div>                                       
                    </div>                  
                  </form>
                </div>
              </div>
            </div>
            <table class="table datatable">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Competition</th>
                  <th scope="col">Rider</th>
                  <th scope="col">Horse</th>
                  <th scope="col">Start Date</th>
                  <th scope="col">End Date</th>
                </tr>
              </thead>
              <tbody>
                @php
                $counter = 1;
                @endphp
                @foreach($models as $model)
                <tr>
                  <th scope="row">{{ $counter }}</th>
                  @foreach ($model->CompetitionEntries as $competition)
                  <td>{{ $competition->Competition->Name}}</td>
                  @endforeach
                  @foreach ($model->CompetitionEntries as $rider)
                  <td>{{ $rider->Rider->Name }} {{ $rider->Rider->Surname }}</td>
                  @endforeach
                  @foreach ($model->CompetitionEntries as $horse)
                  <td>{{ $horse->Horse->Name }}</td>
                  @endforeach
                  @foreach ($model->CompetitionEntries as $competition)
                  <td>{{ $competition->Competition->StartDate}}</td>
                  <td>{{ $competition->Competition->EndDate}}</td>
                  @endforeach
                  <td><a href="{{ url()->current()}}/edit/{{ $model->Id}}" class="btn btn-primary">Edit</a>
                    <a href="{{ url()->current()}}/delete/{{ $model->Id}}" onclick="return confirm('Are you sure you want to delete this rider?')" class="btn btn-danger">Delete</a>
                  </td>
                </tr>
                @php
                $counter++;
                @endphp
                @endforeach

              </tbody>
            </table>
          </div>
        </div>

      </div>
    </div>
</section>
</main>

</html>
@section('scripts')
<script>
  // Czekamy na zaladowanie
  $(document).ready(function() {
    // Dodajemy nasluchiwanie na input
    $('#searchInput').on('input', function() {
      // Pobieramy zapytanie z searcha
      var query = $(this).val();

      // Ajax request do serwera
      $.ajax({
        url: '{{ route("competition.search") }}',
        type: 'POST',
        data: {
          _token: $('meta[name="csrf-token"]').attr('content'),
          query: query
        },
        success: function(response) {
          $('#competitionTable tbody').html(response);
        }
      });
    });
  });
</script>

@endsection
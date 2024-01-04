@extends('main')
<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    @section('navbar')
    @endsection

    @section('content')
    <div class="breadcrumbs d-flex align-items-center" style="background-image: url('assets/img/team-header.jpg');">
        <div class="container position-relative d-flex flex-column align-items-center">

            <h2>Add new horse</h2>


        </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-6" style="margin: auto;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Competition Entry</h5>
                        <form method="POST" onsubmit="return checkForm()">
                            @csrf
                            <div class="row mb-3">
                                <label for="CompetitionId" class="col-sm-2 col-form-label">Competition:</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="CompetitionId" id="CompetitionId">
                                        <option value="">Choose the competition</option>
                                        @foreach ($competitions as $competition)
                                        <option value="{{ $competition->Id }}">{{ $competition->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="RiderId" class="col-sm-2 col-form-label">Rider:</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="RiderId" id="RiderId">
                                        <option value="">Choose the rider</option>
                                        @foreach ($riders as $rider)
                                        <option value="{{ $rider->Id }}">{{ $rider->Name }} {{ $rider->Surname }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="HorseId" class="col-sm-2 col-form-label">Horse:</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="HorseId" id="HorseId">
                                    <option value="">Choose the horse</option>
                                        @foreach ($horses as $horse)
                                        <option value="{{ $horse->Id }}">{{ $horse->Name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Accommodation" class="col-sm-2 col-form-label">Accommodation:</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="Accommodation" id="Accommodation">
                                        <option value="">Choose the accommodation option.</option>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Phone:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control validate" onchange="validateModel('Phone');" name="Phone" id="Phone">
                                    <span id="Phone-error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="PaymentType" class="col-sm-2 col-form-label">Payment Type:</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="PaymentType" id="PaymentType">
                                        <option value="">Choose the payment option.</option>
                                        <option value="Credit Card">Credit Card</option>
                                        <option value="PayPal">PayPal</option>
                                        <option value="PayU">PayU</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" id="button">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

        @endsection
        @section("scripts")
        <script>
            function checkForm() {
                // funkcja sprawdzajaca czy formularz zostal poprawnie wypelniony
                if (document.forms[0].Accomodation.value === '' ||document.forms[0].RiderId.value === '' || document.forms[0].CompetitionId.value === '' || document.forms[0].HorseId.value === '' || document.forms[0].Phone.value === '' || document.forms[0].PaymentType.value === '') {
                    alert('Fill out all information before submitting');
                    return false;
                }   
            }
        </script>

        @endsection
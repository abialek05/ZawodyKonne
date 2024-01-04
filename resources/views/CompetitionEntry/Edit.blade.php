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
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-6" style="margin: auto;">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">New Competition Entry</h5>
                        <form action="{{ route('competition-entries.update', ['id' => $model->Id]) }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="CompetitionId" class="col-sm-2 col-form-label">Competition:</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="CompetitionId" id="CompetitionId">
                                        @foreach ($competitions as $competition)
                                        <option value="{{ $competition->Id }}" {{ $model->CompetitionId == $competition->Id ? 'selected' : '' }}>
                                            {{ $competition->Name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="RiderId" class="col-sm-2 col-form-label">Rider:</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="RiderId" id="RiderId">
                                        @foreach ($riders as $rider)
                                        <option value="{{ $rider->Id }}" {{ $model->RiderId == $rider->Id ? 'selected' : '' }}>
                                            {{ $rider->Name }} {{ $rider->Surname }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="HorseId" class="col-sm-2 col-form-label">Horse:</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="HorseId" id="HorseId">
                                        @foreach ($horses as $horse)
                                        <option value="{{ $horse->Id }}" {{ $model->HorseId == $horse->Id ? 'selected' : '' }}>
                                            {{ $horse->Name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Accommodation" class="col-sm-2 col-form-label">Accommodation:</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="Accommodation" id="Accommodation">
                                        <option value="Yes" {{ $model->Accommodation == 'Yes' ? 'selected' : '' }}>Yes</option>
                                        <option value="No" {{ $model->Accommodation == 'No' ? 'selected' : '' }}>No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="Phone" class="col-sm-2 col-form-label">Phone:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control validate" onchange="validateModel('Phone');" name="Phone" id="Phone" value="{{ $model->Phone }}">
                                    <span id="Phone-error" class="text-danger"></span>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="PaymentType" class="col-sm-2 col-form-label">Payment Type:</label>
                                <div class="col-sm-10">
                                    <select class="form-select" name="PaymentType" id="PaymentType">
                                        <option value="Credit Card" {{ $model->PaymentType == 'Credit Card' ? 'selected' : '' }}>Credit Card</option>
                                        <option value="PayPal" {{ $model->PaymentType == 'PayPal' ? 'selected' : '' }}>PayPal</option>
                                        <option value="PayU" {{ $model->PaymentType == 'PayU' ? 'selected' : '' }}>PayU</option>
                                    </select>
                                </div>
                            </div>                            
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" id="button">Save</button>
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
                if (document.forms[0].Accommodation.value === '' || document.forms[0].RiderId.value === '' || document.forms[0].CompetitionId.value === '' || document.forms[0].HorseId.value === '' || document.forms[0].Phone.value === '' || document.forms[0].PaymentType.value === '') {
                    alert('Fill out all information before submitting');
                    return false;
                }
            }
        </script>

        @endsection
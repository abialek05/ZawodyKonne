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

  <h2>Editing {{ $model->Name }} information</h2>
    

  </div>
<section class="section">
      <div class="row">
        <div class="col-lg-6" style="margin: auto;">

          <div class="card">    
            <div class="card-body">
              <form method="POST" action="/competitions/update/{{ $model->Id }}" onsubmit="return checkForm()">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="Name" class="form-control validate" id="Name" onblur="validateModel('Name');" value="{{ $model->Name }}">       
                    <span id="Name-error" class="text-danger"></span>             
                  </div>                  
                </div>                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Type</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="Type">
                      <option value="">Choose competition type</option>
                      <option value="Eventing">Eventing</option>
                      <option value="Show Jumping">Show Jumping</option>
                      <option value="Dressage">Dressage</option>
                      <option value="Horse Racing">Horse Racing</option>
                      <option value="Barrel Racing">Barrel Racing</option>
                      <option value="Horse Polo">Horse Polo</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Number of spots</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="Spots" id="Spots" value="{{ $model->Spots }}"> 
                  </div>
                </div>               
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Start date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control validate" onchange="validateModel('StartDate');" name="StartDate" id="StartDate" value="{{ $model->StartDate }}">
                    <span id="StartDate-error" class="text-danger"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">End date</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control validate" onchange="validateModel('EndDate');" name="EndDate" id="EndDate" value="{{ $model->EndDate }}">
                    <span id="EndDate-error" class="text-danger"></span>
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

@endsection
@section("scripts")

<script> 
function validateModel(propertyId)
{

    var element = document.getElementById(propertyId);

    var value = element.value;

    $.ajax(

        {

            url: "/competitions/validateModel",



            type: "POST",



            dataType: "json",



            data: {

                property: propertyId,

                value: value,

                _token: document.getElementsByName("_token")[0].value

            },



            success: function(data) {

                if (data.error == "") {

                    document.getElementById(propertyId).classList.remove("invalid");

                }

                else {

                    document.getElementById(propertyId).classList.add("invalid");

                }

                document.getElementById(propertyId+"-error").innerHTML = data.error;

            }

        }

    )

}
function checkForm() {
				// funkcja sprawdzajaca czy formularz zostal poprawnie wypelniony
        if (document.forms[0].Name.value === '' || document.forms[0].Type.value === '' || document.forms[0].Spots.value === '' || document.forms[0].StartDate.value === '' || document.forms[0].EndDate.value === '') {
            alert('Fill out all information before submitting');
            return false;
          }         
           // Start date nie może być dalsze, niz end date          
          var startTime = document.getElementById("StartDate").value
          var endTime = document.getElementById("EndDate").value
          if (startTime > endTime) {
            alert('Start date cannot be further than the end date.')
            return false;
          }         
          // minimum 10 miejsc
          if (document.forms[0].Spots.value < 10) {
            alert('There should be at least 10 spots.');
            return false;
          } 
        }
</script>

@endsection
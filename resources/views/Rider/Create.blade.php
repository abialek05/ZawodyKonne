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

    <h2>Add new rider</h2>
    

  </div>
</div>
<section class="section">
      <div class="row">
        <div class="col-lg-6" style="margin: auto;">

          <div class="card">    
            <div class="card-body">
              <h5 class="card-title">New Rider Creation</h5>

              <form method="POST" action="/riders/create" onsubmit="return checkForm()">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="Name" class="form-control validate" id="Name" onblur="validateModel('Name');" value="{{ $model->Name }}">       
                    <span id="Name-error" class="text-danger"></span>             
                  </div>                  
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Surname</label>
                  <div class="col-sm-10">
                  <input type="text" name="Surname" class="form-control validate" id="Surname" onblur="validateModel('Surname');" value="{{ $model->Surname }}"> 
                  <span id="Surname-error" class="text-danger"></span>                       
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputDate" class="col-sm-2 col-form-label">Date of birth</label>
                  <div class="col-sm-10">
                    <input type="date" class="form-control validate" onchange="validateModel('Birthdate');" name="Birthdate" id="Birthdate" value="{{ $model->Birthdate }}">
                    <span id="Birthdate-error" class="text-danger"></span>
                  </div>
                </div>                
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Gender</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="Gender">
                    <option value="">Choose rider gender</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Country</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="Country" id="Country" value="{{ $model->Country }}"> 
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Rider's Club</label>
                  <div class="col-sm-10">
                    <input type="text" name="RidersClub" class="form-control" id="RidersClub" value="{{ $model->RidersClub }}">                    
                  </div>
                </div>     
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Link to photo</label>
                  <div class="col-sm-10">
                    <input type="text" name="PhotoURL" class="form-control" id="PhotoURL" value="{{ $model->PhotoURL }}">                    
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

@endsection
@section("scripts")

<script> 
function validateModel(propertyId)
{

    var element = document.getElementById(propertyId);

    var value = element.value;

    $.ajax(

        {

            url: "/riders/validateModel",



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
                if (document.forms[0].Name.value === '' || document.forms[0].Surname.value === '' || document.forms[0].Birthdate.value === '' || document.forms[0].Gender.value === '' || document.forms[0].Country.value === '' || document.forms[0].RidersClub.value === '' || document.forms[0].PhotoURL.value === '') {
                    alert('Fill out all information before submitting');
                    return false;
                }
            }
</script>

@endsection
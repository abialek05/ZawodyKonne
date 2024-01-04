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
              <h5 class="card-title">New Horse Creation</h5>

              <form method="POST" action="/horses/create" onsubmit="return checkForm()">
                @csrf
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" name="Name" class="form-control validate" id="Name" onblur="validateModel('Name');" value="{{ $model->Name }}">       
                    <span id="Name-error" class="text-danger"></span>             
                  </div>                  
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Mother's Name</label>
                  <div class="col-sm-10">
                  <input type="text" name="MotherName" class="form-control validate" id="MotherName" onblur="validateModel('MotherName');" value="{{ $model->MotherName }}"> 
                  <span id="MotherName-error" class="text-danger"></span>                       
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Father's Name</label>
                  <div class="col-sm-10">
                  <input type="text" name="FatherName" class="form-control validate" id="FatherName" onblur="validateModel('FatherName');" value="{{ $model->FatherName }}">
                  <span id="FatherName-error" class="text-danger"></span>
                  </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Gender</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="Gender">
                      <option value="">Choose horse gender</option>
                      <option value="Mare">Mare</option>
                      <option value="Stallion">Stallion</option>
                      <option value="Gelding">Gelding</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputNumber" class="col-sm-2 col-form-label">Height (in centimeters)</label>
                  <div class="col-sm-10">
                    <input type="number" class="form-control" name="Height" id="Height" value="{{ $model->Height }}"> 
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Race</label>
                  <div class="col-sm-10">
                    <input type="text" name="Race" class="form-control" id="Race" value="{{ $model->Race }}">                    
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Coat</label>
                  <div class="col-sm-10">
                    <input type="text" name="Coat" class="form-control" id="Coat" value="{{ $model->Coat }}">                    
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
                  <label for="inputText" class="col-sm-2 col-form-label">Birth Country</label>
                  <div class="col-sm-10">
                    <input type="text" name="Country" class="form-control" id="Country" value="{{ $model->Country }}">                    
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

            url: "/horses/validateModel",



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
                if (document.forms[0].Name.value === '' || document.forms[0].MotherName.value === '' || document.forms[0].FatherName.value === '' || document.forms[0].Coat.value === '' || document.forms[0].Country.value === '' || document.forms[0].Gender.value === '' || document.forms[0].Height.value === '' || document.forms[0].Race.value === '' || document.forms[0].PhotoURL.value === '' || document.forms[0].Birthdate.value === '') {
                    alert('Fill out all information before submitting');
                    return false;
                }
            }
</script>

@endsection
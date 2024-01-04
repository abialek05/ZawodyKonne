<?php

namespace App\Http\Controllers;

use App\Models\Competition;
use App\Models\CompetitionEntry;
use App\Models\Horse;
use App\Models\Rider;
use DateInterval;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class HorseController extends Controller
{
    public function index()
    {
        $models = Horse::where("IsActive", "=", true)->get();        
        return view("Horse.Index", ["models" => $models]); //to jest sciezka do naszego widoku
    }

    public function edit($id)
    {
        $model = Horse::find($id);
        return view("Horse.Edit", ["model" => $model]);
    }
    public function update($id, Request $request)
    {
        $model = Horse::find($id);
        $model->Name = $request->input("Name");
        $model->MotherName = $request->input("MotherName");
        $model->FatherName = $request->input("FatherName");
        $model->Gender = $request->input("Gender");
        $model->Height = $request->input("Height");
        $model->Race = $request->input("Race");
        $model->Birthdate = $request->input("Birthdate");
        $model->Coat = $request->input("Coat");
        $model->Country = $request->input("Country");
        $model->PhotoURL = $request->input("PhotoURL");

        $model->save();
        return redirect("/horses");

    }

    public function delete($id)
    {
        $model = Horse::find($id);
        $model->IsActive = false;
        $model->save();
        return redirect("/horses");
    }
    public function create()
    {
        $model = new Horse();
        $model->Birthdate = date("Y-m-d");
        return view("Horse.Create", ["model" => $model]);
    }
    public function addToDB(Request $request)
    {
       
        $model = new Horse();
        $model->Name = $request->input("Name");
        $model->MotherName = $request->input("MotherName");
        $model->FatherName = $request->input("FatherName");
        $model->Gender = $request->input("Gender");
        $model->Height = $request->input("Height");
        $model->Race = $request->input("Race");
        $model->Birthdate = $request->input("Birthdate");
        $model->Coat = $request->input("Coat");
        $model->Country = $request->input("Country");
        $model->PhotoURL = $request->input("PhotoURL");
        $model->IsActive = true;
        
        $model->save();
        return redirect("/horses"); 
    }

    public function validateModel(Request $request)
    {
        $value = $request->input("value");
        if($request->input("property") == "Name")
        {
            if(empty($value)) //sprawdzamy czy podana wartosc nie jest pusta
            return response()->json(["error"=>"Name cannot be empty"]);
            if (!preg_match('/^[A-Z]/', $value)) //sprawdzamy czy imie zaczyna sie z duzej litery
             {
                return response()->json(["error" => "Name must start with an uppercase letter"]);
            }
            else
            return response()->json(["error"=>""]);
        }
        if($request->input("property") == "MotherName")
        {
            if(empty($value))
            return response()->json(["error"=>"Mother's name cannot be empty"]);
            if (!preg_match('/^[A-Z]/', $value)) {
                return response()->json(["error" => "Mother's name must start with an uppercase letter"]);
            }
            else
            return response()->json(["error"=>""]);
        }
        if($request->input("property") == "FatherName")
        {
            if(empty($value))
            return response()->json(["error"=>"Father's name cannot be empty"]);
            if (!preg_match('/^[A-Z]/', $value)) {
                return response()->json(["error" => "Father's name must start with an uppercase letter"]);
            }
            else
            return response()->json(["error"=>""]);
        }
        if($request->input("property") == "Birthdate")
        {
            $currentDate = new DateTime(); // pobieramy aktualna date
            $birthdate = DateTime::createFromFormat('Y-m-d', $value); // tworzymy obiekt DateTime dla pobieranej wartosci
        
            $fourYearsAgo = clone $currentDate;
            $fourYearsAgo->sub(new DateInterval('P4Y')); // Odejmujemy 4 lata od aktualnej daty            
        
            if($birthdate > $currentDate) //sprawdzamy czy wybrana data nie wybiega w przyszlosc
            return response()->json(["error"=>"Date of birth cannot be further than today."]);          
            if ($birthdate > $fourYearsAgo) //sprawdzamy czy kon nie jest mlodszy niz 4 lata
            {
                return response()->json(["error" => "Your horse must be older than 4 to participate in the competitions."]);
            }              
            else
            return response()->json(["error"=>""]);
        }
        else
            return response()->json(["error"=>""]);
    }

        
}




<?php

namespace App\Http\Controllers;
use DateInterval;
use DateTime;
use App\Models\Rider;
use Illuminate\Http\Request;

class RiderController extends Controller
{
    public function index()
    {
        $models = Rider::where("IsActive", "=", true)->get();        
        return view("Rider.Index", ["models" => $models]); //to jest sciezka do naszego widoku
    }

    public function edit($id)
    {
        $model = Rider::find($id);
        return view("Rider.Edit", ["model" => $model]);
    }
    public function update($id, Request $request)
    {
        $model = Rider::find($id);
        $model->Name = $request->input("Name");
        $model->Surname = $request->input("Surname");
        $model->Birthdate = $request->input("Birthdate");
        $model->Gender = $request->input("Gender");
        $model->Country = $request->input("Country");
        $model->RidersClub = $request->input("RidersClub");
        $model->PhotoURL = $request->input("PhotoURL");

        $model->save();
        return redirect("/riders");

    }

    public function delete($id)
    {
        $model = Rider::find($id);
        $model->IsActive = false;
        $model->save();
        return redirect("/riders");
    }
    public function create()
    {
        $model = new Rider();
        $model->Birthdate = date("Y-m-d");
        return view("Rider.Create", ["model" => $model]);
    }
    public function addToDB(Request $request)
    {
       
        $model = new Rider();
        $model->Name = $request->input("Name");
        $model->Surname = $request->input("Surname");
        $model->Birthdate = $request->input("Birthdate");
        $model->Gender = $request->input("Gender");
        $model->Country = $request->input("Country");
        $model->RidersClub = $request->input("RidersClub");
        $model->PhotoURL = $request->input("PhotoURL");
        $model->IsActive = true;
        
        $model->save();
        return redirect("/riders"); 
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
        if($request->input("property") == "Surname")
        {
            if(empty($value)) //sprawdzamy czy podana wartosc nie jest pusta
            return response()->json(["error"=>"Surname cannot be empty"]);
            if (!preg_match('/^[A-Z]/', $value)) //sprawdzamy czy imie zaczyna sie z duzej litery
             {
                return response()->json(["error" => "Surname must start with an uppercase letter"]);
            }
            else
            return response()->json(["error"=>""]);
        } 
        if($request->input("property") == "Birthdate")
        {
            $currentDate = new DateTime(); // pobieramy aktualna date
            $birthdate = DateTime::createFromFormat('Y-m-d', $value); // tworzymy obiekt DateTime dla pobieranej wartosci
        
            $fourYearsAgo = clone $currentDate;
            $fourYearsAgo->sub(new DateInterval('P18Y')); // Odejmujemy 18 lat od aktualnej daty            
        
            if($birthdate > $currentDate) //sprawdzamy czy wybrana data nie wybiega w przyszlosc
            return response()->json(["error"=>"Date of birth cannot be further than today."]);          
            if ($birthdate > $fourYearsAgo) //sprawdzamy czy kon nie jest mlodszy niz 4 lata
            {
                return response()->json(["error" => "Your rider must be at least 18 to participate in the competitions."]);
            }              
            else
            return response()->json(["error"=>""]);
        }
        else
        return response()->json(["error"=>""]);
}
}

<?php

namespace App\Http\Controllers;

use DateTime;
use Filament\Tables\Filters\Filter;
use App\Models\Competition;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function index(Request $request)
    {
        $models = Competition::where([
        ["IsActive", "=", true], 
        [function ($query) use ($request)
        {
            if (($item = $request->item))
            {
                $query->orWhere('Name', 'LIKE', '%'.$item.'%')->get();
            }
        }]
        ])
        -> orderBy("Id", "asc")
        -> get();
        return view("Competition.Index", compact('models'))
        ->with('i',(request()->input('page',1)-1)*5); //to jest sciezka do naszego widoku
    }

    public function edit($id)
    {
        $model = Competition::find($id);
        return view("Competition.Edit", ["model" => $model]);
    }
    public function update($id, Request $request)
    {
        $model = Competition::find($id);
        $model->Name = $request->input("Name");
        $model->StartDate = $request->input("StartDate");
        $model->EndDate = $request->input("EndDate");
        $model->Type = $request->input("Type");
        $model->Spots = $request->input("Spots");

        $model->save();
        return redirect("/competitions");
    }

    public function delete($id)
    {
        $model = Competition::find($id);
        $model->IsActive = false;
        $model->save();
        return redirect("/competitions");
    }
    public function create()
    {
        $model = new Competition();
        $model->Birthdate = date("Y-m-d");
        return view("Competition.Create", ["model" => $model]);
    }
    public function addToDB(Request $request)
    {

        $model = new Competition();
        $model->Name = $request->input("Name");
        $model->StartDate = $request->input("StartDate");
        $model->EndDate = $request->input("EndDate");
        $model->Type = $request->input("Type");
        $model->Spots = $request->input("Spots");
        $model->IsActive = true;

        $model->save();
        return redirect("/competitions");
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $competitions = Competition::where('name', 'LIKE', "%$query%")
            ->orWhere('type', 'LIKE', "%$query%")
            ->get();

        return view('competition.partials.competitions', compact('competitions'));
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
        
        if($request->input("property") == "StartDate")
        {
            $currentDate = new DateTime(); // pobieramy aktualna date
            $startDate = DateTime::createFromFormat('Y-m-d', $value); // tworzymy obiekt DateTime dla pobieranej wartosci
                   
            
            if($startDate < $currentDate) //sprawdzamy czy wybrana data nie jest z przeszlosci
            return response()->json(["error"=>"Start date cannot be set in the past."]);          
                     
            else
            return response()->json(["error"=>""]);
        }

        if($request->input("property") == "EndDate")
        {
            $currentDate = new DateTime(); // pobieramy aktualna date
            $endDate = DateTime::createFromFormat('Y-m-d', $value); // tworzymy obiekt DateTime dla pobieranej wartosci
                   
            
            if($endDate < $currentDate) //sprawdzamy czy wybrana data nie jest z przeszlosci
            return response()->json(["error"=>"End date cannot be set in the past."]);          
                     
            else
            return response()->json(["error"=>""]);
        }
        if($request->input("property") == "Spots")
        {           
            if($value <= 9) {//sprawdzamy czy ilosc miejsc zapisu to co najmniej 10.
            return response()->json(["error"=>"There should be at least 10 spots."]);   }           
            else
            return response()->json(["error"=>""]);
        }
        else
            return response()->json(["error"=>""]);
    }

}

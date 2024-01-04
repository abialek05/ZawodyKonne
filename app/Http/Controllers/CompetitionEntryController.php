<?php

namespace App\Http\Controllers;

use App\Models\CompetitionEntry;
use App\Models\Competition;
use App\Models\Rider;
use App\Models\Horse;
use Illuminate\Http\Request;

class CompetitionEntryController extends Controller
{

    public function index(Request $request)
    {
        $models = CompetitionEntry::where('IsActiveEntry', true)
            ->leftJoin('competition', 'competition_entry.CompetitionId', '=', 'competition.Id')
            ->when($request->item, function ($query, $item) {
                return $query->where('competition.Name', 'LIKE', '%' . $item . '%');
            })
            ->orderBy('competition_entry.Id', 'asc')
            ->get();
        return view("CompetitionEntry.Index", compact('models'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function edit($id)
    {
        $model = CompetitionEntry::find($id);
        $competitions = Competition::where('IsActive', true)->get();
        $riders = Rider::where('IsActive', true)->get();
        $horses = Horse::where('IsActive', true)->get();
        return view("CompetitionEntry.Edit", compact('model', 'competitions', 'riders', 'horses'));
    }
    public function update($id, Request $request)
    {
        $model = CompetitionEntry::find($id);
        $model->CompetitionId = $request->input("CompetitionId");
        $model->HorseId = $request->input("HorseId");
        $model->RiderId = $request->input("RiderId");
        $model->Accommodation = $request->input("Accommodation");
        $model->PaymentType = $request->input("PaymentType");
        $model->Phone = $request->input("Phone");

        $model->save();
        return redirect("/competition-entries");
    }

    public function delete($id)
    {
        $model = CompetitionEntry::find($id);
        $model->IsActiveEntry = false;
        $model->save();
        return redirect("/competition-entries");
    }
    public function create()
    {
        $model = new CompetitionEntry();
        $competitions = Competition::where('IsActive', true)->get();
        $riders = Rider::where('IsActive', true)->get();
        $horses = Horse::where('IsActive', true)->get();

        return view("CompetitionEntry.Create", compact('model', 'competitions', 'riders', 'horses'));
    }
    public function addToDB(Request $request)
    {

        $model = new CompetitionEntry();
        $model->CompetitionId = $request->input("CompetitionId");
        $model->HorseId = $request->input("HorseId");
        $model->RiderId = $request->input("RiderId");
        $model->Accommodation = $request->input("Accommodation");
        $model->PaymentType = $request->input("PaymentType");
        $model->Phone = $request->input("Phone");
        $model->IsActiveEntry = true;

        $model->save();
        return redirect("/competition-entries");
    }
    public function validateModel(Request $request)
    {
        $value = $request->input("value");
        if ($request->input("property") == "Phone") {
            if (empty($value)) //sprawdzamy czy podana wartosc nie jest pusta
                return response()->json(["error" => "Phone cannot be empty"]);
            if ($value > 10) //sprawdzamy czy numer jest dluzszy niz 10 znakow
            {
                return response()->json(["error" => "Phone number cannot be longer than 10 characters."]);
            } else
                return response()->json(["error" => ""]);
        } else
            return response()->json(["error" => ""]);
    }
}

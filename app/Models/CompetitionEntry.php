<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompetitionEntry extends Model
{
    use HasFactory;
    const CREATED_AT = "CreationDateTime";
    const UPDATED_AT = "EditDateTime";
    protected $table = "competition_entry";
    protected $primaryKey = "Id";

    // Zwroci horse polaczone kluczem obcym
    public function Horse()
    {
        return $this->belongsTo(Horse::class, "HorseId");
    }

     // Zwroci rider polaczone kluczem obcym

     public function Rider()
     {
        return $this->belongsTo(Rider::class, "RiderId");
     }
     
     // Zwroci competition polaczone kluczem obcym

     public function Competition()
     {
        return $this->belongsTo(Competition::class, "CompetitionId");
     }

     public function CompetitionEntries()
     {
         return $this->hasMany(CompetitionEntry::class, "Id");
     }
}

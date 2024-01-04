<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Horse extends Model
{
    use HasFactory;
    
    const CREATED_AT = "CreationDateTime";
    const UPDATED_AT = "EditDateTime";
    protected $table = "horse";
    protected $primaryKey = "Id";

    public function CompetitionEntries()
    {
        return $this->hasMany(CompetitionEntry::class, "HorseId");
    }
    public function age()
    {
        return Carbon::parse($this->attributes['Birthdate'])->age;
    }
    

}

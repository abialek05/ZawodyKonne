<?php

namespace App\Models;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rider extends Model
{
    use HasFactory;
    
    const CREATED_AT = "CreationDateTime";
    const UPDATED_AT = "EditDateTime";
    protected $table = "rider";
    protected $primaryKey = "Id";

    public function CompetitionEntries()
    {
        return $this->hasMany(CompetitionEntry::class, "RiderId");
    }
   
}

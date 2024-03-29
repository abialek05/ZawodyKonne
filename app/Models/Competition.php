<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Competition extends Model
{
    use HasFactory;
    
    const CREATED_AT = "CreationDateTime";
    const UPDATED_AT = "EditDateTime";
    protected $table = "competition";
    protected $primaryKey = "Id";

    public function CompetitionEntries()
    {
        return $this->hasMany(CompetitionEntry::class, "CompetitionId");
    }

}

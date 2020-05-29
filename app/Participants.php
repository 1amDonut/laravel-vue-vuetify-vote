<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
    protected $table = "participate";
    protected $primaryKey = "participatfSN";
    protected $fillable = ["group", "division", "name", "sex", "Scount", "idActivity", "byVoter"];
}

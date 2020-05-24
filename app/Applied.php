<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applied extends Model
{
    protected $table = "applied";
    protected $fillable = ['idSignUp','name','deparment','votingQty','signupTime','docFile','idActivity'];
}

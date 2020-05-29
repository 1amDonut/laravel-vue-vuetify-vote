<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = "candidate";
    protected $fillable = ['idSignUp','name','deparment','votingQty','signupTime','docFile','idActivity'];
}

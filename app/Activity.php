<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $table = 'activity';
    protected $primaryKey = 'idActivity';
    protected $fillable = [
        'activityName', 'startDate', 'endDate',
        'needSignup', 'voteQry', 'rule', 'organizer', 'manager', 'activityDescription',
        'isVisible', 'startAnnounce', 'attachmentFile'
    ];
}

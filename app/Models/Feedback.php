<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
   
    // Table Name
    protected $table="club_feedback";

    // Primary key 
    public  $primaryKey="flow_of_feedback";

    // TimeStemp
    // TimeStemp
    public $timestemps=true;


}

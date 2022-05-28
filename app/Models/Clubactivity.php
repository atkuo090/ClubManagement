<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clubactivity extends Model
{
    use HasFactory;
   
    // Table Name
    protected $table="club_activity";
    public $incrementing = false;
    // Primary key 
    public  $primaryKey="flow_of_activity";

    // TimeStemp
    public $timestemps=true;

    protected function setUUID()
    {
        $this->flow_of_activity = preg_replace('/\./', '', uniqid('bpm', true));
    }

}

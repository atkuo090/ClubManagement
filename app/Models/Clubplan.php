<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clubplan extends Model
{
    use HasFactory;
   
    // Table Name
    protected $table="club_planofsemester";
    public $incrementing = false;
    // Primary key 
    public  $primaryKey="flow_of_plan";

    // TimeStemp
    public $timestemps=true;

    protected function setUUID()
    {
        $this->club_planofsemester = preg_replace('/\./', '', uniqid('bpm', true));
    }


}

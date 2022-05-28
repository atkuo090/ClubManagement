<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clubclassrecord extends Model
{
    use HasFactory;
   
    // Table Name
    protected $table="club_classrecord";
    public $incrementing = false;
    // Primary key 
    public  $primaryKey="flow_of_classrecord";

    // TimeStemp
    public $timestemps=true;

    protected function setUUID()
    {
        $this->flow_of_classrecord = preg_replace('/\./', '', uniqid('bpm', true));
    }


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classrecord_pic extends Model
{
    use HasFactory;
   
    // Table Name
    protected $table="classrecord_pic";
    public $incrementing = false;
    // Primary key 
    public  $primaryKey="flow_of_pic";

    // TimeStemp
    public $timestemps=true;

    // protected function setUUID()
    // {
    //     $this->flow_of_classrecord = preg_replace('/\./', '', uniqid('bpm', true));
    // }


}

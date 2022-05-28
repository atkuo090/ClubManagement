<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clubnew extends Model
{
    use HasFactory;
   
    // Table Name
    protected $table="club_news";
    public $incrementing = false;
    // Primary key 
    public  $primaryKey="flow_of_news";

    // TimeStemp
    public $timestemps=true;

    protected function setUUID()
    {
        $this->flow_of_news = preg_replace('/\./', '', uniqid('bpm', true));
    }


}

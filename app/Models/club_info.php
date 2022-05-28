<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class club_info extends Model
{
    use HasFactory;
    // Table Name
    protected $table="club_info";

    // Primary key 
    public  $primaryKey="club_id";

    // TimeStemp
    public $timestemps=true;
    protected function setUUID()
    {
        $this->club_id= preg_replace('/\./', '', uniqid('bpm', true));
    }

}

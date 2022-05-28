<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class club_semester extends Model
{
    use HasFactory;
    // Table Name
    protected $table="club_semester";

    // Primary key 
    public  $primaryKey="club_semester";

    // TimeStemp
    public $timestemps=true;

    protected function setUUID()
    {
        $this->club_semester = preg_replace('/\./', '', uniqid('bpm', true));
    }
}

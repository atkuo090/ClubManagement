<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clubnewattend extends Model
{
    use HasFactory;
   
    // Table Name
    protected $table="news_attend_file";

    // Primary key 
    public  $primaryKey="flow_of_file";



}

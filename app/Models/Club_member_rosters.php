<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Club_member_rosters extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'Club_member_rosters';

    // Primary key 
    public  $primaryKey="member_id";

    // TimeStemp
    public $timestemps=true;

    protected function setUUID()
    {
        $this->flow_of_activity = preg_replace('/\./', '', uniqid('bpm', true));
    }




}

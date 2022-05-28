<?php

namespace App\Http\Controllers;
// use App\Models\club_info;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MyclubsController extends Controller
{
    private $table1='club_info';
    private $table2='club_semester';
    private $table3='club_news';
    private $table4='news_attend_file';
    private $table5='club_classrecord';
    private $table6='classrecord_pic';
    private $table7 = 'club_activity';
    private $table10='club_planofsemester';
 
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //我的社團
        $club = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1.'.club_id', '=',  $this->table2.'.club_id')
        ->where("club_name",$id)
        ->get();
        $news = DB::table($this->table3)
        ->leftJoin($this->table1, $this->table3.'.club_id', '=',  $this->table1.'.club_id')
        ->leftJoin($this->table4, $this->table3.'.flow_of_news', '=',  $this->table4.'.flow_of_news')
        ->where('club_name',$id)
        ->groupBy($this->table3.'.flow_of_news')
        ->select('news_title','news_content','date','news_pic','news_file')
        ->orderBy('date', 'desc')
        ->get();
        $classrecord = DB::table($this->table5)
        ->leftJoin($this->table2, $this->table5.'.club_semester', '=',  $this->table2.'.club_semester')
        ->leftJoin($this->table1, $this->table2.'.club_id', '=',  $this->table1.'.club_id')
        ->leftJoin($this->table6, $this->table5.'.flow_of_classrecord', '=',  $this->table6.'.flow_of_classrecord')
        ->where('club_name',$id)
        ->select('class_name','class_teacher','class_place','class_contect','pic','date','flow_of_pic')
        ->orderBy('date', 'desc')
        ->get();
        $activity = DB::table($this->table7)
        ->leftJoin($this->table2, $this->table7.'.club_semester', '=',  $this->table2.'.club_semester')
        ->leftJoin($this->table1, $this->table2.'.club_id', '=',  $this->table1.'.club_id')
        ->where('club_name',$id)
        ->select('name','content','population','date','pic','place')
        ->orderBy('date', 'desc')
        ->get();
        $plan = DB::table($this->table10)
        ->leftJoin($this->table2, $this->table10.'.club_semester', '=',  $this->table2.'.club_semester')
        ->leftJoin($this->table1, $this->table2.'.club_id', '=',  $this->table1.'.club_id')
        ->where('club_name',$id)
        ->select('date','activity_name')
        ->orderBy('date', 'asc')
        ->get();
        
        return view('club.u_myclub_more')->with('club',$club)->with('news',$news)
        ->with('classrecord',$classrecord)->with('activity',$activity)->with('plan',$plan);
        // ->with('news',$news)
        // ->with('classrecord',$classrecord)->with('activity',$activity)->with('plan',$plan);
        
        //with([$club,$news,$classrecord,$activity,$plan]);
    }
}

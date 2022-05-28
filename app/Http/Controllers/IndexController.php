<?php

namespace App\Http\Controllers;
// use App\Models\club_info;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    private $table1='club_classrecord';
    private $table2='club_semester';
    private $table3='club_info';
    private $table4='classrecord_pic';

    // private $table5= 'activity_results';
    // private $table6 = 'activity_apply';
    private $table7 = 'club_activity';

    // private $table1='club_news';
    // private $table2='club_info';
    // private $table3='news_type';
    // private $table4='news_attend_file';
    private $table8='club_news';
    private $table9='news_type';
    private $table10='news_attend_file';
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //首頁
        $classrecord = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1.'.club_semester', '=',  $this->table2.'.club_semester')
        ->leftJoin($this->table3, $this->table2.'.club_id', '=',  $this->table3.'.club_id')
        ->leftJoin($this->table4, $this->table1.'.flow_of_classrecord', '=',  $this->table4.'.flow_of_classrecord')
        ->where('PLC','1')
        ->groupBy($this->table1.'.flow_of_classrecord')->select('class_name as name', 'pic as image')
        ->get()

        ;


        // $showPLC = DB::table($this->table7)
        // ->leftJoin($this->table2, $this->table7.'.club_semester', '=',  $this->table2.'.club_semester')
        // ->leftJoin($this->table3, $this->table2.'.club_id', '=',  $this->table3.'.club_id')
        // ->where('PLC','1')
        // ->groupBy($this->table7.'.flow_of_activity')->select('name as name', 'pic as image')->union($classrecord)
        // ->get();

        $showPLC = DB::table($this->table7)
        ->leftJoin($this->table2, $this->table7.'.club_semester', '=',  $this->table2.'.club_semester')
        ->leftJoin($this->table3, $this->table2.'.club_id', '=',  $this->table3.'.club_id')
        ->where('PLC','1')
        ->groupBy($this->table7.'.flow_of_activity')->select('name as name', 'pic as image')
        ->get();

        $ACTIVITYnews = DB::table($this->table8)
        ->leftJoin($this->table3, $this->table8.'.club_id', '=',  $this->table3.'.club_id')
        ->leftJoin($this->table9, $this->table8.'.news_id', '=',  $this->table9.'.news_id')
        ->leftJoin($this->table10, $this->table8.'.flow_of_news', '=',  $this->table10.'.flow_of_news')
        ->where('PLC','1')
        ->groupBy($this->table8.'.flow_of_news')->select('news_title','news_content','date','news_name','news_pic','news_file')->orderBy('date', 'desc')
        ->where('news_name','活動')
        ->first();

        $NORMALnews = DB::table($this->table8)
        ->leftJoin($this->table3, $this->table8.'.club_id', '=',  $this->table3.'.club_id')
        ->leftJoin($this->table9, $this->table8.'.news_id', '=',  $this->table9.'.news_id')
        ->leftJoin($this->table10, $this->table8.'.flow_of_news', '=',  $this->table10.'.flow_of_news')
        ->where('PLC','1')
        ->groupBy($this->table8.'.flow_of_news')->select('news_title','news_content','date','news_name','news_pic','news_file')->orderBy('date', 'desc')
        ->where('news_name','消息')
        ->first();

        $ResultsNEWS = DB::table($this->table8)
        ->leftJoin($this->table3, $this->table8.'.club_id', '=',  $this->table3.'.club_id')
        ->leftJoin($this->table9, $this->table8.'.news_id', '=',  $this->table9.'.news_id')
        ->leftJoin($this->table10, $this->table8.'.flow_of_news', '=',  $this->table10.'.flow_of_news')
        ->where('PLC','1')
        ->groupBy($this->table8.'.flow_of_news')->select('news_title','news_content','date','news_name','news_pic','news_file')->orderBy('date', 'desc')
        ->where('news_name','成果展')
        ->first();

        return view('club.u_homepage')->with('showPLC',$classrecord)->with('ACTIVITYnews',$ACTIVITYnews)->with('NORMALnews',$NORMALnews)->with('ResultsNEWS',$ResultsNEWS);
        // return with([$showPLC,$ACTIVITYnews,$NORMALnews,$ResultsNEWS]);
        // return with($showPLC);
        // return view('club.club')->with('clubInfo',$club);
        // 傳過去時要使用的變數名稱 變數
    }
}

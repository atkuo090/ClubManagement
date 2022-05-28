<?php

namespace App\Http\Controllers;
// use App\Models\club_info;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClubactivityresultsController extends Controller
{
    private $table1 = 'activity_results';
    private $table2 = 'activity_apply';
    private $table3 = 'club_semester';
    private $table4 = 'club_info';
    private $table5 = 'activity_pic';
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
        //公開的
        // $club=club_info::all();
        $club = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1.'.flow_of_activity', '=',  $this->table2.'.flow_of_activity')
        ->leftJoin($this->table3, $this->table2.'.club_semester', '=',  $this->table3.'.club_semester')
        ->leftJoin($this->table4, $this->table3.'.club_id', '=',  $this->table4.'.club_id')
        ->leftJoin($this->table5, $this->table1.'.flow_result_activity', '=',  $this->table5.'.flow_result_activity')
        ->where('PLC','1')
        ->groupBy($this->table1.'.flow_result_activity')
        ->get();
        return $club;
        // 傳過去時要使用的變數名稱 變數
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        return  DB::table($this->table1)->insert($request->all());
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showALL($id)
    {
        //
        $club = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1.'.flow_of_activity', '=',  $this->table2.'.flow_of_activity')
        ->leftJoin($this->table3, $this->table2.'.club_semester', '=',  $this->table3.'.club_semester')
        ->leftJoin($this->table4, $this->table3.'.club_id', '=',  $this->table4.'.club_id')
        ->leftJoin($this->table5, $this->table1.'.flow_result_activity', '=',  $this->table5.'.flow_result_activity')
        ->groupBy($this->table1.'.flow_result_activity')
        ->where('club_name',$id)
        ->get();
        return view('club.m-ach')->with('club',$club);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$date)
    {
        //
        $club = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1.'.flow_of_activity', '=',  $this->table2.'.flow_of_activity')
        ->leftJoin($this->table3, $this->table2.'.club_semester', '=',  $this->table3.'.club_semester')
        ->leftJoin($this->table4, $this->table3.'.club_id', '=',  $this->table4.'.club_id')
        ->where('club_name', $id)
        ->Where('date', $date)
        ->get();
        return $club;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $club=DB::table($this->table1)
        ->where('flow_result_activity',$id)
        ->update($request->all());

        return $club;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $club=DB::table($this->table1)->where('flow_result_activity',$id)->delete();
        return $club;
    }
}

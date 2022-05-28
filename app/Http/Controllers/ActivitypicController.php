<?php

namespace App\Http\Controllers;
// use App\Models\club_info;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ActivitypicController extends Controller
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
        
        return  DB::table($this->table5)->insert($request->all());
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
        $club = DB::table($this->table5)
        ->leftJoin($this->table1, $this->table1.'.flow_result_activity', '=',  $this->table5.'.flow_result_activity')
        ->leftJoin($this->table2, $this->table1.'.flow_of_activity', '=',  $this->table2.'.flow_of_activity')
        ->leftJoin($this->table3, $this->table2.'.club_semester', '=',  $this->table3.'.club_semester')
        ->leftJoin($this->table4, $this->table3.'.club_id', '=',  $this->table4.'.club_id')
        ->where('club_name', $id)
        ->Where('date', $date)
        ->pluck('result_pic')
        ->all();
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
        $club=DB::table($this->table5)
        ->where('flow_of_pic',$id)
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
        $club=DB::table($this->table5)->where('flow_of_pic',$id)->delete();
        return $club;
    }
}

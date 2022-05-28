<?php

namespace App\Http\Controllers;
// use App\Models\club_info;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ClassrecordpicController extends Controller
{
    private $table1 = 'club_classrecord';
    private $table2 = 'club_semester';
    private $table3 = 'club_info';
    private $table4 = 'classrecord_pic';


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
        
        return  DB::table($this->table4)->insert($request->all());
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
        $club = DB::table($this->table4)
        ->leftJoin($this->table1, $this->table1.'.flow_of_classrecord', '=',  $this->table4.'.flow_of_classrecord')
        ->leftJoin($this->table2, $this->table1.'.club_semester', '=',  $this->table2.'.club_semester')
        ->leftJoin($this->table3, $this->table2.'.club_id', '=',  $this->table3.'.club_id')
        ->where('club_name', $id)
        ->Where('date', $date)
        ->orderBy('date', 'desc')
        ->pluck('pic')
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
        $club=DB::table($this->table4)
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
        $club=DB::table($this->table4)->where('flow_of_pic',$id)->delete();
        return $club;
    }
}

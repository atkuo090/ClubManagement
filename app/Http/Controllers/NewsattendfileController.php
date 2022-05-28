<?php

namespace App\Http\Controllers;
// use App\Models\club_info;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewsattendfileController extends Controller
{
    
    private $table1 = 'club_news';
    private $table2 = 'club_info';
    private $table3 = 'news_type';
    private $table4 = 'news_attend_file';
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
    public function showpic($id,$date)
    {
        //
        $club = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1.'.club_id', '=',  $this->table2.'.club_id')
        ->leftJoin($this->table3, $this->table1.'.news_id', '=',  $this->table3.'.news_id')
        ->leftJoin($this->table4, $this->table1.'.flow_of_news', '=',  $this->table4.'.flow_of_news')
        ->where('club_name', $id)
        ->Where('date', $date)
        ->pluck('news_pic')
        ->all();
        return $club;
    }

            /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showfile($id,$date)
    {
        //
        $club = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1.'.club_id', '=',  $this->table2.'.club_id')
        ->leftJoin($this->table3, $this->table1.'.news_id', '=',  $this->table3.'.news_id')
        ->leftJoin($this->table4, $this->table1.'.flow_of_news', '=',  $this->table4.'.flow_of_news')
        ->where('club_name', $id)
        ->Where('date', $date)
        ->pluck('news_file')
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
        ->where('flow_of_file',$id)
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
        $club=DB::table($this->table4)->where('flow_of_file',$id)->delete();
        return $club;
    }
}

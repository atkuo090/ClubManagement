<?php

namespace App\Http\Controllers;
// use App\Models\club_info;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    private $table1='semester';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        //
        // $club=club_info::all();
        $club = DB::table($this->table1)
        ->get();
        return $club;
        // return view('club.club')->with('clubInfo',$club);
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
    public function show($id)
    {
        //
        // $club = DB::table($this->table1)
        // // ->where('club_name', 'like', '%'.$id.'%')
        // ->where('club_name',$id)
        // ->get();
        // return $club;
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
        ->where('semester_id',$id)
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
        $club=DB::table($this->table1)->where('semester_id',$id)->delete();
        return $club;
    }
}

<?php

namespace App\Http\Controllers;
// use App\Models\club_info;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Clubplan;
class ClubofplanController extends Controller
{
    private $table1='club_planofsemester';
    private $table2='club_semester';
    private $table3='club_info';

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
        //
        // $club=club_info::all();
        $club = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1.'.club_semester', '=',  $this->table2.'.club_semester')
        ->leftJoin($this->table3, $this->table2.'.club_id', '=',  $this->table3.'.club_id')
        ->orderBy('date', 'desc')
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
       
        $this->validate($request, [
            'activity_name' => 'required'
        ]);

        $activity = new Clubplan;
        $activity->	flow_of_plan  =$request->input('flow_of_plan');
        $activity->activity_name=$request->input('activity_name');
        $activity->date=$request->input('date');
        $activity->club_semester=$request->input('club_semester');
        $activity->save();
        return redirect("clubOfplan/$request->club_name")->with('success', '成功！');

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
        $club = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1.'.club_semester', '=',  $this->table2.'.club_semester')
        ->leftJoin($this->table3, $this->table2.'.club_id', '=',  $this->table3.'.club_id')
        ->where('club_name',$id)
        ->orderBy('date', 'desc')
        ->get();
        return view("club.m-plan")->with("club",$club);
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
        ->where('flow_of_plan',$id)
        ->update($request->all());

        return $club;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        //
        $clubnew =Clubplan::where('flow_of_plan', '=', $id)->first();
        $clubnew->delete();

        return redirect("clubOfplan/$request->club_name")->with('success', '成功！');
    }
}

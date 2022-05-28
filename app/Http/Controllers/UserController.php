<?php

namespace App\Http\Controllers;
use App\Models\Club_member_rosters;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $table1='Club_member_rosters';
    private $table3='role_of_clubmember';
    private $table2='userinfo';
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
        $user = DB::table($this->table1)
        ->get();
        return $user;
        return view('club.user')->with('users',$user);
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
        
        // dd($request->all());
        $member = new Club_member_rosters;
        $member->member_id =$request->input('member_id');
        $member->club_semester=$request->input('club_semester');
        $member->user_id=$request->input('user_id');
        $member->role_id=$request->input('role_id');
        $member->status=$request->input('status');
        $member->save();
        return redirect()->action([IndexController::class,'index']);
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
        $apply = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1.'.user_id', '=',  $this->table2.'.user_id')
        ->where('club_semester',$id)
        ->where('status',0)
        ->get();

        $member = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1.'.user_id', '=',  $this->table2.'.user_id')
        ->leftJoin($this->table3, $this->table1.'.role_id', '=',  $this->table3.'.role_id')
        ->where('club_semester',$id)
        ->where('status',1)
        ->orderBy('role_of_clubmember.role_id')
        ->get();
// dd($member);
        return view('club.m-member')->with('apply',$apply)->with('member',$member);
        // return $club;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $member =Club_member_rosters::where('member_id', '=', $id)->first();
        $member->status=$request->input('status');
        $member->save();
        return redirect()->action([UserController::class,'show'], ['id' => $request->club_semester]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $member =Club_member_rosters::where('member_id', '=', $id)->first();
        $member->delete();
        return redirect()->action([UserController::class,'show'], ['id' => $request->club_semester]);
    }
}

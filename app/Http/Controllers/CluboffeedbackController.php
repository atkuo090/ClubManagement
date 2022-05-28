<?php

namespace App\Http\Controllers;
// use App\Models\club_info;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Feedback;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Str;
class CluboffeedbackController extends Controller
{
    private $table1='club_feedback';
    private $table2='club_info';
    private $table3='feedback_type';

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
        ->leftJoin($this->table2, $this->table1.'.club_id', '=',  $this->table2.'.club_id')
        ->leftJoin($this->table3, $this->table1.'.feedback_id', '=',  $this->table3.'.feedback_id')
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
        // dd($request->all()); 
        $this->validate($request, [
            'content' => 'required',
        ]);
        $feedback = new Feedback;
        $feedback->club_id =$request->input('club_id');
        $feedback->title=$request->input('title');
        $feedback->content=$request->input('content');
        $feedback->date=$request->input('date');
        $feedback->flow_of_feedback =$request->input('flow_of_feedback');
        $feedback->feedback_id=$request->input('feedback_id');
        $feedback->save();
        return redirect("myclub/$request->club_name")->with('success', '成功！');
        //  return  DB::table($this->table1)->insert($request->all());
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
        ->leftJoin($this->table2, $this->table1.'.club_id', '=',  $this->table2.'.club_id')
        ->leftJoin($this->table3, $this->table1.'.feedback_id', '=',  $this->table3.'.feedback_id')
        ->where('club_name',$id)
        ->orderBy('date', 'desc')
        ->get();
        // return $club;
        return view('club.m-feedback')->with('feedback',$club);
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
        ->where('flow_of_feedback',$id)
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
        $club=DB::table($this->table1)->where('flow_of_feedback',$id)->delete();
        return $club;
    }
}

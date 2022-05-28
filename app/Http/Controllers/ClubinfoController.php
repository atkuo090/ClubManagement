<?php

namespace App\Http\Controllers;
use App\Models\club_info;
use App\Models\club_semester;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\Cast\String_;

class ClubinfoController extends Controller
{
    private $table1='club_info';
    private $table2='club_semester';

    private $table3 = 'club_member_rosters';
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
        ->get();

        $role = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1 . '.club_id', '=',  $this->table2 . '.club_id')
        ->leftJoin($this->table3, $this->table2 . '.club_semester', '=',  $this->table3 . '.club_semester')
        ->where('user_id',Auth::user()->user_id)
        ->select('club_name')
        ->get();

      
    if (count($role) > 0) {
      foreach($role as $r){
        Session::put($r->club_name, $r->club_name);
}
    }
   

        return view('club.u_allclub',['clubInfo' => $club]);
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
        $club = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1.'.club_id', '=',  $this->table2.'.club_id')
        ->where('club_name',$id)
        ->get();
        return view("club.m-information")->with("club",$club);
    }
   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $class = club_info::find($id);
        return view('club.m-information_edit')->with('class', $class);
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
        // dd($request->all());
        $this->validate($request, [
            'club_purpose' => 'required',
            'club_introduce' => 'required',
            'club_time' => 'required',
            'club_place' => 'required',
            'club_fee' => 'required',
            'club_teacher' => 'required',
            'club_icon'=>'image|nullable',
            'club_show_pic'=>'image|nullable',
            'club_cover'=>'image|nullable'
        ]);
      

        if($request->hasFile('club_icon')){
            // Get filename with the extension
            $filenameWithExt = $request->file('club_icon')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('club_icon')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('club_icon')->storeAs('public/club/', $fileNameToStore);
        
        } else {
            $fileNameToStore = '';
        }   

        if($request->hasFile('club_show_pic')){
            // Get filename with the extension
            $filenameWithExt = $request->file('club_show_pic')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('club_show_pic')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore1= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('club_show_pic')->storeAs('public/club/', $fileNameToStore1);
        
        } else {
            $fileNameToStore1 = '';
        }  

        if($request->hasFile('club_cover')){
            // Get filename with the extension
            $filenameWithExt = $request->file('club_cover')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('club_cover')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore2= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('club_cover')->storeAs('public/club/', $fileNameToStore2);
        
        } else {
            $fileNameToStore2 = '';
        }       
        $club =club_info::where('club_id', '=', $id)->first();
        // dd($id);
        // $club =   club_info::find($id);
    
        $club->club_name=$request->input('club_name');
        $club->club_type=$request->input('club_type');
        $club->club_website=$request->input('club_website');
        $club->club_purpose=$request->input('club_purpose');
        $club->club_introduce=$request->input('club_introduce');
        $club->club_place =$request->input('club_place');
        $club->club_time=$request->input('club_time');
        $club->source_of_funding=$request->input('source_of_funding');
        $club->status_of_club=$request->input('status_of_club');
        $club->club_cover=$fileNameToStore1;
        $club->club_icon=$fileNameToStore;
        $club->save();

        $club_semester =club_semester::where('club_id', '=', $id)->first();
        $club_semester->club_id=$request->input('club_id');
        $club_semester->semester_id=$request->input('semester_id');
        $club_semester->club_fee=$request->input('club_fee');
        $club_semester->club_teacher=$request->input('club_teacher');
        $club_semester->club_show_pic=$fileNameToStore2;
        $club_semester->save();
    
        return redirect("clubs/$request->club_name")->with('success', '成功！');
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
        $club=DB::table($this->table1)->where('club_name',$id)->delete();
        return $club;
    }
}
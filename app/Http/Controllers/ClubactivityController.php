<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Clubactivity;


class ClubactivityController extends Controller
{
    private $table1='club_activity';
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
    public function index($id)
    {
        //公開的
        // $club=club_info::all();
    
     
        // $club = DB::table($this->table1)
        // ->leftJoin($this->table2, $this->table1.'.club_semester', '=',  $this->table2.'.club_semester')
        // ->leftJoin($this->table3, $this->table2.'.club_id', '=',  $this->table3.'.club_id')
        // ->leftJoin($this->table4, $this->table1.'.flow_of_classrecord', '=',  $this->table4.'.flow_of_classrecord')
        // ->where('PLC','1')
        // ->groupBy($this->table1.'.flow_of_classrecord')
        // ->get();
        // return $club;
        // 傳過去時要使用的變數名稱 變數
    }

    public function create()
    {
        //公開的

        return view('club.m-ach_add');
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
        
    //    dd($request->all());
       $this->validate($request, [
        'name' => 'required',
        'content' => 'required',
        'population' => 'required',
        'place' => 'required',
        'pic'=>'image|nullable'
    ]);

    if($request->hasFile('pic')){
        // Get filename with the extension
        $filenameWithExt = $request->file('pic')->getClientOriginalName();
        // Get just filename
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        // Get just ext
        $extension = $request->file('pic')->getClientOriginalExtension();
        // Filename to store
        $fileNameToStore= $filename.'_'.time().'.'.$extension;
        // Upload Image
        $path = $request->file('pic')->storeAs('public/activity/', $fileNameToStore);
    
    } else {
        $fileNameToStore = '';
    }
    $activity = new Clubactivity;
    $activity->	flow_of_activity =$request->input('flow_of_activity');
    $activity->population=$request->input('population');
    $activity->	place=$request->input('place');
    $activity->	name=$request->input('name');
    $activity->content=$request->input('content');
    $activity->date=$request->input('date');
    $activity->PLC =$request->input('PLC');
    $activity->club_semester=$request->input('club_semester');
    $activity->pic =$fileNameToStore;
    $activity->save();
    return redirect("Clubactivity/$request->club_name")->with('success', '成功！');


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
        // dd("263");
        $club = DB::table($this->table1)
        ->leftJoin($this->table2, $this->table1.'.club_semester', '=',  $this->table2.'.club_semester')
        ->leftJoin($this->table3, $this->table2.'.club_id', '=',  $this->table3.'.club_id')
        ->where('club_name',$id)
        ->orderBy('date', 'desc')
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
        ->leftJoin($this->table2, $this->table1.'.club_semester', '=',  $this->table2.'.club_semester')
        ->leftJoin($this->table3, $this->table2.'.club_id', '=',  $this->table3.'.club_id')
        ->where('club_name', $id)
        ->Where('date', $date)
        ->get();
        return $club;
    }

  /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      
        $activity = Clubactivity::find($id);
        return view('club.m-ach_edit')->with('activity', $activity);
        //  return $class;
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
        $this->validate($request, [
            'name' => 'required',
            'content' => 'required',
            'population' => 'required',
            'place' => 'required',
            'pic'=>'image|nullable'
        ]);
        $activity =Clubactivity::where('flow_of_activity', '=', $id)->first();
        if($request->hasFile('pic')){
            // Get filename with the extension
            $filenameWithExt = $request->file('pic')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('pic')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('pic')->storeAs('public/activity/', $fileNameToStore);
        
        } else {
            $fileNameToStore = '';
        }     

        $activity->population=$request->input('population');
        $activity->	place=$request->input('place');
        $activity->	name=$request->input('name');
        $activity->content=$request->input('content');
        $activity->date=$request->input('date');
        $activity->PLC =$request->input('PLC');
        $activity->club_semester=$request->input('club_semester');
        $activity->pic =$fileNameToStore;
        $activity->save();
    
        return redirect("Clubactivity/$request->club_name")->with('success', '成功！');
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
        $clubnew =Clubactivity::where('flow_of_activity', '=', $id)->first();
        $clubnew->delete();

        return redirect("Clubactivity/$request->club_name")->with('success', '成功！');
    }
}

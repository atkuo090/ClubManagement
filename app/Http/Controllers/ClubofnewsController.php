<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
// use App\Models\club_info;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Clubnew;
use App\Models\Clubnewattend;
use App\Constants\GlobalConstants;
use Illuminate\Support\Facades\Session;
class ClubofnewsController extends Controller
{
    private $table1='club_news';
    private $table2='club_info';
    private $table3='news_type';
    private $table4='news_attend_file';
    private $table5='club_semester';
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
        ->leftJoin($this->table2, $this->table1.'.club_id', '=',  $this->table2.'.club_id')
        ->leftJoin($this->table3, $this->table1.'.news_id', '=',  $this->table3.'.news_id')
        ->leftJoin($this->table4, $this->table1.'.flow_of_news', '=',  $this->table4.'.flow_of_news')
        ->where('PLC','1')
        ->orderBy('date', 'desc')
        ->groupBy($this->table1.'.flow_of_news')
        ->get();
        //return $club;
        $type = DB::table($this->table3)->get();

        return view('club.u_publicnews')->with('clubnews', $club)->with('types', $type);
        // 傳過去時要使用的變數名稱 變數

                // return view('club.u_publicnews')->with('clubnews', $club);
        // 傳過去時要使用的變數名稱 變數
    
        }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('club.m-news_add');
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
            'news_title' => 'required',
            'news_content' => 'required',
            'news_pic'=>'image|nullable'
        ]);
        
        $clubnew = new Clubnew;
        $clubnew->flow_of_news =$request->input('flow_of_news');
        $clubnew->news_title=$request->input('news_title');
        $clubnew->news_content=$request->input('news_content');
        $clubnew->date=$request->input('date');
        $clubnew->PLC =$request->input('PLC');
        $clubnew->news_id=$request->input('news_id');
        $clubnew->club_id =$request->input('club_id');
        $clubnew->save();
        if($request->hasFile('news_pic')){
            // Get filename with the extension
            $filenameWithExt = $request->file('news_pic')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('news_pic')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('news_pic')->storeAs('public/newpic/', $fileNameToStore);
		
        } else {
            $fileNameToStore = '';
        }
        $clubnewattend = new Clubnewattend;
        $clubnewattend->flow_of_file =$request->input('flow_of_file');
        $clubnewattend->flow_of_news =$request->input('flow_of_news');
        $clubnewattend->news_pic =$fileNameToStore;
        $clubnewattend->save();
        return redirect("clubOfnews/$request->club_name")->with('success', '成功！');
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
        ->leftJoin($this->table2, $this->table1.'.club_id', '=',  $this->table2.'.club_id')
        ->leftJoin($this->table3, $this->table1.'.news_id', '=',  $this->table3.'.news_id')
        ->leftJoin($this->table4, $this->table1.'.flow_of_news', '=',  $this->table4.'.flow_of_news')
        ->leftJoin($this->table5, $this->table2.'.club_id', '=',  $this->table5.'.club_id')
        ->where('club_name', $id)
        ->orderBy('date', 'desc')
        // ->groupBy($this->table1.'.flow_of_news')
        ->get();
        Session::put('club_name', $id);
        foreach($club as $c){
            Session::put('club_semester', $c->club_semester);
        }
        // dd( Session::all());
        return view('club.m-news')->with("clubnews",$club);
        // return $club ;
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
        ->leftJoin($this->table2, $this->table1.'.club_id', '=',  $this->table2.'.club_id')
        ->leftJoin($this->table3, $this->table1.'.news_id', '=',  $this->table3.'.news_id')
        ->leftJoin($this->table4, $this->table1.'.flow_of_news', '=',  $this->table4.'.flow_of_news')
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
        //
        $news = Clubnew::find($id);
        return view('club.m-news_edit')->with('news', $news);
        //  return $news;
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
        // $club=DB::table($this->table1)
        // ->where('flow_of_news',$id)
        // ->update($request->all());
        // dd($request->all());
       
        $this->validate($request, [
            'news_title' => 'required',
            'news_content' => 'required',
            'news_pic'=>'image|nullable'      
        ]);
        $clubnew =Clubnew::where('flow_of_news', '=', $id)->first();
     
        if($request->hasFile('news_pic')){
            // Get filename with the extension
            $filenameWithExt = $request->file('news_pic')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('news_pic')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('news_pic')->storeAs('public/newpic/', $fileNameToStore);
		
        }

        $clubnew->news_title=$request->input('news_title');
        $clubnew->news_content=$request->input('news_content');
        $clubnew->date=$request->input('date');
        $clubnew->PLC =$request->input('PLC');
        $clubnew->news_id=$request->input('news_id');
        $clubnew->club_id =$request->input('club_id');
        $clubnew->save();

        return redirect("clubOfnews/$request->club_name")->with('success', '成功！');

        // return $club;
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
        $clubnew =Clubnewattend::where('flow_of_news', '=', $id)->first();
        $clubnew->delete();
        $clubnew =Clubnew::where('flow_of_news', '=', $id)->first();
        $clubnew->delete();
        return redirect("clubOfnews/$request->club_name")->with('success', '成功！');
    }
}

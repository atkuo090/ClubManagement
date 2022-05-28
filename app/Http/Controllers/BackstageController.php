<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use App\Http\Controllers\Session;
use Illuminate\Support\Facades\Session;

class BackstageController extends Controller
{
    private $table1 = 'club_info';
    private $table2 = 'club_semester';
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $user_id = auth()->user()->user_id;
        // $user=User::find($user_id);

        $club = DB::table($this->table1)
            ->leftJoin($this->table2, $this->table1 . '.club_id', '=',  $this->table2 . '.club_id')
            ->leftJoin($this->table3, $this->table2 . '.club_semester', '=',  $this->table3 . '.club_semester')
            ->where('user_id', $user_id)
            ->Where('role_id', '<>', "8")
            ->get();

            return view('club.u_myclub_admin')->with('club', $club);


        // $posts = Post::where("user_id", "=",  $user_id)->get();
        // return view('dashboard')->with('posts', $posts);
    }
}

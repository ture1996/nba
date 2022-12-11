<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNewsRequest;
use App\Models\News;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{

    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }

    public function index(){

        $news = News::latest()->paginate(10);

        return view('news.index', compact('news'));
    }

    public function show($id){

        $news = News::with('teams')->find($id);

        return view('news.show', compact('news'));
    }

    public function filter($name){

        $news = Team::where('name',$name)->first()->news()->with('teams')->latest()->paginate(5);

        $team = Team::where('name', $name)->first();

        return view('news.team.filter', compact('news', 'team'));

    }


    public function create(){
        $news = News::with('teams')->get()->first();

        return view('news.create', compact('news'));
    }

    public function store(StoreNewsRequest $request){

        $news= News::create(['content' => $request->content, 'title'=>$request->title, 'user_id' => auth()->user()->id]);

        $news->teams()->attach($request->team_id);

    return redirect('/news')->with('success','Thank you for publishing article on www.nba.com');


    }
}

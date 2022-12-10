<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){

        $news = News::latest()->paginate(10);

        return view('news.index', compact('news'));
    }

    public function show($id){

        $news = News::find($id);

        return view('news.show', compact('news'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Mail\CommentReceived;
use App\Models\Comment;
use App\Models\Team;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CommentsController extends Controller
{

    public function __construct(){
        $this->middleware(['auth', 'verified']);
    }

    public function store(StoreCommentRequest $request, $id){


        $team = Team::find($id);
        $team->addComment($request->content);

        Mail::send(new CommentReceived($team));

        return redirect()->back();

    }
}

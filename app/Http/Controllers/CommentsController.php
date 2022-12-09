<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;
use App\Models\Team;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(StoreCommentRequest $request, $id){

        $team = Team::find($id);
        $team->addComment($request->content);

        return redirect()->back();

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Team extends Model
{
    use HasFactory;

    public function players(){
        return $this->hasMany(Player::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function addComment($content){
        return Comment::create(['content' => $content, 'user_id' => auth()->user()->id, 'team_id' => $this->id]);
    }

    public function news(){
        return $this->belongsToMany(News::class, 'news_teams');
    }
}

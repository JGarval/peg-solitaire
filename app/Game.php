<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'time',
        'score',
        'isFinished',
        'board',
        'ball_color',
        'board_color',
        'music_on',
        'created_at',
        'uploaded_at',
        'music_on'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];
}

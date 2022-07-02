<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    protected $fillable = ['subject', 'description', 'priority', 'start_at', 'finish_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Psy\Util\Str;

class Question extends Model
{
    protected $fillable = ['title','slug', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title']=$value;
        $this->attributes['slug']=\Illuminate\Support\Str::slug($value);
    }
}

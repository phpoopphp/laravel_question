<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['votes_count', 'body', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::created(function ($answer) {
            $answer->question->increment("answers_count");

        });


        static::saved(function ($answer) {

        });
        static::deleted(function ($answer) {
            $question = $answer->question;
            $question->decrement("answers_count");
            if ($question->best_answer_id === $answer->id) {
                $question->best_answer_id = null;
                $question->save();
            }
        });

        static::updated(function ($answer) {

        });


    }

    public function getBodyHtmlAttribute()
    {
        return \Parsedown::instance()->text($this->body);
    }

    public function getStatusAttribute()
    {
        return $this->isBest ? 'vote-accepted' : null;
    }

    public function getIsBestAttribute()
    {
        return $this->isBest();
    }

    public function isBest()
    {
        return $this->id === $this->question->best_answer_id;

    }

    public function votes()
    {
        return $this->morphToMany(User::class,'votable');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [

        'task_name',
        'due_date',
        'complete'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasklist()
    {
        return $this->belongsTo(TaskList::class);
    }
}

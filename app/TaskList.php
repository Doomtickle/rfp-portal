<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskList extends Model
{
    protected $fillable = [

        'name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function addTaskToTaskList(Task $task)
    {
        return $this->tasks()->save($task);
    }
    public static function taskListInfo($name)
    {
        $name = strtolower(str_replace('_', ' ', $name));

        return static::where(compact('name'))->with('tasks')->first();

    }
}

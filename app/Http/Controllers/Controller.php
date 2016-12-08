<?php

namespace App\Http\Controllers;

use App\TaskList;
use App\User;
use Cmgmyr\Messenger\Models\Thread;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Controller constructor.
     */
    public function __construct()
    {
        view()->share('signedIn', Auth::check());
        view()->share('user', Auth::user());
        view()->share('users', User::all());
        view()->share('tasklists', TaskList::with('tasks')->get());
    }
}




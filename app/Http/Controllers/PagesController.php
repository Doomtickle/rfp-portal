<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|
     * \Illuminate\Http\RedirectResponse|
     * \Illuminate\Routing\Redirector|
     * \Illuminate\View\View
     */
    public function home()
    {
        if (Auth::check()) {
            return redirect('/home');
        } else {
            return view('welcome');
        }
    }

    public function about()
    {
        return view('about');
    }
}

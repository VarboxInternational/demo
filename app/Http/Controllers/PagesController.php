<?php

namespace App\Http\Controllers;

class PagesController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('welcome');
    }
}

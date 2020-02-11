<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Button;
class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $buttons = Button::all();
        return view('dashboard', compact('buttons'));
    }
}

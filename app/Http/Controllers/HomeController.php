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

    
    /**
     * Get link of a button by id.
     *
     * @return string
     */
    public function getBtnHref(Request $r)
    {
        $data = array();
        $button_id = $r->id;
        $button = Button::find($button_id);
        if ($button->link) {
            $data['href'] = $button->link;
            $data['error'] = null;
        } else {
            $data['href'] = null;
            $data['error'] = "Button has no link set. Please update button link <a href=".route('buttons.edit', $button_id).">here </a> .";
        }
        return $data;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Button;

class ButtonController extends Controller
{
    //Regex to validate the button link
    const REGEX_LINK = '/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buttons = Button::all();
        return view('buttons.index', compact('buttons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buttons.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'link'=>'regex:' . self::REGEX_LINK
        ]);

        $button = new Button([
            'title' => $request->get('title'),
            'link' => $request->get('link'),
            'color' => $request->get('color')
        ]);
        $button->save();
        return redirect('/buttons')->with('success', 'Button saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $button = Button::find($id);
        return view('buttons.edit', compact('button'));        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required',
            'link'=>'regex:' . self::REGEX_LINK
        ]);

        $button = Button::find($id);
        $button->title =  $request->get('title');
        $button->link = $request->get('link');
        $button->color = $request->get('color');
        $button->save();

        return redirect('/buttons')->with('success', 'Button updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $button = Button::find($id);
        $button->delete();

        return redirect('/buttons')->with('success', 'Button deleted!');
    }

    // public function getHref(Request $r) {
    //     $button = Button::find($r->id);
    //     if (isset($button->link) {
    //         return true; 
    //     } else {
    //         return false;
    //     }
    //  }

    /**
     * Get link of a button by id.
     *
     * @return string
     */
    public function getHref(Request $r)
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

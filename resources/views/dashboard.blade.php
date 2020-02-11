@extends('layouts.app')

@section('content')  
    @foreach($buttons->chunk(3) as $buttons_ch)
        <div class="row">
            @foreach($buttons_ch as $button)
                <div class="col-sm">
                    <a href="{{$button->link}}" class="btn btn-lg btn-custom" style="background-color: {{$button->color}}">{{$button->title}}</a>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection
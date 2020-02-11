@extends('layouts.app')

@section('content')
<div class="row">
<div class="col-sm-12">
    @if(session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}  
        </div>
    @endif
    <h1 class="display-3">Buttons list</h1>    
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Title</td>
          <td>Link</td>
          <td>Color</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($buttons as $button)
        <tr>
            <td>{{$button->id}}</td>
            <td>{{$button->title}}</td>
            <td>{{$button->link}}</td>
            <td>{{$button->color}}</td>
            <td>
                <a href="{{ route('buttons.edit',$button->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('buttons.destroy', $button->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection
@extends('layouts.app') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a button</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="list-style: none;">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="post" action="{{ route('buttons.update', $button->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" value={{ $button->title }} />
            </div>

            <div class="form-group">
                <label for="link">Link:</label>
                <input type="text" class="form-control" name="link" value={{ $button->link }} />
            </div>

            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" class="form-control" name="color" value={{ $button->color }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
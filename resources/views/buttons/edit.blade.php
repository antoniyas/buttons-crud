@extends('layouts.app') 
@section('content')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">{{ __('Update a button') }}</h1>

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

                <label for="title"{{ __('Title:') }}></label>
                <input type="text" class="form-control" name="title" value="{{ $button->title }}" />
            </div>

            <div class="form-group">
                <label for="link">{{ __('Link:') }}</label>
                <input type="text" class="form-control" name="link" value="{{ $button->link }}" />
            </div>

            <div class="form-group">
                <label for="color">{{ __('Color:') }}</label>
                <input type="text" class="form-control colorpicker" name="color" value="{{ $button->color }}" />
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
        </form>
    </div>
</div>
@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('.colorpicker').colorpicker();
    </script>
@stop
@extends('layouts.app') 
@section('content')

            <div class="form-group">
                <label for="color">Color:</label>
                <input type="text" class="form-control colorpicker" name="color" value="{{ $button->color }}" />
            </div>

@endsection

@section('javascript')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-colorpicker/2.5.3/js/bootstrap-colorpicker.min.js"></script>
    <script>
        $('.colorpicker').colorpicker();
    </script>
@stop
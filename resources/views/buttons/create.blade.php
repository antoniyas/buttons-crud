@extends('layouts.app')

@section('content')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">{{ __('Add a button') }}</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul style="list-style: none;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
    @endif
      <form method="post" action="{{ route('buttons.store') }}">
          @csrf
          <div class="form-group">    
              <label for="title">{{ __('Title:') }}</label>
              <input type="text" class="form-control" name="title"/>
          </div>

          <div class="form-group">
              <label for="link">{{ __('Link:') }}</label>
              <input type="text" class="form-control" name="link"/>
          </div>

          <div class="form-group">
              <label for="color">{{ __('Color:') }}</label>
              <input type="text" class="form-control" name="color"/>
          </div>            
          <button type="submit" class="btn btn-primary-outline">{{ __('Add button') }}</button>
      </form>
  </div>
</div>
</div>
@endsection

@section('javascript')
    <script>
      $(document).ready(function(){
        $('.colorpicker').ColorPicker();
      });
    </script>
@stop
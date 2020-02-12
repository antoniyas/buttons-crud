@extends('layouts.app')

@section('content')  
<div id="error" class="alert alert-danger" style="display: none;">
</div>
    @foreach($buttons->chunk(3) as $buttons_ch)
        <div class="row">
            @foreach($buttons_ch as $button)
                <div class="col-sm">
                <a href="javaScript:void(0);" data-id="{{$button->id}}" class="btn btn-lg btn-custom" style="background-color: {{$button->color}}" onclick="setBtnHref({{$button->id}})"
                    >{{$button->title}}
                </a>
                </div>
            @endforeach
        </div>
    @endforeach
@endsection

@section('javascript')
    <script>
        function setBtnHref(id) {
            $.ajax({
                type: 'POST',
                url: "{{ route('getHref') }}",
                data: {
                    _token: '<?php echo csrf_token() ?>',
                    id: id
                },
                success: function(data){
                    $("#error").css("display", "none");
                    $("#error").html();
                    if(data.href && !data.error) {
                        window.location.href= data.href;
                    }
                    else {
                        $("#error").css("display", "block");
                        $("#error").html(data.error);
                    }
                }
            });
        }
    </script>
@stop
@extends('welcome')
@section('content')
<div id="chartContainer" style="height: 300px; width: 100%;">Hilook</div>

    <script>
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  
    </script>
@endsection
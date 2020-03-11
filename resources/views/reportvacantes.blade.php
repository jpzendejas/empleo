@extends('layouts.admin')
@section('content')
{{Form::token()}}
<div id="chart1"></div>

{!! $chart1 !!}

@endsection

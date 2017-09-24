@extends('layouts.master')

@section('content')
    
  <div class="row">
    <h3>[Tasks]</h3>
  </div>
    
  <div class="row [tasks]">
    @each('[tasks].show', [$tasks], '[task]', 'No [tasks] found!')
  </div>
    
@endsection

@extends('layouts.master')

@section('content')
    
  <div class="row">
    <h3>[Tasks]</h3>
  </div>
    
  <div class="row [tasks]">
    @each('[tasks].show-as-list-item', [$tasks], '[task]', 'No [tasks] found!')
  </div>
    
@endsection

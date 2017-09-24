@extends('layouts.master')

@section('content')

  <form class="form-horizontal" method="POST" action="{{ route('[tasks]') }}">
    @include('layouts.error')

    {{ csrf_field() }}

    <!-- hidden field for datepicker -->
    <input type="hidden" id="datepicker-alternative-date" name="datepicker-alternative-date">

    <!-- text -->
    <div class="form-group">
      <label class="control-label" for="title">Title</label>
      <input type="text" id="title" class="form-control" name="title" value="{{ old('title') or [$task]->title }}" required>
    </div>

    <!-- textarea -->
    <div class="form-group">
      <label class="control-label" for="description">Description</label>
      <textarea id="description" class="form-control" name="description" value="{{ old('description') or [$task]->description }}" rows="10"></textarea>
    </div>

    <!-- datepicker -->
    <div class="form-group">
      <label class="control-label" for="date">Date</label>
      <input type="text" id="date" class="custom-select form-control" name="date" value="{{ old('date') or [$task]->date }}" />
    </div>

    <!-- select -->
    <div class="form-group">
      <label class="control-label" for="status">Status</label>              
      <select id="status" class="custom-select form-control" name="status" required>
        @if( ! old('status') )
          @if( ! [$task]->status )
          <option selected disabled hidden value>Please select!</option>
          @endif
          <option {{ [$task]->status == 1  ? 'selected' : '') }} value="1">In preparation</option>
          <option {{ [$task]->status == 2  ? 'selected' : '') }} value="2">Finished</option>
          <option {{ [$task]->status == 3  ? 'selected' : '') }} value="3">Canceled</option>
        @else
          <option {{ old('status') == 1  ? 'selected' : '') }} value="1">In preparation</option>
          <option {{ old('status') == 2  ? 'selected' : '') }} value="2">Finished</option>
          <option {{ old('status') == 3  ? 'selected' : '') }} value="3">Canceled</option>
        @endif
      </select>
    </div>

    <!-- submit -->
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Save</button>
    </div>

  </form>
    
@endsection

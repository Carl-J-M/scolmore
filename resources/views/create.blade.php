@extends('layout')
@section('content')
<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="card push-top">
  <div class="card-header">
    Send A Text Message!
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('messages.store') }}">
          <div class="form-group">
                @csrf
                <label for="number">Enter Tel:</label>
                <input type="tel" class="form-control" name="number" maxlength="11"/>
          </div>
          <div class="form-group">
                <label for="message">Enter Message:</label>
                <input type="text" class="form-control" name="message" maxlength="140"/>
          </div>
          <button type="submit" class="btn btn-block btn-success" href="/messages">Send SMS</button>
      </form>
  </div>
</div>
@endsection

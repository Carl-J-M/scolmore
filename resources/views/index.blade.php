@extends('layout')

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>

<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Number</td>
          <td>Message</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $messages)
        <tr>
            <td>{{$messages->number}}</td>
            <td>{{$messages->message}}</td>
            <td class="text-center">
                <a href="{{ route('messages.edit', $messages->id)}}" class="btn btn-primary btn-sm">Edit</a>
                <form action="{{ route('messages.destroy', $messages->id)}}" method="post" style="display: inline-block">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">
                    Delete
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

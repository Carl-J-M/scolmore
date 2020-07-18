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
    </div>
    <br/>
  @endif
  <table class="table">
    <thead>
        <tr class="table-warning">
          <td>Number</td>
          <td>Message</td>
          <td class="text-center">Status</td>
        </tr>
    </thead>
    <tbody>
        @foreach($messages as $messages)
        <tr>
            <td>0{{$messages->number}}</td>
            <td>{{$messages->message}}</td>
            <td class="text-center">
            <a class="btn btn-secondary btn-sm bg-success text-success">{{$messages->timestamps}}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

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
        @foreach($messages as $sms)
        <tr>
            <td>0{{$sms->number}}</td>
            <td>{{$sms->message}}</td>
            <td class="text-center">
            <a class="text-success">{{$sms->timestamps}}</a>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@endsection

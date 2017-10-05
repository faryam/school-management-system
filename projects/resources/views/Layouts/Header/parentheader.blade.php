@extends('Layouts.Header.header')


@section('user','PARENT')

@section('profile')

<form action="{{ route('parentprofile') }}" method="post" id="form-profilepost">
  {{csrf_field()}}
  <input type="hidden" name="id" value="{{Auth::guard('web')->user()->id}}" id="id">
</form>
@endsection


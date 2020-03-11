@extends('layouts.app')
@section('content')
<div class="container">
  {{ Form::open(['class'=>'verify-form','method'=>'post',  'route'=>'changePassword' ]) }}
  <div class="page-header">
    Reset Password Here
  </div>
  @if (session('status'))
    <div class="alert alert-success">
      {{ session('status') }}
    </div>
  @endif
  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
    {{ Form::password('password',['class'=>'verify-input','placeholder'=>'New Password'])}}
    @if (isset($token))
      {{ Form::hidden('token', $token) }}
    @endif
    @if ($errors->has('password'))
      <span class="help-block">
        <strong>{{ $errors->first('password') }}</strong>
      </span>
    @endif
  </div>
  <div class="form-group">
    <button class="verify-btn">
      Reset Password
    </button>
  </div>
  {{ Form::close() }}
</div>
@endsection
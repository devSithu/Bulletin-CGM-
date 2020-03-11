@extends('layouts.app')
@section('content')
<div class="container">
  {{ Form::open(['class'=>'verify-form','method'=>'post', 'route'=>'password.email']) }}
  <div class="page-header">
    Verify Your Email Address
  </div>
  <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
    {{ Form::text('email',null,['class'=>'verify-input', 'id'=>'email','placeholder'=>'Enter Your Email']) }}
    @if ($errors->has('email'))
      <span class="help-block">
        <strong>{{ $errors->first('email') }}</strong>
      </span>
    @endif
  </div>
  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  @if (session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif
  <div class="form-group">
    <button type="submit" class="verify-btn">
      Send Reset Link
    </button>
  </div>
  {{ Form::close() }}
</div>
@endsection
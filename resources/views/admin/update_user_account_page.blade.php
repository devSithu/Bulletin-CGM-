@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{url('user_logout')}}" style="margin-left:1050px">Logout</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
           
           <h3>Update User Account</h3>
           
            <!-- form -->

            <form action="update_user_account_info/{{$data->id}}" class="needs-validation" novalidate id="myForm" method="POST">
            @if(session('status'))
           <p class="alert alert-success">{{session('status')}}</p>
           @endif

            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name:</label>
                {{ Form::text('name', $data->name, ['class' => 'form-control', 'name' => 'name', 'required' => true, 'placeholder' => 'Enter Name']) }}
                @error('name')
                <span> <p class="alert alert-danger">{{ $message }}</p></span>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Email:</label>
                {{ Form::text('email', $data->email, ['class' => 'form-control', 'name' => 'email', 'required' => true, 'placeholder' => 'Enter Email']) }}
                @error('email')
                <span> <p class="alert alert-danger">{{ $message }}</p></span>
                @enderror
            </div>
            
            <div class="form-group">
                <label for="name">Is Admin:</label>
                {{ Form::text('isAdmin', $data->isAdmin, ['class' => 'form-control', 'name' => 'isAdmin', 'required' => true, 'placeholder' => 'Enter Admin 0 or 1']) }}
                @error('isAdmin')
                <span> <p class="alert alert-danger">{{ $message }}</p></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="name">Is Vip:</label>
                {{ Form::text('isVip', $data->isVip, ['class' => 'form-control', 'name' => 'isVip', 'required' => true, 'placeholder' => 'Enter Vip 0 or 1']) }}
                @error('isVip')
                <span> <p class="alert alert-danger">{{ $message }}</p></span>
                @enderror
            </div>

            <div style="margin-left:500px">
            
            <a href="{{url('/look_user_info')}}"><input type="button" value="Back" class="btn btn-success"></a>
            &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Update" class="btn btn-primary" >
            </div>
            
            </form>

            <!-- close form -->
        </div>
    </div>
</div>


@endsection

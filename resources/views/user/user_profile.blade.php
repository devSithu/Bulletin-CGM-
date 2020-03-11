@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{url('user_logout')}}" style="margin-left:1050px">Logout</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
           
           <h3>User Profile</h3>
           
            <!-- form -->

            <form action="update_user_profile/{{$data->id}}" class="needs-validation" novalidate id="myForm" method="POST">
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
             
             <a href="{{url('/change_password/'.$data->id)}}">Change Password...</a>
            
            

            <div style="margin-left:500px">
            
            <a href="{{url('/home')}}"><input type="button" value="Back" class="btn btn-success"></a>
            &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Update" class="btn btn-primary" >
            </div>
            
            </form>

            <!-- close form -->
        </div>
    </div>
</div>


@endsection

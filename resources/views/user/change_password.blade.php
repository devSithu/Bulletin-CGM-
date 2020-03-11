@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{url('user_logout')}}" style="margin-left:1050px">Logout</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
           
           <h3>Change Password</h3>
           
            <!-- form -->

            <form action="change/{{$data->id}}" class="needs-validation" novalidate id="myForm" method="POST">
            @if(session('status'))
           <p class="alert alert-success">{{session('status')}}</p>
           @endif
           @if(session('error'))
           <p class="alert alert-danger">{{session('error')}}</p>
           @endif
           @if(session('success'))
           <p class="alert alert-success">{{session('success')}}</p>
           @endif

            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Old Password:</label>
                {{ Form::password('old_password', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Old Password']) }}
                @error('old_password')
                <span> <p class="alert alert-danger">{{ $message }}</p></span>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">New Password:</label>
                {{ Form::password('password',['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter New Password']) }}
                @error('password')
                <span> <p class="alert alert-danger">{{ $message }}</p></span>
                @enderror
            </div>

            <div class="form-group">
                <label for="title">Confirm Password:</label>
                {{ Form::password('confirm_password', ['class' => 'form-control', 'required' => true, 'placeholder' => 'Retype New Password Again']) }}
                @error('confirm_password')
                <span> <p class="alert alert-danger">{{ $message }}</p></span>
                @enderror
            </div>
             
             
            

            <div style="margin-left:500px">
            
            <a href="{{url('/look_info/'.$data->id)}}"><input type="button" value="Back" class="btn btn-success"></a>
            &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Update" class="btn btn-primary" >
            </div>
            
            </form>

            <!-- close form -->
        </div>
    </div>
</div>


@endsection

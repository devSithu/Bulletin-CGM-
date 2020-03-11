@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{url('user_logout')}}" style="margin-left:1050px">Logout</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
           
           <h3>Create News</h3>
           
            <!-- form -->

            <form action="update/{{$data->id}}" class="needs-validation" novalidate id="myForm" method="POST">
            @if(session('status'))
           <p class="alert alert-success">{{session('status')}}</p>
           @endif

            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name:</label>
                {{ Form::text('name', $data->name, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Name']) }}
                @error('name')
                <span> <p class="alert alert-danger">{{ $message }}</p></span>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                {{ Form::text('title', $data->title, ['class' => 'form-control', 'required' => true, 'placeholder' => 'Enter Title']) }}
                @error('title')
                <span> <p class="alert alert-danger">{{ $message }}</p></span>
                @enderror
            </div>
            <div class="form-group">
            <label for="object">Object:</label>
            <textarea class="form-control" rows="5" id="object" name="object" placeholder="Enter Object">{{$data->object}}</textarea>
            @error('object')
                <span> <p class="alert alert-danger">{{ $message }}</p></span>
                @enderror
            </div>
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

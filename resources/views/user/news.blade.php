@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{url('user_logout')}}" style="margin-left:1050px">Logout</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
           
           <h3>Create News</h3>
           
            <!-- form -->

            <form action="add_news" class="needs-validation" novalidate id="myForm" method="POST">
            @if(session('status'))
           <p class="alert alert-success">{{session('status')}}</p>
           @endif

            {{csrf_field()}}
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                @error('name')
                <span> <p class="alert alert-danger">{{ $message }}</p></span>
                @enderror
            </div>
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" id="title" placeholder="Enter Object Title" name="title" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
                @error('title')
                <span> <p class="alert alert-danger">{{ $message }}</p></span>
                @enderror
            </div>
            <div class="form-group">
            <label for="object">Object:</label>
            <textarea class="form-control" rows="5" id="object" name="object" placeholder="Enter Object"></textarea>
            </div>
            @error('object')
                <span> <p class="alert alert-danger">{{ $message }}</p></span>
                @enderror
            <div style="margin-left:500px">
                
            
            <a href="{{url('/home')}}"><input type="button" value="Back" class="btn btn-success"></a>
            &nbsp; &nbsp; &nbsp; &nbsp;
            <input type="submit" value="Post" class="btn btn-primary" >
            </div>
            
            </form>

            <!-- close form -->
        </div>
    </div>
</div>


@endsection

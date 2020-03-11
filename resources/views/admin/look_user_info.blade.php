@extends('layouts.app')

@section('content')
<div class="container">
<a href="{{url('user_logout')}}" style="margin-left:1050px">Logout</a>
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h3>User Data</h3>
        @if(session('status'))
           <p class="alert alert-success">{{session('status')}}</p>
           @endif
        <table class="table table-dark table-striped">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Is Admin</th>
                <th>Is VIP</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                @foreach($data as $res)
                    <tr>
                    <td>{{$res->name}}</td>
                    <td>{{$res->email}}</td>
                    <td>{{$res->isAdmin}}</td>
                    <td>{{$res->isVip}}</td>
                    <td>
                    
                    <a href="{{url('update_user_account_page/'.$res->id)}}"><button class="btn btn-success">Update</button></a> &nbsp; &nbsp;
                    <a href="{{url('/delete_user_account/'.$res->id)}}"><button class="btn btn-danger">Delete</button></a>
                    </td>
                    
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{url('/home')}}"><button class="btn btn-warning">Back</button></a>&nbsp; &nbsp;
        </div>
    </div>
</div>
@endsection

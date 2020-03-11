@extends('layouts.app')

@section('content')
<div class="container p-3 my-3 border" >
<a href="{{url('user_logout')}}" style="margin-left:950px; color:green;font-size:26px;" ><b>Logout</b></a>
    <div class="row justify-content-center">
        <div class="col-md-8"> 
       <marquee ><h3>Laravel --> <b>Bulletin</b> </h3></marquee>     <h5 style="color:red;">Role - {{ session()->get('AUTH')->isVip == 1 ? 'VIP Person' : 'Simple Person' }}  
        / {{ session()->get('AUTH')->isAdmin == 1 ? 'Admin' : 'Not Admin' }}</h5> <br> <br>
           
           @if(session('status'))
           <p class="alert alert-success alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>   
            {{session('status')}}</p>
           @endif
           @if(session('error'))
           <p class="alert alert-danger">{{session('error')}}</p>
           @endif
           <h3><div style="color:green;font-size:40px">{{session()->get('AUTH')->name}}</div>  </h3>
            <a href="{{url('/create_news_page')}}"><button class="btn btn-primary">Create News</button></a>

            <a href="{{url('/look_info/'.session()->get('AUTH')->id)}}"><button class="btn btn-info">My Profile</button></a>
         
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

            <a href="{{url('/look_user_info')}}"><button class="btn btn-success">Look User Info</button></a>

           
    <br><br><br>
    <div style="width:100%;">{{ $data->links() }}</div> 
    
            @foreach($data as $res)

            <div>
                <br><br>
            
           {{-- <div style="margin-left:500px"> {{$res->created_at->diffForHumans()}}</div> --}}
          


            <h4 class="text-danger">Post By Account({{$res->user->name}})</h4>
           

            <div class="alert alert-primary">
                <h4 style="color:green;">{{$res->name}}</h4> <hr>
            
            <legend>Level - {{$res->title}}</legend> <hr>
            <p>{{$res->object}}</p> <hr>
           
            <div style="margin-left:480px;">
            </div>
            
            

           <!-- <input type="text" id="dis1" value="{{$res->user_id}}">
           <input type="text" id="dis2" value="{{session()->get('AUTH')->id}}"> -->


            <a href="{{url('update_page/'.$res->id)}}"><button class="btn btn-warning">Update</button></a> &nbsp;
            <a href="{{url('delete_news/'.$res->id)}}" style="color:red;"><button class="btn btn-danger">Delete</button></a>
           
            
           
            </div>
            
            </div>

            @endforeach

          

        </div>
    </div>
</div>

@endsection

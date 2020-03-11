<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\News;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Contracts\Service\NewsServiceInterface;

class NewsController extends Controller
{
    private $newsService;
    public function __construct(NewsServiceInterface $newsService)
    {
        $this->middleware('auth');
        $this->newsService = $newsService;
    }
   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function create_news_page(){
        return view('user.news');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // News::create([
        //     'user_id' => Auth::user()->id,
        //     'name' => $request->name,
        //     'title' => $request->title,
        //     'object' => $request->object,
        // ]);

        // return redirect('create_news_page')->with('status','You Successfully Created');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
            'object' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $this->newsService->store($request);
        return back()->with('status', 'Insert Success!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $update=News::findOrFail($id)->update($request->all());
        // return redirect('home')->with('status','Update Success');
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'title' => 'required',
            'object' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        $this->newsService->update($request,$id);
        return back()->with('status', 'Success Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $data=News::findOrFail($id)->delete();
        // return redirect('home')->with('status','Delete Success!');
        $this->newsService->destroy($id);
        return back()->with('status', 'Delete Success!');

    }

    public function update_page($id){
        // $result=News::findOrFail($id);
        // return view('user.update_news_page')->with('data',$result);
        $userData=$this->newsService->update_page($id);
        return view('user.update_news_page')->with('data', $userData);
    }


    }

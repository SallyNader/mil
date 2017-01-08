<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
class VideoControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $videos=Video::all();
         return view('control.videos.all',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('control.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       

       $this->validate($request,[

'name'=>'required',


'youtube'=>'required',


        ]);


       Video::create([

'vName'=>$request->get('name'),
'vDisc'=>$request->get('description'),
'appearInHome'=>$request->get('approved'),
'youtubeLink'=>$request->get('youtube')



        ]);

       return redirect('controlvideo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $video=Video::find($id);

       return view('control.videos.detail',compact('video'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $video=Video::find($id);
        return view('control.videos.edit',compact('video'));
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
       $this->validate($request,[

'name'=>'required',


'youtube'=>'required',


        ]);

       $video=Video::find($id);

       $video->vName=$request->get('name');


$video->vDisc=$request->get('description');

$video->appearInHome=$request->get('approved');

$video->youtubeLink=$request->get('youtube');

$video->save();
return redirect('controlvideo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $video=Video::find($id);

       $video->delete();

       return redirect()->back();
    }
}

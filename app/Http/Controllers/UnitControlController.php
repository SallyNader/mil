<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;
use DateTime;
use Carbon\Carbon;
class UnitControlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       

       $units=Unit::all();

       return view('control.units.all',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

        return view('control.units.create');
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


       'code'=>'required|unique:units,uCode',

       'type'=>'required',


       'rooms'=>'required|numeric',



       'sqm'=>'required|numeric',


       'land'=>'required|numeric',

       'furnished'=>'required',


       'price'=>'required|numeric',


       'currency'=>'required',


       'bedroom'=>'required|numeric',


       'bathroom'=>'required|numeric',


       'yearcharge'=>'required',


       'country'=>'required',


       'city'=>'required',


       'region'=>'required',


       'project'=>'required',


       'file'=>'required',










            ]);


$now = new DateTime();
$file=$request->file('file');

$path=public_path()."/unit";
$newName=rand(1111,9999).".".$file->getClientOriginalName();

        if($file->move($path,$newName)){



Unit::create([



'uCode'=>$request->get('code'),
'uType'=>$request->get('type'),


'uNRooms'=>$request->get('rooms'),


'uAreaSQM'=>$request->get('sqm'),


'uLandArea'=>$request->get('land'),

'uFurnished'=>$request->get('furnished'),


'uParking'=>$request->get('parking'),


'uPrice'=>$request->get('price'),


'uPriceType'=>$request->get('currency'),
'uNBedRooms'=>$request->get('bedroom'),


'uNBathRooms'=>$request->get('bathroom'),


'uYearlyServiceCharge'=>$request->get('yearcharge'),


'uDescription'=>$request->get('description'),


'uCountry'=>$request->get('country'),


'uTypeStatus'=>$request->get('status'),


'uCategory'=>$request->get('category'),

'uCity'=>$request->get('city'),
'uRegion'=>$request->get('region'),
'uProject'=>$request->get('project'),
'uFirstImage'=>$newName,
'uDate'=>$now->format('Y-m-d')







    ]);



return redirect('controlunit');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $unit=Unit::find($id);


        return view('control.units.detail',compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $unit=Unit::find($id);

        return view('control.units.edit',compact('unit'));
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

        $file=$request->file('file');
        $this->validate($request,[


       'code'=>'required|unique:units,uCode',

       'type'=>'required',


       'rooms'=>'required|numeric',



       'sqm'=>'required|numeric',


       'land'=>'required|numeric',

       'furnished'=>'required',


       'price'=>'required|numeric',


       'currency'=>'required',


       'bedroom'=>'required|numeric',


       'bathroom'=>'required|numeric',


       'yearcharge'=>'required',


       'country'=>'required',


       'city'=>'required',


       'region'=>'required',


       'project'=>'required',


     










            ]);

$unit=Unit::find($id);

        if(!empty($file)){
            $path=public_path()."/unit";
            $newName=rand(1111,9999).".".$file->getClientOriginalName();


            if($file->move($path,$newName)){


$unit->uFirstImage=$newName;

            }
        }







$unit->uCode =$request->get('code');
$unit->uType =$request->get('type');

$unit->uNRooms =$request->get('rooms');
$unit->uAreaSQM =$request->get('sqm');
$unit->uLandArea =$request->get('land');
$unit->uFurnished =$request->get('furnished');
$unit->uParking =$request->get('parking');
$unit->uPrice =$request->get('price');
$unit->uPriceType =$request->get('currency');
$unit->uNBedRooms =$request->get('bedroom');
$unit->uNBathRooms =$request->get('bathroom');
$unit->uYearlyServiceCharge =$request->get('yearcharge');
$unit->uDescription =$request->get('description');
$unit->uCountry =$request->get('country');
$unit-> uTypeStatus=$request->get('status');
$unit->uCategory =$request->get('category');
$unit-> uCity=$request->get('city');
$unit-> uRegion=$request->get('region');
$unit-> uProject=$request->get('project');
$unit->save();

return redirect('controlunit');







    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        

        $unit=Unit::find($id);

        unlink(public_path()."/unit/".$unit->uFirstImage);

        $unit->delete();
        return redirect()->back();
    }
}

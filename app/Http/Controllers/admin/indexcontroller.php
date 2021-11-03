<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\saat;
use App\Models\randevunot;
class indexcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function calismasaatleri()
    {
        return view('admin.calismasaatleri');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all=$request->except('_token');
        saat::query()->delete();
        foreach ($all as $key => $value) {
            foreach($value as $k=>$v){
                if($key=='pazar'){
                     $key=7;
                }
                if($key=='cumartesi'){
                     $key=6;
                }
                if($key=='cuma'){
                     $key=5;
                }
                if($key=='persembe'){
                     $key=4;
                }
                if($key=='carsamba'){
                     $key=3;
                }
                if($key=='sali'){
                     $key=2;
                }
                if($key=='pazartesi'){
                     $key=1;
                }
                saat::create([
                    'day'=>$key,
                    'hours'=>$v
                ]);
            }
        }
        return response()->json($all);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getcalismalist()
    {
        $data=saat::get();
        return response()->json($data);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function detaykaydet(Request $request)
    {
        $returnArray=[];
        $all=$request->except('_token');
        $create=randevunot::create([
            'randevu_id'=>$all['id'],
            'text'=>$all['text']
        ]);
        if($create){
            $returnArray['status']=true;

        }
        else{
            $returnArray['status']=false;
        }
        return response()->json($returnArray);

    }
}

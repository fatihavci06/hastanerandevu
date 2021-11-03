<?php

namespace App\Http\Controllers\api\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\saat;
use App\Models\Randevu;
class indexcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getList()
    {
        $data=Randevu::where('date','>',date('Y-m-d'))->with('randevusaati')->orderBy('workingHour','asc')->paginate(1);
        return response()->json($data);
    }
     public function onayBekleyen()
    {
        $data=Randevu::where('isAktive',0)->with('randevusaati')->orderBy('workingHour','asc')->paginate(1);
        return response()->json($data);
    }
    public function getLastList()
    {
        $data=Randevu::where('isAktive',1)->where('date','<',date('Y-m-d'))->with('randevusaati')->orderBy('workingHour','asc')->paginate(1);
        return response()->json($data);
    }
    public function gettodaylist()
    {
        $data=Randevu::where('isAktive',1)->where('date',date('Y-m-d'))->with('randevusaati')->orderBy('workingHour','asc')->paginate(1);
        return response()->json($data);
    }
    public function getiptallist()
    {
        $data=Randevu::where('isAktive',2)->with('randevusaati')->orderBy('workingHour','asc')->paginate(1);
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        
         $randevu=Randevu::findOrFail($request->id);
        $randevu->isAktive=$request->type;
        
        $randevu->save();
        return response()->json(['status'=>true]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function randevudetay($id)
    {
        $data=Randevu::where('id',$id)->with('randevusaati')->with('randevunotu')->first();
        return response()->json($data);
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
    public function randevuhastaekrani(Request $request)
    {
        $kod=$request->code;

        $control=Randevu::where('code',$kod)->count();
        if($control>0){
            $data=Randevu::where('code',$kod)->with('randevunotu')->with('randevusaati')->first();
            $data->status=true;
            return response()->json($data);
        }
        else{
            return response()->json(['message'=>'Randevu bulunamadı','status'=>false]);
        }
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
    public function destroy($id)
    {
        //
    }
}

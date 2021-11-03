<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\saat;
use App\Models\Randevu;
class IndexController extends Controller
{
    public function getWorkingHours($date=""){
        if($date==""){
            $date=date('Y-m-d');
        }

        $day=date('l',strtotime($date));
        if($day=='Monday'){$day=1;}
        if($day=='Tuesday'){$day=2;}
        if($day=='Wednesday'){$day=3;}
        if($day=='Thursday'){$day=4;}
        if($day=='Friday'){$day=5;}
        if($day=='Saturday'){$day=6;}
        if($day=='Sunday'){$day=7;}
        
        $saatler=saat::where('day',$day)->get();

        $returnArray=[];
        foreach ($saatler as  $saat) {
            $control=Randevu::where('date',$date)->where(function($control){ //
                $control->orWhere('isAktive',1);
                $control->orWhere('isAktive',0);
            })->where('workingHour',$saat->id)->count();
            $randevuSaat=explode('-',$saat->hours);
            $now=date('H.i');
            if($control==0 && $randevuSaat[0]>$now){
                $saat->isAktive=true;                    
            }
            else{
                 $saat->isAktive=false;  
            }
            
            $returnArray[]=$saat;
        }
        
        return response()->json($returnArray);
        
    }
    public function randevuKaydet(Request $request){
        $returnArray=[];
        $returnArray['status']='false';
        $all=$request->except('_token'); //token harici tüm verileri aldık

        $control=Randevu::where('date',$all['date'])->where(function($control){
            $control->orWhere('isAktive',0);
            $control->orWhere('isAktive',1);
        })->where('workingHour',$all['workingHour'])->count();
        if($control!=0){
            $returnArray['message']='Bu randevu tarihi doludur';
            return response()->json($returnArray);
        }
        $all['code']=substr(md5(uniqid()),0,6);
        $create=Randevu::create($all);
        if($create){
           $returnArray['status']='false';
           $returnArray['message']='Randevunuz Başarıyla Oluşturuldu';
        }
        else{
             $returnArray['message']='Randevunuz Oluşturulamadı.Bizimle iletişime geçiniz';

        }
         return response()->json($returnArray);
    }
}

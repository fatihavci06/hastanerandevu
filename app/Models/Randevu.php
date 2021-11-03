<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\saat;
use App\Models\Randevu;
use App\Models\randevunot;

class Randevu extends Model
{
    use HasFactory;
    protected $guarded=[];
        public function randevusaati(){
      return  $this->hasOne(saat::class, 'id', 'workingHour');  //post tablosundaki user benim(user tablosu) idime eşit demek
    }
    public function randevunotu(){
      return  $this->hasMany(randevunot::class, 'randevu_id', 'id');  //post tablosundaki user benim(user tablosu) idime eşit demek
    }
}

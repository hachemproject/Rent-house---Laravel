<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservations extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
   protected $fillable = ['date_deb','date_fin','home_id','user_id'];

   public function homes()
   { 
       return $this->belongsTo(homes::class, 'id','home_id');
   }
   public function User()
   { 
       return $this->belongsTo(User::class, 'id','user_id');
   }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class images extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['photos','home_id'];


    public function homes()
    { 
        return $this->belongsTo(homes::class, 'id','home_id');
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class homes extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['nb_place','ville','adresse','bath','num_tel','description','prix','category_id'];


public function categorys()
{ 
    return $this->belongsTo(categorys::class, 'id','category_id');
}




}




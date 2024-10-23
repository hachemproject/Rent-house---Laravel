<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messages extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $fillable = ['message','email','name','is_active','subject'];
} 
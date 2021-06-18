<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluar extends Model
{
    use HasFactory;
    protected $table='userkeluar';
    protected $fillable=['nama','email','masuk','id_user','keluar'];
}

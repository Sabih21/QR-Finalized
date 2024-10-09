<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resident extends Model
{
    protected $fillable = [
      'user_id', 'properties_id', 'name' ,'address', 'phone_number','qr_code', 'email','password'
    ];
    use HasFactory, SoftDeletes;

    public function properties(){
        return $this->hasOne(Properties::class);
    }

    public function visitors(){
        return $this->hasMany(Visitor::class);
    }



}

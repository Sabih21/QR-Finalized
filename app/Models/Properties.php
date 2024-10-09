<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Properties extends Model
{
    protected $fillable = ['house_no', 'address',];

    use HasFactory, SoftDeletes;

    public function resident(){
        return $this->belongsTo(Resident::class);
    }
}

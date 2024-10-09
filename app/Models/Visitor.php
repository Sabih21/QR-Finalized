<?php

namespace App\Models;
use app\Models\Visitoraccess;
use app\Models\Resident;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Visitor extends Model
{
    protected $fillable = ['resident_id', 'email', 'name', 'qr_code', 'phone_number'];
    use HasFactory, SoftDeletes;

    public function visitoraccess(){
         return $this->hasMany(Visitoraccess::class);
    }

    public function residents()
    {
        return $this->belongTo(Resident::class);
    }
    public function getStatusAttribute()
{
    $current_time = Carbon::now();

    // If the visitor has been soft-deleted, return status 2
    if ($this->deleted_at != null) {
        return 2;
    }

    // Check each visitoraccess record
    foreach ($this->visitoraccess as $access) {
        $start_time = Carbon::parse($access->start_time);
        $end_time = Carbon::parse($access->end_time);

        // Check if the current time is between the start and end times
        if ($current_time->between($start_time, $end_time)) {
            return 1; // The visitor has an active access record
        }
    }

    return 2; // No active access record found
}

}

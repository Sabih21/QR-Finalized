<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;


class Visitoraccess extends Model
{

    protected $fillable = ['visitor_id','start_time','end_time', 'secret'];
    use HasFactory, SoftDeletes;

    public function Visitors(){
        return $this->belongsTo(Visitor::class);
    }

    public function getAccessAttribute(){
        
        $start_time = Carbon::parse($this->start_time);
        $end_time = Carbon::parse($this->end_time);

        $current_time = Carbon::now();

        if($this->deleted_at != null)
            return "<span class='badge badge-secondary'> Deactivated </span>";


        // Check if current time is between start and end times
        if ($current_time->between($start_time, $end_time)) {
            return "<span class='badge badge-success'> Active </span>";
        } 
        
        return "<span class='badge badge-secondary'> Expired </span>";
        
    } 
    public function getStatusAttribute(){
        
        $start_time = Carbon::parse($this->start_time);
        $end_time = Carbon::parse($this->end_time);

        $current_time = Carbon::now();

        if($this->deleted_at != null)
            return 2;


        // Check if current time is between start and end times
        if ($current_time->between($start_time, $end_time)) {
            return 1;
        } 
        
        return 3;
        
    } 

}

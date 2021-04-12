<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ADS extends Model
{
    use HasFactory;
    protected $table = 'ads';
    protected $fillable = [
        'title','description','url','image','duration','views','status','date_from','date_to','created_at','updated_at','id'
    ];
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function scopeSelection($query)
    {
        return $query->select('id','title','date_from','date_to','status');
    }
    public function scopeDateTo($query)
    {
        return $query->where('date_to','>=',Carbon::now());
    }
    public function scopeDateFrom($query)
    {
        return $query->where('date_from','<=',Carbon::now());
    }
    public function getActive()
    {
        return $this->status == 1 ? 'Active' : ' InActive  ';

    }
    public function getImageAttribute($val)
    {
        return ($val !== null) ? asset( '/assets/' . $val) : "";

    }
}

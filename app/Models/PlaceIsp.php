<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlaceIsp extends Model
{
    use HasFactory;
    protected $table = 'place_isp';
    protected $fillable = [
        'placeId',
        'ispId'
    ];

    public function isp(){
        return $this->belongsTo(Isp::class, 'ispId','id');
    }
}

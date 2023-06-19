<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $table = 'place';
    protected $fillable = [
        'name',
        'address',
        'phoneNumber',
        'createdBy',
        'typeId'
    ];

    public function type(){
        return $this->belongsTo(Type::class, 'typeId', 'id');
    }

    public function isp(){
        return $this->hasMany(PlaceIsp::class,'placeId');
    }
}

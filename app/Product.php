<?php

namespace App;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function supplier(){
        return $this->belongsTo(User::class);
    }

    public function scopeGetReceived(Builder $builder){
        return $builder->where('status', 1);
    }
}

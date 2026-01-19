<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasFactory;

    public function WeightTargets(){
        return $this->hasMany(WeightTarget::class);
    }

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}

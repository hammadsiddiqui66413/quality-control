<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $guard = 'client';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function reports()
    {
        return $this->hasMany(Report::class);
    }


    public function terminals()
    {
        return $this->hasMany(Terminal::class);
    }

     public function jobs()
    {
        return $this->hasMany(Job::class);
    }
}
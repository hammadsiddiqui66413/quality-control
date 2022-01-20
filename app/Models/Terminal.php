<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;


class Terminal extends Authenticatable
{
    use HasFactory, SoftDeletes;
    protected $guard = 'terminal';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'client_id', 'plan_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function subscription()
    {
        return $this->hasOne(Subscription::class);
    }

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function tests()
    {
        return $this->belongsToMany(Test::class, 'plan_test', 'plan_id', 'test_id')
                        ->withTimeStamps();
    }

    public function terminals()
    {
        return $this->hasMany(Terminal::class);
    }

    public function getAvailableTests()
    {
        
        return Plan::with('tests')->get(array('id','name'))->where('status', 'complete');
    }
}

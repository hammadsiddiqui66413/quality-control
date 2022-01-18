<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function plans()
    {
        return $this->belongsToMany(Plan::class, 'plan_test', 'test_id', 'plan_id')
                        ->withTimeStamps();
    }
}

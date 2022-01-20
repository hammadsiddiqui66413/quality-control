<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    public function terminal()
    {
        return $this->belongsTo(Client::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    
}

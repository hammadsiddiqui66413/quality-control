<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function terminal()
    {
        return $this->belongsTo(Terminal::class);
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}

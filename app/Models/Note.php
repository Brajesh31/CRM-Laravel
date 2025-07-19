<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'client_id', 'user_id'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}


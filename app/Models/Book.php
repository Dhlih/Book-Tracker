<?php

namespace App\Models;

use App\Models\Log;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ["title", "author", "total_page", "status", "cover", "last_read_at", "user_id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class)->orderBy('read_at', direction: 'desc');
    }
}

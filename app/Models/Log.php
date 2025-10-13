<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $fillable = [
        'user_id',
        'book_id',
        'page_number',
        'duration',
        'read_at',
    ];

    public function book()
    {
        return $this->belongsTo(Book::class);
    }
}

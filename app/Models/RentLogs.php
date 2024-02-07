<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Book;

class RentLogs extends Model
{
    use HasFactory;

    protected $table = 'rent_logs';

    protected $fillable = [
        'users_id', 'book_id', 'ren_date', 'return_date',
        'actual_return_date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
    }

    public function book(): BelongsTo
    {
        return $this->belongsTo(Book::class, 'book_id', 'id');
    }
}

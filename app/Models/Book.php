<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'year',
        'author_id',
    ];
    public function author()
    {
        return $this->belongsTo(Author::class, 'author_id');
    }
}

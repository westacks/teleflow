<?php

namespace App\Models;

use App\Traits\FilterQueryString;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory, FilterQueryString;

    public $incrementing = false;

    protected $fillable = [
        'title',
        'photo_url',
        'description',
        'user_id',
    ];

    protected $hidden = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

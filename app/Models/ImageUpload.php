<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class ImageUpload extends Model
{

    protected $fillable = [
        'file_name',
        'file_path',
        'user_id',
    ];

    // image belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

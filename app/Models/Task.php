<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function userResponses() {
        return $this->hasMany(UserResponse::class, 'task_id');
    }

    public function theme() {
        return $this->belongsTo(Theme::class, 'theme_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $table = "social_media";
    protected $guarded = [];

    public function getUnansweredQuestionCountAttribute() {
        return count(array_filter($this->attributes));
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $guarded = [];
    public $timestamps = ["created_at"];

    public function setUpdatedAt($value)
    {
      return NULL;
    }
}

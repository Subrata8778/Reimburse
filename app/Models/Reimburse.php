<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reimburse extends Model
{
    use HasFactory;

    protected $table = "reimburses";
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, "user_nip");
    }
}

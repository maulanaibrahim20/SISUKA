<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminKec extends Model
{
    use HasFactory;

    protected $table = 'admin_kec';

    protected $guarded = [];


    public function userkec()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

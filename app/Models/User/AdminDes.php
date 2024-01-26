<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminDes extends Model
{
    use HasFactory;

    protected $table = 'admin_des';

    protected $guarded = [];

    public function userdes()

    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kecamatanRelation()
    {
        return $this->belongsTo(adminKec::class, 'kecamatan');
    }
}

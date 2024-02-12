<?php

namespace App\Models\AdminDes;

use App\Models\Desa;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffDesa extends Model
{
    use HasFactory;

    protected $table = 'staff_desa';

    protected $guarded = [''];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'desa_id', 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(JabatanDesa::class, 'jabatan_id', 'id');
    }
}

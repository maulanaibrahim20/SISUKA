<?php

namespace App\Models\AdminKec;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffKecamatan extends Model
{
    use HasFactory;

    protected $table = 'staff_kecamatan';

    protected $guarded = [''];

    public function jabatan()
    {
        return $this->belongsTo(JabatanKecamatan::class, 'jabatan_kecamatan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

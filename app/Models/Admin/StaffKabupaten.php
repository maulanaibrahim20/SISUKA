<?php

namespace App\Models\Admin;

use App\Models\Master\JabatanKabupaten;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StaffKabupaten extends Model
{
    use HasFactory;

    protected $table = 'staff_kabupaten';

    protected $fillable = [
        'user_id',
        'jabatan_kabupaten_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function jabatan()
    {
        return $this->belongsTo(JabatanKabupaten::class, 'jabatan_kabupaten_id');
    }
}

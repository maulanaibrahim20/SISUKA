<?php

namespace App\Models\Master;

use App\Models\Admin\StaffKabupaten;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JabatanKabupaten extends Model
{
    use HasFactory;

    const Sekretaris_daerah = 1;

    protected $table = 'jabatan_kabupaten';

    protected $fillable = [
        'name',
    ];

    // protected static function boot()
    // {
    //     parent::boot();

    //     static::deleting(function ($jabatan) {
    //         // Dapatkan semua admin kecamatan terkait
    //         $adminKecamatans = $jabatan->staffKabupaten()->get();

    //         foreach ($adminKecamatans as $adminKecamatan) {
    //             $adminKecamatan->user()->delete();
    //         }

    //         $jabatan->staffKabupaten()->delete();
    //     });
    // }

    public function staffKabupaten()
    {
        return $this->hasMany(StaffKabupaten::class);
    }
}

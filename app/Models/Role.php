<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role as SpatieRole;

class Role extends SpatieRole
{
    use HasFactory;

    const ADMIN_KAB = 'Admin Kabupaten';
    const ADMIN_KEC = 'Admin Kecamatan';
    const ADMIN_DES = 'Admin Desa';
    const STAFF_KAB = 'Staff Kabupaten';
    const STAFF_KEC = 'Staff Kecamatan';
    const STAFF_DESA = 'Staff Desa';
}

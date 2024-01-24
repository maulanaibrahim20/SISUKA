<?php

namespace App\Models\User;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $table = 'owner';

    protected $guarded = [''];

    protected $keyType = 'string';

    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'id_owner';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

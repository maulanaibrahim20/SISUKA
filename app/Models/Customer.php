<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $guarded = [''];

    protected $keyType = 'string';

    public $incrementing = false;
    public $timestamps = false;

    protected $primaryKey = 'id_customer';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

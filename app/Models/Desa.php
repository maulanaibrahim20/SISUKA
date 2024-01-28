<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    use HasFactory;

    protected $table = 'desa';

    public $primaryKey = 'id';

    protected $keyType = 'string';


    protected $guarded = [''];
}

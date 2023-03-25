<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reseller extends Model
{
    use HasFactory;

    protected $table = 'Reseller';

    protected $primaryKey = 'id_reseller';

    protected $fillable = [
        'no_reseller',
        'nm_reseller',
        'no_hp',
        'alamat'
    ];
}

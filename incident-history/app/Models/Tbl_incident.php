<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbl_incident extends Model
{
    use HasFactory;

    protected $table = 'tbl_incident';

    protected $fillable = [
        'subdomain', 'webowner', 'type', 'date', 'status'
    ];

    public function tipe(){
        return $this->belongsTo(Tbl_type::class, 'type');
    }

    public function kondisi()
{
    return $this->belongsTo(Tbl_status::class, 'status');
}


}

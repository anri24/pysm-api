<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = ['name_en', 'name_ar'];

    public function ServiceDetail()
    {
        return $this->hasMany(ServiceDetail::class, 'service_id','id');
    }
}

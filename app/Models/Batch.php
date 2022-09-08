<?php

namespace App\Models;
use App\Models\Contract;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    public $disable_export = true;

    function contract(){
       return $this->hasOne(Contract::class);
    }

    public function scopeStatus($query, $type)
    {
        return $query->where('status', $type);
    }
}

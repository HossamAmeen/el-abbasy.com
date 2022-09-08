<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TransactionStatus;
class Transaction extends Model
{
    use HasFactory;
    public $disable_export = true;

    public function  getStatusAttribute($value){
    //  return "{$this->status}";
    return TransactionStatus::fromValue($value)->key;
    }

    public function mediator(){
      return $this->morphTo();
    }
}

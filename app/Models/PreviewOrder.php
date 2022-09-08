<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreviewOrder extends Model
{
    use HasFactory;
    public $disable_export = true;

    public function transaction()
    {
      return $this->morphOne(Transaction::class, 'mediator');
    }
}

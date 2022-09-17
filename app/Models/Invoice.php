<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Invoice extends Model
{
    use Translatable;
    use HasFactory;
     public $disable_export = true;
     
    public $translatable = [ 'name', 'details',];
        
         

}

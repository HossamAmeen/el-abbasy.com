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
    protected $fillable = ['invoice_number','mobile_number','invoice_date','invoice_time','cost','name', 'details']; 
    public $translatable = [ 'name', 'details',];
        
         

}

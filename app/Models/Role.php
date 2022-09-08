<?php

namespace App\Models;
use App\Models\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends \TCG\Voyager\Models\Role
{
    
    // public function user(){
    //     return $this->hasMany(Admin::class);
    // }
   //  protected $guarded = [];
    use HasFactory;
    // public function admins()
    // {
    //     $userModel = Voyager::modelClass('Admin');

    //     return $this->belongsToMany($userModel, 'admin_roles')
    //                 ->select(app($userModel)->getTable().'.*')
    //                 ->union($this->hasMany($userModel))->getQuery();
    // }

    // public function permissions()
    // {
    //     return $this->belongsToMany(Voyager::modelClass('Permission'));
    // }
   
    public $disable_export = true;

}

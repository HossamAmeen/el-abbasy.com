<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Graduate extends Model
{
    use HasFactory;
    use Translatable;
    public $translatable = ['name', 'faculty', 'university', 'course','attendance_grade' ,'total_grade'];
    public $disable_export = true;

    public function setCertificateId(){
        $this->certificate_id = self::unique_code(8);
    }

    private function unique_code($limit)
    {
        $number = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
        if (self::unique_codeExists($number)) {
            return self::unique_code(8);
        }
        return $number;
    }

    private function unique_codeExists($number) {
        return self::whereCertificateId($number)->exists();
    }
}

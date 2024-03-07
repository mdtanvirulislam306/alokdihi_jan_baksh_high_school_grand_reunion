<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentInformation extends Model
{
    use HasFactory;
    protected $table = 'student_informations';
    public $timestamps = false;
    const INACTIVE = 0;
    const ACTIVE = 1;
    const STATUSES = [
        self::INACTIVE=>"Inactive",
        self::ACTIVE=>"Active",
    ];
    const DELETED_NO = 0;
    const DELETED_YES = 1;
    const DELETED_STATUSES = [
        self::DELETED_NO=>"Deleted",
        self::DELETED_YES=>"Not Deleted",
    ];

    public function detail()
    {
        return $this->hasOne(ReunionRegistrationDetail::class,'student_id','id');
   }

}

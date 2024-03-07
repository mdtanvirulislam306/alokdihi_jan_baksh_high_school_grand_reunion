<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReunionRegistrationDetail extends Model
{
    use HasFactory;
    protected $table = 'reunio_registration_details';
    public $timestamps = false;
    const PAYMENT_UNPAID = 0;
    const PAYMENT_PAID = 1;
    CONST PAYMENT_STATUSES = [
      self::PAYMENT_UNPAID => "Un Paid",
      self::PAYMENT_PAID => "Paid",
    ];

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

    public function method()
    {
        return $this->hasOne(PaymentMethod::class,'reunion_registration_details_id','id');
    }

}

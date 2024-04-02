<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $table = 'payment_methods';
    public $timestamps = false;

    const BKASH = 1;
    const BANK = 2;
    const PAYMENT_METHODS = [
        self::BKASH =>'Bkash',
        self::BANK =>'Bank Asia',
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
    public function reunion()
    {
        return $this->belongsTo(ReunionRegistratioinDetail::class, 'reunion_registration_details_id');
    }
}

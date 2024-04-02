<?php

namespace App\Exports;

use App\Models\StudentInformation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentExport implements FromCollection, WithMapping, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Fetch StudentInformation records with details relationship
        return StudentInformation::with('details')->where('deleted', StudentInformation::DELETED_NO)->get();
    }

    /**
     * Map the StudentInformation data to Excel columns
     *
     * @param mixed $student
     * @return array
     */
    public function map($student): array
    {
        return [
            $student->id ?? '',
            $student->name ?? '',
            $student->phone ?? '',
            $student->passing_year ?? '',
            $student->gender ?? '',
            $student->details->t_shirt_size ?? '',
            $student->details->payment_method_id ?? '',
            $student->details->account_no ?? '',
            $student->details->amount ?? '',
            $student->details->transaction_id ?? '',
            $student->details->cupon ?? '',
            $student->details->payment_status ?? '',
        ];
    }

    /**
     * Define the column headings for the Excel file
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Name',
            'Phone',
            'Passing Year',
            'Gender',
            'T-Shirt Size',
            'Payment Method',
            'Account No',
            'Amount',
            'Transaction No',
            'Coupon',
            'Payment Status'
        ];
    }
}

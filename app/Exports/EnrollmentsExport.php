<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;

class EnrollmentsExport implements FromCollection
{
    public function collection()
    {
        return Registration::all();
    }
}

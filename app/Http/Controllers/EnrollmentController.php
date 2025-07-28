<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Registration;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;

class EnrollmentController extends Controller
{
    // ✅ Export as Excel (.xlsx)
public function exportPDF(Request $request)
{
    $club = $request->query('club');
    $dept = $request->query('dept');

    $query = Registration::with('clubs');

    if ($club && $dept) {
        // Both filters applied
        $query->where('department', $dept)
              ->whereHas('clubs', function ($q) use ($club) {
                  $q->where('club_name', $club);
              });
        $filterType = 'both';
        $filterValue = ['club' => $club, 'dept' => $dept];
    } elseif ($club) {
        // Only club filter
        $query->whereHas('clubs', function ($q) use ($club) {
            $q->where('club_name', $club);
        });
        $filterType = 'club';
        $filterValue = $club;
    } elseif ($dept) {
        // Only department filter
        $query->where('department', $dept);
        $filterType = 'dept';
        $filterValue = $dept;
    } else {
        // No filters
        $filterType = null;
        $filterValue = null;
    }

    $students = $query->get();

    $pdf = Pdf::loadView('pdf.enrollments', compact('students', 'filterType', 'filterValue'));
    return $pdf->download('registrations.pdf');
}


public function exportExcel(Request $request)
{
    $club = $request->query('club');
    $dept = $request->query('dept');

    $query = Registration::with('clubs');
    $filterType = null;
    $filterValue = null;

    if ($club && $dept) {
        $query->where('department', $dept)
              ->whereHas('clubs', function ($q) use ($club) {
                  $q->where('club_name', $club);
              });
        $filterType = 'both';
        $filterValue = ['club' => $club, 'dept' => $dept];
    } elseif ($club) {
        $query->whereHas('clubs', function ($q) use ($club) {
            $q->where('club_name', $club);
        });
        $filterType = 'club';
        $filterValue = $club;
    } elseif ($dept) {
        $query->where('department', $dept);
        $filterType = 'dept';
        $filterValue = $dept;
    }

    $registrations = $query->get();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Dynamic headers
    $headers = ['ID', 'Name', 'Roll No', 'Email'];
    if (!in_array($filterType, ['dept', 'both'])) {
        $headers[] = 'Department';
    }
    if (!in_array($filterType, ['club', 'both'])) {
        $headers[] = 'Clubs';
    }
    $headers[] = 'Registered At';

    $sheet->fromArray([$headers], null, 'A1');

    // Data rows
    $row = 2;
    foreach ($registrations as $reg) {
        $data = [
            $reg->id,
            $reg->name,
            $reg->roll_no,
            $reg->email,
        ];

        if (!in_array($filterType, ['dept', 'both'])) {
            $data[] = $reg->department;
        }

        if (!in_array($filterType, ['club', 'both'])) {
            $data[] = $reg->clubs->pluck('club_name')->implode(', ');
        }

        $data[] = $reg->created_at->format('d-m-Y H:i');

        $sheet->fromArray([$data], null, 'A' . $row++);
    }

    // Auto-size columns
    foreach (range('A', $sheet->getHighestColumn()) as $col) {
        $sheet->getColumnDimension($col)->setAutoSize(true);
    }

    $writer = new Xlsx($spreadsheet);
    $fileName = 'registrations.xlsx';
    $tempFile = tempnam(sys_get_temp_dir(), $fileName);
    $writer->save($tempFile);

    return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
}
}

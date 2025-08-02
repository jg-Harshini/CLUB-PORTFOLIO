<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Registration;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Club;
use Illuminate\Support\Facades\Auth;
class EnrollmentController extends Controller
{

public function exportPDF(Request $request)
{
    $club = $request->query('club');
    $dept = $request->query('dept');

    $filterType = null;
    $filterValue = null;
    $clubName = null;

    // ✅ If logged in as club admin
    if (Auth::check() && Auth::user()->role === 'club_admin') {
        $clubId = Auth::user()->club_id;
        $clubName = Club::where('id', $clubId)->value('club_name');

        $query = Registration::select('registrations.id', 'registrations.name', 'registrations.roll_no', 'registrations.department', 'registrations.created_at', 'registrations.updated_at')
            ->join('club_registration', 'registrations.id', '=', 'club_registration.registration_id')
            ->where('club_registration.club_id', $clubId);

        if ($dept) {
            $query->where('registrations.department', $dept);
            $filterType = 'clubadmin';
            $filterValue = ['club' => $clubName, 'dept' => $dept];
        } else {
            $filterType = 'clubadmin';
            $filterValue = ['club' => $clubName];
        }

        $students = $query->get();

        return Pdf::loadView('pdf.enrollments', compact('students', 'filterType', 'filterValue', 'clubName'))
            ->download('club_enrollments.pdf');
    }

    // ✅ Default (Superadmin/HOD) logic — unchanged
    $query = Registration::with('clubs');

    if ($club && $dept) {
        $query->where('department', $dept)
              ->whereHas('clubs', function ($q) use ($club) {
                  $q->where('club_name', $club);
              });
        $filterType = 'both';
        $filterValue = ['club' => $club, 'dept' => $dept];
        $clubName = $club;
    } elseif ($club) {
        $query->whereHas('clubs', function ($q) use ($club) {
            $q->where('club_name', $club);
        });
        $filterType = 'club';
        $filterValue = $club;
        $clubName = $club;
    } elseif ($dept) {
        $query->where('department', $dept);
        $filterType = 'dept';
        $filterValue = $dept;
    }

    $students = $query->get();

    return Pdf::loadView('pdf.enrollments', compact('students', 'filterType', 'filterValue', 'clubName'))
        ->download('registrations.pdf');
}



public function exportExcel(Request $request)
{
    $club = $request->query('club');
    $dept = $request->query('dept');

    // ✅ Club Admin-specific export
    if (Auth::check() && Auth::user()->role === 'club_admin') {
        $clubId = Auth::user()->club_id;
        $clubName = Club::where('id', $clubId)->value('club_name');

        $query = Registration::select(
                'registrations.roll_no',
                'registrations.name',
                'registrations.department',
                'registrations.created_at',
                'registrations.updated_at'
            )
            ->join('club_registration', 'registrations.id', '=', 'club_registration.registration_id')
            ->where('club_registration.club_id', $clubId);

        if ($dept) {
            $query->where('registrations.department', $dept);
        }

        $students = $query->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Headers for club admin
        $headers = ['Roll No', 'Name', 'Department', 'Created At', 'Updated At'];
        $sheet->fromArray([$headers], null, 'A1');

        $row = 2;
        foreach ($students as $s) {
            $sheet->fromArray([[
                $s->roll_no,
                $s->name,
                $s->department,
                $s->created_at ? $s->created_at->format('d-m-Y H:i') : 'N/A',
                $s->updated_at ? $s->updated_at->format('d-m-Y H:i') : 'N/A'
            ]], null, 'A' . $row++);
        }

        foreach (range('A', 'E') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = "club_enrollments_{$clubName}.xlsx";
        $tempFile = tempnam(sys_get_temp_dir(), $fileName);
        $writer->save($tempFile);

        return response()->download($tempFile, $fileName)->deleteFileAfterSend(true);
    }

    // ✅ Superadmin / HOD export (unchanged)
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

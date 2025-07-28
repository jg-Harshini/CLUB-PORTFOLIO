use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use App\Models\Enrollment;

class EnrollmentController extends Controller
{
    public function exportExcel()
    {
        $students = Enrollment::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Headers
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Student Name');
        $sheet->setCellValue('C1', 'Reg Number');
        $sheet->setCellValue('D1', 'Phone');

        // Rows
        $row = 2;
        foreach ($students as $student) {
            $sheet->setCellValue('A' . $row, $student->id);
            $sheet->setCellValue('B' . $row, $student->student_name);
            $sheet->setCellValue('C' . $row, $student->reg_number);
            $sheet->setCellValue('D' . $row, $student->phone_number);
            $row++;
        }

        // Write to file
        $writer = new Xlsx($spreadsheet);
        $filename = 'enrollments.xlsx';
        $temp_file = tempnam(sys_get_temp_dir(), $filename);
        $writer->save($temp_file);

        return response()->download($temp_file, $filename)->deleteFileAfterSend(true);
    }
}

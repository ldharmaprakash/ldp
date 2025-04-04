namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public function create()
    {
        return view('exams.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'exam_name' => 'required|string|max:255',
            'date' => 'required|date',
            'day' => 'required|string',
            'department' => 'required|string',
            'subject' => 'required|string',
            'session' => 'required|string',
        ]);

        Exam::create($validatedData);

        return redirect()->route('exams.create')->with('success', 'Exam created successfully.');
    }
}

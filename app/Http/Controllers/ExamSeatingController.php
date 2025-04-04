namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamSeating;

class ExamSeatingController extends Controller
{
    public function index()
    {
        $examSeatings = ExamSeating::all();
        return view('exam-seating.index', compact('examSeatings'));
    }

    public function create()
    {
        return view('exam-seating.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'exam_name' => 'required|string|max:255',
            'seating_arrangement' => 'required|string',
        ]);

        ExamSeating::create($request->all());
        return redirect()->route('exam-seating.index')->with('success', 'Exam and Seating created successfully.');
    }

    public function edit(ExamSeating $examSeating)
    {
        return view('exam-seating.edit', compact('examSeating'));
    }

    public function update(Request $request, ExamSeating $examSeating)
    {
        $request->validate([
            'exam_name' => 'required|string|max:255',
            'seating_arrangement' => 'required|string',
        ]);

        $examSeating->update($request->all());
        return redirect()->route('exam-seating.index')->with('success', 'Exam and Seating updated successfully.');
    }

    public function destroy(ExamSeating $examSeating)
    {
        $examSeating->delete();
        return redirect()->route('exam-seating.index')->with('success', 'Exam and Seating deleted successfully.');
    }
}

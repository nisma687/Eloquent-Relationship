<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('detail','courses')->get();
        // return view('home', compact('students'));
       if($students){
         return view('home', compact('students'));
       }
       else{
        return response()->json([
            'status'=> 'error',
            
        ]);
       }
    }
    public function showTheData()
    {
    $students = Student::with('courses')->get();
    if ($students->isEmpty()) {
        return response()->json([
            'status'=> 'error',
            'message' => 'No students data available.',
        ]);
    } else {
        return view('show', compact('students'));
    }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $validatedData= $request->validated();
        if($validatedData){
            DB::beginTransaction();
            try{
                $student = Student::create([
                    "name"=> $validatedData["name"],
                    'class'=>$validatedData["class"],
                    'roll'=>$validatedData["roll"],
                ]);
                $student->detail()->create([
                    "Father_name"=> $validatedData["Father_name"],
                    "Mother_name"=> $validatedData["Mother_name"],
                    "student_id"=> $student->id,
                ]);
                foreach($validatedData["courses"] as $courseData )
                {
                $student->courses()->create([
                    "course_id"=> $courseData[0],
                    "course_name"=> $courseData[1],
                    
                ]);
                }
                DB::commit();
                return response()->json(['message' => 'Student record created successfully']);

            }

            catch(\Exception $e){
                DB::rollBack();
                return back()->with("error", $e->getMessage());
            }
        }
        else{
            return back()->with("error","no validated data found");
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;
//i ddnt import thenmodel with this line below
use App\Models\Student;

use Illuminate\Http\Request;

class Studentcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('student',['students'=>$students,'layout'=>'index']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $students = Student::all();
        return view('student',['students'=>$students,'layout'=>'create']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $students = new Student();
        $students -> cne = $request -> input('cne');
        $students -> firstname = $request -> input('firstname');
        $students -> secondname = $request -> input('secondname');
        $students -> age = $request -> input('age');
        $students -> speciality = $request -> input('speciality');
        $students -> save();
        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        $students = Student::all();
        return view('student',['students'=>$students, 'student'=>$student, 'Student','layout'=>'show']);
        // return view('student', compact('student', 'students', 'show'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // renamed the first variable to student, initially they were two similar overlapping variable names
        $student = Student::find($id);
        $students = Student::all();

        // sent the new $student variable to the view as well
        return view('student',['students'=>$students, 'student'=>$student, 'layout'=>'edit']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student -> cne = $request -> input('cne');
        $student -> firstname = $request -> input('firstname');
        $student -> secondname = $request -> input('secondname');
        $student -> age = $request -> input('age');
        $student -> speciality = $request -> input('speciality');

        // altered to update method instead of save
        $student -> update();
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Student::find($id);

        // altered from deleted() to delete()
        $students -> delete();
        return redirect('/');
    }
}
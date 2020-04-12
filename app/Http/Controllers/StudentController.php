<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Teacher;
use Session;
class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('created_at','desc')->paginate(5);;
        return view('students.view')
                ->with('students',$students);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teachers = Teacher::all();

        return view('students.add')
                ->with('teachers',$teachers);
    }



    public function find()
    {
        $teachers = Teacher::all();
        return view('students.find')
            ->with('teachers',$teachers);
    }


    public function search(Request $request)
    {
        $this->validate($request,[
            'teacher_id' => 'required'
        ]);

        $teacher_id = $request->teacher_id;

        $teacher = Teacher::find($teacher_id);
        $students = $teacher->students;
        return view('students.search')
                ->with('teacher',$teacher)
                ->with('students',$students);
    }






    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
        'teacher_id' =>'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'birthdate' => 'required',
        'gender' => 'required',
        'contact_mobile' => 'required',
        'contact_email' => 'required',
        'avatar' => 'required|image',
       ]);

       $filename = time().$request->avatar->getClientOriginalName(); 
       $request->avatar->storeAs('images',$filename, 'public');

       $teacher = Student::create([
            'teacher_id' => $request->teacher_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'contact_mobile' => $request->contact_mobile,
            'contact_email' => $request->contact_email,
            'avatar' => $filename,
       ]);

       Session::flash('success','Student Successfully Added');
       return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $student = Student::find($id);

       $teachers = Teacher::all();
        return view('students.edit')
                ->with('student',$student)
                ->with('teachers',$teachers);
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
        $this->validate($request,[
        'teacher_id' => 'required',
        'first_name' => 'required',
        'last_name' => 'required',
        'birthdate' => 'required',
        'gender' => 'required',
        'contact_mobile' => 'required',
        'contact_email' => 'required',
        'avatar' => 'image',
       ]);

        if($request->hasFile('avatar')){
            $filename = time().$request->avatar->getClientOriginalName(); 
            $request->avatar->storeAs('images',$filename, 'public');
             $student->avatar = $filename;
        }

        $student->teacher_id = $request->teacher_id;
        $student->first_name = $request->first_name;
        $student->last_name = $request->last_name;
        $student->birthdate = $request->birthdate;
        $student->gender = $request->gender;
        $student->contact_mobile = $request->contact_mobile;
        $student->contact_email = $request->contact_email;

        $student->save();
       
       Session::flash('success','Student updated Successfully');
       return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $student = Student::find($id);
         $student->delete();
         Session::flash('success','Student deleted Successfully');
         return redirect()->back();
    }
}

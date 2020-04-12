<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use Session;
class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::orderBy('created_at','desc')->paginate(5);;
        return view('teachers.view')
                ->with('teachers',$teachers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('teachers.add');
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
        'full_name' => 'required',
        'birthday' => 'required',
        'gender' => 'required',
        'contact_mobile' => 'required',
        'contact_mail' => 'required',
        'class' => 'required',
        'avatar' => 'required|image',
       ]);

       $filename = time().$request->avatar->getClientOriginalName(); 
       $request->avatar->storeAs('images',$filename, 'public');

       $teacher = Teacher::create([
            'full_name' => $request->full_name,
            'birthday' => $request->birthday,
            'gender' => $request->gender,
            'contact_mobile' => $request->contact_mobile,
            'contact_mail' => $request->contact_mail,
            'class' => $request->class,
            'avatar' => $filename,
       ]);

       Session::flash('success','Teacher Successfully Added');
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
        $teacher = Teacher::find($id);
        return view('teachers.edit')
                ->with('teacher',$teacher);
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
       $teacher = Teacher::find($id);
        $this->validate($request,[
        'full_name' => 'required',
        'birthday' => 'required',
        'gender' => 'required',
        'contact_mobile' => 'required',
        'contact_mail' => 'required',
        'class' => 'required',
        'avatar' => 'image',
       ]);

        if($request->hasFile('avatar')){
            $filename = time().$request->avatar->getClientOriginalName(); 
            $request->avatar->storeAs('images',$filename, 'public');
             $teacher->avatar = $filename;
        }


        $teacher->full_name = $request->full_name;
        $teacher->birthday = $request->birthday;
        $teacher->gender = $request->gender;
        $teacher->contact_mobile = $request->contact_mobile;
        $teacher->contact_mail = $request->contact_mail;
        $teacher->class = $request->class;

        $teacher->save();
       
       Session::flash('success','Teacher updated Successfully');
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
         $teacher = Teacher::find($id);
         $teacher->delete();
         Session::flash('success','Teacher deleted Successfully');
         return redirect()->back();
    }
}

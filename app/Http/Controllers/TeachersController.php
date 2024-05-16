<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeachersStoreRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = Teacher::get();
        return view('teachers.index', ['teachers' => $teachers]);
    }
    public function create()
    {
        return view('teachers.create');
    }
    public function store(TeachersStoreRequest $request)
    {
        $requestData = $request->all();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '-' . $file->getClientOriginalName();
            $file->move('images/', $imageName);
            $requestData['image'] = $imageName;
        }
        // dd($requestData);
        Teacher::create($requestData);

        return redirect()->route('teachers.index');
    }
    public function show(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('teachers.show', compact('teacher'));
    }
    public function edit(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('teachers.edit', compact('teacher'));
    }
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->update($request->all());
        return redirect()->route('teachers.index');
    }
    public function destroy($id)
    {

        Teacher::destroy($id);
        return redirect()->route('teachers.index');
    }
}

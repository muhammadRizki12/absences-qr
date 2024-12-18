<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use Endroid\QrCode\Builder\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ClassController extends Controller
{
    public function index()
    {
        $classes = ClassModel::all();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes/create');
    }

    public function store(Request $request)
    {
        // get params
        $class_name = $request->class_name;
        $latitude = doubleval($request->latitude);
        $longitude = doubleval($request->longitude);

        $class = ClassModel::create([
            'class_name' => $class_name,
            'latitude' => $latitude,
            'longitude' => $longitude
        ]);

        // failed user add
        if (!$class) return redirect()->route('class.create')->with('msg', 'class insert failed!');

        // Redirect dengan pesan sukses
        return redirect()->route('class.index')->with('msg', 'Class created successfully!');
    }

    public function show($id)
    {
        $class = ClassModel::find($id);
        $qrCode = QrCode::size(200)->generate(url("users/absences/$class->class_name"));

        return view('classes.show', compact('class', 'qrCode'));
    }

    public function edit($id)
    {
        $class = ClassModel::findOrFail($id);
        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, $id)
    {
        $class = ClassModel::findOrFail($id);

        // get data request
        $data = $request->all();

        // update data
        $updateClass = $class->update($data);

        if (!$updateClass) return redirect()->route('class.edit')->with('msg', 'class update failed!');

        return redirect()->route('class.index')->with('msg', 'Class updated successfully.');
    }

    public function destroy($id)
    {
        //
    }
}

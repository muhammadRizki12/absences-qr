<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
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

        $class_name = $request->class_name;
        // $user = Auth::user();
        // $userId = $user->id; // Akses ID
        // dd("$userId");

        // Create QR Codes
        $qrCode = QrCode::format('png')
            ->size(300)
            ->generate(url("absences/$class_name?user_id=1"));

        // convert to base 64 format
        $base64Image = base64_encode($qrCode);

        $class = ClassModel::create([
            'class_name' => $class_name,
            'qr_image' => $base64Image
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('class.index')->with('success', 'Class created successfully!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

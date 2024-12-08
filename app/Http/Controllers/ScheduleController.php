<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ScheduleModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        return view('schedules.index');
    }

    public function create()
    {
        $users = UserModel::all();
        $classes = ClassModel::all();
        return view('schedules.create', compact('users', 'classes'));
    }

    public function store(Request $request)
    {
        $schedule = ScheduleModel::create([
            'hari' => $request->hari,
            'waktu_masuk' => $request->waktu_masuk,
            'waktu_keluar' => $request->waktu_keluar,
            'user_id' => $request->user_id,
            'class_id' => $request->class_id,
        ]);

        // Jika tidak ada redirect ke halaman login
        if (!$schedule) response()->json(['message' => 'Insert schedule failed!'], 404);

        // Return data schedule sebagai respons JSON
        return response()->json([
            'schedule' => $schedule,
        ], 200);
    }
}

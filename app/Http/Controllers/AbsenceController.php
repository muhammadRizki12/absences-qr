<?php

namespace App\Http\Controllers;

use App\Models\ClassModel;
use App\Models\ScheduleModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    public function index(Request $request)
    {
        try {
            // Get Query
            $user_id = 1;

            // Get params uri
            $class_name = $request->class_name;

            // Cari jadwal berdasarkan user_id, class_name, dan hari ini
            $schedule = ScheduleModel::with('class')
                ->where('user_id', $user_id)
                ->whereHas('class', function ($query) use ($class_name) {
                    $query->where('class_name', $class_name);
                })
                ->where('hari', 'senin')
                ->first();

            dd($schedule);

            // get waktu absen
            // bandingin waktu absen dengan waktu yang di simpan di database
            // jika semuanya oke, maka save database

            // Return data user dan class sebagai respons JSON
            return response()->json([$schedule], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Terjadi kesalahan.',
                'error' => $th->getMessage(),
            ], 500);
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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

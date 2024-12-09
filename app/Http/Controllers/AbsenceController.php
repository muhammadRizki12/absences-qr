<?php

namespace App\Http\Controllers;

use App\Models\AbsenceModel;
use App\Models\ClassModel;
use App\Models\ScheduleModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsenceController extends Controller
{
    public function index(Request $request)
    {
        try {
            // get query url
            $user_id = intval($request->query('user_id'));
            // get params
            $class_name = $request->class_name;

            // get timeDate now
            $currentTime = Carbon::now();

            // set locale to indonesian
            Carbon::setLocale('id');

            // get day in locale indonesian
            $currentDay = $currentTime->translatedFormat('l');

            // get schedule by user_id, class_name, and $current day
            $schedule = ScheduleModel::with('class')
                ->where('user_id', $user_id)
                ->whereHas('class', function ($query) use ($class_name) {
                    $query->where('class_name', "$class_name");
                })
                ->where('hari', $currentDay)
                ->first();

            if (!$schedule) return 'Schedule not found!';

            // Parsing entry time dan out time
            $entryTime = Carbon::parse($schedule->waktu_masuk);
            $outTime = Carbon::parse($schedule->waktu_keluar);

            // added 30 minutes tolerance
            $entryTimePlus30 = $entryTime->copy()->addMinutes(30);

            // declaration status result
            $status = '';

            // validation absence time
            if ($currentTime->lt($entryTime)) {
                // absent before time
                return "Belum waktunya absen";
            } else if ($currentTime->between($entryTime, $entryTimePlus30)) {
                // ontime (30 minute after entry_time)
                $status = 'Hadir';
            } else if ($currentTime->gt($entryTimePlus30) && $currentTime->lt($outTime)) {
                // late (more than 30 minutes after entry time)
                $status = 'Terlambat';
            } else {
                // more than out time
                $status = 'Tidak hadir';
            }

            // saves data to absence
            $absence = AbsenceModel::create([
                'waktu_absen' => $currentTime,
                'status' => $status,
                'schedule_id' => $schedule->id
            ]);

            if (!$absence) return 'Absence failed!';

            // Return data user dan class sebagai respons JSON
            return response()->json([$absence], 200);
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

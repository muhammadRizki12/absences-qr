<?php

namespace App\Http\Controllers;

use App\Models\AbsenceModel;
use App\Models\ClassModel;
use App\Models\ScheduleModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AbsenceController extends Controller
{
    public function index() {}
    public function store(Request $request)
    {
        // get user data by auth
        $user = Auth::user();

        // check authentication login
        if (!$user) return redirect()->route('auth.loginForm')->with('failed', 'Login terlebih dahulu!');

        // get id
        $user_id = $user->id;

        // get params class name
        $class_name = $request->class_name;

        return view('absences.absence', compact('class_name'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validated = $request->validate([
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'class_name' => 'required'
        ]);

        $class_name = $request->class_name;

        // Ambil data koordinat kelas berdasarkan nama kelas
        $class = ClassModel::where('class_name', $class_name)->first();

        // Validasi jika kelas tidak ditemukan
        if (!$class) {
            return response()->json([
                'message' => 'Class not found.',
                'redirect_url' => '/users/absences/scan-qr',
            ], 400);
        }

        // Variabel lokasi saat ini (dari request pengguna)
        $latitudeCurrent = $request->latitude;
        $longitudeCurrent = $request->longitude;

        // Koordinat lokasi kelas (dari database)
        $longitudeClass = floatval($class->longitude);
        $latitudeClass = floatval($class->latitude);

        // // added 30 minutes tolerance
        // $entryTimePlus30 = $entryTime->copy()->addMinutes(30);

        // // declaration status result
        // $status = '';

        // // validation absence time
        // if ($currentTime->lt($entryTime)) {
        //     // absent before time
        //     return "Belum waktunya absen";
        // } else if ($currentTime->between($entryTime, $entryTimePlus30)) {
        //     // ontime (30 minute after entry_time)
        //     $status = 'Hadir';
        // } else if ($currentTime->gt($entryTimePlus30) && $currentTime->lt($outTime)) {
        //     // late (more than 30 minutes after entry time)
        //     $status = 'Terlambat';
        // } else {
        //     // more than out time
        //     $status = 'Tidak hadir';
        // }

        // // saves data to absence
        // $absence = AbsenceModel::create([
        //     'absence_datetime' => $currentTime,
        //     'status' => $status,
        //     'schedule_id' => $schedule->id
        // ]);

        // // check absence
        // if (!$absence) return 'Absence failed!';

        // Return data user dan class sebagai respons JSON
        // return response()->json([$absence], 200);
    }

    public function huha(Request $request, $class_name)
    {
        // Log the incoming request for debugging
        Log::info('Absence Store Request', [
            'class_name' => $class_name,
            'location' => $request->input('location'),
            'all_inputs' => $request->all()
        ]);

        try {
            // Validate the incoming request
            $validatedData = $request->validate([
                'location' => 'required|string'
            ]);

            // Split the location into latitude and longitude
            $locationParts = explode(',', $validatedData['location']);

            // Ensure we have valid coordinates
            if (count($locationParts) !== 2) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid location format'
                ], 400);
            }
            return response()->json([
                'message' => 'Sudah absen!',
                'redirect_url' => '/users/absences',
            ], 400);
        }

        // Parsing entry time dan out time
        $entryTime = Carbon::parse($schedule->entry_time);
        $outTime = Carbon::parse($schedule->out_time);

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
            'absence_datetime' => $currentTime,
            'status' => $status,
            'schedule_id' => $schedule->id
        ]);

        // Validasi jika schedule gagal
        if (!$absence) {
            return response()->json([
                'message' => 'Absence failed!',
                'redirect_url' => '/users/absences/scan-qr',
            ], 400);
        }

        // success response
        return response()->json([
            'message' => 'Absence Success!',
            'redirect_url' => '/users/absences',
        ], 200);
    }

    // scan
    public function scanQR()
    {
        return view('absences.scanQR');
    }

    // check distance
    public function checkDistance()
    {
        $latitude1 = -7.0361470;
        $longitude1 = 107.5354590;

        // location user
        $latitude2 = -7.009116810755372;
        $longitude2 = 107.55189327116385;

        $radius = $this->distance($latitude1, $longitude1, $latitude2, $longitude2);
        dd($radius);
    }

    // calculate distance
    public function distance($lat1, $lon1, $lat2, $lon2)
    {
        $theta = $lon1 - $lon2;
        $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
        $miles = acos($miles);
        $miles = rad2deg($miles);
        $miles = $miles * 60 * 1.1515;
        $feet = $miles * 5280;
        $yards = $feet / 3;
        $kilometers = $miles * 1.609344;
        $meters = $kilometers * 1000;
        return $meters;
    }
}

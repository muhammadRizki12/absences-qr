<?php

namespace App\Http\Controllers;

use App\Models\AbsenceModel;
use App\Models\ClassModel;
use App\Models\ScheduleModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

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
        // $user_id = $user->id;

        // get params class name
        $class_name = $request->class_name;

        return view('absences.index', compact('class_name'));

        // // location school
        // $latitude1 = -7.009408275213673;
        // $longitude1 = 107.55150505559156;

        // // location user
        // $latitude2 = -6.920124;
        // $longitude2 = 107.589481;

        // // get radius
        // $radius = $this->distance($latitude1, $longitude1, $latitude2, $longitude2);

        // // check radius
        // if ($radius >= 50) return redirect()->route('absence.scanQR')->with('failed', 'Anda berada di luar jangkauan!');

        // // get params class name
        // $class_name = $request->class_name;

        // // get timeDate now
        // $currentTime = Carbon::now();

        // // set locale to indonesian
        // Carbon::setLocale('id');

        // // get day in locale indonesian
        // $currentDay = $currentTime->translatedFormat('l');

        // // get schedule by user_id, class_name, and $current day
        // $schedule = ScheduleModel::with('class')
        //     ->where('user_id', $user_id)
        //     ->whereHas('class', function ($query) use ($class_name) {
        //         $query->where('class_name', "$class_name");
        //     })
        //     ->where('day', $currentDay)
        //     ->first();

        // // check schedule
        // if (!$schedule) return 'Schedule not found!';

        // // Parsing entry time dan out time
        // $entryTime = Carbon::parse($schedule->entry_time);
        // $outTime = Carbon::parse($schedule->out_time);

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
                'success' => true,
                'redirect' => route('class.index') // atau '/absences'
            ]);


            // // Return a success response
            // return response()->json([
            //     'success' => true,
            //     'message' => 'Absence recorded successfully',
            //     'data' => [
            //         'class_name' => $class_name,
            //         'latitude' => $locationParts[0],
            //         'longitude' => $locationParts[1]
            //     ]
            // ]);
        } catch (\Exception $e) {
            // Log the full error
            Log::error('Absence Store Error', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            // Return a generic error response
            return response()->json([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    // scan
    public function scanQR()
    {
        return view('absences.scanQR');
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

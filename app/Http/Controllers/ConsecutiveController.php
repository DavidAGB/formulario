<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreconsecutiveRequest;
use App\Http\Requests\UpdateconsecutiveRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Consecutive;
use App\Models\Cultural_rights;
use App\Models\Expertises;
use App\Models\Nacs;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;



class ConsecutiveController extends Controller
{

    public function getConsecutiveData(Request $request)
    {


        try {
            $filters = $request->all('search');
            $filter_monitor = $request->filter_monitor;
            $filter_cultural_rights = $request->filter_cultural_rights;
            $filter_nac = $request->filter_nac;
            $filter_expertise = $request->filter_expertise;

            $filter_date = $request->has('filter_date')
                ? json_decode($request->filter_date, true)
                : null;


            $data = Consecutive::with([
                'monitor:id,name',
                'cultural_rights:id,name',
                'nac:id,name',
                'expertise:id,name'
            ])
                ->filter($filters)

                ->when($filter_monitor, function ($query, $filter_monitor) {
                    return $query->whereHas('monitor', function ($query) use ($filter_monitor) {
                        $query->where('id', $filter_monitor);
                    });
                })
                ->when($filter_cultural_rights, function ($query, $filter_cultural_rights) {
                    return $query->whereHas('cultural_rights', function ($query) use ($filter_cultural_rights) {
                        $query->where('id', $filter_cultural_rights);
                    });
                })
                ->when($filter_nac, function ($query,  $filter_nac) {
                    return $query->whereHas('nac', function ($query) use ($filter_nac) {
                        $query->where('id', $filter_nac);
                    });
                })
                ->when($filter_expertise, function ($query,  $filter_expertise) {
                    return $query->whereHas('expertise', function ($query) use ($filter_expertise) {
                        $query->where('id',  $filter_expertise);
                    });
                })

                ->when(!empty($filter_date['from']) && !empty($filter_date['to']), function ($query) use ($filter_date) {
                    return $query->whereBetween('created_at', [$filter_date['from'], $filter_date['to']]);
                })

                ->latest('id')
                ->paginate(50);

            return response()->json(["success" => true, "data" =>
            $data], Response::HTTP_OK);
        } catch (\Throwable $th) {

            return response()->json(["success" => false, 'message' => 'Something went wrong. Try again.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function saveConsecutives(Request $request)
    {

        $this->validate($request, [
            'activity_name' => 'required',
            'monitor_id' => 'required|integer',
            'cultural_right_id' => 'required|integer',
            'nac_id' => 'required|integer',
            'activity_date' => 'required|string',
            'start_time' => 'required|string',
            'final_hour' => 'required|string',
            'expertise_id' => 'required|integer',
        ]);

        try {

            $newConsecutive = $this->getNextConsecutive();

            $consecutive = new Consecutive();
            $consecutive->consecutivo =   'FP' . $newConsecutive;
            $consecutive->name = $request->activity_name;
            $consecutive->monitor_id = $request->monitor_id;
            $consecutive->cultural_right_id = $request->cultural_right_id;
            $consecutive->nac_id = $request->nac_id;
            $consecutive->activity_date = $request->activity_date;
            $consecutive->start_time = $request->start_time;
            $consecutive->final_hour = $request->final_hour;
            $consecutive->expertise_id = $request->expertise_id;

            DB::beginTransaction();

            $consecutive->save();

            DB::commit();
            return response()->json(["success" => true, "message" => 'Consecutive saved successfully.'], Response::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollback();
            \Log::error('Error while saving consecutive: ' . $e->getMessage());
            return response()->json(["success" => false, 'message' => 'Something went wrong. Try again.'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function getNextConsecutive()
    {
        $lastRecord = DB::table('consecutives')->orderByRaw('substring(consecutivo, 3) desc')->first();

        return is_null($lastRecord) ? 1 : substr($lastRecord->consecutivo, 2) + 1;
    }


    public function getMonitorData(Request $request)
    {
        try {

            $data = User::all();
            return response()->json(["success" => true, "data" => $data], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(["success" => false, 'message' => 'Something went wrong. Try again.'], Response::HTTP_NOT_FOUND);
        }
    }

    public function getNacsData(Request $request)
    {
        try {

            $data = Nacs::select('id', 'name')->get();
            return response()->json(["success" => true, "data" => $data], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(["success" => false, 'message' => 'Something went wrong. Try again.'], Response::HTTP_NOT_FOUND);
        }
    }
    public function getCulturalRightsData(Request $request)
    {
        try {

            $data = Cultural_rights::select('id', 'name')->get();
            return response()->json(["success" => true, "data" => $data], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(["success" => false, 'message' => 'Something went wrong. Try again.'], Response::HTTP_NOT_FOUND);
        }
    }
    public function getExpertisesData(Request $request)
    {
        try {

            $data = Expertises::select('id', 'name')->get();
            return response()->json(["success" => true, "data" => $data], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(["success" => false, 'message' => 'Something went wrong. Try again.'], Response::HTTP_NOT_FOUND);
        }
    }
}

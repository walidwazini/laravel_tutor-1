<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TicketController;
use App\Http\Controllers\SecondController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/', function () {
    return 'Welcome to Laravel';
});

Route::get('/cuaca', function () {
    $demoData = [
        [
            "id" => "k1",
            "lokasi" => "Gombak",
            'suhu' => 25,
            'keadaan' => "mendung",
        ],
        [
            "id" => "k2",
            "lokasi" => "Shah Alam",
            'suhu' => 32,
            'keadaan' => "panas",
        ],
    ];
    return response()->json($demoData);
});

Route::get('/cuaca/{id}', function ($id) {
    $res = [];
    $demoData = [
        [
            "id" => "k1",
            "lokasi" => "Gombak",
            'suhu' => 25,
            'keadaan' => "mendung",
        ],
        [
            "id" => "k2",
            "lokasi" => "Shah Alam",
            'suhu' => 32,
            'keadaan' => "panas",
        ],
    ];

    foreach ($demoData as $key => $value) {
        if ($id == $value['id']) {
            $res = $value;
            break;
        } 
        // else if ($id != $value['id']) {
        //     return response()->json(['message' => 'Data not found'], 404);
        // }
    }
    

    return response() -> json($res);
});

Route::post('/cuaca', function (Request $request) {
    return response()->json($request);
});


Route::group(['prefix' => '/weather'], function () {
    Route::get('/', function () {
        $demoData = [
            [
                "id" => "p1",
                "location" => "sevilla",
                "condition" => "sunny",
            ],
            [
                "id" => "p2",
                "location" => "madrid",
                "condition" => "cloud",
            ],
            [
                "id" => "p3",
                "location" => "granada",
                "condition" => "raining",
            ],
        ];

        return response()->json($demoData);
    });

    Route::get('/{id}', function ($id) {
        try {
            //code...
            $demoData = [
                [
                    "id" => "p1",
                    "location" => "sevilla",
                    "condition" => "sunny",
                ],
                [
                    "id" => "p2",
                    "location" => "madrid",
                    "condition" => "cloud",
                ],
                [
                    "id" => "p3",
                    "location" => "granada",
                    "condition" => "raining",
                ],
            ];
            $res = [];

            foreach ($demoData as $key => $value) {
                if ($id == $value['id']) {
                    $res = $value;
                    break;
                } 
                // if ($id != $value['id']) {
                //     $res = ['message' => 'Id not valid.'];
                //     break;
                // }
            }
            return response()->json($res);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['message' => $th->getMessage()], 500);
        }
    });
});

Route::group(['prefix' => '/movies'], function () {
    Route::get('/', [TicketController::class, 'getAll']);
    Route::get('/{id}', [TicketController::class, 'getById']);
});

Route::group(['prefix' => '/games'], function () {
    Route::get('/',[SecondController::class,'getAll']);
});
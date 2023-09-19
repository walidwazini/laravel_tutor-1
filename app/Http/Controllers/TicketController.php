<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// class SecondController extends Controller
// {
//     public function getAll(Request $req)
//     {
//         $selectedGame = [];
//         $games = [
//             [
//                 "id" => 'a1',
//                 'title' => 'Spiderman 2',
//                 'genre' => ['role-play', 'comic'],
//                 'console' => 'playstation'
//             ],
//             [
//                 "id" => 'a2',
//                 'title' => 'Tears of The Kingdom',
//                 'genre' => ['role-play', 'adventure'],
//                 'console' => 'switch'
//             ],
//             [
//                 "id" => 'a3',
//                 'title' => 'Horizon Zero Dawn',
//                 'genre' => ['fantasy', 'adventure'],
//                 'console' => 'playstation'
//             ],
//         ];

//         foreach ($games as $key => $value) {
//             if ($req->console == $value['console']) {
//                 $selectedGame = $value;
//                 break;
//             }
//         }

//         if (empty($req)) {
//             return response()->json($games);
//         }

//         return response()->json($selectedGame);
//     }
// }

class TicketController extends Controller
{

    public function getAll()
    {
        $movies = [
            [
                'id' => 'mv1',
                'genre' => 'thriller',
                'title' => 'Batman : Dark Knight',
                'year' => 2012,
            ],
            [
                'id' => 'mv2',
                'genre' => 'animation',
                'title' => 'Atlantis - The Lost Empire',
                'year' => 2001,
            ],
            [
                'id' => 'mv3',
                'genre' => 'comedy',
                'title' => 'Rush Hour 2',
                'year' => 2003,
            ],
            [
                'id' => 'mv4',
                'genre' => 'thriller',
                'title' => 'Oceans 12',
                'year' => 2004,
            ],
        ];

        return response()->json($movies);
    }

    public function getById($id)
    {
        $selectedMovie = [];
        $movies = [
            [
                'id' => 'mv1',
                'genre' => 'thriller',
                'title' => 'Batman : Dark Knight',
                'year' => 2012,
            ],
            [
                'id' => 'mv2',
                'genre' => 'animation',
                'title' => 'Atlantis - The Lost Empire',
                'year' => 2001,
            ],
            [
                'id' => 'mv3',
                'genre' => 'comedy',
                'title' => 'Rush Hour 2',
                'year' => 2003,
            ],
            [
                'id' => 'mv4',
                'genre' => 'thriller',
                'title' => 'Oceans 12',
                'year' => 2004,
            ],
        ];

        foreach ($movies as $key => $value) {
            if ($id == $value['id']) {
                $selectedMovie = $value;
                break;
            }
            // else if ($id != $value['id']){
            //     return response() -> json(['message' => 'No movie for the id found.']);
            // }
        }

        return response()->json($selectedMovie);
    }
}
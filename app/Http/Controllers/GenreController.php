<?php

namespace App\Http\Controllers;

use App\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = [
            'sort_by' => $request->input('sort_by', 'rating'),
            'sort_conditions' => $request->input('sort_conditions', 'desc'),
            'genre_id' => $request->input('genre_id', 1)
        ];

        $data['genres'] = Genre::getAllGenresInfo($sort);
        if (empty($data['genres'])) {
            return redirect('/genres');
        }

        if ($request->ajax()) {
            $genre = view('genres.one', $data['genres']->find($sort['genre_id']))->render();
            return response(['type'=> 'success', 'data' => $genre]);
        }

        return view('genres.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['genre'] = Genre::find($id);

        if (empty($data['genre'])) {
            return redirect('/genres');
        }

        return view('genres.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display the all authors info.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sort = [
            'sort_by' => $request->input('sort_by', 'books'),
            'sort_conditions' => $request->input('sort_conditions', 'desc')
        ];

        $data['authors'] = Author::getAllAuthorsInfo($sort);
        if (empty($data['authors'])) {
            return redirect('/authors');
        }

        if ($request->ajax()) {
            $authors = view('authors.list', $data)->render();
            return response(['type'=> 'success', 'data' => $authors]);
        }

        return view('authors.index', $data);
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
        $data['author'] = Author::find($id);
        if (empty($data['author'])) {
            return redirect('/authors');
        }

        $data['similar_authors'] = Author::getSimilarAuthorsByGenre($id);

        return view('authors.show',$data);
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

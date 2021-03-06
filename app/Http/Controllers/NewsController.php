<?php

namespace App\Http\Controllers;

use App\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the News Table
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news_items = \App\News::all();
        return view('welcome', ['news_items' => $news_items]);
    }

    /**
     * Show the form for creating a new News Item.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created News Item in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image_path' => 'nullable|max:255',
        ]);

        tap(new \App\News($data))->save();

        return redirect('/');
    }

    /**
     * Display the News Item.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('news.show', ['news' => \App\News::findOrFail($id)]);
    }

    /**
     * Show the news edit form.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('news.edit', ['news' => \App\News::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $news = \App\News::findOrFail($id);

        $data = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image_path' => 'nullable|max:255',
        ]);
        $input = $request->all();
        $news->fill($input)->save();
        return view('news.show', ['news' => $news]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Integer  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news = \App\News::findOrFail($id);
        $news->delete();

        return redirect('/');
    }
}

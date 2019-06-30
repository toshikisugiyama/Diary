<?php

namespace App\Http\Controllers;

use App\Diary;
use Illuminate\Http\Request;
use App\Http\Requests\CreateDiary;
use Illuminate\Support\Facades\Auth;

class DiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diaries = Diary::with('likes')->orderBy('id','desc')->get();
        // dd($diaries);
        return view('diaries.index',['diaries' => $diaries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diaries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateDiary $request)
    {
        $diary = new Diary();

        $diary->title = $request->title;
        $diary->body = $request->body;
        $diary->user_id = Auth::user()->id;
        $diary->save();

        return redirect()->route('diary.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function edit(Diary $diary)
    {
        if(Auth::user()->id !== $diary->user_id){
            abort(403);
        }
        // dd($id);
        // $diary = Diary::find($id);
        return view('diaries.edit', [
            'diary'=>$diary,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function update(CreateDiary $request, Diary $diary)
    {
        if(Auth::user()->id !== $diary->user_id){
            abort(403);
        }
        // $diary = Diary::find($id);
        $diary->title = $request->title;
        $diary->body = $request->body;
        $diary->save();
        return redirect()->route('diary.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diary  $diary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diary $diary)
    {
        if(Auth::user()->id !== $diary->user_id){
            abort(403);
        }
        // $diary = Diary::find($id);
        $diary->delete();
        return redirect()->route('diary.index');
    }

    public function like(int $id)
    {
        $diary = Diary::where('id', $id)->with('likes')->first();
        $diary->likes()->attach(Auth::user()->id);
    }

    public function dislike(int $id)
    {
        $diary = Diary::where('id', $id)->with('likes')->first();
        $diary->likes()->detach(Auth::user()->id);
    }
}

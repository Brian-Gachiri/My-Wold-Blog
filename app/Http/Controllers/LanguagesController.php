<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Language;
use DB;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $languages = Language::all();
        return view('pages.languages')->with('languages',$languages);
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
        $this->validate($request,[
            'language'=> 'required',
            'fluency'=> 'required',
        ]);

        $langs = new Language;

        $langs->language = $request->input('language');
        $langs->fluency = $request->input('fluency');

        $langs->save();

        return redirect('/languages')->with('success','Data saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $language = Language::find($id);
        return view('pages.languages2')->with('language',$language);
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
        $this->validate($request,[
            'language'=> 'required',
            'fluency'=> 'required',
        ]);

        $langs = Language::find($id); 

        $langs->language = $request->input('language');
        $langs->fluency = $request->input('fluency');
        $langs->save();

        //DB::update('update languages set language = ?, fluency = ? where language =?', [$language]);


        //$langs->save();

        return redirect('/languages')->with('success','Data Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       /*  DB::delete('delete from languages where language = ?', [$language]);
        return redirect('/languages')->with('success','Data deleted');*/

        $language = Language::find($id);
        $language->delete();
        return redirect('/languages')->with('success','Data deleted');
    }
}

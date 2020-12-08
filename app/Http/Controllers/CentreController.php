<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre;

class CentreController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $centres = Centre::paginate(10);
        return view("centre", compact("centres"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $centre = new Centre;
        $title = __("Afegir centre");
        $textButton = __("Afegir");
        $route = route("centre.store");
        return view("centre.create", compact("centre", "title", "textButton", "route"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "nom" => "required",
        ]);
        Centre::create($request->all());
        
        return redirect(route("centre.index"))
            ->with("success", __("El centre " . $request->nom . " s'ha afegit correctament!"));
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
     * @param  Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function edit(Centre $centre)
    {
        $update = true;
        $title = __("Editar centre");
        $textButton = __("Actualitzar");
        $route = route("centre.update", ["centre" => $centre]);
        return view("centre.edit", compact("centre", "update", "title", "textButton", "route"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Centre $centre)
    {
        $this->validate($request, [
            "nom" => "required",
        ]);
        $centre->update($request->all());
        
        return back()
            ->with("success", __("El centre " . $request->nom . " s'ha actualitzat correctament!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Centre  $centre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Centre $centre)
    {
        $centre->delete();
        return back()->with("success", __("El centre " . $centre->nom . " s'ha eliminat correctament"));
    }
}
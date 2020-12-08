<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumne;
use App\Models\Centre;
use App\Models\Ensenyament;

class AlumneController extends Controller
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
        $alumnes = Alumne::paginate(10);
        return view("alumne", compact("alumnes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $alumne = new Alumne;
        $title = __("Afegir alumne");
        $textButton = __("Afegir");
        $route = route("alumne.store");
        $centres = Centre::all();
        $ensenyaments = Ensenyament::all();
        return view("alumne.create", compact("alumne", "title", "textButton", "route", "centres", "ensenyaments"));
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
            "cognoms" => "required",
            "data_naixement" => "required|date",
            "centre_id" => "required",
            "ensenyament_id" => "required"
        ]);
        Alumne::create($request->all());
        
        return redirect(route("alumne.index"))
            ->with("success", __("L'alumne " . $request->nom . " " . $request->cognoms . " s'ha afegit correctament!"));
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
     * @param  Alumne  $alumne
     * @return \Illuminate\Http\Response
     */
    public function edit(Alumne $alumne)
    {
        $update = true;
        $title = __("Editar alumne");
        $textButton = __("Actualitzar");
        $route = route("alumne.update", ["alumne" => $alumne]);
        $centres = Centre::all();
        $ensenyaments = Ensenyament::all();
        return view("alumne.edit", compact("alumne", "update", "title", "textButton", "route", "centres", "ensenyaments"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Alumne  $alumne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Alumne $alumne)
    {
        $this->validate($request, [
            "nom" => "required",
            "cognoms" => "required",
            "data_naixement" => "required|date",
            "centre_id" => "required",
            "ensenyament_id" => "required"
        ]);
        $alumne->update($request->all());
        
        return back()
            ->with("success", __("L'alumne " . $request->nom . " " . $request->cognoms . " s'ha actualitzat correctament!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Alumne  $alumne
     * @return \Illuminate\Http\Response
     */
    public function destroy(Alumne $alumne)
    {
        $alumne->delete();
        return back()->with("success", __("L'alumne " . $alumne->nom . " " . $alumne->cognoms . " s'ha eliminat correctament"));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ensenyament;

class EnsenyamentController extends Controller
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
        $ensenyaments = Ensenyament::paginate(10);
        return view("ensenyament", compact("ensenyaments"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ensenyament = new Ensenyament;
        $title = __("Afegir ensenyament");
        $textButton = __("Afegir");
        $route = route("ensenyament.store");
        return view("ensenyament.create", compact("ensenyament", "title", "textButton", "route"));
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
        Ensenyament::create($request->all());
        
        return redirect(route("ensenyament.index"))
            ->with("success", __("L'ensenyament " . $request->nom . " s'ha afegit correctament!"));
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
     * @param  Ensenyament  $ensenyament
     * @return \Illuminate\Http\Response
     */
    public function edit(Ensenyament $ensenyament)
    {
        $update = true;
        $title = __("Editar ensenyament");
        $textButton = __("Actualitzar");
        $route = route("ensenyament.update", ["ensenyament" => $ensenyament]);
        return view("ensenyament.edit", compact("ensenyament", "update", "title", "textButton", "route"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Ensenyament  $ensenyament
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ensenyament $ensenyament)
    {
        $this->validate($request, [
            "nom" => "required",
        ]);
        $ensenyament->update($request->all());
        
        return back()
            ->with("success", __("L'ensenyament " . $request->nom . " s'ha actualitzat correctament!"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Ensenyament  $ensenyament
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ensenyament $ensenyament)
    {
        $ensenyament->delete();
        return back()->with("success", __("L'ensenyament " . $ensenyament->nom . " s'ha eliminat correctament"));
    }
}
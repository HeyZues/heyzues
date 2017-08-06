<?php

namespace HeyZues\Http\Controllers;

use HeyZues\Employes;
use Illuminate\Http\Request;

class EmployesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        if ($id == null) {
            return Employes::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request) {
        $Employes = new Employes;

        $Employes->name = $request->input('name');
        $Employes->email = $request->input('email');
        $Employes->contact_number = $request->input('contact_number');
        $Employes->position = $request->input('position');
        $Employes->save();

        return 'Employes record successfully created with id ' . $Employes->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        return Employes::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {
        $Employes = Employes::find($id);

        $Employes->name = $request->input('name');
        $Employes->email = $request->input('email');
        $Employes->contact_number = $request->input('contact_number');
        $Employes->position = $request->input('position');
        $Employes->save();

        return "Sucess updating user #" . $Employes->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request) {
        $Employes = Employes::find($request->input('id'));

        $Employes->delete();

        return "Employes record successfully deleted #" . $request->input('id');
    }
}

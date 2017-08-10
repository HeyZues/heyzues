<?php

namespace HeyZues\Http\Controllers;

use HeyZues\Employes;
use Illuminate\Http\Request;
use DB;
use Exception;

class EmployesController extends Controller
{

    public function showView()
    {
        $my_array = ["title"=>"some_title","content"=>"some_content"];
        return view("employes/nuevo", ['title' => 'Nuevo Empleado']);
    }        
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
    public function store() {
        $Employes = new Employes;
        $obj = json_decode(file_get_contents("php://input"));
        $obj->position = 1;

        /*
        METODO 1
        try {
            $obj = json_decode(json_encode($obj), True);
            DB::table('employees')->insert([$obj]);
            return 'Employes record successfully';
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        */
        $Employes->name = $obj->name;
        $Employes->email = $obj->email;
        $Employes->contact_number = $obj->contact_number;
        $Employes->position = $obj->position;
        try {
            $Employes->save();
            return 'Employes record successfully created with id ' . $Employes->id;
        } catch (\Exception $e) {
            return $e->getMessage();
        }        
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

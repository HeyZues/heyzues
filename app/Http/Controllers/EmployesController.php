<?php

namespace HeyZues\Http\Controllers;

use HeyZues\Employes;
use Illuminate\Http\Request;
use DB;
use Exception;
use HeyZues\Classes\Common;

class EmployesController extends Controller
{
    
    public function empleados()
    {
        return view("employes/empleados", ['parent' => 'Empleados', 'title' => 'Empleados', 'subtitle' => 'Listado', "method" => 'empleados', "id"=>null]);
    }  

    public function showView($id = null)
    {
        if ($id == null) {
       // $id = DB::table('employees')->max('id') + 1;
        $my_array = ['parent' => 'Empleados', "pmethod" => 'empleados', "title"=>"Nuevo Empleado", "title"=>"Nuevo Empleado",'subtitle' => 'Nuevo', "method" => $id, "id"=>$id];            
        }else {
        $my_array = ['parent' => 'Empleados', "pmethod" => 'empleados', "title"=>"Editar Empleado", "title"=>"Editar Empleado",'subtitle' => 'Edición', "method" => $id, "id"=>$id];
        }
        return view("employes/nuevo", [$my_array][0]);
       // return print_r($my_array);
    }        
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id = null) {
        $com = new Common();

        if ($id == null) {
            try {
                return Employes::orderBy('id', 'asc')->get();
            } catch (\Exception $e) {
                if($com->getError($e->getCode())){
                    return $com->getError($e->getCode());
                } else {
                    return $e->getMessage();
                }               
            }     
        } else {
            try {
                return $this->show($id);
            } catch (\Exception $e) {
                if($com->getError($e->getCode())){
                    return $com->getError($e->getCode());
                } else {
                    return $e->getMessage();
                }               
            } 
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
        $obj = json_decode(file_get_contents("php://input"));
        $obj->position = 1;

        $Employes->name = $obj->name;
        $Employes->email = $obj->email;
        $Employes->contact_number = $obj->contact_number;
        $Employes->position = $obj->position;
        $Employes->save();

        return "Sucess updating user #" . $Employes->id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $Employes = Employes::find($id);

        $Employes->delete();

        return "Employes record successfully deleted #" . $id;
    }
}

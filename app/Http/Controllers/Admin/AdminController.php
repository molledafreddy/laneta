<?php

namespace LaNeta\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Http\Assets\ResourceFunctions;
use LaNeta\Admin;
use LaNeta\Module;
use LaNeta\AdminModule;
use Auth;
use DB;
use Log;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();
        return view('admin.admins.index')->with('admins', $admins);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info("ingreso al controlador AdminController@index: user: ".Auth::user()->name);
       
        return view('admin.admins.create')->with('modules',Module::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {  
            DB::beginTransaction();          
            
            $request -> request -> add(['remember_token' => str_random(10)]);
            $admin = Admin::create($request -> all());
           
            if (count($admin)>0) {
                
                //runs the array club passed by request for insert in an array, and later insert in the BD
                foreach ($request->modules as $key => $value) {

                    $data_insert[$key]=['admin_id'=>$admin->id, 'module_id'=>$value, 'created_at'=> date('Y-m-d H:m:s'), 'updated_at'=> date('Y-m-d H:m:s')];
                    
                }
           
                AdminModule::insert($data_insert);                
            }

            DB::commit();
            flash('Usuario creado exitosamente', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Ah ocurrido un error en AdminController@store: ' . $e );
            flash('No se pudo creado el registro', 'error'); 
        }
        return redirect()->route('admins.show', $admin -> id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Log::info('Ingreso exitoso a AdminController - show(), del usuario: '.Auth::user()->username);

        return view('admin.admins.show')
                ->with(
                    [
                        'admin' => Admin::FindOrFail($id),
                        'admin_modules' =>AdminModule::with('module')->where('admin_id',$id)->get()
                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {        
        $admin = Admin::FindOrFail($id);
        $modules = Module::all();
        $admin_modules = AdminModule::with('module')->where('admin_id',$id)->get();
        $modules_end = ResourceFunctions::checksSeleccionados($modules, $admin_modules, 'module_id', 'name');
        
        return view('admin.admins.edit')->with([
            'admin' => $admin,
            'modules' => $modules,
            'modules_end' => $modules_end
        ]);
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
        try {
            DB::beginTransaction();

            Admin::FindOrFail($id)->update($request->all());
            
            $rma = AdminModule::where('admin_id',  $id);
            
            if (count($rma)>0) {
                $rma -> delete();
            }
            
            if (count($request->modules)>0) {
                //runs the array club passed by request for insert in an array, and later insert in the BD the dates updated
                foreach ($request->modules as $key => $value) {
                    
                    $data_insert[$key]=['admin_id'=>$id, 'module_id'=>$value, 'created_at'=> date('Y-m-d H:m:s'), 'updated_at'=> date('Y-m-d H:m:s')];
                }

                AdminModule::insert($data_insert);
             } 



            DB::commit();

            flash('Admins modificado exitosamente', 'success');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Ah ocurrido un error en AdminController@Update: ' . $e );
            flash('No se pudo modificar el registro', 'error');            
        }
        return redirect()->route('admins.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Log::info('Ingreso exitoso a AdminController - delete(), del usuario: '.Auth::user()->username);

        try {            
            Admin::FindOrFail($id)->delete();
            flash('Usuario eliminado exitosamente', 'success');
        } catch (\Exception $e) {
            flash('No se pudo eliminar el registro', 'error');              
        }
        return redirect()->route('admins.index');
    }
}

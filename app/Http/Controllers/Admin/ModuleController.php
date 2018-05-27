<?php

namespace LaNeta\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Module;
use LaNeta\AdminModule;
use Auth;
use DB;
use Log;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info("ingreso al controlador ModuleController@index: user: ".Auth::user()->name);
       
        return view('admin.modules.index')->with('modules', Module::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Log::info("ingreso al controlador ModuleController@store: ".$request->From);

        $this->validate($request, [
            'name' => 'required|Min:3|Max:100',
            'description' => 'required|Min:3',
        ]);

        try {
            DB::beginTransaction();

            $module = Module::create(request()->all());
            $module->save();

            DB::commit();
       } catch (\Exception $e) {
            DB::rollBack();           
            Log::error('Ah ocurrido un error en ModuleController@user: ' . $e );
            flash('Ah ocurrido un error al realizar la operación de registro', 'danger');
            return redirect()->route('portal.index');
        }

        return redirect()->route('modules.show', $module -> id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $module = Module::FindOrFail($id);
        return view('admin.modules.show')->with(['module' => $module]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $module = Module::FindOrFail($id);
        return view('admin.modules.edit')->with(['module' => $module]);
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
        Log::info("ingreso al controlador ModuleController@store: ".$request->From);

        try {
            DB::beginTransaction();

            Module::FindOrFail($id)->update($request->all());
            flash('Modulo modificado exitosamente', 'success');

            DB::commit();
        } catch (\Exception $e) {
            Log::error('Ah ocurrido un error en ModuleController@update: ' . $e );
            flash('Ah ocurrido un error al realizar la operación', 'danger');
        }
        return redirect()->route('modules.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {  
            $rma = AdminModule::where('admin_id',  $id)->get();
            
            if (count($rma)>0) {
                flash('El modulo tiene usuario relacionados', 'warning');
                return redirect()->route('modules.index');
            }          
            Module::FindOrFail($id)->delete();
            flash('Modulo eliminado exitosamente', 'success');
        } catch (\Exception $e) {
            flash('No se pudo eliminar el registro', 'error');              
        }
        return redirect()->route('modules.index');
    }
}

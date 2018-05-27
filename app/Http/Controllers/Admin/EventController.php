<?php

namespace LaNeta\Http\Controllers\Admin;

use Illuminate\Http\Request;
use LaNeta\Http\Controllers\Controller;
use LaNeta\Event;
use LaNeta\Exception;
use Log;
use DB;


class EventController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		Log::info('Ingreso exitoso a EventController@index');
		return view('admin.events.index')->with(['events' => Event::all()]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		Log::info('Ingreso exitoso a EventController@create');
		return view('admin.events.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		request()->validate([
			'name'=>'required',
			'hits'=>'required',
			'description'=>'required',
		]);
		
		try {
            DB::beginTransaction();
				Event::create($request->all());
				Log::info('Proceso exitoso en EventController@store');
            	flash('Operación exitosa', 'success');	
            DB::commit();
		} catch (Exception $e) {
            DB::rollBack();    
			Log::error('Error en EventController@store: ' . $e);
            flash('Ah ocurrido un error al realizar la operación', 'danger');			
		}
		
		return redirect()->route('events.index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		Log::info('Ingreso exitoso a EventController@show');
		return view('admin.events.show')->with(['event' => Event::FindOrFail($id)]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		Log::info('Ingreso exitoso a EventController@edit');
		return view('admin.events.edit')->with(['event' => Event::FindOrFail($id)]);
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
		request()->validate([
			'name'=>'required',
			'hits'=>'required',
		]);
		
		try {
            DB::beginTransaction();
				Event::FindOrFail($id)->update($request->all());
				Log::info('Proceso exitoso en EventController@update');
            	flash('Operación exitosa', 'success');	
            DB::commit();
		} catch (Exception $e) {
            DB::rollBack();    
			Log::error('Error en EventController@update: ' . $e);
            flash('Ah ocurrido un error al realizar la operación', 'danger');				
		}
		
		return redirect()->route('events.index'); 
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
            DB::beginTransaction();
				Event::destroy($id);
				Log::info('Proceso exitoso en EventController@update');
            	flash('Operación exitosa', 'success');	
            DB::commit();
		} catch (Exception $e) {
            DB::rollBack();    
			Log::error('Error en EventController@update: ' . $e);
            flash('Ah ocurrido un error al realizar la operación', 'danger');				
		}
		
		return redirect()->route('events.index');
	}
}

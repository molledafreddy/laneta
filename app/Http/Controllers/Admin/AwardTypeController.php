<?php

namespace LaNeta\Http\Controllers\Admin;

use LaNeta\Http\Controllers\Controller;
use LaNeta\Award;
use LaNeta\AwardType;
use Illuminate\Http\Request;

class AwardTypeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$awardtypes = AwardType::paginate(8);
		
		return view('admin.awardtypes.index', compact("awardtypes"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		return view('admin.awardtypes.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//dd($request);
		
		$image_name = $request->image->getClientOriginalName();
		$destination_path = public_path('/uploads');		
		$image_path = "/uploads/" . $image_name;		
		$request->image->move($destination_path, $image_name);
		
		AwardType::create([
			'name' => $request->name,
			'image' => $image_path,
		]);
		
		return redirect('admin/awardtypes');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \LaNeta\AwardType  $award_type
	 * @return \Illuminate\Http\Response
	 */
	public function show($id)
	{
		$award_type = AwardType::find($id);
		
		return view('admin.awardtypes.show', compact("award_type"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \LaNeta\AwardType  $award_type
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id)
	{
		$award_type = AwardType::find($id);
		
		return view('admin.awardtypes.edit', compact("award_type"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \LaNeta\AwardType  $award_type
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id)
	{
		$award_type = AwardType::find($id);
		
		// dd($request->all());
		
		$award_type->name = $request->name;
		
		if ($request->image)
		{
			$image_name = $request->image->getClientOriginalName();
			$destination_path = public_path('/uploads');		
			$image_path = "/uploads/" . $image_name;		
			$request->image->move($destination_path, $image_name);
			$award_type->image = $image_path;
		}
		
		$award_type->save();
		
		return redirect('admin/awardtypes');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \LaNeta\AwardType  $award_type
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id)
	{
		//dd($award_type);
		$award_type = AwardType::find($id);
		
		/*	Importante!
			Cuando se intenta borrar un tipo de premio que ya ha sido asignado
			a algún registro de la tabla awards, el sistema devuelve una excepción 
			debido a la clave externa type_id que vincula la tabla awards con la 
			tabla award_types. 
			
			Es necesario filtrar este caso.
			*/
		
		$award_type->delete();
		
		return redirect('admin/awardtypes');
	}
}

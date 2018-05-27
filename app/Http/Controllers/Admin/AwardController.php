<?php

namespace LaNeta\Http\Controllers\Admin;

use LaNeta\Http\Controllers\Controller;
use LaNeta\Award;
use LaNeta\AwardType;
use Illuminate\Http\Request;

class AwardController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$awards = Award::paginate(8);
		
		//dd($awards);
		
		return view('admin.awards.index', compact("awards"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		$award_types = AwardType::all();
		return view('admin.awards.create', compact("award_types"));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request)
	{
		//dd($request->all());
		
		$request->validate([
			'name' => 'required',
			'description' => 'required',
			'hits' => 'required',
			'type_id' => 'required'
		]);
		
		Award::create($request->all());
		
		return redirect('/admin/awards');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \LaNeta\Award  $award
	 * @return \Illuminate\Http\Response
	 */
	public function show(Award $award)
	{
		$award_type = AwardType::find($award->type_id);
		
		return view('admin.awards.show', compact("award", "award_type"));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \LaNeta\Award  $award
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Award $award)
	{
		//dd($award);
		
		$award_types = AwardType::all();
		
		return view('admin.awards.edit', compact("award", "award_types"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \LaNeta\Award  $award
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Award $award)
	{
		//dd($request->all());
		//dd($award);
		$award->fill($request->all());
		$award->save();
		
		return redirect('/admin/awards');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \LaNeta\Award  $award
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Award $award)
	{
		//dd($award);
		
		$award->delete();
		
		return redirect('/admin/awards');
	}
}

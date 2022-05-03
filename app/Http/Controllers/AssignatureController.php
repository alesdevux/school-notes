<?php

namespace App\Http\Controllers;

use App\Models\Assignature;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AssignatureController extends Controller {
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index() {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create() {
    return Inertia::render('Assignatures/Create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request) {
    $request->validate([
      'name' => 'required',
      'description' => 'required',
      'curse' => 'required',
      'year' => 'required',
      'user_id' => 'required',
    ]);

    $assignature = Assignature::create($request->all());
    $assignature->save();

    return redirect()->route('assignatures.index');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Assignature  $assignature
   * @return \Illuminate\Http\Response
   */
  public function show(Assignature $assignature) {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Assignature  $assignature
   * @return \Illuminate\Http\Response
   */
  public function edit(Assignature $assignature) {
    return Inertia::render('Assignatures/Edit', $assignature);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Assignature  $assignature
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Assignature $assignature) {
    $request->validate([
      'name' => 'required',
      'description' => 'required',
      'curse' => 'required',
      'year' => 'required',
      'user_id' => 'required',
    ]);

    $assignature->update($request->all());

    return redirect()->route('assignatures.index');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Assignature  $assignature
   * @return \Illuminate\Http\Response
   */
  public function destroy(Assignature $assignature) {
    //
  }
}

<?php

namespace App\Http\Controllers;

use App\Collection;
use App\User;
use App\Http\Resources\Collection as CollectionResource;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    private $rules = [
        'name' => ['required', 'string']
    ];

    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find('c44c720b-3c52-486e-ac73-edfc41222163');
        $collections = $user->collections()->paginate(15);
        return CollectionResource::collection($collections);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate($this->rules);
        //$validated['user_id'] = Auth::id();
        $validated['user_id'] = 'c44c720b-3c52-486e-ac73-edfc41222163';
        Collection::create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection)
    {
        return new CollectionResource($collection);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Collection $collection)
    {
        $this->authorize('update', $collection);
        $validated = $request->validate($this->rules);
        $collection->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Collection  $collection
     * @return \Illuminate\Http\Response
     */
    public function destroy(Collection $collection)
    {
        $collection->delete();
    }
}

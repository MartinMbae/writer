<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $title = "View Sources";
        $sources = Source::all();
        $orderController = new OrderController();
        $counts = $orderController->getCounts();
        return view('admin.sources', compact('sources', 'title', 'counts'));
    }


    public function create()
    {
        $title = "Add a Source";
        $orderController = new OrderController();
        $counts = $orderController->getCounts();
        return view('admin.create_source', compact('title', 'counts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:50', 'unique:sources'],
            'description' => ['required', 'string', 'max:100',],
        ], [
            'name.unique' => 'A source with a similar name already exists',

        ])->validate();
        $source = new Source();
        $source->name = $request->name;
        $source->description = $request->description;
        $source->save();
        return redirect('sources');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Source $source
     * @return \Illuminate\Http\Response
     */
    public function show(Source $source)
    {
        //
    }



    public function edit(Source $source)
    {
        $title = "Edit Source";
        $orderController = new OrderController();
        $counts = $orderController->getCounts();
        return view('admin.edit_source', compact('title', 'counts','source'));

    }

    public function update(Request $request, Source $source)
    {
        Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:50', 'unique:sources,name,'.$source->id],
            'description' => ['required', 'string', 'max:100',],
        ], [
            'name.unique' => 'A source with a similar name already exists',

        ])->validate();
        $source->name = $request->name;
        $source->description = $request->description;
        $source->save();
        return redirect('sources');
    }


    public function destroy(Source $source)
    {
        Source::destroy($source->id);
        return redirect('sources');
    }
}

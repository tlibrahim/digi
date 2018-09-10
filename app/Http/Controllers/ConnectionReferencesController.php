<?php

namespace App\Http\Controllers;

use App\ConnectionReferences;
use Illuminate\Http\Request;

class ConnectionReferencesController extends Controller {
    public function index()
    {
        $references = ConnectionReferences::all();
        return view('connection-references.index' ,compact('references'));
    }

    public function create()
    {
        return view('connection-references.add');
    }

    public function store(Request $request)
    {
        ConnectionReferences::create($request->all());
        return redirect('connection-references')->with('status' ,'Connection Reference Created Successfully!');
    }

    public function show(ConnectionReferences $connectionReferences)
    {
        return back();
    }

    public function edit($id)
    {
        $ref = ConnectionReferences::find($id);
        return view('connection-references.edit' ,compact('ref'));
    }

    public function update(Request $request, $id)
    {
        ConnectionReferences::find($id)->update($request->all());
        return back()->with('status' ,'Connection Reference Updated Successfully!');
    }

    public function destroy($id ,ConnectionReferences $connectionReferences)
    {
        ConnectionReferences::find($id)->delete();
        return back()->with('status' ,'Connection Reference Deleted Successfully!');
    }
}

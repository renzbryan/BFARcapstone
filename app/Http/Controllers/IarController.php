<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Iar;

class IarController extends Controller
{
    public function index(){
        $iars = Iar::get();
        return view('admin.iar.view-iar', compact('iars'));
    }

    public function show($id){
        $iars = Iar::find($id)->delete();
        return redirect()->back()->with('success', 'SUCCESSFULLY RESTORED');
    }

    public function create(){
        $iars = Iar::get();
        return view('admin.iar.create-iar', compact('iars'));
    }

    public function store(Request $request){
        $request->validate([
            'item_name'=>'required', 
            'description'=>'required', 
            'unit'=>'required', 
            'quantity'=>'required', 
            'forms'=>'nullable', 
        ]);
        Iar::create($request->all());
            return redirect('iar')->with('success', 'SUCCESSFULLY ADDED');
    }

    public function edit($id){
        $iars = Iar::find($id);
        return view('admin.iar.edit-iar', compact('iars'));

    }

    public function update(Request $request, $id){
        $request->validate([
            'item_name'=>'required', 
            'description'=>'required', 
            'unit'=>'required', 
            'quantity'=>'required', 
            'forms'=>'nullable',
        ]);
        $iars = Iar::find($request['id']);
        $iars->update($request->all());
        return redirect('iar')->with('success', 'SUCCESSFULLY UPDATED');
    }

    public function archive(){
        $iars = Iar::withTrashed()
        ->where('iar_tbl.deleted_at', '!=', null)->get();
        return view('admin.iar.archive-iar', compact('iars'));
    }


    public function restore($id){
        $iars = Iar::withTrashed()->find($id)->restore();
        return redirect()->back()->with('success', 'SUCCESSFULLY RESTORED');
    }
}

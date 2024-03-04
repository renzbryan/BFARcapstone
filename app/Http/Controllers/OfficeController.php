<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BfarOffice;
class OfficeController extends Controller
{
    public function createForm()
    {
        return view('bfar_office');
    }

    public function store(Request $request)
    {
        $request->validate([
            'office' => 'required|string|max:255',
            'rcc' => 'required|string|max:255',
        ]);

        BfarOffice::create($request->all());

        return redirect()->route('bfar_office.create')->with('success', 'Data inserted successfully!');
    }
}

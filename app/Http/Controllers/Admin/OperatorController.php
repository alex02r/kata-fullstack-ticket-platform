<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Operator;
use App\Models\Priority;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operators=Operator::orderBy('id', 'DESC')->paginate(12);
        return view('admin.operators.index', compact('operators'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $operator=new Operator();

        return view('admin.operators.create', compact('operator'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $operator = Operator::create($data);
        $operator->save();
        return redirect()->route('admin.operators.show',$operator);
    }

    /**
     * Display the specified resource.
     */
    public function show(Operator $operator)
    {
        return view('admin.operators.show', compact('operator'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operator $operator)
    {
        $operator=Operator::getByName($operator);
        return view('admin.operators.edit', compact('operator'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operator $operator)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operator $operator)
    {
        $operator->delete();
        return redirect()->route('admin.operators.index');
    }

    public function updateAvailable(Operator $operator, Request $request)
    {
        $data = $request->all();
        $operator->available = Arr::exists($data, 'available') ? true : false;
        $operator->save();
        return redirect()->route('admin.operators.index');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view("admin.categories.index", compact("categories"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.categories.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->all();
        $category = new Category($data);
        $category->save();

        return redirect()->route("admin.categories.show", $category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return view("admin.categories.show", compact("category"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view("admin.categories.edit", compact("category"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->all();
        //cerchiamo una categoria che abbia il nome che abbiamo inserito e che l'id sia diverso
        $find_name = Category::where("name", 'LIKE', $data['name'])->where('id', '!=', $category->id)->get();

        //se esiste, significa che è già presente una categoria con questo nome
        if (count($find_name) > 0) {
            $error = 'Hai inserito il nome di una categoria già esistente';
            return redirect()->route('admin.categories.edit', $category)->withErrors($error);
        }

        $category->update($data);
        return redirect()->route('admin.categories.show', $category);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}

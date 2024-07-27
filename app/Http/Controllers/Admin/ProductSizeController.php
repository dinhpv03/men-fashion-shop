<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSize;
use Illuminate\Http\Request;

class ProductSizeController extends Controller
{

    const PATH_VIEW = 'admin.product_sizes.';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ProductSize::query()->latest('id')->paginate(8);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        ProductSize::query()->create($request->all());

        return redirect()->route('admin.size.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = ProductSize::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = ProductSize::query()->findOrFail($id);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $newData = $request->validate([
            'name' => 'required',
        ]);

        $data = ProductSize::query()->findOrFail($id);

        $data->update($newData);

        return redirect()->route('admin.size.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = ProductSize::query()->findOrFail($id);

        $data->delete();

        return redirect()->route('admin.size.index');
    }
}

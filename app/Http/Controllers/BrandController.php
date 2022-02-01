<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBrandRequest;
use App\Http\Requests\UpdateBrandRequest;
use App\Http\Resources\BrandResource;
use App\Models\Brand;
use App\Models\User;

class BrandController extends Controller
{
    public function index()
    {
        return inertia('Brands/Index', [
            'brands' => BrandResource::collection(Brand::with('owner')->paginate(5)),
        ]);
    }

    public function create()
    {
        $owners = User::all()->map(function ($owner) {
            return [
                'id'   => $owner->id,
                'name' => $owner->name,
            ];
        });

        return inertia('Brands/Create', [
            'owners' => $owners,
        ]);
    }

    public function store(StoreBrandRequest $request)
    {
        Brand::create(array_merge($request->validated(), [
            'logo' => $request->file('logo')->store('brands/logos'),
        ]));

        return redirect('/brands')->with('success', 'New brand is created!');
    }

    public function edit(Brand $brand)
    {
        $owners = User::all()->map(function ($owner) {
            return [
                'id'   => $owner->id,
                'name' => $owner->name,
            ];
        });
        // dd(new BrandResource($brand->with('owner')->findOrFail($brand->id)));
        return inertia('Brands/Edit', [
            'brand'  => new BrandResource($brand->with('owner')->findOrFail($brand->id)),
            'owners' => $owners,
        ]);
    }

    public function update(UpdateBrandRequest $request, $id)
    {
        // dd(Brand::findOrFail($id));
        $brand = Brand::findOrFail($id);

        $brand->update($request->validated());

        return redirect('/brands');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AmenityRequest;
use App\Repositories\Repository\AmenityRepository;

class AmenityController extends Controller
{

    protected $amenityRepository;


    public function __construct(AmenityRepository $amenityRepository)
    {
        $this->amenityRepository = $amenityRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amenities = $this->amenityRepository->all();
        return view('admin.amenities.index', compact('amenities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.amenities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AmenityRequest $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $linkStorage = 'storage/images/';
            $image->move(public_path($linkStorage), $newName);
            $imagePath = $linkStorage . $newName;
        }

        // Lưu thông tin vào database
        $this->amenityRepository->create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        return redirect()->route('amenities.index')->with('success', 'Đã tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $amenity = $this->amenityRepository->findOrFail($id);

        return view('admin.amenities.show', compact('amenity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $amenity = $this->amenityRepository->findOrFail($id);

        return view('admin.amenities.edit', compact('amenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AmenityRequest $request, string $id)
    {
        $amenity = $this->amenityRepository->findOrFail($id);
        if (!$amenity) {
            return redirect()->route('amenities.index')->with('error', 'Tiện ích không tồn tại.');
        }

        $imagePath = $amenity->image; 

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $linkStorage = 'storage/images/';

            if ($imagePath && file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }

            $image->move(public_path($linkStorage), $newName);
            $imagePath = $linkStorage . $newName;
        }

        $this->amenityRepository->update($id, [
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        return redirect()->route('amenities.index')->with('success', 'Cập nhật thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->amenityRepository->delete($id);

        return back()->with('success', 'Đã xóa thành công.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use App\Repositories\Repository\HotelImageRepository;
use App\Repositories\Repository\HotelRepository;

class HotelController extends Controller
{

    protected $hotelRepository;

    protected $hotelImageRepository;

    public function __construct(HotelRepository $hotelRepository, HotelImageRepository $hotelImageRepository)
    {
        $this->hotelRepository = $hotelRepository;
        $this->hotelImageRepository = $hotelImageRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = $this->hotelRepository->all();

        return view('admin.hotels.index', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.hotels.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHotelRequest $request)
    {
        $hotel = $this->hotelRepository->create($request->only([
            'name',
            'address',
            'description'
        ]));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $newName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $linkStorage = 'storage/app/public/images/';
                $image->move(public_path($linkStorage), $newName);
                $linkImage = $linkStorage . $newName;

                $this->hotelImageRepository->create([
                    'hotel_id' => $hotel->id,
                    'image_url' => $linkImage,
                ]);
            }
        }
        return redirect()->route('admin.hotels.index')->with('success', 'Đã tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $hotel = $this->hotelRepository->findOrFail($id);
        return view('admin.hotels.show', compact('hotel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $hotel = $this->hotelRepository->findOrFail($id);
        return view('admin.hotels.edit', compact('hotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHotelRequest $request, string $id)
    {
        $hotel = $this->hotelRepository->update($id, $request->all());

        if ($request->hasFile('images')) {

            if ($hotel->hotelImages->count() > 0) {
                foreach ($hotel->hotelImages as $oldImage) {
                    $imagePath = public_path($oldImage->image_url);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                    $oldImage->delete();
                }
            }
            foreach ($request->file('images') as $image) {
                $newName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $linkStorage = 'storage/app/public/hotels/';
                $image->move(public_path($linkStorage), $newName);
                $linkImage = $linkStorage . $newName;

                $this->hotelImageRepository->create([
                    'hotel_id' => $hotel->id,
                    'image_url' => $linkImage,
                ]);
            }
        }
        return redirect()->route('admin.hotels.index')->with('success', 'Đã sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->hotelRepository->delete($id);
        return back()->with('success', 'Đã xóa thành công.');
    }
}

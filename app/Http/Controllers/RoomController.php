<?php

namespace App\Http\Controllers;

use App\Enums\RoomStatus;
use App\Models\Room;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use App\Repositories\Repository\HotelRepository;
use App\Repositories\Repository\RoomImageRepository;
use App\Repositories\Repository\RoomRepository;

class RoomController extends Controller
{
    protected $roomRepository;

    protected $roomImageRepository;

    protected $hotelRepository;

    public function __construct(RoomRepository $roomRepository, RoomImageRepository $roomImageRepository, HotelRepository $hotelRepository)
    {
        $this->roomRepository = $roomRepository;

        $this->roomImageRepository = $roomImageRepository;

        $this->hotelRepository = $hotelRepository;

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = $this->roomRepository->all();

        return view('rooms.index', compact('rooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = $this->hotelRepository->getName();
        
        $roomStatuses = RoomStatus::getValues();
        $statusOptions = [];
    
        foreach ($roomStatuses as $status) {
            $statusOptions[$status] = RoomStatus::getDescription($status);
        }
    
        return view('rooms.create', compact('hotels','statusOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomRequest $request)
    {
        $room = $this->roomRepository->create($request->only([
            'name',
            'hotel_id',
            'description',
            'price',
            'customer_limit',
            'status',
            'detail'

        ]));

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $newName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $linkStorage = 'storage/app/public/images/';
                $image->move(public_path($linkStorage), $newName);
                $linkImage = $linkStorage . $newName;

                $this->roomImageRepository->create([
                    'room_id' => $room->id,
                    'image_url' => $linkImage,
                ]);
            }
        }
        return redirect()->route('rooms.index')->with('success', 'Đã tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $room = $this->roomRepository->findOrFail($id);
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = $this->roomRepository->findOrFail($id);

        $hotels = $this->hotelRepository->getName();
        
        $roomStatuses = RoomStatus::getValues();
        $statusOptions = [];
    
        foreach ($roomStatuses as $status) {
            $statusOptions[$status] = RoomStatus::getDescription($status);
        }

        return view('rooms.edit', compact('room','hotels', 'statusOptions'));        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoomRequest $request, string $id)
    {
        $room = $this->roomRepository->update($id, $request->all());

        if ($request->hasFile('images')) {

            if ($room->roomImages->count() > 0) {
                foreach ($room->roomImages as $oldImage) {
                    $imagePath = public_path($oldImage->image_url);
                    if (file_exists($imagePath)) {
                        unlink($imagePath);
                    }
                    $oldImage->delete();
                }
            }
            foreach ($request->file('images') as $image) {
                $newName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
                $linkStorage = 'storage/app/public/images/';
                $image->move(public_path($linkStorage), $newName);
                $linkImage = $linkStorage . $newName;

                $this->roomImageRepository->create([
                    'room_id' => $room->id,
                    'image_url' => $linkImage,
                ]);
            }
        }
        return redirect()->route('rooms.index')->with('success', 'Đã sửa thành công.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->roomRepository->delete($id);

        return back()->with('success', 'Đã xóa thành công.');
    }
}

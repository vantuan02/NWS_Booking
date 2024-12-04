<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Repositories\Repository\HotelRepository;
use App\Repositories\Repository\RoomRepository;

class ClientController extends Controller
{
    protected $roomRepository;

    protected $hotelRepository;

    public function __construct(RoomRepository $roomRepository, HotelRepository $hotelRepository)
    {
        $this->roomRepository = $roomRepository;

        $this->hotelRepository = $hotelRepository;
    }

    public function index(){
        $hotels = $this->hotelRepository->all();

        $rooms = $this->roomRepository->all();

        return view('client.index',compact('rooms', 'hotels'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\View;
use App\Http\Requests\StoreViewRequest;
use App\Http\Requests\UpdateViewRequest;
use App\Repositories\Repository\ViewRepository;

class ViewController extends Controller
{
    protected $viewRepository;

    public function __construct(ViewRepository $viewRepository)
    {
        $this->viewRepository = $viewRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $views = $this->viewRepository->all();
        return view('admin.views.index', compact('views'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.views.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreViewRequest $request)
    {
        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $newName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $linkStorage = 'storage/images/';
            $image->move(public_path($linkStorage), $newName);
            $imagePath = $linkStorage . $newName;
        }

        $this->viewRepository->create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.views.index')->with('success', 'Đã tạo thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(View $view)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $view = $this->viewRepository->findOrFail($id);
        return view('admin.views.edit', compact('view'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateViewRequest $request, string $id)
    {
        $view = $this->viewRepository->findOrFail($id);
        if (!$view) {
            return redirect()->route('admin.views.index')->with('error', 'View not exist.');
        }

        $imagePath = $view->image; 

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

        $this->viewRepository->update($id, [
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);

        return redirect()->route('admin.views.index')->with('success', 'Updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->viewRepository->delete($id);
        return back()->with('success', 'Deleted successfully.');
    }
}

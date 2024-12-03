<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePaymentMethodRequest;
use App\Http\Requests\UpdatePaymentMethodRequest;
use App\Repositories\Repository\PayMethodRepository;

class PaymentMethodController extends Controller
{
    protected $payMethodRepository;


    public function __construct(PayMethodRepository $payMethodRepository)
    {
        $this->payMethodRepository = $payMethodRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payMethods = $this->payMethodRepository->all();

        return view('admin.payment_methods.index', compact('payMethods'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.payment_methods.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePaymentMethodRequest $request)
    {
        $this->payMethodRepository->create($request->all());

        return redirect()->route('payment_methods.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $payMethod = $this->payMethodRepository->findOrFail($id);

        return view('admin.payment_methods.edit', compact('payMethod'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePaymentMethodRequest $request, string $id)
    {
        $this->payMethodRepository->findOrFail($id);
        $this->payMethodRepository->update($id,$request->all());

        return redirect()->route('payment_methods.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->payMethodRepository->delete($id);
        
        return back()->with('success', 'Đã xóa thành công.');
    }
}

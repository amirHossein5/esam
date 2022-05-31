<?php

namespace App\Http\Controllers\Customer\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\Dashboard\MyAddresses\AddressRequest;
use App\Models\Address;
use App\Models\Province;
use Facades\App\Repositories\CityRepository;
use Facades\App\Repositories\ProvinceRepository;
use Illuminate\Http\Request;

class MyAddressesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses = auth()->user()->addresses;
        $provinces = ProvinceRepository::all();

        return view('customer.dashboard.my-addresses.index', compact('addresses', 'provinces'));
    }

    /**
     * Returns city of the province
     *
     * @return \Illuminate\Http\Response
     */
    public function cityOfProvince(Province $province)
    {
        $cities = CityRepository::all()->where('province_id', $province->id);

        return response(['cities' => $cities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddressRequest $request)
    {
        $request = $request->validated();

        auth()->user()->addresses()->create($request);

        return back()->with('sweetalert-mixin-success', 'با موفقیت افزوده شد');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        $provinces = ProvinceRepository::all();

        return view('customer.dashboard.my-addresses.edit', compact('address', 'provinces'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AddressRequest $request, Address $address)
    {
        //gate

        $request = $request->validated();

        $address->update($request);

        $session = session('url.intended');
        session()->forget('url');

        return $session
            ? redirect($session)
                ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد')
            : to_route('customer.dashboard.myAddresses.index')
                ->with('sweetalert-mixin-success', 'با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        //gate
        $address->delete();

        return back()->with('sweetalert-mixin-success', 'با موفقیت حذف شد');
    }
}

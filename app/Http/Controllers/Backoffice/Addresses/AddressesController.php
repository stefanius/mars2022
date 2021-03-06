<?php

namespace App\Http\Controllers\Backoffice\Addresses;

use App\Models\Address;
use Illuminate\Routing\Controller;
use App\Http\Requests\AddressStoreRequest;

class AddressesController extends Controller
{
    /**
     * Show the addresses index.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.addresses.index');
    }

    /**
     * Show a address page.
     *
     * @param Address $address
     * @return \Illuminate\View\View
     */
    public function show(Address $address)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.addresses.show', compact('address'));
    }

    /**
     * Edit a address page.
     *
     * @param Address $address
     * @return \Illuminate\View\View
     */
    public function edit(Address $address)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.addresses.edit', compact('address'));
    }

    /**
     * @param AddressStoreRequest $request
     */
    public function store(AddressStoreRequest $request)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        Address::create($request->validated());

        return redirect(route('addresses.index'));
    }

    /**
     * @param Address $address
     * @param AddressStoreRequest $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Address $address, AddressStoreRequest $request)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        $address->update($request->validated());

        return redirect(route('addresses.index'));
    }

    /**
     * Show a address page.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        return view('backoffice.pages.addresses.create');
    }

    /**
     * Destroy a address.
     *
     * @param Address $address
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Address $address)
    {
        abort_unless(auth()->user()->isAdmin(), 401);

        $address->forceDelete();

        return redirect('addresses.index');
    }
}

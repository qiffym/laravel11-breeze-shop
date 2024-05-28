<?php

namespace App\Http\Controllers;

use App\Enums\StoreStatus;
use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Http\RedirectResponse;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class StoreController extends Controller
{


    public function index(): View
    {
        return view('stores.index', [
            'stores' => Store::query()->where('status', StoreStatus::ACTIVE)->latest()->get(),
        ]);
    }

    public function list(): View
    {
        $stores = Store::query()->latest()->paginate(8);
        return view('stores.list', [
            'stores' => $stores,
        ]);
    }

    public function approve(Store $store): RedirectResponse
    {
        $store->status = StoreStatus::ACTIVE;
        $store->save();

        return redirect()->back();
    }


    public function create(): View
    {
        return view('stores.form', [
            'store' => new Store(),
            'page_meta' => [
                'title' => 'Create store',
                'description' => 'Create your own store',
                'method' => 'POST',
                'url' => route('stores.store')
            ]
        ]);
    }


    public function store(StoreRequest $request): RedirectResponse
    {
        $file = $request->file('logo');

        $request->user()->stores()->create([
            ...$request->validated(),
            'logo' => $file->store('images/stores')
        ]);

        return to_route('stores.index')->with('message', 'Store has been created successfully');
    }


    public function show(Store $store): View
    {
        return view('stores.show', [
            'store' => $store,
        ]);
    }


    public function edit(Store $store): View
    {
        Gate::authorize('update', $store);
        return view('stores.form', [
            'store' => $store,
            'page_meta' => [
                'title' => 'Edit store',
                'description' => 'Edit store: ' . $store->name,
                'method' => 'PUT',
                'url' => route('stores.update', $store)
            ]
        ]);
    }


    public function update(StoreRequest $request, Store $store): RedirectResponse
    {
        if ($request->hasFile('logo')) {
            Storage::delete($store->logo);
            $file = $request->file('logo')->store('images/stores');
        } else {
            $file = $store->logo;
        }

        $store->update([
            'name' => $request->name,
            'description' => $request->description,
            'logo' => $file
        ]);

        return to_route('stores.index');
    }


    public function destroy(Store $store)
    {
        //
    }
}

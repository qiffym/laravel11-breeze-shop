<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Store;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('stores.index', [
            'stores' => Store::query()->latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $file = $request->file('logo');

        $request->user()->stores()->create([
            ...$request->validated(),
            'logo' => $file->store('images/stores')
        ]);

        return to_route('stores.create')->with('message', 'Store has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store): View
    {
        return view('stores.show', [
            'store' => $store,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
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

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Store $store): RedirectResponse
    {
        $store->update($request->validated());

        return to_route('stores.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
    }
}

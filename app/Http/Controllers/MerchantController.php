<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    Merchant, Branch
};
use App\Http\Requests\{
    StoreMerchantRequest,
    UpdateMerchantRequest
};

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('merchant.index',[
            'merchant' => Merchant::with('branches')->latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('merchant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMerchantRequest $request)
    {
        $merchant = Merchant::create($request -> validated());

        if(!empty($request['branches'])){
            $additionalBranches = array_map( function($branch) {
                return new Branch(['location' => $branch ]);
            }, $request['branches']);

            $merchant->branches()->saveMany($additionalBranches);
        }

        return redirect()->route('merchant.index')->with('success', 'Item created');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function show(Merchant $merchant)
    {
        //
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function edit(Merchant $merchant)
    {
        abort(404);
        //
        // return view('todolist.edit',[
        //     'merchant' => $merchant
        // ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMerchantRequest $request, Merchant $merchant)
    {
        abort(404);
        // $merchant->update($request->validated());

        // return redirect()->route('merchant.index')->with('success', "Item Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Merchant  $merchant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Merchant $merchant)
    {
        abort(404);
        //
        // $merchant->delete();

        // return redirect()->route('merchant.index')->with('success', 'Item Deleted');
    }
}

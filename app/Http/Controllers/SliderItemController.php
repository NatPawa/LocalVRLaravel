<?php

namespace App\Http\Controllers;

use App\Models\SliderItem;
use App\Http\Requests\StoreSliderItemRequest;
use App\Http\Requests\UpdateSliderItemRequest;
use Illuminate\Http\Request;

class SliderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return SliderItem::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSliderItemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderItemRequest $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SliderItem  $sliderItem
     * @return \Illuminate\Http\Response
     */
    public function show(SliderItem $sliderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SliderItem  $sliderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(SliderItem $sliderItem)
    {
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSliderItemRequest  $request
     * @param  \App\Models\SliderItem  $sliderItem
     * @return \Illuminate\Http\Response
     */
    public function updateSlider(Request $request,$sliderItemId)
    {
        $sliderItem = SliderItem::find($sliderItemId);
        
        $sliderItem->title = $request->input('title');
        $sliderItem->description = $request->input('description');
        $sliderItem->type = $request->input('type');

        $sliderItem->save();
    }

    public function uploadImage(Request $request, $sliderItemId)
    {     
        $sliderItem = SliderItem::all()->find($sliderItemId)->first();
        if ($request->file('cover')->isValid()) {
            $sliderItem->urlcover = $request->file('cover')->store('sliderResources/covers','public');
            $sliderItem->save();
        }
        //$game->urlcover = $request->file('cover')->store('covers','public');
        //
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SliderItem  $sliderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(SliderItem $sliderItem)
    {
        //
    }
}

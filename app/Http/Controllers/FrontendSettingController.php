<?php

namespace App\Http\Controllers;

use App\FrontendSetting;
use Illuminate\Http\Request;
use Session;
class FrontendSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FrontendSetting  $frontendSetting
     * @return \Illuminate\Http\Response
     */
    public function show(FrontendSetting $frontendSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FrontendSetting  $frontendSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(FrontendSetting $frontendSetting)
    {
        $frontendSetting = FrontendSetting::first();

        return view('admin.settings.index', compact('frontendSetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FrontendSetting  $frontendSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        $setting =  FrontendSetting::first();
        $setting->update($request->all());
        $unlinkImgName = $setting->logo;
        if($request->hasFile('image')){
            $image = $request->image;
            $newImgName = time().'-'.$image->getClientOriginalName();
            unlink('storage/logo/'.$unlinkImgName);
            $image->move('storage/logo/',$newImgName);
            $setting->logo = $newImgName;
            $setting->save();
        }
       
        Session::flash('success', 'Updated Successfully');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FrontendSetting  $frontendSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(FrontendSetting $frontendSetting)
    {
        //
    }
}
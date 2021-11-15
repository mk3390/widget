<?php

namespace App\Http\Controllers;

use App\Models\Widget;
use Illuminate\Support\Str;
use App\Models\WidgetConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WidgetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|'
        ]);

        if($validator->fails()){
            return $this->apiResponse($validator->errors(),401);
        }

        $input = $request->except('data');
        $input['uuid'] = (string) Str::uuid();
        $widget = Widget::create($input);
        $data = $request->data;
        foreach($data as $widgetData)
        {
            WidgetConfig::create(['widget_id'=>$widget->id,'data'=>json_encode($widgetData)]);
        }
        if($widget){
            $success['user'] =  $widget;
            $success['message'] = "Widget created..";
            return $this->sendResponse($success);
        }
        else{
            $error = "Unable to create widget.";
            return $this->apiResponse($error, 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Widget  $widget
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $widget = Widget::with('WidgetConfig')->where('uuid',$id)->first();
        if($widget){
            $success['user'] =  $widget;
            $success['message'] = "Widget created..";
            return $this->sendResponse($success);
        }
        else{
            $error = "Unable to create widget.";
            return $this->apiResponse($error, 401);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Widget  $widget
     * @return \Illuminate\Http\Response
     */
    public function edit(Widget $widget)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Widget  $widget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Widget $widget)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Widget  $widget
     * @return \Illuminate\Http\Response
     */
    public function destroy(Widget $widget)
    {
        //
    }
}

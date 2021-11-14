<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class ResourceController extends BaseController {
    
    // Required
    static $resource;
    static $validation;
    
    // Optional
    static $baseurl;
    static $viewPath;
    static $varName; //Array with the singular and plural name of the variable to be passed to the view

    // Default
    static $orderBy = 'id';
    static $pageSize = 25;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $resources = static::$resource::orderBy(static::$orderBy)->paginate(static::$pageSize);
        return view($this->getView('index'), [static::$varName[1] ?? $this->getResourcePluralName() => $resources]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view($this->getView('create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $request->validate(static::$validation);

        $resource = static::$resource::create($data);
        $resource->save();

        foreach($data as $key => $value) {
            if(is_array($value) && method_exists($resource, $key)) {
                call_user_func([$resource, $key])->sync($value);
            }
        }

        return redirect($this->getUrl())->with('success', $this->getResourceName(false) . ' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $resource = static::$resource::findOrFail($id);
        return view($this->getView('show'), [static::$varName[0] ?? $this->getResourceName() => $resource]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $resource = static::$resource::findOrFail($id);
        return view($this->getView('edit'), [static::$varName[0] ?? $this->getResourceName() => $resource]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $resource = static::$resource::findOrFail($id);
        
        $data = $request->validate(static::$validation);

        $resource->update($data);

        foreach($data as $key => $value) {
            if(is_array($value) && method_exists($resource, $key)) {
                call_user_func([$resource, $key])->sync($value);
            }
        }

        return redirect($this->getUrl())->with('success', $this->getResourceName(false) . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $resource = static::$resource::findOrFail($id);

        $resource->delete();

        return redirect($this->getUrl())->with('success', $this->getResourceName(false) . ' deleted successfully');
    }

    public function getUrl($path = '') {
        return '/' . (static::$baseurl ?? $this->getResourcePluralName()) . $path;
    }

    public function getView($view) {
        return (static::$viewPath ?? $this->getResourcePluralName()) . '.' . $view;
    }

    public function getResourceName($lowercase = true) {
        $parts = explode('\\', static::$resource);
        return $lowercase ? Str::lower(end($parts)) : end($parts);
    }

    public function getResourcePluralName() {
        return Str::plural($this->getResourceName());
    }
}

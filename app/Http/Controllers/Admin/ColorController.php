<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorFormRequest;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $colors = Color::orderBy('id','DESC')->get();
        return view('admin.colors.index',compact('colors'));
    }

    public function create()
    {
        return view('admin.colors.create');
    }

    public function store(ColorFormRequest $req)
    {
        $validateData = $req->validated();
        $validateData['status'] =  $req->status == true ? '1' : '0';

        Color::create($validateData);
        return redirect('admin/colors')->with('message','Color Added Succesfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Color $color)
    {
        return view('admin.colors.edit',compact('color'));
    }

    public function update(ColorFormRequest $req, $color_id)
    {
        $validateData = $req->validated();
        $validateData['status'] =  $req->status == true ? '1' : '0';
        Color::find($color_id)->update($validateData);
        return redirect('admin/colors')->with('message','Color Update Successfully');
    }

    public function destroy($color_id)
    {
        $color = Color::find($color_id);
        $color->delete();
        return redirect('admin/colors')->with('message','Color Deleted Successfully');

    }
}

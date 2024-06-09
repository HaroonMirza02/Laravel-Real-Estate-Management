<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Property;
use App\Models\Users;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
class PropertyController extends Controller
{
    public function index()
    {
        $property = Property::orderBy('created_at', 'DESC')->get();
        return view('admin.admin_dashboard_components.properties.view_properties', [
            'property' => $property
        ]);
    }


    public function create()
    {
        $agents = DB::table('users')->where('role','=','agent')->select('users.*')->get();
        return view('admin.admin_dashboard_components.properties.add_properties',[
            'agents' => $agents 
        ]);
    }


    public function store(Request $request)
    {

        $property = new Property();
        $property->title = $request->title;
        $property->price = $request->price;
        $property->purpose = $request->purpose;
        $property->type = $request->type;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->city = $request->city;
        $property->address = $request->address;
        $property->agent_id = $request->agent_id;
        $property->description = $request->description;
        $property->area = $request->area;

        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = time() . "." . $ext;
        $image->move(public_path('uploads/property'), $imageName);
        $property->image = $imageName;

        $property->save();

        return redirect()->route('admin.admin_dashboard_components.properties.view_properties');
    }


    public function edit($id)
    {
        $agents = DB::table('users')->where('role','=','agent')->select('users.*')->get();
        $property = Property::findOrFail($id);
        return view('admin.admin_dashboard_components.properties.edit_properties', [
            'property' => $property,
            'agents' => $agents 
        ]);
    }


    public function update($id, Request $request)
    {
        $property = Property::findOrFail($id);
        $property->title = $request->title;
        $property->price = $request->price;
        $property->purpose = $request->purpose;
        $property->type = $request->type;
        $property->bedroom = $request->bedroom;
        $property->bathroom = $request->bathroom;
        $property->city = $request->city;
        $property->address = $request->address;
        $property->agent_id = $request->agent_id;
        $property->description = $request->description;
        $property->area = $request->area;

        File::delete(public_path('uploads/property/'.$property->image));
        $image = $request->image;
        $ext = $image->getClientOriginalExtension();
        $imageName = time() . "." . $ext;
        $image->move(public_path('uploads/property'), $imageName);
        $property->image = $imageName;


        $property->save();

        return redirect()->route('admin.admin_dashboard_components.properties.view_properties');
    }


    public function destroy($id)
    {
        $product = Property::findOrFail($id);

        $product->delete();

        return redirect()->route('admin.admin_dashboard_components.properties.view_properties');
    }

    public function viewProperty($id){
        $properties = DB::table('properties')
        ->where('properties.id','=',$id)
        ->join('users', 'users.id', '=', 'properties.agent_id')
        ->select('users.*','properties.*')
        ->get()->first();

        return view('FrontEnd.propertyDetails',[
            'properties' => $properties
        ]);
    }

}

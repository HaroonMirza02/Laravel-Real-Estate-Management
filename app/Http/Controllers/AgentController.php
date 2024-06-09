<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Property;
use App\Models\User;
use App\Models\Contact;
use Illuminate\Http\Request;
class AgentController extends Controller
{
    public function AgentDashboard(){
        $properties = Property::orderBy('created_at', 'DESC')->where('agent_id','=',session('ID'))->get();
        $contacts = Contact::orderBy('created_at', 'DESC')->where('agent_id','=',session('ID'))->get();
        return view('agent.agentDashboard',[
            "properties" => $properties,
            "contacts" => $contacts
        ]);
    }

    public function index()
    {
        $property = Property::orderBy('created_at', 'DESC')->get();
        return view('agent.properties.view_properties', [
            'property' => $property
        ]);
    }


    public function create()
    {
        $agents = DB::table('users')->where('role','=','agent')->select('users.*')->get();
        return view('agent.properties.add_properties',[
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

        return redirect()->route('agent.view_properties');
    }


    public function edit($id)
    {
        $agents = DB::table('users')->where('role','=','agent')->select('users.*')->get();
        $property = Property::findOrFail($id);
        return view('agent.properties.edit_properties', [
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

        return redirect()->route('agent.view_properties');
    }


    public function destroy($id)
    {
        $product = Property::findOrFail($id);

        $product->delete();

        return redirect()->route('agent.view_properties');
    }


    public function editProfile(){
        $userID = session('ID');
        $user = User::findOrFail($userID);
        return view('agent.profile',[
            'user' => $user
        ]);
    }

    public function updateProfile(Request $request){
        $userID = session('ID');
        $user = User::findOrFail($userID);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone = $request->Phone;
        $user->save();
        return redirect()->route('agent.profile');

    }

    public function viewContact(){
        $contacts = Contact::orderBy('created_at', 'DESC')->where('agent_id','=',session('ID'))->get();
        return view('agent.customer_support', [
            'contacts' => $contacts
        ]);

    }

    public function replyContact($id){
        $contacts = Contact::findOrFail($id);
        return view('agent.reply_customer', [
            'contacts' => $contacts
        ]);

    }

    
}

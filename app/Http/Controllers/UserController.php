<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Models\User;
use App\Models\Property;

class UserController extends Controller
{
    public function getAgents(){
        $agents = DB::table('users')->where('role','=','agent')->get();
        return view('admin.admin_dashboard_components.agents.view_agents',[
            'agents' => $agents
        ]);
    }

    public function getUsers(){
        $users = DB::table('users')->where('role','=','user')->get();
        return view('admin.admin_dashboard_components.users.view_users',[
            'users' => $users
        ]);
    }

    public function getAdmins(){
        $admins = DB::table('users')->where('role','=','admin')->get();
        return view('admin.admin_dashboard_components.profile',[
            'admins' => $admins
        ]);

    }

    public function editProfile(){
        $userID = session('ID');
        $user = User::findOrFail($userID);
        return view('admin.admin_dashboard_components.profile',[
            'user' => $user
        ]);
    }

    public function deleteUser($id){
        $user = User::findOrFail($id);
        $user->delete();
        redirect(route('admin.admin_dashboard_components.users.view_users'));
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
        return redirect()->route('admin.admin_dashboard_components.profile');

    }

    public function viewIndex(){
        $properties = DB::table('properties')
        ->select('properties.*')
        ->take(3)
        ->get();
    
        $testimonials = DB::table('testimonial')
        ->select('testimonial.*')
        ->get();

        return view('FrontEnd.index',[
            'properties' => $properties,
            'testimonials' => $testimonials
        ]);
    }

    public function viewListings(){
        $properties = DB::table('properties')->select('properties.*')->get();

        return view('FrontEnd.propertyListing',[
            'properties' => $properties
        ]);
    }

    public function viewFilteredListings(Request $request){
        $query = Property::query(); 
        
        if (isset($request->bathroom)) {
            $query->where('bathroom', $request->bathroom);
        }
        
        if (isset($request->bedroom)) {
            $query->where('bedroom', $request->bedroom);
        }
        
        if (isset($request->purpose)) {
            $query->where('purpose', $request->purpose);
        }
        
        if (isset($request->area)) {
            $query->where('area', 'like', '%' . $request->area . '%');
        }
        
        if (isset($request->city)) {
            $query->where('city', 'like', '%' . $request->city . '%');
        }
        
        $properties = $query->get();
        return view('FrontEnd.propertyListing',[
            'properties' => $properties
        ]);
    }
        
    public function searchProperty(Request $request)
    {
        $searchQuery = $request->input('searchQuery');
        
        $properties = Property::query()
            ->where('title', 'like', '%' . $searchQuery . '%')
            ->orWhere('description', 'like', '%' . $searchQuery . '%')
            ->orWhere('bathroom', 'like', '%' . $searchQuery . '%')
            ->orWhere('bedroom', 'like', '%' . $searchQuery . '%')
            ->orWhere('type', 'like', '%' . $searchQuery . '%')
            ->orWhere('purpose', 'like', '%' . $searchQuery . '%')
            ->orWhere('area', 'like', '%' . $searchQuery . '%')
            ->orWhere('city', 'like', '%' . $searchQuery . '%')
            ->orWhere('id', 'like', '%' . $searchQuery . '%')
            ->get();
        
        return view('FrontEnd.propertyListing',[
            'properties' => $properties
        ]);
    }

    public function customSearch(Request $request)
    {
        $city = $request->input('city');
        $area = $request->input('area');
        $purpose = $request->input('purpose');
        
        $query = Property::query();

        if ($city) {
            $query->where('city', 'like', '%' . $city . '%');
        }

        if ($area) {
            $query->where('area', 'like', '%' . $area . '%');
        }

        if ($purpose) {
            $query->where('purpose', $purpose);
        }

        $properties = $query->get();
        return view('FrontEnd.propertyListing',[
            'properties' => $properties
        ]);
    }

    public function viewAboutUs(){
        return view('FrontEnd.aboutUs');
    }

}

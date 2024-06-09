<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $properties = Property::orderBy('created_at', 'DESC')->get();
        $users = User::orderBy('created_at', 'DESC')->where('role','=','user')->get();
        $agents = User::orderBy('created_at', 'DESC')->where('role','=','agents')->get();

        return view('admin.adminDashboard',[
            'properties' => $properties,
            'users' => $users,
            'agents' => $agents,

        ]);
    }

    public function viewTestimonials(){
        $testimonials = DB::table('testimonial')->select('testimonial.*')->get();;
        foreach ($testimonials as $testimonial) {
            session(['testimonial'.$testimonial->id => $testimonial->id]);
        }
    
        return view('admin.admin_dashboard_components.testimonials',[
            'testimonials' => $testimonials
        ]);
    }



    public function setTestimonial(Request $request)
    {
        $testimonial1 = Testimonial::find(session('testimonial1'));
        $testimonial2 = Testimonial::find(session('testimonial2'));
        $testimonial3 = Testimonial::find(session('testimonial3'));
    
        $testimonial1->title = $request->title1;
        $testimonial1->description = $request->description1;
    
        $testimonial2->title = $request->title2;
        $testimonial2->description = $request->description2;
    
        $testimonial3->title = $request->title3;
        $testimonial3->description = $request->description3;
    
        if ($request->hasFile('image1')) {
            File::delete(public_path('uploads/'.$testimonial1->image));
    
            $image = $request->file('image1');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/'), $imageName);
            $testimonial1->image = $imageName;
        }

        if ($request->hasFile('image2')) {
            File::delete(public_path('uploads/'.$testimonial2->image));
    
            $image = $request->file('image2');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/'), $imageName);
            $testimonial2->image = $imageName;
        }

        if ($request->hasFile('image3')) {
            File::delete(public_path('uploads/'.$testimonial3->image));
    
            $image = $request->file('image3');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . "." . $ext;
            $image->move(public_path('uploads/'), $imageName);
            $testimonial3->image = $imageName;
        }

        $testimonial1->save();
        $testimonial2->save();
        $testimonial3->save();
    
        return redirect()->route('admin.testimonials');
    }
        }

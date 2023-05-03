<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Slider;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function setting()
    {
        $user = auth()->user();
        $data = User::find($user->id);
        return view('admin.setting', compact('data'));
    }

    public function upload_image(Request $request)
    {
        $request->validate(
            [
                'image'     => 'required|min:500|max:1000'
            ]
            );
        
        $user = auth()->user();
        $data = User::find($user->id);

        if(!empty($data->image)){
            $img = public_path('backend/user/'.$data->image);
            if(file_exists($img)){
                unlink($img);
            }
        }
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalName();
        $image->move(public_path('backend/user'), $imagename); 
        $data->image = $imagename;
        $data->save();

        return redirect()->back()->with('msg', 'Photo uploaded successfully');

    }

    public function slider()
    {
        $slider = Slider::orderBy('id', 'desc')->get();
        return view('admin.slider.index', compact('slider'));
    }

    public function update_slider(Request $request)
    {
        $request->validate(
            [
                'image'     => 'required|max:1000'
            ]
            );
        
        $data = new Slider;
        $image = $request->image;
        $imagename = time().'.'.$image->getClientOriginalName();
        $image->move(public_path('backend/slider'), $imagename); 
        $data->image = $imagename;
        $data->save();
        return redirect()->back()->with('msg', 'Slider uploaded successfully');
    }

    public function delete_slider(Request $request)
    {
        $slider = Slider::find($request->id);

        $img = public_path('backend/slider/'.$slider->image);
        if(file_exists($img)){
            unlink($img);
        }
        $slider->delete();
        return redirect()->back()->with('msg', 'Slider deleted successfully');
    }


    
}

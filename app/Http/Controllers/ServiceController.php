<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use DB;

class ServiceController extends Controller
{
    public function index(){

        $services = DB::table('service')->latest()->paginate(5);

        return view('service.index',compact('services'));
    }

    public function Create(){
        return view('service.create');
    }

    public function Store(Request $request){
        $data = array();
        $data['service_title'] = $request->service_title;
        $data['service_description'] = $request->service_description;
        $image = $request->file('service_picture');

        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['service_picture'] = $image_url;
            $services = DB::table('service')->insert($data);
            
            return redirect()->route('service.index')
                                ->with('success','Service created successfully');


        }
    }

    public function Edit($id){

        $services = DB::table('service')->where('id',$id)->first();
        return view('service.edit',compact('services'));

    }

    public function Update(Request $request, $id){

        $old_image = $request->old_image;

        $data = array();
        $data['service_title'] = $request->service_title;
        $data['service_description'] = $request->service_description;
        $image = $request->file('service_picture');

        if ($image) {
            unlink($old_image);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext;
            $upload_path = 'public/media/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['service_picture'] = $image_url;
            $services = DB::table('service')->where('id',$id)->update($data);
            
            return redirect()->route('service.index')
                                ->with('success','Service updated successfully');


        }

    }

    public function Delete($id){

        $data = DB::table('service')->where('id',$id)->first();
        $image = $data->service_picture;
        unlink($image);
        $services = DB::table('service')->where('id',$id)->delete();
        return redirect()->route('service.index')
                                ->with('success','Service deleted successfully');

    }

    public function Show($id){

        $data = DB::table('service')->where('id',$id)->first();
        return view('service.show',compact('data'));

    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    public function index(){

        $product = DB::table('products')->latest()->paginate(3);

        return view('product.index',compact('product'));
    }

    public function create(){
       return view('product.create'); 
    }

    public function store(Request $request){

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');
        if ($image) {
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fname = $image_name.'.'.$ext;
            $upload_path = 'media/';
            $image_url = $upload_path.$image_fname;
            $success = $image->move($upload_path,$image_fname);

            $data['logo'] = $image_url;
            $product = DB::table('products')->insert($data);
            return redirect()->route('product.index')
                            ->with('success','Produs Adaugat');
        }
    }

    public function edit($id){

        $product = DB::table('products')->where('id',$id)->first();
        return view('product.edit',compact('product'));
    }

    public function update(Request $request, $id){

        $oldlogo = $request->old_logo;

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');
        if ($image) {
            unlink($oldlogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_fname = $image_name.'.'.$ext;
            $upload_path = 'media/';
            $image_url = $upload_path.$image_fname;
            $success = $image->move($upload_path,$image_fname);

            $data['logo'] = $image_url;
            $product = DB::table('products')->where('id',$id)->update($data);
            return redirect()->route('product.index')
                            ->with('success','Produs Modificat');
        }

    }

    public function delete($id){
        $data = DB::table('products')->where('id',$id)->first();
        $image = $data->logo;
        unlink($image);
        $product = DB::table('products')->where('id',$id)->delete();
        return redirect()->route('product.index')
                        ->with('success','Produs Sters');
    }


    public function show($id){
        $data = DB::table('products')->where('id',$id)->first();
        return view('product.show',compact('data'));
    }
}

<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Validator;
use App\Models\AjaxImage;


class AjaxImageUploadController extends Controller
{
    /**
     * Show the application ajaxImageUpload.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxImageUpload()
    {
        return view('ajaxImageUpload');
    }


    /**
     * Show the application ajaxImageUploadPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function ajaxImageUploadPost(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'age' => 'required',
        'address' => 'required',


        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      ]);


      if ($validator->passes()) {


        $input = $request->all();
        $input['image'] = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $input['image']);


        AjaxImage::create($input);


        return response()->json(['success'=>'done']);
      }


      return response()->json(['error'=>$validator->errors()->all()]);
    }

 public function show()
    {
        $data = AjaxImage::all();
        //return view('list',['member'=>$data]);
         return view('list', compact('data'));
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Pic;
use Illuminate\Support\Facades\Session;
class AdminMediaController extends Controller
{
    //
	public function index()
	{
		$photos =Pic::all();
		return view('admin.media.index',compact('photos'));
	}
	
	public function create()
	{
		return view('admin.media.create');
	}
	
	public function store(Request $request)
	{
		$file=$request->file('file');
		$name=time(). $file->getClientOriginalName();
		$file->move('images',$name);
		Pic::create(['file'=>$name]);
	}
	
	public function destroy($id)
	{
		$photo=Pic::findOrFail($id);
		$photo->delete();
		Session::flash('deleted_media','The media has been deleted');
		return redirect('/admin/media');
	}
	
	public function deleteMedia(Request $request)
	{
		$photos=Pic::findOrFail($request->checkBoxArray);
		foreach($photos as $photo)
		{
			$photo->delete();
		}
		return redirect()->back();
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use App\mapPopup;

class MapPopupController extends Controller
{

    
    public function __construct(){

$this->middleware('auth');

}


 public function addURI(){

    $categories = Category::all();
     return view('addURI', compact('categories'));
 }
  
public function store(Request $request){



    $this->validate(request(), [

        'projectTitle' => 'required',
        'category' => 'required',
        'image' => 'max:3024',
        'body' => 'required',
        'address' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
        'image' => 'max:1024'


    ]);

  $Popup = new mapPopup;

      

    $Popup->name = request('projectTitle');
        $Popup->description = request('projectDescription');
        $Popup->body = request('body');
        $Popup->category_id = request('category');
        $Popup->user_id = auth()->id();
        $Popup->latitude = request('latitude');
        $Popup->longitude = request('longitude');
        $Popup->address = request('address');



                if($imagefile = request()->file('image')){
       
       $imagepath = $imagefile->storeAs(request('projectTitle') . time(), "popup.jpg");
       $Popup->image = $imagepath;
       }


        $Popup->save();
        return redirect('/home?sort=created_at&direction=desc');
}


public function edit($id){
    $categories = Category::all();
    $popup = mapPopup::find($id);

    return view('editURI', compact('categories', 'popup'));
}


public function update($id){

     $this->validate(request(), [

'projectTitle' => 'required',
'category' => 'required',
'image' => 'max:3024',
'body' => 'required',
'address' => 'required',
'latitude' => 'required',
'longitude' => 'required',
'image' => 'max:1024'


]);


    $Popup = mapPopup::find($id);

      if($file = request()->file('image')){
        $ext = $file->guessClientExtension();
        $path = $file->storeAs(request('projectTitle') . time(), "updatepopup.jpg");
        $Popup->image = $path;
       }


        $Popup->name = request('projectTitle');
        $Popup->description = request('projectDescription');
        $Popup->body = request('body');
        $Popup->category_id = request('category');
        $Popup->user_id = auth()->id();
        $Popup->latitude = request('latitude');
        $Popup->longitude = request('longitude');
        $Popup->address = request('address');

        $Popup->update();

        return redirect('/home?sort=created_at&direction=desc');
       

}


    public function destroy(Request $request){

$popup = mapPopup::find($request->popup_id);
$popup->delete();

return redirect('home');

}


    public function deleteMultiple(Request $request){
        $ids = $request->ids;
        MapPopup::whereIn('id',explode(",",$ids))->delete();
        return response()->json(['status'=>true,'message'=>"Category deleted successfully."]);
        
    }



}

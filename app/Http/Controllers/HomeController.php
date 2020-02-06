<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\mapPopup;
use Hash;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $details = mapPopup::sortable()->paginate(10);

        $count = mapPopup::count();
        return view('home', compact('details', 'count'));
    }


    public function search(Request $request){
        $q = Input::get ( 'q' );
    if($q != ""){
    $popup = mapPopup::where ( 'name', 'LIKE', '%' . $q . '%' )->orWhere ( 'description', 'LIKE', '%' . $q . '%' )->orWhere ( 'address', 'LIKE', '%' . $q . '%' )->orWhere ( 'body', 'LIKE', '%' . $q . '%' )->paginate (5)->setPath ( '' );
    $pagination = $popup->appends ( array (
                'q' => Input::get ( 'q' ) 
        ) );
    $count = count($popup);
    if (count ( $popup ) > 0)
        return view ('home')->withDetails( $popup )->withQuery( $q );
    }
        return view ('home')->withMessage('No Details found. Try to search again !' );

       
    }

    public function showUserProfile(){
        return view('auth.userprofile');
    }
    public function showChangeEmailForm(){
        return view('auth.changeemail');
    }

      public function showChangePasswordForm(){
        return view('auth.changepassword');
    }
    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
        return redirect()->back()->with("success","Password changed successfully !");
    }

    public function changeEmail(Request $request){
        if($request->get('current-email') != Auth::user()->email){
               // The passwords matches
               return redirect()->back()->with("error","Your current email does not matches with the email you provided. Please try again.");
        }

          if(strcmp($request->get('current-email'), $request->get('new-email')) == 0){
            return redirect()->back()->with("error","New Email cannot be same as your current Email. Please choose a different password.");

          }

           $validatedData = $request->validate([
            'current-email' => 'required',
            'new-email' => 'required|unique:users,email',
        ]);


          $user = Auth::user();
        $user->email = $request->get('new-email');
        $user->save();
        return redirect()->back()->with("success","Email changed successfully !");


    }

    public function changeName(Request $request){
        $validatedData = $request->validate([
            'username' => 'required',
          
        ]);


        $user = Auth::user();
        $user->name = request('username');
        $user->update();
        return redirect('/userprofile');


    }

    public function documentations(){
        return view('documentations');
    }


/*     public function search(){
        {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
       $data = mapPopup::table('tbl_customer')
         ->where('CustomerName', 'like', '%'.$query.'%')
         ->orWhere('Address', 'like', '%'.$query.'%')
         ->orWhere('City', 'like', '%'.$query.'%')
         ->orWhere('PostalCode', 'like', '%'.$query.'%')
         ->orWhere('Country', 'like', '%'.$query.'%')
         ->orderBy('CustomerID', 'desc')
         ->get();
         
      }
      else
      {
       $data = DB::table('tbl_customer')
         ->orderBy('CustomerID', 'desc')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->CustomerName.'</td>
         <td>'.$row->Address.'</td>
         <td>'.$row->City.'</td>
         <td>'.$row->PostalCode.'</td>
         <td>'.$row->Country.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
 
    } 
 */
 }

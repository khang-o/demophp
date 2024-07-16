<?php


namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\GuiEMail;
class HomeController extends Controller
{
      public function home(){
         $dssp = Product::limit(8)->get();
        return view('page.home', compact('dssp'));
         
      }
    

      public function login(){
         return view('user.login');
      }
      public function register(){
         return view('user.register');
      }
      public function postregister(Request $req){
         $email = $req->input('email');
         $password = $req->input('password');
         $repassword = $req->input('repassword');
         $username = $req->input('username');

         if($password!=$repassword){
            session()->put('message','Mật khẩu không trùng khớp');
            return back();
         }
         $user = User::where('email',$email)->first();
         if(isset($user)){
            session()->put('message','Email đã tồn tại');
            return back();
         }
         $user = new User();
         $user->username = $username;
         $user->email = $email;
         $user->password = $password;
         $user->save();
         return redirect()->route('login');
      }


      public function postlogin(Request $req){
        
         $email = $req->input('email');
         $password = $req->input('password');
         $remember = $req->input('remember');
      
         $user = User::where('email', $email)->first();
         if(isset($user)){
           $canlogin = Hash::check($password, $user->password);
         }
         if($canlogin ?? false){
            Auth::login($user); 
            
            if ($user->role == 'admin') {
                return redirect()->route('dashboard'); 
            } else {
                return redirect()->route('home'); 
            }
        }else{
            session()->put('message', 'Email hoặc mật khẩu không trùng khớp');
            return back();
        }
        
    
        
        
       
      }
      public function changePassword()
      {
          return view('user.changePassword');
      }
  
           
      public function postchangePassword(Request $request)
      {
        
          $user = User::find(Auth::user()->id);
          $user->password = $request->new_password;
          $user->save();
          return back()->with('message', 'Đổi mật khẩu thành công');
      }
     
    
      public function getPassword(){
        return view('user.forgot-password');
    }

    public function handleGetPassword(Request $rqt){
        // xu ly o day
        $validator = Validator::make($rqt->all(),[
            'email' => 'email|exists:users,email',
        ],[
            'email.email' => 'Email không hợp lệ',
            'email.exists' => 'Email không tồn tại',
        ]);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($rqt->input());
        };
        
        
        $token = strtoupper(Str::random(10));
            
        $user = User::where('email', $rqt->email)->first();
        // dd($token);
        
        $user->update(["token" => $token]);
        // dd($user);
        Mail::to($user->email)->send(new GuiEmail($token));

        return  view ("user.reset-password");
        
    }
    public function handleUpdateNewPassword(Request $rqt){
        // dd($rqt);
        $validator = Validator::make($rqt->all(), [
            'token' =>'exists:users,token',
            'psw' => 'confirmed',
        ],[
            'token.exists' =>'Vui lòng nhập lại token',
            'psw.confirmed' => 'Mật khẩu xác nhận không khớp',
        ]);
        // dd($validator);
        if ($validator->fails()) {
            return redirect()->back()
                             ->withErrors($validator)
                             ->withInput();
        } 
        
        $user = user::where("token", "=", $rqt->token)->first();
        // dd($user);
        if(!isset($user)){
            return redirect()->route('get_password');
        }
        // @dd($rqt->psw);
        $password = Hash::make($rqt->psw);
        // dd(Hash::check("123", $password));
        $user->password = $rqt->psw;
        $user->save();
        // $user->update(["password" => $password]);
        return redirect()->route('home')->withErrors(['update' => 'Cập nhật mat khau thành công']);
    }

}


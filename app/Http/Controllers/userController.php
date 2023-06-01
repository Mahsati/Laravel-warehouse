<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userRequest;

use App\Models\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class userController extends Controller
{
    public function insert(userRequest $post){

        $con =new  User();

         
       if($post->password==$post->passagain){

        $yoxla = User::where('email', '=' , $post->email)->orwhere('tel','=',$post->tel)->count(); 

        if($yoxla==0)
        {  

        $con->name = $post->name;
        $con->soyad = $post->soyad;
        $con->tel = $post->tel;
        $con->email = $post->email;
        $con->password = Hash::make($post->password);
        $con->foto='https://st3.depositphotos.com/23594922/31822/v/1600/depositphotos_318221368-stock-illustration-missing-picture-page-for-website.jpg';
        $con->blok = 0;

        

        $con->save();

        return back()->with('mesaj1','Qeydiyyatdan uğurla keçdiniz');
        }
       return back()->with('mesaj2','Bu istifadəçi artıq mövcuddur!');
      } 
       return back()->with('mesaj2','Təkrar şifrə yanlışdır!');

    


    }

    public function login(userRequest $post){

        $this->validate($post,[
            'email'=>'email|required',
            'password'=>'required'
        ]);

        if(!Auth::attempt(['email'=>$post->email,'password'=>$post->password])){
            
            return redirect()->back()->with('mesaj2','Daxil etdiyiniz email və ya şifrə yanlışdır!');
        }

        return redirect()->route('statselect');

    }

    public function logout(){

        auth()->logout();

        return redirect()->route('login');
    }

    
}

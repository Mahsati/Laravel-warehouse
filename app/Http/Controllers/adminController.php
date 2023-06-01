<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userRequest;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



class adminController extends Controller
{


    public function insert (userRequest $post){
        
        $con= new User();

      
        
        if($post->password==$post->passagain){

        $yoxla = User::where('tel', '=' , $post->tel)->orWhere('email','=',$post->email)->count(); 

        if($yoxla==0)
        {  
            if($post->file('foto')){
           
                $file=time().'.'.$post->foto->extension();

                $post->foto->storeAs('public/uploads/fotolar/',$file);

                $con->foto = 'storage/uploads/fotolar/'.$file ;
            }

            $con->name = $post->name;
            $con->soyad = $post->soyad;
            $con->tel = $post->tel;
            $con->email = $post->email;
            $con->password = Hash::make($post->password);
            $con->blok = 0;
        

        $con->save();

        return back()->with('mesaj1','Yeni istifadəçi əlavə olundu'); 
        }
       return back()->with('mesaj2','Bu istifadəçi artıq mövcuddur!');
    } 
    return back()->with('mesaj2','Təkrar şifrə yanlışdır!');


 }

    public function select(){

        $data = User::where('id','!=',Auth::id())
        ->orderBy('id','desc')->get();
        
        return view('admin',['data'=>$data]);
    } 


    public function sil($id) 
    { 
         
       $sildata = User::find($id);  
        
        
       $data = User::where('id','!=',Auth::id())->orderBy('id','desc')->get(); 
       return view('admin',[ 
        'data'=>$data, 
        'sildata'=>$sildata]); 
    } 
 
 
     
    public function delete($id) 
    { 
         
       $sil = User::find($id)->delete();  
        
       return redirect()->route('admin')->with('mesaj1','İstifadəçi uğurla silindi.'); 
        
    } 


    public function edit($id) 
    { 
         
       $editdata = User::find($id);  
        
       $data = User::where('id','!=',Auth::id())
       ->orderBy('id','desc')->get(); 

       return view('admin',[ 
        'data'=>$data, 
        'editdata'=>$editdata]);    
    } 

    public function update(userRequest $post) 
    { 
        $con = User::find($post->id); 


        $yoxla = User::where('tel', '=' , $post->tel)->where('id','!=',$post->id)->orwhere('email','=',$post->email)->where('id','!=',$post->id)->count(); 

        if($yoxla==0)
        {  

            if($post->file('foto')){
            $post->validate([
                'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096',
            ]);

            $file=time().'.'.$post->foto->extension();

            $post->foto->storeAs('public/uploads/fotolar/',$file);

            $con->foto='storage/uploads/fotolar/'.$file; 
          }
          else{
            $con->foto = $post->cari_foto;
           }

            $con->name = $post->name;
            $con->soyad = $post->soyad;
            $con->tel = $post->tel;
            $con->email = $post->email;
            $con->blok = 0;
        

        $con->save();

        return redirect()->route('admin')->with('mesaj1','Məlumatlar uğurla yeniləndi');
        }
        return redirect()->route('admin')->with('mesaj2','Bu istifadəçi artıq mövcuddur!');      
    } 

    public function blok($id) 
    { 
        $admin = User::find($id); 
 
        $blok= $admin->blok; 
 
        $admin->blok = 1; 
 
        $admin->save(); 
 
        return redirect()->route('aselect')->with('mesaj1','İstifadəçi bloklandı.'); 
 
    } 
 
    public function noblok($id) 
    { 
        $admin = User::find($id); 
 
        $blok= $admin->blok; 
 
        $admin->blok = 0; 
 
        $admin->save(); 
         
        return redirect()->route('aselect')->with('mesaj1','İstifadəçi blokdan çıxarıldı.'); 
 
    }




   
}

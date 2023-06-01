<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userRequest;

use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class profileController extends Controller
{
   public function index(){
    return view('profile');
   }

    
    public function update(userRequest $post){
        
        $con = User::find(Auth::id());

        if(Hash::check($post->password, $con->password)){
            
           
                
                if($post->newpass==$post->passagain){
                    
                    $yoxla=User::where('id','!=',$post->id)->count();
        
                    if($yoxla==0){
                             
                          
                            $post->validate([
                            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:4096',
                        ]);
                    }
                    
                    if($post->file('foto')){
                        
                        $file = time().'.'.$post->foto->extension();
                        $post->foto->storeAs('public/uploads/fotolar/',$file);
                        $con->foto = 'storage/uploads/fotolar/'.$file;
                    }
                    else{
                        $con->foto = $con->foto;
                    }

                    if(empty($post->newpass)){
                        $con->password = Hash::make($post->password);
                    }
                    else{$con->password = Hash::make($post->newpass);}

                   
                        $con->name = $post->name;
                        $con->soyad = $post->soyad;
                        $con->tel = $post->tel;
                        $con->email = $post->email;
                    
                    
                    
                    $con->save();
                    
                    return redirect()->route('profile')->with('mesaj1','Profiliniz uğurla yeniləndi.');
                }
                return redirect()->route('profile')->with('mesaj2','Təkrar şifrə yanlışdır!');
           
        }
        return redirect()->route('profile')->with('mesaj2','Cari şifrə yanlışdır!');
    }
}

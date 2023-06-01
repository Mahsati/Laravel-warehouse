<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\staffRequest;

use App\Models\staff;

use Illuminate\Support\Facades\Auth;

class staffController extends Controller
{
    public function insert(staffRequest $post){
        
        $con = new staff();
        $yoxla = staff::where('tel', '=' , $post->tel)->orwhere('email','=',$post->email)->where('userid','=',Auth::id())->count();

        if($yoxla==0)
        { 
            if($post->file('foto'));
           
            $file=time().'.'.$post->foto->extension();

            $post->foto->storeAs('public/uploads/fotolar/',$file);

            $con->foto='storage/uploads/fotolar/'.$file; 

            $con->ad = $post->ad;
            $con->soyad = $post->soyad;
            $con->tel = $post->tel;
            $con->email = $post->email;
            $con->vezife = $post->vezife;
            $con->maas = $post->maas;
            $con->hired = $post->hired;
            $con->userid = Auth::id();
        
                
            
                $con->save();
                return redirect()->route('staff')->with('mesaj1','İşçi uğurla əlavə edildi.');
        }
        return redirect()->route('staff')->with('mesaj2','Bu işçi artıq mövcuddur!'); 
    
        
    }

    public function select(){

        $data = staff::orderBy('id','desc')->where('userid','=',Auth::id())->get();
        
        return view('staff',['data'=>$data]);
    } 


    public function sil($id) 
    { 
         
       $sildata = staff::find($id); 
        
       $data = staff::orderBy('id','desc')->get(); 
       return view('staff',[ 
        'data'=>$data, 
        'sildata'=>$sildata]); 
    } 

    public function delete($id) 
    { 
         
       $sil = staff::find($id)->delete(); 

       return redirect()->route('staff')->with('mesaj1','İşçi uğurla silindi.'); 
        
    } 

    public function edit($id) 
    { 
         
       $editdata = staff::find($id); 
        
       $data = staff::orderBy('id','desc')->where('userid','=',Auth::id())->get(); 
       return view('staff',[ 
        'data'=>$data, 
        'editdata'=>$editdata]);   
     } 

     public function update(staffRequest $post) 
    { 
        $con = staff::find($post->id);
        $yoxla = staff::where('tel', '=' , $post->tel)->orwhere('email','=',$post->email)->where('userid','=',Auth::id())->count();
 
    if($yoxla==0)
    {
        if($post->file('foto')){

            $post->validate([
                'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
        
            $file=time().'.'.$post->foto->extension();

            $post->foto->storeAs('public/uploads/fotolar/',$file);

            $con->foto='storage/uploads/fotolar/'.$file; 
        }
        else{
            $con->foto = $con->foto;
        }
        $con->ad = $post->ad;
        $con->soyad = $post->soyad;
        $con->tel = $post->tel;
        $con->email = $post->email;
        $con->vezife = $post->vezife;
        $con->maas = $post->maas;
        $con->hired = $post->hired;
        $con->userid = Auth::id();
            

            $con->save(); 

          return redirect()->route('staff')->with('mesaj1','Məlumatlar uğurla yeniləndi.'); 
    }
    return redirect()->route('staff')->with('mesaj2','Bu işçi artıq mövcuddur'); 

    } 

 
}

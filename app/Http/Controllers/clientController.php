<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\clientRequest;

use App\Models\clients;

use Illuminate\Support\Facades\Auth;



class clientController extends Controller
{
    public function insert(clientRequest $post){
        
        $con = new clients();
        $yoxla = clients::where('tel', '=' , $post->tel)->orwhere('email','=',$post->email)->where('userid','=',Auth::id())->count(); 

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
          $con->shirket = $post->shirket;
          $con->userid = Auth::id();

       
          $con->save();
          return redirect()->route('clients')->with('mesaj1','Müştəri uğurla əlavə edildi.');
        }
        return redirect()->route('clients')->with('mesaj2','Bu müştəri artıq mövcuddur!'); 

        
    }

    public function select(){

        $data = clients::orderBy('id','desc')->where('userid','=',Auth::id())->get();
        
        return view('clients',['data'=>$data]);
    } 

    
    public function sil($id) 
    { 
         
       $sildata = clients::find($id); //where('id', '=' , $id) 
        
        
       $data = clients::orderBy('id','desc')->get(); 
       return view('clients',[ 
        'data'=>$data, 
        'sildata'=>$sildata]); 
    } 
 
 
     
    public function delete($id) 
    { 
         
       $sil = clients::find($id)->delete(); //where('id', '=' , $id) 
        
       return redirect()->route('clients')->with('mesaj1','Müştəri uğurla silindi.'); 
        
    } 

    public function edit($id) 
    { 
         
       $editdata = clients::find($id); //where('id', '=' , $id) 
        
       $data = clients::orderBy('id','desc')->where('userid','=',Auth::id())->get(); 
       return view('clients',[ 
        'data'=>$data, 
        'editdata'=>$editdata]);    } 
 
    public function update(clientRequest $post) 
    { 

        $con = clients::find($post->id);
        $yoxla = clients::where('tel', '=' , $post->tel)->orwhere('email','=',$post->email)->where('userid','=',Auth::id())->count(); 
 
    if($yoxla==0){
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
        $con->shirket = $post->shirket; 
        $con->userid = Auth::id();


 
        $con->save(); 
        return redirect()->route('clients')->with('mesaj1','Məlumatlar uğurla yeniləndi.'); 
    }
    return redirect()->route('clients')->with('mesaj2','Bu müştəri artıq mövcuddur'); 

    } 

}

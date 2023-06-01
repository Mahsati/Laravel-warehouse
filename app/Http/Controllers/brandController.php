<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\brandRequest;

use App\Models\brands;

use Illuminate\Support\Facades\Auth;



class brandController extends Controller
{    
   



    public function insert(brandRequest $post){
        
        $con = new brands();
        $yoxla = brands::where('brend', '=' , $post->brend)->where('userid','=',Auth::id())->count(); 

        if($yoxla==0)
        {  
            if($post->file('foto'));
           
            $file=time().'.'.$post->foto->extension();

            $post->foto->storeAs('public/uploads/fotolar/',$file);

            $con->foto='storage/uploads/fotolar/'.$file; 

            $con->brend = $post->brend;
            $con->userid = Auth::id();
                
            
                $con->save();
                return redirect()->route('brands')->with('mesaj1','Brend uğurla əlavə edildi.');
        }
        return redirect()->route('brands')->with('mesaj2','Bu brend artıq mövcuddur!'); 

        
    }

    public function select(){

        $data = brands::orderBy('id','desc')->where('userid','=',Auth::id())->get();
        
        return view('brands',['data'=>$data]);
    } 

    public function sil($id) 
    { 
         
       $sildata = brands::find($id); //where('id', '=' , $id) 
        
        
       $data = brands::orderBy('id','desc')->get(); 
       return view('brands',[ 
        'data'=>$data, 
        'sildata'=>$sildata]); 
    } 
 
 
     
    public function delete($id) 
    { 
         
       $sil = brands::find($id)->delete(); //where('id', '=' , $id) 
        
       return redirect()->route('brands')->with('mesaj1','Brend uğurla silindi.'); 
        
    } 

    public function edit($id) 
    { 
         
       $editdata = brands::find($id); //where('id', '=' , $id) 
        
       $data = brands::orderBy('id','desc')->where('userid','=',Auth::id())->get(); 
       return view('brands',[ 
        'data'=>$data, 
        'editdata'=>$editdata]);    
    } 
 
    public function update(brandRequest $post) 
    { 
        $con = brands::find($post->id);
        $yoxla = brands::where('brend', '=' , $post->brend)->where('userid','=',Auth::id())->count(); 
 
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
            $con->foto = $post->cari_foto;
        }

            $con->brend = $post->brend; 
            $con->userid = Auth::id();


        $con->save(); 
        return redirect()->route('brands')->with('mesaj1','Məlumatlar uğurla yeniləndi.'); 
    }
    return redirect()->route('brands')->with('mesaj2','Bu brend artıq mövcuddur'); 

    } 

    
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\productRequest;

use App\Models\products;
use App\Models\brands;

use Illuminate\Support\Facades\Auth;




class productController extends Controller
{
   
    public function insert(productRequest $post){
        
        $con = new products();

            if($post->file('foto'));
           
            $file=time().'.'.$post->foto->extension();

            $post->foto->storeAs('public/uploads/fotolar/',$file);

            $con->foto='storage/uploads/fotolar/'.$file; 

            $con->mehsul = $post->mehsul;
            $con->brand_id = $post->brand_id;
            $con->al = $post->al;
            $con->sat = $post->sat;
            $con->stok = $post->stok;
            $con->userid = Auth::id();
                
            
                $con->save();
                return redirect()->route('products')->with('mesaj1','Məhsul uğurla əlavə edildi.');
        
        
    }

    public function select(){

        $data = brands::join('products','products.brand_id','=','brands.id')
        ->where('products.userid','=',Auth::id())
        ->orderBy('products.id','desc')->get();

        $bdata = brands::where('brands.userid','=',Auth::id())->get();
        
        return view('products',[
            'data'=>$data,
            'bdata'=>$bdata
        ]);
    } 

    public function sil($id) 
    { 
         
       $sildata = products::find($id); //where('id', '=' , $id) 
        
       $bdata=brands::get();
       
       $data = products::orderBy('id','desc')->get(); 
       return view('products',[ 
        'data'=>$data,
        'bdata'=>$bdata,
        'sildata'=>$sildata]); 
    } 
 
 
     
    public function delete($id) 
    { 
         
       $sil = products::find($id)->delete(); //where('id', '=' , $id) 
        
       return redirect()->route('products')->with('mesaj1','Məhsul uğurla silindi.'); 
        
    } 

    public function edit($id) 
    { 
         
        /*$editdata = brands::join('products','products.brand_id','=','brands.id')
        ->select('*','brands.id as brand_id')->find($id); 
 
       $data = products::orderBy('id','desc')->get(); 
       return view('products',[ 
        'bdata'=>brands::latest()->get(),
        'data'=>$data, 
        'editdata'=>$editdata,
        ]);*/
      //dd(brands::join('products','products.brand_id','=','brands.id')->select('*','brands.id as brand_id')->find($id));
      //dd(products::join('brands','brands.id','=','products.brand_id')->select('*','brands.id as brand_id')->find($id));
            
       /* return view('products',[ 
            'data'=>products::orderBy('id','desc')->where('products.userid','=', Auth::id())->get(),
            'bdata'=>brands::latest()->where('brands.userid','=', Auth::id())->get(),
            'editdata'=>products::join('brands','brands.id','=','products.brand_id')->find($id),
        ]); */

        {
        
            $editdata = products::find($id); 
            
            $data = products::join('brands','brands.id','=','products.brand_id')
             ->select('products.mehsul','brands.brend','products.al','products.sat','products.stok','products.foto','products.brand_id','products.created_at','products.id')
             ->where('products.userid','=',Auth::id())
             ->orderBy('products.id','desc')
             ->get();
     
             $bdata = brands::get();
     
     
             return view('products',[
                 'data'=>$data,
                 'editdata'=>$editdata,
                 'bdata'=>$bdata
     
     
             ]);
         }
       
    } 
 
    public function update(productRequest $post) 
    { 
        $con = products::find($post->id); 
       
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

 
            $con->mehsul = $post->mehsul;
            $con->brand_id = $post->brand_id;
            $con->al = $post->al;
            $con->sat = $post->sat;
            $con->stok = $post->stok;
            $con->userid = Auth::id();

        $con->save(); 
        return redirect()->route('products')->with('mesaj1','Məlumatlar uğurla yeniləndi.'); 
    }
     
}

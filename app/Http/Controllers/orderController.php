<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\orderRequest;


use App\Models\products;
use App\Models\brands;
use App\Models\clients;
use App\Models\orders;

use Illuminate\Support\Facades\Auth;





class orderController extends Controller
{
    public function insert(orderRequest $post){
        
        $con = new orders();

             $con->client_id = $post->client_id;
             $con->product_id = $post->product_id;
             $con->miqdar = $post->miqdar;
             $con->tesdiq = 0;
             $con->userid = Auth::id();

                
            
                $con->save();
                return redirect()->route('orders')->with('mesaj1','Sifariş uğurla əlavə edildi.');
        
        
    }

    
    public function select(){
    
        /*return view('orders',[
            'product_list'=>brands::join('products','products.brand_id','=','brands.id')->get(),
        ]);*/

       $data = orders::join('clients','clients.id','=','orders.client_id')
       ->join('products','products.id','=','orders.product_id')
       ->join('brands','brands.id','=','products.brand_id')
       ->select('brands.brend','clients.ad','clients.soyad','products.stok','products.mehsul','products.al','products.sat','orders.created_at','orders.id','orders.miqdar','orders.tesdiq')
       ->where('orders.userid','=',Auth::id())
       ->orderBy('orders.id','desc')
       ->get();

       $bdata = brands::where('brands.userid','=',Auth::id())->get();
       $cdata = clients::where('clients.userid','=',Auth::id())->get();
       

       $pdata = products::join('brands','brands.id','=','products.brand_id')
       ->select('brands.brend','products.id','products.stok','products.mehsul','products.al','products.sat')
       ->where('products.userid','=',Auth::id())
       ->orderBy('products.id','desc')
       ->get();

       $stat = products::join('brands','brands.id','=','products.brand_id')
       ->select('products.stok','products.mehsul','products.al','products.sat')
       ->where('products.userid','=',Auth::id())
       ->orderBy('products.id','desc')
       ->get();

       

       $tqazanc = 0;
       $talis = 0;
       $tsatis = 0;


       foreach($stat as $info){
        $alis = $info->al;
        $satis = $info->sat;
        $stok =  $info->stok;

        $tqazanc= $tqazanc + (($satis-$alis) * $stok);
        $talis = $talis +($info->al);
        $tsatis = $tsatis +($info->sat);

       }

       return view('orders',[
        'data'=>$data,
        'bdata'=>$bdata,
        'cdata'=>$cdata,
        'pdata'=>$pdata,
        'tqazanc'=>$tqazanc,
        'talis'=>$talis,
        'tsatis'=>$tsatis
       ]);

}

   public function sil($id) 
    { 
         
       $sildata = orders::find($id); 
        
    
       $data = orders::join('clients','clients.id','=','orders.client_id')
       ->join('products','products.id','=','orders.product_id')
       ->join('brands','brands.id','=','products.brand_id')
       ->select('brands.brend','clients.ad','clients.soyad','products.stok','products.mehsul','products.al','products.sat','orders.created_at','orders.id','orders.miqdar','orders.tesdiq')
       ->where('orders.userid','=',Auth::id())
       ->orderBy('orders.id','desc')
       ->get();

       $bdata=brands::get();
       $cdata =clients::get();
       $pdata =products::get();

       $stat = products::join('brands','brands.id','=','products.brand_id')
       ->select('products.stok','products.mehsul','products.al','products.sat')
       ->where('products.userid','=',Auth::id())
       ->orderBy('products.id','desc')
       ->get();

       

       $tqazanc = 0;
       $talis = 0;
       $tsatis = 0;


       foreach($stat as $info){
        $alis = $info->al;
        $satis = $info->sat;
        $stok =  $info->stok;

        $tqazanc= $tqazanc + (($satis-$alis) * $stok);
        $talis = $talis +($info->al);
        $tsatis = $tsatis +($info->sat);

       }

       return view('orders',[
        'data'=>$data,
        'bdata'=>$bdata,
        'cdata'=>$cdata,
        'pdata'=>$pdata,
        'tqazanc'=>$tqazanc,
        'talis'=>$talis,
        'tsatis'=>$tsatis,
        'sildata'=>$sildata
       ]);

      
    } 
 
 
     
    public function delete($id) 
    { 
         
       $sil = orders::find($id)->delete(); //where('id', '=' , $id) 
        
       return redirect()->route('orders')->with('mesaj1','Sifariş uğurla silindi.'); 
        
    } 
    
    public function edit($id) 
    {  
        $editdata = orders::find($id); 

        
       $data = orders::join('clients','clients.id','=','orders.client_id')
       ->join('products','products.id','=','orders.product_id')
       ->join('brands','brands.id','=','products.brand_id')
       ->select('brands.brend','clients.ad','clients.soyad','products.stok','products.mehsul','products.al','products.sat','orders.created_at','orders.id','orders.miqdar','orders.tesdiq')
       ->where('orders.userid','=',Auth::id())
       ->orderBy('orders.id','desc')
       ->get();

       $bdata=brands::where('brands.userid','=',Auth::id())->get();
       $cdata =clients::where('clients.userid','=',Auth::id())->get();

       $pdata =products::join('brands','brands.id','=','products.brand_id',)
       ->select('brands.brend','products.id','products.stok','products.mehsul','products.al','products.sat')
       ->where('products.userid','=',Auth::id())
       ->orderBy('products.id','desc')
       ->get();

       $stat = products::join('brands','brands.id','=','products.brand_id')
       ->select('products.stok','products.mehsul','products.al','products.sat')
       ->where('products.userid','=',Auth::id())
       ->orderBy('products.id','desc')
       ->get();

       
       $tqazanc = 0;
       $talis = 0;
       $tsatis = 0;


       foreach($stat as $info){
        $alis = $info->al;
        $satis = $info->sat;
        $stok =  $info->stok;

        $tqazanc= $tqazanc + (($satis-$alis) * $stok);
        $talis = $talis +($info->al);
        $tsatis = $tsatis +($info->sat);

       }

       return view('orders',[
        'data'=>$data,
        'bdata'=>$bdata,
        'cdata'=>$cdata,
        'pdata'=>$pdata,
        'tqazanc'=>$tqazanc,
        'talis'=>$talis,
        'tsatis'=>$tsatis,
        'editdata'=>$editdata
       ]);
    } 
 
    public function update(orderRequest $post) 
    { 
        $con = orders::find($post->id); 
       
           $con->client_id = $post->client_id;
           $con->product_id = $post->product_id;
           $con->miqdar = $post->miqdar;
           $con->userid = Auth::id();

        $con->save(); 
        return redirect()->route('orders')->with('mesaj1','Məlumatlar uğurla yeniləndi.'); 
    }


    public function tesdiq($id){

        $orders = orders::find($id);
        
        $omiq = $orders->miqdar;
    
        $products = products::find($orders->product_id);
    
        $pmiq = $products->stok;
    
            if($omiq < $pmiq)
            {
                $miq=$pmiq-$omiq;
    
                $products->stok=$miq;
    
                $products->save();
    
                $orders->tesdiq=1;
    
                $orders->save();
    
                return back()->with('mesaj1','Sifarişiniz uğurla təsdiqləndi.');
            }
               
            return back()->with('mesaj2','Sifarişinizi təsdiq üçün kifayət qədər məhsul yoxdur!');
            
    }
    
    
        public function legv($id){
            
            $orders = orders::find($id);
        
            $omiq = $orders->miqdar;
        
            $products = products::find($orders->product_id);
        
            $pmiq = $products->stok;
    
              $miq=$pmiq+$omiq;
        
                  $products->stok = $miq;
        
                    $products->save();
        
                    $orders->tesdiq=0;
        
                    $orders->save();
        
                    return back()->with('mesaj2','Sifarişiniz ləğv olundu.');
                
          
     
        }

    
}

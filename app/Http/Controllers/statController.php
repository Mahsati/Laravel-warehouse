<?php

namespace App\Http\Controllers;

use Illuminate\Http\orderRequest;


use App\Models\products;
use App\Models\brands;
use App\Models\clients;
use App\Models\orders;

use Illuminate\Support\Facades\Auth;


class statController extends Controller
{

       public function select(){
    
       
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

       return view('stat',[
        'data'=>$data,
        'bdata'=>$bdata,
        'cdata'=>$cdata,
        'pdata'=>$pdata,
        'tqazanc'=>$tqazanc,
        'talis'=>$talis,
        'tsatis'=>$tsatis
       ]);

}
    
}

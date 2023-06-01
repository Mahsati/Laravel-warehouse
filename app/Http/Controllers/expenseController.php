<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\expenseRequest;

use App\Models\expenses;

use Illuminate\Support\Facades\Auth;



class expenseController extends Controller
{
    public function insert(expenseRequest $post){
        
        $con = new expenses();
  
            
            $con->teyinat = $post->teyinat;
            $con->mebleg = $post->mebleg;
            $con->userid = Auth::id();

                
            
                $con->save();
                return redirect()->route('expenses')->with('mesaj1','Xərc uğurla əlavə edildi.');
    }   

    public function select(){

        $data = expenses::orderBy('id','desc')->where('userid','=',Auth::id())->get();
        
        return view('expenses',['data'=>$data]);
    } 

    
    public function sil($id) 
    { 
         
       $sildata = expenses::find($id);  
        
        
       $data = expenses::orderBy('id','desc')->get(); 
       return view('expenses',[ 
        'data'=>$data, 
        'sildata'=>$sildata]); 
    } 

      
    public function delete($id) 
    { 
         
       $sil = expenses::find($id)->delete(); 
        
       return redirect()->route('expenses')->with('mesaj1','Xərc uğurla silindi.'); 
        
    } 

    public function edit($id) 
    { 
         
       $editdata = expenses::find($id); 
        
       $data = expenses::orderBy('id','desc')->where('userid','=',Auth::id())->get();

       return view('expenses',[ 
        'data' => $data, 
        'editdata' => $editdata]);    
    } 
 
    public function update(expenseRequest $post) 
    { 
       $con = expenses::find($post->id); 

        
       $con->teyinat = $post->teyinat; 
       $con->mebleg = $post->mebleg; 
       $con->userid = Auth::id();

       $con->save();

        return back()->with('mesaj1','Məlumatlar uğurla yeniləndi.'); 
    } 

    
}

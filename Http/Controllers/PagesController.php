<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\User;
use App\Models\Categories;

class PagesController extends Controller
{



    public function index()
    {
        
        $categories=Categories::all();
        return view('index', ['categories'=>$categories])
        ->with('categories',Categories::where('parent_id', 1)->with(['children'])->get())
        ->with('ads', Ads::where('status','=','to_publish')->orderBy('updated_at', 'desc')->paginate(12));
        
        
    }

    public function search()
    {
      
$allCat = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50);
        $category=request()->query('categories');
        $cp=request()->query('cp');
       
        if($category =="0" && $cp =="")   {       
            $order = request()->query('order');
            $sort = request()->query('sort');
            if($order ==""){$order='price';}
            if ($sort ==""){$sort='asc';}
           // return view('Search')->with('ads', $ads);
            $search = request('search');
                     
            $ads=Ads::where('title', 'like', "%{$search}%")
            ->orWhere('description', 'like', "%{$search}%")
            ->orWhere('city', 'like', "%{$search}%")
            ->orWhere('zipcode', 'like', "%{$search}%")
            ->orderBy($order, $sort)
            ->get();

            
        return view('Search')->with('ads', $ads)->with('categories',Categories::where('parent_id', 1)->with(['children'])->get());
        }
        else {
            $order = request()->query('order'); 
            $sort = request()->query('sort') ;          
            if($order ==""){$order='price';}
            if ($sort ==""){$sort='asc';}
            if($cp ==""){$cp='';}else{$cp = request()->query('cp');}
            if($category ==0){$category=$allCat;}else
            {
                
                $category = array(request()->query('categories'));
             
               }
            
            
           $search = request('search');
           
            $ads=Ads::where('title', 'like', "%{$search}%")
            ->wherein('category_id', $category)
            ->where('zipcode', 'like', "%{$cp}%" )
            ->orderBy($order, $sort)
           
            ->get()->paginate(15);
        
        
            
        return view('Search')->with('ads', $ads)
        ->with('categories',Categories::where('parent_id', 1)->with(['children'])->get()) ;   

        }


    }
    
        
}

<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ads;
use Intervention\Image\Facades\Image;
use App\Models\Categories;
use App\Models\User;
use App\Models\Villes;
use App\Rules\PostalCode;
use App\Rules\City;

use Auth;

class AdsController extends Controller
{

    public function __construct()
    {
$this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $ads = ads::all();
            return view('index', compact('ads'))
            ->with('categories',Categories::where('parent_id', 1)->with(['children'])->get());
        
    }


    public function adminads()
    {
        
            $status = request()->query('status');
            $sort = request()->query('sort');
            $order="created_at";
            if($status ==""){$status=array('to_moderate','to_publish', 'Unpublished');} else {$status = array(request()->query('status'));}
            if ($sort ==""){$sort='desc';};
            
            $ads = ads::
            wherein('status', $status)
            ->orderBy('created_at' , $sort)
            ->paginate(12);
        
            return view('admin.ads', compact('ads'));
        
    }

         
    



    public function indexadmin()
    {
            $status='to_moderate';
            $ads = Ads::where('status', 'LIKE', $status )
            ->get()->paginate(24);
            return view('admin.moderate_ads', compact('ads'));
        
    }

    public function acceptads($adId)
    {
        $date = new \DateTime();
        $date->format('m-d-y H:i:s');
        $ads = Ads::where('id', '=', $adId );
        $ads->update([
            'published_at' => $date,
            'status'=>'to_publish'
        ]);
        return redirect('admin/moderate_ads')->withErrors(['Annonce publiée !']);
    }

    public function rejectads($adId)
    {
        $date = new \DateTime();
        $date->format('m-d-y H:i:s');
        $ads = Ads::where('id', '=', $adId );
        $ads->update([
            'rejected_at' => $date,
            'status'=>'rejected'
        ]);
        return redirect('admin/moderate_ads')->withErrors(['Annonce rejetée !']);
    }






    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        // dans la fonction create ads, je recupere dans un un objet $categories toutes les categs
        $categories=Categories::all();
        $villes=Villes::all();
        //create retourne la vue (la page create) et l'objet avec toutes les categories qui sera utilisée ans cette vue. Possibilité de passer plusieurs tab séprés par des virgules
        return view('ads.create',['categories'=>$categories],['villes'=>$villes])
        ->with('categories',Categories::where('parent_id', 1)->with(['children'])->get());


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            
        $adData = $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'img1' => ['required'],
            'img2' => ['nullable'],
            'img3' => ['nullable'],
            'price' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255', new City()],
            'zipcode' => ['required', 'string', 'min:4', 'max:5', new PostalCode()],

        ]);

        $userid= auth()->user();

        // ON UPLOAD l'image dans "storage/app/public/ads"
        $img1=$request->img1;   
        $chem_img1 = $request->file('img1')->store('ads_img', 'public');
        $img2=$request->img2; 
        $img2=$request->img3;
        if(empty($img2)){($chem_img2=$chem_img1);}else{$chem_img2 = $request->file('img2')->store('ads_img', 'public');}
        if(empty($img3)){($chem_img3=$chem_img1);}else{$chem_img3 = $request->file('img3')->store('ads_img' , 'public');}
        

        $date = new \DateTime();
        $date->format('m-d-y H:i:s');
        $status='to_moderate';
        
        
        $ads =  Ads::create(['title'=>$request->title,
                        'user_id'=>$userid->id,
                        'category_id'=>$request->category, 
                        'description'=>$request->description, 
                        'img1'=>$chem_img1,
                        'img2'=>$chem_img2,
                        'img3'=>$chem_img3,
                        'price'=>$request->price,  
                        'city'=>$request->city,
                        'created_at'=>$date,
                        'status'=>$status,
                        'zipcode'=>$request->zipcode]);
                        

        return view('profile')->withErrors(['Annonce créée ! Elle sera étudiée avant publication.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ads $ad)
    {
            return view('adpage')
            ->with('categories',Categories::where('parent_id', 1)->with(['children'])->get())
            ->with('ads', $ad);   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Ads $ads, $id)
    {
        $ads = Ads::find($id);
        return view('edit_ads', compact('ads', $ads->id));
    }
    public function adminEdit(Ads $ads, $id)
    {
        $ads = Ads::find($id);
        return view('/admin/edit_ads', compact('ads', $ads->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        $update = $this->validate($request, [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'img1' => ['nullable', 'image', 'max:1024'],
            'price' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'zipcode' => ['required', 'string', 'min:5', 'max:5'],

        ]);

        $ads = Ads::find($id);
        
        if($request->img1){
            $img1=$request->img1;   
            $chem_img1 = $request->file('img1')->store('ads_img', 'public');
            $ads->update([
            'img1'=>$chem_img1,
            ]);
        }
        
        $ads->update([
                        'title'=>$request->title,
                        'description'=>$request->description, 
                        //'img2'=>$chem_img2,
                        //'img3'=>$chem_img3,
                        'price'=>$request->price,  
                        'city'=>$request->city,
                        'zipcode'=>$request->zipcod
        ]);  
        if(Auth::user() &&  Auth::user()->is_admin == 1){
            return redirect('/admin/ads')->withErrors(['Annonce modifiée !']);
        }
        return view('profile')->withErrors(['Annonce modifiée !']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ads $ads, $id)
    {
        $ads = Ads::where('id', $id);
        $ads->delete();
        if(Auth::user() &&  Auth::user()->is_admin == 1){
            return redirect('/admin/ads')->withErrors(['Annonce supprimée !']);
        }
        return view('profile')->withErrors(['Annonce supprimée !']);
    }

    public function deleteconfirm(Ads $ads, $id)
    {
        $ad = Ads::find($id);
        return view('/admin/delete_ads', compact('ad', $ads->id));
    }
    






    public function deleteads($ad)
    {
     $status="Unpublished";
        $ads = Ads::where('id', $ad);
        $ads->update([
            'status'=>$status,
]);  

        return view('admin/ads');
    }
       
   
}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ads;
use App\Models\Villes;
use App\Models\Categories;

class VillesController extends Controller
{

      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
            $villes = villes::all();
            return view('villes', compact('villes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getcity($id)
    {
        $ville = Villes::where('cp', $id)->get();
        return $ville;
        
    }

    public function distance($lat1, $lng1, $lat2, $lng2, $miles = false)
    {
         $pi80 = M_PI / 180;
         $lat1 *= $pi80;
         $lng1 *= $pi80;
         $lat2 *= $pi80;
         $lng2 *= $pi80;
  
         $r = 6372.797; // rayon moyen de la Terre en km
         $dlat = $lat2 - $lat1;
         $dlng = $lng2 - $lng1;
         $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin(
$dlng / 2) * sin($dlng / 2);
         $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
         $km = $r * $c;
      
         return ($miles ? ($km * 0.621371192) : $km);
    }




    function proximity($city,$distance)
    {
        $villes = villes::all();
      


             }







}
    

<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Ads;
use Illuminate\Http\Request;

class CategoriePageController extends Controller
{
// pluck permet de lister les id et prepend permet de rajouter à cett eliste d'id enfant, l'id parent passé en parametre

    public function index(Categories $category)
    {
        return view('Categories/categoriesPage')
            ->with('categories', Categories::where('parent_id', 1)->with(['children'])->get())
            ->with('ads', Ads::whereIn('category_id', $category->children()->get()->pluck('id')->prepend($category->id)->all())->get()->paginate(12));
    } 


}

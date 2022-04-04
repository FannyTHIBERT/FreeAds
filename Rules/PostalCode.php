<?php
namespace App\Rules;
use Illuminate\Contracts\Validation\Rule;
use App\Models\Villes;
class PostalCode implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $value2="%".$value."%";
       $ville =  Villes::where('cp', 'LIKE', $value2)->get();
       
       return $ville->first() === null ? false : true;
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Code postal non valide.';
    }
}

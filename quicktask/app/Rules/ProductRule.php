<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ProductRule implements Rule
{
    public function passes($attribute, $value)
    {
        $modelType = DB::table('types')->get('id');
        $idTypeArray = [];
        foreach ($modelType->toArray() as $type) {
            array_push($idTypeArray, $type->id);
        }
        if (in_array($value, $idTypeArray)) {
            return true;
        } else {
            return false;
        }
    }

    public function message()
    {
        return __('index.type_id_required');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreProduct;
use Symfony\Component\HttpFoundation\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::join('types', 'types.id' , '=' ,'products.type_id')
                ->get(['products.id', 'products.code', 'products.name as productName', 'products.price', 'products.quantity', 'types.name','products.description as productDescription']);
        $type = Type::all();

        return view('home', compact('data', 'type'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {
        if (isset($request)) {
            $data = $request->validated();
            DB::table('products')->insert([
                'name' => $data["name"],
                'price' => ($data["price"]),
                'quantity' => ($data["quantity"]),
                'type_id' => ($data["type_id"]),
            ]);
            
            return redirect()->back()->with('success', __('index.success_add_form'));
        } else {
            return redirect()->back()->with('error', __('index.error_add_form'));
        }
    }

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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, $id)
    {
        $validated = $request->validated();
        Product::where('id', $request->id)
          ->update($validated);
        
        return redirect()->back()->with('success', __('index.success_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Product::findOrFail($id);
        $model->delete();

        return redirect()->back()->with('success',"Delete product is successfully");
    }
}

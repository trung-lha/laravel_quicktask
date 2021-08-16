<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Type;
use Illuminate\Support\Facades\DB;

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
    public function store(Request $request)
    {
        if (isset($request)) {
            $data = $request->all();
            DB::table('products')->insert([
                'name' => $data["name"],
                'price' => (double)($data["price"]),
                'quantity' => (int)($data["quantity"]),
                'type_id' => (int)($data["type_id"]),
            ]);
            return redirect()->back()->with('success',"Add product is successfully");
        } else {
            return redirect()->back()->with('error',"Error form add");
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
    public function update(Request $request, $id)
    {
        $dataUpdate = [
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ];
        // var_dump($dataUpdate);
        Product::where('id', $request->id)
          ->update($dataUpdate);
        
        return redirect()->back()->with('success',"Update product is successfully");
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

<?php

namespace App\Http\Controllers\Api;

use Exception;
use App\Model\Unit;
use App\Model\Product;
use App\Model\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if ($request->ajax()) {
                // Product::with(['category', 'unit'])->select('products.*'); // When we need id
                $product = Product::with(['category', 'unit'])->get();
                return Datatables::of($product)
                        ->addIndexColumn()
                        ->addColumn('action', function($row){
                                $editRoute = route('products.edit', $row->id);
                                $deleteRoute = route('products.destroy', $row->id);
                                if($row->status === '1') {
                                    $status = '<a href="javascript:;" class="btn btn-default text-success btn-sm rounded-0 ml-3">Status</a>';
                                } else {
                                    $status = '<a href="javascript:;" class="btn btn-default text-danger btn-sm rounded-0 ml-3">Status</a>';
                                }
                                $btn = '<a href="'.$editRoute.'" class="btn btn-primary btn-sm rounded-0">Edit</a><a href="'.$deleteRoute.'" class="btn btn-danger btn-sm rounded-0 ml-3">Delete</a>'.$status;
                                return $btn;
                        })
                        ->rawColumns(['action'])
                        ->make(true);
            }
        } catch(Exception $e) {
            dd($e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('admin.pages.products_add', compact('categories', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'required',
            'sub_title' => 'required',
            'category' => 'required',
            'brand' => 'required',
            'unit' => 'required',
            'quantity' => 'required',
            'mrp_price' => 'required',
            'price' => 'required',
            'unit_in_stock' => 'required',
            'in_stock' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $isAvailable = '';

        if($request->quantity > 0) {
            $isAvailable = Product::AVAILABLE_PRODUCT;
        } else {
            $isAvailable = Product::UNAVAILABLE_PRODUCT;
        }

        $product = Product::create([
            'title' => trim($request->title),
            'sub_title' => trim($request->sub_title),
            'category_id' => $request->category,
            'brand' => trim($request->brand),
            'unit_id' => $request->unit,
            'quantity' => $request->quantity,
            'mrp_price' => $request->mrp_price,
            'price' => $request->price,
            'image_id' => 0,
            'unit_in_stock' => $request->unit_in_stock,
            'in_stock' => $request->in_stock,
            'about_product' => $request->about_product,
            'uses' => $request->product_uses,
            'benefits' => $request->benefits,
            'status' => '1',
            'isAvailable' => $isAvailable
        ]);

        return redirect()->route('admin.products')->with('success', 'Product added successfully.');
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
    public function edit(Product $product)
    {
        $categories = Category::all();
        $units = Unit::all();
        return view('admin.pages.products_add',
                    compact('product', 'categories', 'units'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

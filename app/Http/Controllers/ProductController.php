<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use niklasravnsborg\LaravelPdf\Facades\Pdf;
use niklasravnsborg\LaravelPdf\Pdf as MPDF;
use Illuminate\Support\Facades\App;


class ProductController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lang = request()->has('lang') ? request()->lang :"";
        if (!empty($lang)){
            App::setLocale($lang);
        }
        $products = Product::all();
        return response()->view('admin.products.index',
            compact('products')
        );
    }
    public function order()
    {
        $order = Order::all();
        return response()->view('admin.products.order',
            compact('order')
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $products = new Product();
        if(isset($request->image) && $request->image->getClientOriginalName()){
            $ext = $request->image->getClientOriginalExtension();
            $file = rand(1,999)."."."$ext";
            $request->image->storeAs('public/images', $file);
        }else{
            if(!$products->image){
                $file = '';
            }else{
                $file = $products->image;
            }
        }
        $products->image = $file;
        $products->product = $request->product;
        $products->price = $request->price;
        $products->save();
        return  redirect('admin/product')
            ->with(['message' => 'The product was successfully created']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);
        return response()->view('admin.products.show',
            compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);

        return response()->view('admin.products.edit',
            ['products' => $products]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $products = new Product;
        if(isset($request->image) && $request->image->getClientOriginalName()){
            $ext = $request->image->getClientOriginalExtension();
            $file = rand(1,999)."."."$ext";
            $request->image->storeAs('public/images', $file);
        }else{
            if(!$products->image){
                $file = '';
            }else{
                $file = $products->image;
            }
        }
        Product::where('id', $id)->update([
            'product'=> $request->product,
            'price'=> $request->price,
            'image' => $file,
        ]);
        return  redirect('admin/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Product::destroy($id);

        return  redirect('admin/product');
    }

    public function importProducts(){
//      dd(request()->file('file'));
         Excel::import(new ProductImport , request()->file('file'));
         return back();
    }

    public function exportProducts(){
      return  Excel::download(new ProductExport(), "products.xlsx");
    }

    public function productPdf() {
        $order = Order::all();
//        $pdf = new MPDF('<h1>Hello from Menu.am</h1>');
        $pdf = Pdf::loadView('test',
            [
                'order' => $order,
            ]);
        return $pdf->download('document.pdf');
    }
}

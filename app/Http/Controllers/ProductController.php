<?php

namespace codecommerce\Http\Controllers;

use codecommerce\Product;
use Illuminate\Http\Request;

use codecommerce\Http\Requests;
use codecommerce\Http\Controllers\Controller;

class ProductController extends Controller
{
    private $productModel;

    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

    public function index()
    {
        $products = $this->productModel->all();

        return view('product.index', compact('products'));
    }


    public function create()
    {
        return view('product.create');
    }

    public function store(Requests\ProductRequest $request)
    {
        $this->productModel->fill($request->all());
        $this->productModel->save();

        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = $this->productModel->find($id);

        return view('product.edit', compact('product'));
    }

    public function update(Requests\ProductRequest $request, $id)
    {
        $this->productModel->find($id)->update($request->all());

        return redirect()->route('product.index');
    }

    public function destroy($id)
    {
        $this->productModel->find($id)->delete();
        return redirect()->route('product.index');
    }
}

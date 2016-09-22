<?php

namespace CodeCommerce\Http\Controllers;

use CodeCommerce\Category;
use CodeCommerce\Product;
use CodeCommerce\ProductImage;
use Illuminate\Http\Request;

use CodeCommerce\Http\Requests;
use CodeCommerce\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    private $productModel;

    public function __construct(Product $product)
    {
        $this->productModel = $product;
    }

    public function index()
    {
        $products = $this->productModel->paginate(10);
        return view('product.index', compact('products'));
    }


    public function create(Category $category)
    {
        $categories = $category->lists('name', 'id');

        return view('product.create', compact('categories'));
    }

    public function store(Requests\ProductRequest $request)
    {
        $this->productModel->fill($request->all());
        $this->productModel->save();

        return redirect()->route('product.index');
    }

    public function edit(Category $category, $id)
    {
        $categories = $category->lists('name', 'id');
        $product = $this->productModel->find($id);

        return view('product.edit', compact('product', 'categories'));
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

    public function images($id)
    {
        $product = $this->productModel->find($id);

        return view('product.images', compact('product'));
    }

    public function createImage($id)
    {
        $product = $this->productModel->find($id);

        return view('product.create_image', compact('product'));
    }


    public function storeImage(Requests\ProductImageRequest $request, $id, ProductImage $productImageModel)
    {
        $file = $request->file('image');
        $extension = $file->getClientOriginalExtension();

        $image = $productImageModel->create(['product_id' => $id, 'extension' => $extension]);

        Storage::disk('public_local')->put($image->id . '.' . $extension, File::get($file));

        return redirect()->route('product.images', $id);

    }

    public function destroyImage(ProductImage $productImageModel, $id)
    {
        $image = $productImageModel->find($id);
        $pathImage = $image->id . '.' . $image->extension;

        Storage::disk('public_local')->delete($pathImage);

        $product = $image->product;

        $image->delete();

        return redirect()->route('product.images', $product->id);
    }
}

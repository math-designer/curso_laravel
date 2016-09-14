<?php

namespace codecommerce\Http\Controllers;

use codecommerce\Category;
use Illuminate\Http\Request;

use codecommerce\Http\Requests;
use codecommerce\Http\Controllers\Controller;

class CategoryController extends Controller
{

    private $categoryModel;

    public function __construct(Category $categoryModel)
    {
        $this->categoryModel = $categoryModel;
    }

    public function index()
    {
        $categories = $this->categoryModel->all();

        return view('category.index', compact('categories'));
    }

    public function store(Requests\CategoryRequest $request)
    {
        $input = $request->all();
        $this->categoryModel->fill($input);
        $this->categoryModel->save();

        return redirect()->route('category.index');

    }

    public function create()
    {
        return view('category.create');
    }


    public function edit($id)
    {
        $category = $this->categoryModel->find($id);
        return view('category.edit', compact('category'));
    }

    public function update(Requests\CategoryRequest $request, $id)
    {
        $this->categoryModel->find($id)->update($request->all());
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $this->categoryModel->find($id)->delete();

        return redirect()->route('category.index');
    }
}

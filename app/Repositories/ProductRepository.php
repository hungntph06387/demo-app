<?php

namespace App\Repositories;

use App\Models\Product;
use http\Env\Request;
use JasonGuru\LaravelMakeRepository\Repository\BaseRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Routing\Redirector;
use App\http\Requests\StoreProduct;
//use Your Model

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function model()
    {
        return Product::class;
    }

    public function index()
    {
       $data = $this->model()::all()->sortByDesc('id');
       return view('pages.index', compact('data'));
    }

    public function add()
    {
        return view('product.create');
    }

    public function store($request)
    {
        $validated = $request->validated();
        $product = new Product();
        $product->name        = $request->input('name');
        $product->price       = $request->input('price');
        $product->description = $request->input('description');
        if ($file = $request->file('image')) {
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $product->image = $filename;
        }
//        dd($product->toArray());
        $product->save();
        return redirect('/products')->with('msg', 'Thêm thành công');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        dd($product->toArray());

    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    public function update($request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->input('name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        if ($file = $request->file('image')) {
            $filename = $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $product->image = $filename;
        }
        $product->update();

        return redirect('/products')->with('msg', 'Sửa thành công');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return back()->with('msg', 'Xóa thành công');
    }
}

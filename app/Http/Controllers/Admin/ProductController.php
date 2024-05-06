<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function Index()
    {
        $products = Product::latest()->get();
        return view('admin.allproducts', compact('products'));
    }
    public function AddProduct()
    {
        $categories = Category::latest()->get();
        $subcategories = Subcategory::latest()->get();

        return view('admin.addproduct', compact('categories', 'subcategories'));
    }

    public function StoreProduct(Request $request)
    {
        // $request->validate([
        //     'product_name' => 'required|unique:products',
        //     'price' => 'required',
        //     'quantity' => 'required',
        //     'product_short_des' => 'required',
        //     'product_long_des' => 'required',
        //     'product_category_id' => 'required',
        //     'product_subcategory_id' => 'required',
        //     'product_img' => 'required|image|mimes:jpeg,png|max:2048',
        // ]);
        $rules = [
            'product_name' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|integer',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png|max:2048',
        ];
        $messages = [
            'product_name.required' => 'Product Name is Required.',
            'price.required' => 'Price of the Product is Required.',
            'price.numeric' => 'The Price must be a Valid Number.',
            'quantity.required' => 'Quantity of the Product is Required.',
            'quantity.integer' => 'The Quantity must be an Integer.',
            'product_short_des.required' => 'Short Description of the Product is Required.',
            'product_long_des.required' => 'Long Description of the Product is Required.',
            'product_category_id.required' => 'Product Category is required.',
            'product_subcategory_id.required' => 'Product Subcategory  is Required.',
            'product_img.required' => 'Product Image is Required.',
            'product_img.image' => 'File must be an Image.',
            'product_img.mimes' => 'Image must be a file of type: jpeg, png.',
            'product_img.max' => 'The Image may not be greater than 2048 kilobytes.',
        ];
        $request->validate($rules, $messages);

        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = SubCategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::create([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'product_category_id' => $request->product_category_id,
            'product_category_name' => $category_name,
            'product_subcategory_id' => $request->product_subcategory_id,
            'product_subcategory_name' => $subcategory_name,
            'quantity' => $request->quantity,
            'product_img' => $img_url,
            'slug' => strtolower((str_replace(' ', '-', $request->product_name))),

        ]);
        Category::where('id', $category_id)->increment('product_count', 1);
        SubCategory::where('id', $subcategory_id)->increment('product_count', 1);

        return redirect()->route('allproducts')->with('message', 'Product Added Succsessfully');

    }

    public function EditProductImage($id)
    {
        $productinfo = Product::findOrFail($id);
        return view('admin.editproductimg', compact('productinfo'));
    }

    public function UpdateProductImg(Request $request)
    {
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png|max:2048',
        ]);
        $id = $request->id;
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'), $img_name);
        $img_url = 'upload/' . $img_name;

        Product::findOrFail($id)->update([
            'product_img' => $img_url,
        ]);
        return redirect()->route('allproducts')->with('message', 'Product Image Updated Succsessfully');
    }

    public function EditProduct($id)
    {
        $productinfo = Product::findOrFail($id);
        return view('admin.editproduct', compact('productinfo'));
    }

    public function DeleteProduct($id)
    {
        $cat_id = Product::where('id', $id)->value('product_category_id');
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        Product::findOrFail($id)->delete();
        Category::where('id', $cat_id)->decrement('product_count', 1);
        SubCategory::where('id', $subcat_id)->decrement('product_count', 1);

        return redirect()->route('allproducts')->with('message', 'Product Deleted Succsessfully');
    }

    public function UpdateProduct(Request $request)
    {
        $product_id = $request->id;
        $rules = [
            'product_name' => 'required|unique:products,product_name,' . $product_id,
            'price' => 'required',
            'quantity' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
        ];
        $messages = [
            'product_name.required' => 'Product Name is Required.',
            'product_name.unique' => 'Product Name Already Exist.',
            'price.required' => 'Price of the Product is Required.',
            'price.numeric' => 'The Price must be a Valid Number.',
            'quantity.required' => 'Quantity of the Product is Required.',
            'quantity.integer' => 'The Quantity must be an Integer.',
            'product_short_des.required' => 'Short Description of the Product is Required.',
            'product_long_des.required' => 'Long Description of the Product is Required.',
        ];

        $request->validate($rules, $messages);

        Product::findOrFail($product_id)->update([
            'product_name' => $request->product_name,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'slug' => strtolower((str_replace(' ', '-', $request->product_name))),
        ]);
        return redirect()->route('allproducts')->with('message', 'Product Updated Succsessfully');

    }
}

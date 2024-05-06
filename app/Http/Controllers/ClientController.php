<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Contact;
use App\Models\Orders;
use App\Models\Review;
use App\Models\User;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class ClientController extends Controller
{

    public function AddToCart()
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        return view('user_template.addtocart', compact('cart_items'));
    }
    public function Checkout()
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $shipping_address = ShippingInfo::where('user_id', $user_id)->latest()->first();
        return view('user_template.checkout', compact('cart_items', 'shipping_address'));
    }
    public function UserProfile()
    {
        $user_id = Auth::id();
        $pendingorders = Orders::where('user_id', $user_id)->where('status', 'Pending')->get();
        $orders = Orders::where('user_id', $user_id)->get();
        $cart = Cart::where('user_id', $user_id)->get();
        $count_cart = $cart->count();
        $count_p_orders = $pendingorders->count();
        $count_orders = $orders->count();
        return view('user_template.userprofile', compact('count_cart', 'count_p_orders', 'count_orders'));
    }

    public function PendingOrders()
    {
        $user_id = Auth::id();
        $orders = Orders::where('user_id', $user_id)->where('status', 'Pending')->latest()->get();
        return view('user_template.pendingorders', compact('orders'));
    }

    public function History()
    {
        $user_id = Auth::id();
        $orders = Orders::where('user_id', $user_id)->latest()->get();
        return view('user_template.history', compact('orders'));
    }
    public function CategoryPage($id)
    {
        $category = Category::findOrFail($id);
        $products = Product::where('product_category_id', $id)->latest()->get();
        return view('user_template.category', compact('category', 'products'));
    }

    public function SingleProduct($id)
    {
        $product = Product::findOrFail($id);
        $subcat_id = Product::where('id', $id)->value('product_subcategory_id');
        $related_products = Product::where('product_subcategory_id', $subcat_id)->latest()->get();
        return view('user_template.singleproduct', compact('product', 'related_products'));
    }
    public function NewRelease()
    {
        $products = Product::orderByDesc('created_at')->limit(3)->get();
        return view('user_template.newrelease', compact('products'));
    }

    public function TodaysDeal()
    {
        return view('user_template.todaysdeal');
    }

    public function TopProducts()
    {
        $topProducts = Product::select('products.id', 'products.product_name', 'products.price', 'products.product_img', 'products.slug', DB::raw('COUNT(orders.id) as total_orders'))
            ->join('orders', 'products.id', '=', 'orders.product_id')
            ->groupBy('products.id', 'products.product_name', 'products.price', 'products.product_img', 'products.slug', )
            ->orderByDesc('total_orders')
            ->limit(3)
            ->get();
        return view('user_template.topselling', compact('topProducts'));
    }
    public function CustomerService()
    {
        return view('user_template.customerservice');
    }

    public function Contact(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required|string|digits:10',
            'message' => 'required|string|max:1000',
        ];


        $messages = [
            'name.required' => 'The Name field is required.',
            'email.required' => 'The Email field is required.',
            'email.email' => 'Invalid Email format.',
            'number.digits' => 'Enter a 10 Digit Mobile Number',
            'number.required' => 'The Number field is required.',
            'message.required' => 'The Message field is required.',
        ];
        $validatedData = $request->validate($rules, $messages);

        Contact::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'number' => $validatedData['number'],
            'message' => $validatedData['message'],
        ]);
        return redirect()->route('customerservice')->with('message', 'Thankyou for your Response...We will contact you soon..!');
    }

    public function AddProductToCart(Request $request)
    {
        $product_price = $request->price;
        $quantity = $request->count;
        $price = $product_price * $quantity;

        Cart::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $quantity,
            'price' => $price,
        ]);

        return redirect()->route('addtocart')->with('message', 'Item Added to Cart Successfully..!');
    }

    public function RemoveItem($id)
    {
        Cart::findOrFail($id)->delete();
        return redirect()->route('addtocart')->with('message', 'Item Removed from Cart Successfully..!');
    }

    public function UserLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function GetAddress()
    {
        $id = Auth::id();
        $address = ShippingInfo::where('user_id', $id)->where('status', 1)->first();
        return view('user_template.shippingaddress', compact('address'));
    }
    public function SaveAddress(Request $request)
    {
        $rules = [
            'number' => 'required|digits:10',
            'address' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'pincode' => 'required|string|digits:6',
        ];

        $messages = [
            'number.required' => 'The number field is required.',
            'address.required' => 'The address field is required.',
            'district.required' => 'The district field is required.',
            'state.required' => 'The state field is required.',
            'country.required' => 'The country field is required.',
            'pincode.required' => 'The pin code field is required.',
        ];
        $validatedData = $request->validate($rules, $messages);

        $shippingInfo = ShippingInfo::create([
            'user_id' => Auth::id(),
            'number' => $validatedData['number'],
            'address' => $validatedData['address'],
            'district' => $validatedData['district'],
            'state' => $validatedData['state'],
            'country' => $validatedData['country'],
            'pincode' => $validatedData['pincode'],
        ]);

        return redirect()->route('checkout');
    }


    public function PlaceOrder()
    {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id', $user_id)->get();
        $shipping_address = ShippingInfo::where('user_id', $user_id)->latest()->first();
        foreach ($cart_items as $item) {
            Orders::insert([
                'user_id' => $user_id,
                'shipping_number' => $shipping_address->number,
                'shipping_address' => $shipping_address->address,
                'shipping_district' => $shipping_address->district,
                'shipping_state' => $shipping_address->state,
                'shipping_country' => $shipping_address->country,
                'shipping_pincode' => $shipping_address->pincode,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->price,

            ]);
            $id = $item->id;
            Cart::findOrFail($id)->delete();
            ShippingInfo::where('user_id', $user_id)->where('status', 0)->delete();
            $product = Product::findOrFail($item->product_id);
            $product->decrement('quantity', $item->quantity);
        }
        return redirect()->route('user.pendingorders')->with('message', 'Your Order has been placed Successfully..!');
    }

    public function EditProfile()
    {
        $user_id = Auth::id();
        $user = User::findOrFail($user_id);
        $address = ShippingInfo::where('user_id', $user_id)->where('status', 1)->first();
        return view('user_template.editprofile', compact('user', 'address'));
    }

    public function UpdateProfile(Request $request)
    {
        $user = Auth::user();
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'number' => 'required|string|digits:10',
            'address' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'pincode' => 'required|string|digits:6',
        ];

        $messages = [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
            'email.unique' => 'This email is already taken.',
            'number.unique' => 'This number is already taken.',
            'number.required' => 'The number field is required.',
            'address.required' => 'The address field is required.',
            'district.required' => 'The district field is required.',
            'state.required' => 'The state field is required.',
            'country.required' => 'The country field is required.',
            'pincode.required' => 'The pin code field is required.',
        ];

        $this->validate($request, $rules, $messages);

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        ShippingInfo::updateOrCreate(
            ['user_id' => $user->id, 'status' => 1],
            [
                'number' => $request->input('number'),
                'address' => $request->input('address'),
                'district' => $request->input('district'),
                'state' => $request->input('state'),
                'country' => $request->input('country'),
                'pincode' => $request->input('pincode'),
                'status' => 1,
            ]
        );
        return redirect()->route('editprofile')->with('message', 'Profile Updated Successfully');
    }


    public function ProductReview($id)
    {
        $product = Product::findOrFail($id);
        $reviews = Review::where('product_id', $id)->get();
        return view('user_template.reviews', compact('product', 'reviews'));
    }

    public function PostReview(Request $request, $id)
    {

        $user = Auth::user();

        Review::create([
            'product_id' => $id,
            'user_id' => $user->id,
            'user_name' => $user->name,
            'review' => $request->review,

        ]);
        return redirect()->route('review', ['id' => $id]);
    }

    public function ChangePassword()
    {
        return view('user_template.changepassword');
    }

    public function UpdatePassword(Request $request)
    {
        $request->validate([
            'currentpassword' => 'required',
            'newpassword' => 'required|min:8|max:16',
            'confirmpassword' => 'required|same:newpassword',
        ]);

        $user = auth()->user();

        if (!Hash::check($request->currentpassword, $user->password)) {
            return redirect()->back()->with('message', 'Current Password is Incorrect..!');
        }

        $user->update([
            'password' => bcrypt($request->newpassword),
        ]);

        return redirect()->route('changepassword', ['userid' => $user->id])->with('message', 'Password changed Successfully..!');

    }
    public function SearchProducts(Request $request)
    {
        $query = $request->input('query');

        $allproducts = Product::where('product_name', 'LIKE', "%{$query}%")
            ->orWhere('product_short_des', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($allproducts);
    }

    public function Reviews()
    {
        $id = Auth::id();
        $reviews = Review::where('user_id', $id)->get();
        return view('user_template.myreviews', compact('reviews'));
    }

    public function DeleteReview($id)
    {
        Review::findOrFail($id)->delete();
        return redirect()->route('reviews')->with('message', 'Review Deleted Successfully..!');

    }

    public function EditReview($id)
    {
        $reviews = Review::findOrFail($id);
        return view('user_template.editreview', compact('reviews'));

    }

    public function UpdateReview(Request $request)
    {
        $request->validate([
            'review' => 'required|string',

        ]);
        $review = Review::findOrFail($request->review_id);
        $review->update([
            'review' => $request->review,
        ]);
        return redirect()->route('reviews')->with('message', 'Review Edited Successfully');
    }

}

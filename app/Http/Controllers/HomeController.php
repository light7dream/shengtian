<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Invoice;
use App\Models\OrderProduct;
use App\Models\About;
use App\Models\Rule;
use App\Models\Quiz;
use App\Models\Setting;
use App\Models\Member;
use App\Models\OnlineService;
use App\Models\ExchangeHistory;
use App\Models\ReachargeHistory;
use Mail;

use DNS2D;
use Zxing\QrReader;
class HomeController extends Controller
{
    /**
     * 
     * AUTH
     * User name
     * Used points
     * Remaining points
     * Score
     */
    public function index(Request $req){
        $used_points = 0;
        $total_points = 0;
        if($req->session()->has('user')){
            $total_points=Member::find($req->session()->get('user')->member_id)->points;
            $used_points = Order::where('member_id', $req->session()->get('user')->member_id)->sum('total');
        }     
        $categories = Category::all();
        if($req->session()->has('user'))
        $carts = Cart::where('member_id', $req->session()->get('user')->member_id)->get();
        else $carts = [];

        $best_products = [];
        $products = Product::all();
        $products = array_values(array_sort($products, function ($value) {
            return $value->order_products->count();
        }));
        
        /**MISSING */
        $new_products = Product::orderBy('created_at', 'desc')->paginate(8);

        $setting = Setting::first();
        $banners = [];
        $banner_time = 4000;
        if($setting){
            $banners=$setting->banner_images;
            $banner_time=$setting->banner_time;
        }

        $official = Setting::all();
        if(count($official) !=0)
         $data = $official[0]->game_official_site;
        else
          $data = "#";
        return view('index', ['banners'=>$banners, 'banner_time'=>$banner_time, 'categories'=>$categories,'total_points'=>$total_points, 'used_points'=>$used_points, 'best_products'=>$best_products,'title'=>'Dashboard', 'new_products'=>$new_products, 'carts'=>$carts, "official" => $data]);
    }

    public function viewCartPage(Request $req){
        $member=null;
        if($req->session()->has('user'))
        {
            $carts = Cart::where('member_id', $req->session()->get('user')->member_id)->get();
            $member = Member::find($req->session()->get('user')->member_id);
        }
        else
        $carts =[];
        $used_points = 0;
        if($req->session()->has('user')){
            $orders = Order::where('member_id', $req->session()->get('user')->member_id)->get();
            foreach($orders as $order){
                $used_points+=$order->total;
            }
        }     
        $selected_points = 0;
        $total_points = 0;
        $my_balace = $member==null?0:$member->points;
        /**
         * 
         * 
         */
        foreach($carts as $cart){
            if($cart->checked)
                $selected_points+=$cart->product->points*$cart->quantity;
            $total_points+=$cart->product->points*$cart->quantity;
        }
        $cart_info = (object)[
            'total_points'=>$total_points,
            'selected_points'=>$selected_points,
            'my_balance'=>$my_balace
        ];

        $official = Setting::all();
        if(count($official) !=0)
         $data = $official[0]->game_official_site;
        else
          $data = "#";
        return view('cart', ['used_points'=>$used_points, 'total_points'=>$my_balace, 'carts'=>$carts, 'cart_info'=>$cart_info, 'title'=>'Dashboard', 'official' =>$data]);
    }

    public function viewHelpPage(Request $req){
        $content1 = About::all();
        if(count($content1) ==0)
           $help_one = "";
        else       
           $help_one = $content1[0]->content;


        $content2 = Rule::all();
        if(count($content2) ==0)
            $help_two = "";
        else       
            $help_two = $content2[0]->content;

        $content3 = Quiz::all();
        if(count($content3) ==0)
            $help_three =[];
        else       
          $help_three = $content3;


        $content4 = OnlineService::all();
        if(count($content4) ==0)
            $help_four =[];
        else       
        $help_four = $content4;
        if($req->session()->has('user'))
        $carts = Cart::where('member_id', $req->session()->get('user')->member_id)->get();
        else
        $carts = [];
        $my_points = 0;
        $used_points = 0;
        if($req->session()->has('user')){
            $my_points = Member::find($req->session()->get('user')->member_id)->points;
            $used_points = Order::where('member_id', $req->session()->get('user')->member_id)->sum('total');
        }  

        $official = Setting::all();
        if(count($official) !=0)
            $data = $official[0]->game_official_site;
        else
            $data = "#";
        return view('help', ['help_one'=>$help_one, 'help_two'=>$help_two, 'help_three'=>$help_three, 'help_four'=>$help_four, 'title'=>'Support', 'carts'=>$carts,'total_points'=>$my_points, 'used_points'=>$used_points, 'official' => $data]);
    }

    public function viewMinePage(Request $req){
        if($req->session()->has('user'))
        $carts = Cart::where('member_id', $req->session()->get('user')->member_id)->get();
        else
        $carts =[];
        $used_points = 0;
        if($req->session()->has('user')){
            $used_points = Order::where('member_id', $req->session()->get('user')->member_id)->sum('total');
        }     
        
        $yesterday = date('Y-m-d',strtotime("-1 days"));
        $month = date('Y-m');
        $last_month = date('Y-m',strtotime("-1 month"));
        $member = Member::find($req->session()->get('user')->member_id);
        $exchanged_goods = ExchangeHistory::where('member_id', $req->session()->get('user')->member_id)->get();
        $charge_hisotries = ReachargeHistory::where('member_id', $req->session()->get('user')->member_id)->get();
        $yesterday_histories = ReachargeHistory::where('member_id', $req->session()->get('user')->member_id)->where('created_at','like',$yesterday.'%')->get();
        $obtained_yesterday_points = 0;
        foreach($yesterday_histories as $yh){
        $obtained_yesterday_points += $yh->charge_points;
        }
        $accumulated_points_permonth =0;

        $month_histories = ReachargeHistory::where('member_id', $req->session()->get('user')->member_id)->where('created_at','like',$month.'%')->get();
        foreach($month_histories as $mh){
            $accumulated_points_permonth = $mh->charge_points;
        }
        $personal_info = (object)[
            'obtained_yesterday_points'=>$obtained_yesterday_points,
            'accumulated_points_permonth'=>$accumulated_points_permonth,
            'total_points'=>$member->points,
            'used_points'=>$used_points,
            'remaining_points'=>$member->points-$used_points,
            'exchanged_goods' => [
            ]
        ];
            
        $point_details = (object)[
            'total_points'=>$member->points,
            'consumed_points'=>$member->used_points,
            'remaining_points'=>$member->points-$member->used_points,
            'records'=>$exchanged_goods
        ];

        $orders = Order::all();

        $official = Setting::all();
        if(count($official) !=0)
         $data = $official[0]->game_official_site;
        else
          $data = "#";

        return view('mine', ['used_points'=>$used_points, 'total_points'=>$member->points, 'personal_info'=>$personal_info, 'point_details'=>$point_details, 'my_orders'=>$orders, 'carts'=>$carts, 'official' =>$data]);
    }

    public function viewOrderBackPage(Request $req, $id){
        $order = Order::find($id);
        if(!$order)return view('404');

        if($req->session()->has('user'))
        $carts = Cart::where('member_id', $req->session()->get('user')->member_id)->get();
        else
        $carts=[];

        $used_points = 0;
        if($req->session()->has('user')){
            $used_points = Order::where('member_id', $req->session()->get('user')->member_id)->sum('total');
        }     
        $member = Member::find($req->session()->get('user')->member_id);
        $my_points = $member->points;

        $order_info = (object)[
            'no'=>$order->id,
            'consumption_points'=>$order->total,
            'your_balance'=>$my_points
        ];

        $official = Setting::all();
        if(count($official) !=0)
         $data = $official[0]->game_official_site;
        else
          $data = "#";
        return view('order-back', ['used_points'=>$used_points,'total_points'=>$member->points, 'order_info'=>$order_info, 'carts'=>$carts, "official" => $data]);
    }
    
    public function viewNewOrderPage(Request $req){
        if($req->session()->has('user'))
        $carts = Cart::where('member_id', $req->session()->get('user')->member_id)->get();
        else
        $carts=[];
        if($req->session()->has('user'))
        $carts_ = Cart::where('checked',1)->where('member_id', $req->session()->get('user')->member_id)->get();
        else
        $carts_=[];
        $member = Member::find($req->session()->get('user')->member_id);
        $total_points = 0;
        $used_points = 0;
        if($req->session()->has('user')){
            $used_points = Order::where('member_id', $req->session()->get('user')->member_id)->sum('total');
        }    
        $my_points = $member->points-$used_points;
        foreach($carts_ as $cart){
            $total_points+=$cart->quantity*$cart->product->points;
        }        
        $book_keeping = (object)[
            'total_order'=>$total_points,
            'my_scores'=>$my_points,
            'need_scores'=>$my_points<$total_points?$total_points-$my_points:0
        ];
         

        $official = Setting::all();
        if(count($official) !=0)
         $data = $official[0]->game_official_site;
        else
          $data = "#";
        return view('new-order', ['used_points'=>$used_points,'total_points'=>$member->points,'carts'=>$carts, 'carts_'=>$carts_, 'book_keeping'=>$book_keeping, 'official' => $data]);
    }
    
    public function viewProductDetailsPage(Request $req, $id){
        $product_ = Product::find($id);
        if(!$product_)return view('404');
        $member = null;
        $used_points = 0;
        if($req->session()->has('user')){
            $used_points = Order::where('member_id', $req->session()->get('user')->member_id)->sum('total');
           
        }     
        if($req->session()->has('user'))
            $member = Member::find($req->session()->get('user')->member_id);

        $my_points=$member?$member->points:0;
        if($req->session()->has('user'))
        $carts = Cart::where('member_id', $req->session()->get('user')->member_id)->get();
        else 
        $carts = [];
        $product = (object)[
            'id'=>$product_->id,
            'name'=>$product_->name,
            'virtual'=>$product_->virtual,
            'description'=>$product_->description,
            'mainImage'=>url('/storage/uploads/catalog/products/'.$product_->id.'/main.png'),
            'colors'=>$product_->colors,
            'subImages'=>[],
            'sizes'=>$product_->sizes,
            'compositions'=>$product_->category->name,
            'styles'=>'',
            'properties'=>$product_->category->name,
            'price'=>$product_->points.'积分'
        ];
        for ($i=0; $i<5; $i++)
        if(file_exists(storage_path('app/public/uploads/catalog/products/'.$product_->id.'/sub'.$i.'.png')))
        {
            array_push($product->subImages , url('/storage/uploads/catalog/products/'.$product_->id.'/sub'.$i.'.png'));
        }   
        $content1 = About::all();
        if(count($content1) ==0)
           $help_one = "";
        else       
           $help_one = $content1[0]->content;


        $content2 = Rule::all();
        if(count($content2) ==0)
            $help_two = "";
        else       
            $help_two = $content2[0]->content;

        $content3 = Quiz::all();
        if(count($content3) ==0)
            $help_three =[];
        else       
          $help_three = $content3;


        $content4 = OnlineService::all();
            if(count($content4) ==0)
                $help_four =[];
        else       
            $help_four = $content4;

            $official = Setting::all();
            if(count($official) !=0)
             $data = $official[0]->game_official_site;
            else
              $data = "#";
        
        return view('product-details', ['used_points'=>$used_points,'total_points'=>$my_points, 'product'=>$product, 'carts'=>$carts, 'exchange_records'=>[], 'help_one'=>$help_one, 'help_two'=>$help_two, 'help_three'=>$help_three, 'help_four'=>$help_four, 'official' => $data]);
    }
    
    public function viewProductListPage(Request $req){
        $used_points = 0;
        $my_points = 0;
        if($req->session()->has('user')){
            $my_points=Member::find($req->session()->get('user')->member_id)->points;
            $used_points = Order::where('member_id', $req->session()->get('user')->member_id)->sum('total');
           
        }    
        if($req->session()->has('user')) 
        $carts = Cart::where('member_id', $req->session()->get('user')->member_id)->get();
        else
        $carts=[];
        $products = [];
        $filter = $req->input('filter');
        if($req->input('type'))
        {
            switch($filter){
                case 0: 
                    $products = Product::where('category_id', $req->input('type'))->orderBy('updated_at', 'desc')->paginate(8);
                    break;
                case 1: 
                    $products = Product::where('category_id', $req->input('type'))->orderBy('points', 'asc')->paginate(8);
                    break;
                case 2: 
                    $products = Product::where('category_id', $req->input('type'))->orderBy('created_at', 'desc')->paginate(8);
                    break;
                default: 
                $products = Product::where('category_id', $req->input('type'))->paginate(8);

                break;
            }
        }else{
            switch($filter){
                case 0: 
                    $products = Product::orderBy('updated_at', 'desc')->paginate(8);
                    break;
                case 1: 
                    $products = Product::orderBy('points', 'asc')->paginate(8);
                    break;
                case 2: 
                    $products = Product::orderBy('created_at', 'desc')->paginate(8);
                    break;
                default: 
                $products = Product::paginate(8);
                break;
            }
        }

        $official = Setting::all();
        if(count($official) !=0)
         $data = $official[0]->game_official_site;
        else
          $data = "#";
        return view('product-list', ['used_points'=>$used_points,'total_points'=>$my_points, 'products'=>$products, 'carts'=>$carts, 'official' => $data]);
    }

   
    public function viewLoginPage(){
        $official = Setting::all();
        if(count($official) !=0)
         $data = $official[0]->game_official_site;
        else
          $data = "#";

        return view('login',['carts'=>[], 'official' => $data]);
    }

    public function viewRegisterPage(){
        $official = Setting::all();
        if(count($official) !=0)
         $data = $official[0]->game_official_site;
        else
          $data = "#";

        return view('register',['carts'=>[], 'official' => $data]);
    }

    public function addCart(Request $req){
        $cart = new Cart;
       
        $cart->member_id= $req->session()->get('user')->member_id;
  
        $cart->product_id = $req->id;
        $cart->quantity=$req->quantity;
        $cart->size = $req->size!=''?$req->size:'Medium';
        $cart->color= $req->color?$req->color:'#000000';
        $result = $cart->save();
        return redirect('cart');
    }

    public function deleteCart(Request $req){
        $cart = Cart::find($req->id);
        if($cart)
        $cart->delete();
        return back();
    }

    public function readyOrder(Request $req){
        if($req->session()->has('user')) 
        $carts = Cart::where('member_id', $req->session()->get('user')->member_id)->get();
        else
        $carts=[];

        $selected_carts = $req->input('carts');
        $arr_filter = [];
        foreach($selected_carts as $sc){
         array_push($arr_filter, $sc['id']);   
        }
        foreach($carts as $cart){
            foreach($selected_carts as $sc){
                if(in_array($cart->id, $arr_filter)){
                    $cart->checked = 1;
                    $cart->quantity=$sc['qty'];
                    $cart->save();
                }
                else
                {
                    $cart->checked = 0;
                    $cart->save();
                }
            }
        }
        return ';)';
    }

    public function addOrder(Request $req){
        $this->validate($req, [
            'name' => 'required',
            'tel'=>'required',
            'address' => 'required',
        ]);
        if($req->session()->has('user'))
        $carts = Cart::where('checked',1)->where('member_id', $req->session()->get('user')->member_id)->get();
        else
        $carts=[];
        $consump_points = 0;
        foreach($carts as $cart){
            $consump_points += $cart->quantity*$cart->product->points;
        }
        $member=Member::find($req->session()->get('user')->member_id);
        $used_points = $member->orders->sum('total');
        if($consump_points>$member->points-$used_points)
        return back()->withErrors(['message'=>'Not enough bet amounts!']);
        $member->used_points=$member->used_point+$consump_points;
        $member->save();
        $newOrder= new Order;
        $newOrder->member_id=$req->session()->get('user')->member_id;
        $newOrder->recipient_name=$req->input('name');
        $newOrder->recipient_tel=$req->input('tel');
        $newOrder->recipient_address=$req->input('address');
        $newOrder->total = 0;
        $newOrder->save();


        $exchage_history =new ExchangeHistory;
        $exchage_history->member_id = $req->session()->get('user')->member_id;
        $status = 1;
        foreach($carts as $cart){
            $newOrderProduct = new OrderProduct;
            $newOrderProduct->product_id=$cart->product->id;
            $exchage_history->name = $cart->product->name;
            $newOrderProduct->quantity = $cart->quantity;
            $exchage_history->quantity = $cart->quantity;
            $newOrderProduct->color = $cart->color;
            $exchage_history->color = $cart->color;
            $newOrderProduct->size = $cart->size;
            $exchage_history->size = $cart->size;
            $newOrderProduct->order_id=$newOrder->id;
            $newOrderProduct->save();
            if($newOrderProduct->quantity>$newOrderProduct->product->quantity){
                $status = 0;
            }
            $cart->delete();
        }
        $newOrder->status = $status;
        $newOrder->total = $consump_points;
        $exchage_history->points = $consump_points;
        $newOrder->save();
        $exchage_history->save();
        \Storage::disk('public')->put('uploads/orders/qrcode_'.$newOrder->id.'.png',base64_decode(DNS2D::getBarcodePNG(md5($newOrder->id.'shengtian'), "QRCODE")));
        $order_info = (object)[
            'no'=>$newOrder->id,
            'consumption_points'=>$consump_points,
            'your_balance'=>1000000
        ];
        return redirect('order-back/'.$newOrder->id );
    }

    public function viewIdentifyByQRCodePage(){
        $official = Setting::all();
        if(count($official) !=0)
         $data = $official[0]->game_official_site;
        else
          $data = "#";
        return view('identify-by-qr',['carts'=>[], 'official' => $data]);
    }

    public function identifyByQRCode(Request $req){
        $order_id= $req->input('order');
        $qr_token=  $req->input('qrtoken');
        $new_token= md5($order_id.'shengtian');
        if($qr_token == $new_token){
            $order = Order::find($order_id);
            if($order->status==3)return $order->invoice->id;
            $order->status = 3;
            $order->save();
            //Make invoice
            $invoice = new Invoice;
            $invoice->member_id = $order->member_id;
            $orders = [];
            foreach($order->order_products as $op){
                $order_ = (object)[
                    'product'=>$op->product->name,
                    'category'=>$op->product->category->name,
                    'color'=>$op->color,
                    'size'=>$op->size,
                    'price'=>$op->product->points,
                    'quantity'=>$op->quantity
                ];
                array_push($orders, $order_);
            }
            $invoice->orders = (object)$orders;
            $invoice->total = $order->total;
            $invoice->recipient_name=$order->recipient_name;
            $invoice->recipient_address=$order->recipient_address;
            $invoice->recipient_phone=$order->recipient_tel;
            $invoice->status=0;
            $invoice->order_id = $order->id;
            $invoice->ended_date=date('Y-m-d');
            $invoice->save();
            $req->session()->put('qrcode',$order->member_id);
            return $invoice->id;
        }
        else 
            return ';(';
    }

    public function confirmOrder(Request $req){
        $id = $req->input('id');
        $order = Order::find($id);
        if(!$order) return '';
        $order->status = 3;
        $order->save();
        //Make invoice
        $invoice = new Invoice;
        $invoice->member_id = $req->session()->get('user')->member_id;
        $orders = [];
        foreach($order->order_products as $op){
            $order_ = (object)[
                'product'=>$op->product->name,
                'category'=>$op->product->category->name,
                'color'=>$op->color,
                'size'=>$op->size,
                'price'=>$op->product->points,
                'quantity'=>$op->quantity
            ];
            array_push($orders, $order_);
        }
        $invoice->orders = (object)$orders;
        $invoice->total = $order->total;
        $invoice->recipient_name=$order->recipient_name;
        $invoice->recipient_address=$order->recipient_address;
        $invoice->recipient_phone=$order->recipient_tel;
        $invoice->status=0;
        $invoice->order_id = $order->id;
        $invoice->ended_date=date('Y-m-d');
        $invoice->save();
        return redirect('/invoices/'.$invoice->id);
    }

    public function viewInvoicePage(Request $req,$id){
        $invoice = Invoice::find($id);
        $my_points = Member::find($req->session()->get('user')->member_id)->points;
        if(!$invoice)return view('404');
        if($req->session()->has('user'))
        $carts = Cart::where('member_id', $req->session()->get('user')->member_id)->get();
        else
        $carts=[];
        $used_points = 0;
        if($req->session()->has('user')){
            $used_points = Order::where('member_id', $req->session()->get('user')->member_id)->sum('total');
           
        }     

        $official = Setting::all();
        if(count($official) !=0)
         $data = $official[0]->game_official_site;
        else
          $data = "#";
        return view('invoice', ['used_points'=>$used_points,'total_points'=>$my_points, 'invoice'=>$invoice, 'carts'=>$carts, 'official' => $data]);
    }

    public function signInvoice(Request $req){
        $invoice = Invoice::find($req->invoice_id);
        if(!$invoice)return back()->withErrors(['message'=>'Sorry, something went wrong!']);
        $invoice->status = 1;
        $invoice->save();
        $order= Order::find($invoice->order_id);
        $order->status =3;
        $order->save();
        $filePath = storage_path('/app/public/uploads/invoices/');
        $imageData = explode(';base64,', $req->signature);
        $imageType = explode('image/', $imageData[0])[1];
        $imageBase64 = base64_decode($imageData[1]);
        if(!file_exists($filePath)){
            mkdir($filePath);
        }
        $file = $filePath.''.$invoice->id.'.'.$imageType;
        file_put_contents($file, $imageBase64);

        $official = Setting::all();
        if(count($official) !=0)
         $data = $official[0]->game_official_site;
        else
          $data = "#";
        return back()->withInput(['invoice'=>$invoice, 'official' => $data]);
    }

    public function getOpenCarts(Request $req){
        if($req->session()->has('user'))
        $carts = Cart::where('member_id', $req->session()->get('user')->member_id)->get();
        else
        $carts=[];
        return $carts;
    }

    public function sendMail(Request $req){
        $this->validate($req, [
            'to'=>'required',
            'from'=>'required',
            'title'=>'required',
            'message'=>'required',
        ]);
   
            $details = [
                'title' => $req->title,
                'from' => $req->from,
                'message' => $req->message
            ];
           
            \Mail::to($req->to)->send(new \App\Mail\SupportMail($details));
           
            return back()->with('message', 'We sent your mail');
    }
}

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
use App\Models\OnlineService;
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
        if($req->session()->has('user')){
            $orders = Order::where('member_id', $req->session()->get('user')->user_id)->get();
            foreach($orders as $order){
                $used_points+=$order->total;
            }
        }     
        $banners = Category::all();
        if($req->session()->has('Member'))
        $carts = Cart::where('member_id', $req->session()->get('user')->user_id)->get();
        else $carts = [];

        $best_products = Product::paginate(8);
        /**MISSING */
        $new_products = Product::paginate(8);
        return view('index', ['banners'=>$banners,'used_points'=>$used_points, 'best_products'=>$best_products,'title'=>'Dashboard', 'new_products'=>$new_products, 'carts'=>$carts]);
    }

    public function viewCartPage(Request $req){
        if($req->session()->has('user'))
        $carts = Cart::where('member_id', $req->session()->get('user')->user_id)->get();
        else
        $carts =[];
        $used_points = 0;
        if($req->session()->has('user')){
            $orders = Order::where('member_id', $req->session()->get('user')->user_id)->get();
            foreach($orders as $order){
                $used_points+=$order->total;
            }
        }     
        $selected_points = 0;
        $total_points = 0;
        $my_balace = 0;
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
        return view('cart', ['used_points'=>$used_points,'carts'=>$carts, 'cart_info'=>$cart_info, 'title'=>'Dashboard']);
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
            $carts = Cart::where('user_id', $req->session()->get('user')->user_id)->get();
            else
            $carts = [];
            $used_points = 0;
            if($req->session()->has('user')){
                $orders = Order::where('user_id', $req->session()->get('user')->user_id)->get();
                foreach($orders as $order){
                    $used_points+=$order->total;
                }
            }  
        return view('help', ['help_one'=>$help_one, 'help_two'=>$help_two, 'help_three'=>$help_three, 'help_four'=>$help_four, 'title'=>'Support', 'carts'=>$carts, 'used_points'=>$used_points]);
    }

    // public function viewHelpPage(Request $req){
    //     $help_one = [
    //         (object)['title'=>'关于奖励积分计划', 'content'=>'欢迎来到胜天娱乐奖励积分商'],
    //         (object)['title'=>'关于奖励积分计划', 'content'=>'欢迎来到胜天娱乐奖励积分商'],
    //         (object)['title'=>'关于奖励积分计划', 'content'=>'欢迎来到胜天娱乐奖励积分商'],
    //         (object)['title'=>'关于奖励积分计划', 'content'=>'欢迎来到胜天娱乐奖励积分商'],
    //         (object)['title'=>'关于奖励积分计划', 'content'=>'欢迎来到胜天娱乐奖励积分商'],
    //         (object)['title'=>'关于奖励积分计划', 'content'=>'欢迎来到胜天娱乐奖励积分商'],
    //         (object)['title'=>'关于奖励积分计划', 'content'=>'欢迎来到胜天娱乐奖励积分商'],
    //         (object)['title'=>'关于奖励积分计划', 'content'=>'欢迎来到胜天娱乐奖励积分商'],
    //         (object)['title'=>'关于奖励积分计划', 'content'=>'欢迎来到胜天娱乐奖励积分商'],
    //     ];
    //     $help_two = [
    //         (object)['title'=>'规则与条款', 'contents'=>[
    //             '胜天娱乐保留在任何时间修改商城使用条款和兑换规则的权利',
    //             '会员在使用积分和兑换物品时，若存在任何欺诈行为，或使用任何恶意手段获取利益，违背胜天娱乐商城的使用条款，胜天娱乐拥有冻结或关闭相应账户的权利。 

    //             会员可以使用积分兑换商城中所有的奖品，除非在商城的使用条款中针对参加资格有特别说明。'
    //         ]],
    //     ];
    //     $help_three = [
    //         (object)['title'=>'商城和积分的问题', 'content'=>'积分计划不仅仅是奖励会员的投注行为，更多的是建立在对会员忠诚认同的一种回馈。同时也为阁下提供兑换免费筹码或其他众多
    //         您所喜爱的礼品的乐趣体验。'],
    //         (object)['title'=>'商城和积分的问题', 'content'=>'积分计划不仅仅是奖励会员的投注行为，更多的是建立在对会员忠诚认同的一种回馈。同时也为阁下提供兑换免费筹码或其他众多
    //         您所喜爱的礼品的乐趣体验。'],
    //         (object)['title'=>'商城和积分的问题', 'content'=>'积分计划不仅仅是奖励会员的投注行为，更多的是建立在对会员忠诚认同的一种回馈。同时也为阁下提供兑换免费筹码或其他众多
    //         您所喜爱的礼品的乐趣体验。'],
    //     ];
    //     $help_four = [
    //         (object)['image'=>'assets/img/service/kf2.jpg', 'url'=>'#', 'content'=>'VIP官方客服  莉莉', 'id'=>'15854865'],
    //         (object)['image'=>'assets/img/service/kf2.jpg', 'url'=>'#', 'content'=>'VIP官方客服  莉莉', 'id'=>'15854865'],
    //         (object)['image'=>'assets/img/service/kf2.jpg', 'url'=>'#', 'content'=>'VIP官方客服  莉莉', 'id'=>'15854865'],
    //         (object)['image'=>'assets/img/service/kf2.jpg', 'url'=>'#', 'content'=>'VIP官方客服  莉莉', 'id'=>'15854865'],
    //         (object)['image'=>'assets/img/service/kf2.jpg', 'url'=>'#', 'content'=>'VIP官方客服  莉莉', 'id'=>'15854865'],
    //         (object)['image'=>'assets/img/service/kf2.jpg', 'url'=>'#', 'content'=>'VIP官方客服  莉莉', 'id'=>'15854865'],
    //     ];
    //     $carts = Cart::where('user_id', $req->session()->get('user')->user_id)->get();
    //     $used_points = 0;
    //     if($req->session()->has('user')){
    //         $orders = Order::where('user_id', $req->session()->get('user')->user_id)->get();
    //         foreach($orders as $order){
    //             $used_points+=$order->total;
    //         }
    //     }     
    //     return view('help', ['used_points'=>$used_points,'help_one'=>$help_one, 'help_two'=>$help_two, 'help_three'=>$help_three, 'help_four'=>$help_four, 'carts'=>$carts]);
    // }

    public function viewMinePage(Request $req){
        if($req->session()->has('user'))
        $carts = Cart::where('user_id', $req->session()->get('user')->user_id)->get();
        else
        $carts =[];
        $used_points = 0;
        if($req->session()->has('user')){
            $orders = Order::where('user_id', $req->session()->get('user')->user_id)->get();
            foreach($orders as $order){
                $used_points+=$order->total;
            }
        }     
        $personal_info = (object)[
            'obtained_yesterday_points'=>8586,
            'accumulated_points_permonth'=>186200,
            'total_points'=>84863000,
            'used_points'=>29384,
            'remaining_points'=>498294293,
            'exchanged_goods' => [
                (object)['primary_image'=>'assets/img/product/product1.jpg', 'url'=>'#', 'name'=>'Rolex 格林尼治型 II 机械腕表Rolex 格林尼治型 II 机械腕表', 'color'=>'黑色', 'size'=>'S码', 'price'=>'80,000 积分', 'cart_num'=>'1'],
                (object)['primary_image'=>'assets/img/product/product1.jpg', 'url'=>'#', 'name'=>'Rolex 格林尼治型 II 机械腕表Rolex 格林尼治型 II 机械腕表', 'color'=>'黑色', 'size'=>'S码', 'price'=>'80,000 积分', 'cart_num'=>'1'],
            ]
        ];
            
        $point_details = (object)[
            'total_points'=>434521231,
            'consumed_points'=>23512432352,
            'remaining_points'=>2412342,
            'records'=>[
                (object)['content'=>'捕鱼达人大满贯','date'=>'2023.1.19 22:45','points'=>129382],
                (object)['content'=>'捕鱼达人大满贯','date'=>'2023.1.19 22:45','points'=>129382],
                (object)['content'=>'捕鱼达人大满贯','date'=>'2023.1.19 22:45','points'=>129382],
            ]
        ];

        $my_orders = [
                (object)[
                'content'=>'Rolex 格林尼治型 II  机械腕表等 ',
                'cart_num'=>2,
                'status'=>'已完成',
                'no'=>2324923424,
                'date'=>'2023.3.15 16:21',
                'cart_items'=>[
                    (object)['primary_image'=>'assets/img/product/product1.jpg', 'url'=>'#', 'name'=>'Rolex 格林尼治型 II 机械腕表Rolex 格林尼治型 II 机械腕表', 'color'=>'黑色', 'size'=>'S码', 'price'=>'80,000 积分', 'cart_num'=>'1'],
                    (object)['primary_image'=>'assets/img/product/product1.jpg', 'url'=>'#', 'name'=>'Rolex 格林尼治型 II 机械腕表Rolex 格林尼治型 II 机械腕表', 'color'=>'黑色', 'size'=>'S码', 'price'=>'80,000 积分', 'cart_num'=>'1'],
                ],
                'points'=> 35238,
                'delivery_info'=> '',
                'supplier'=>'王某某',
                'supplier_phone'=> '138 4000 8888',
                'supplier_address'=> '辽宁省 沈阳市 大东区 xxxx xxxxx小区102',
                'express_no'=> 'SF1569422654892226',
                'events'=>[
                    (object)['date'=>'3.16 09:49', 'content'=>'快递达到辽宁中转站'],
                    (object)['date'=>'3.16 09:49', 'content'=>'快递达到辽宁中转站'],
                ]
                ],
                (object)[
                    'content'=>'格林尼治型 II  机械腕表等',
                    'cart_num'=>2,
                    'status'=>'待收货',
                    'no'=>2324923424,
                    'date'=>'2023.3.15 16:21',
                    'cart_items'=>[
                        (object)['primary_image'=>'assets/img/product/product1.jpg', 'url'=>'#', 'name'=>'Rolex 格林尼治型 II 机械腕表Rolex 格林尼治型 II 机械腕表', 'color'=>'黑色', 'size'=>'S码', 'price'=>'80,000 积分', 'cart_num'=>'1'],
                        (object)['primary_image'=>'assets/img/product/product1.jpg', 'url'=>'#', 'name'=>'Rolex 格林尼治型 II 机械腕表Rolex 格林尼治型 II 机械腕表', 'color'=>'黑色', 'size'=>'S码', 'price'=>'80,000 积分', 'cart_num'=>'1'],
                    ],
                    'points'=> 35238,
                    'delivery_info'=> '',
                    'supplier'=>'王某某',
                    'supplier_phone'=> '138 4000 8888',
                    'supplier_address'=> '辽宁省 沈阳市 大东区 xxxx xxxxx小区102',
                    'express_no'=> 'SF1569422654892226',
                    'events'=>[
                        (object)['date'=>'3.16 09:49', 'content'=>'快递达到辽宁中转站'],
                        (object)['date'=>'3.16 09:49', 'content'=>'快递达到辽宁中转站'],
                    ]
                ]
        ];

        $orders = Order::all();

        return view('mine', ['used_points'=>$used_points,'personal_info'=>$personal_info, 'point_details'=>$point_details, 'my_orders'=>$orders, 'carts'=>$carts]);
    }

    public function viewOrderBackPage(Request $req, $id){
        $order = Order::find($id);
        if(!$order)return view('404');

        if($req->session()->has('user'))
        $carts = Cart::where('user_id', $req->session()->get('user')->user_id)->get();
        else
        $carts=[];

        $used_points = 0;
        if($req->session()->has('user')){
            $orders = Order::where('user_id', $req->session()->get('user')->user_id)->get();
            foreach($orders as $order){
                $used_points+=$order->total;
            }
        }     
        
        $my_points = 0;

        $order_info = (object)[
            'no'=>$order->id,
            'consumption_points'=>$order->total,
            'your_balance'=>$my_points
        ];
        return view('order-back', ['used_points'=>$used_points,'order_info'=>$order_info, 'carts'=>$carts]);
    }
    
    public function viewNewOrderPage(Request $req){
        if($req->session()->has('user'))
        $carts = Cart::where('user_id', $req->session()->get('user')->user_id)->get();
        else
        $carts=[];
        if($req->session()->has('user'))
        $carts_ = Cart::where('checked',1)->where('user_id', $req->session()->get('user')->user_id)->get();
        else
        $carts_=[];
        $total_points = 0;
        $my_points = 0;
        foreach($carts_ as $cart){
            $total_points+=$cart->quantity*$cart->product->points;
        }        
        $book_keeping = (object)[
            'total_order'=>$total_points,
            'my_scores'=>$my_points,
            'need_scores'=>$my_points<$total_points?$total_points-$my_points:0
        ];
        $used_points = 0;
        if($req->session()->has('user')){
            $orders = Order::where('user_id', $req->session()->get('user')->user_id)->get();
            foreach($orders as $order){
                $used_points+=$order->total;
            }
        }     
        return view('new-order', ['used_points'=>$used_points,'carts'=>$carts, 'carts_'=>$carts_, 'book_keeping'=>$book_keeping]);
    }
    
    public function viewProductDetailsPage(Request $req, $id){
        $product_ = Product::find($id);
        if(!$product_)return view('404');

        $used_points = 0;
        if($req->session()->has('user')){
            $orders = Order::where('user_id', $req->session()->get('user')->user_id)->get();
            foreach($orders as $order){
                $used_points+=$order->total;
            }
        }     
        if($req->session()->has('user'))
        $carts = Cart::where('user_id', $req->session()->get('user')->user_id)->get();
        else 
        $carts = [];
        $product = (object)[
            'id'=>$product_->id,
            'name'=>$product_->name,
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
        
        return view('product-details', ['used_points'=>$used_points,'product'=>$product, 'carts'=>$carts, 'exchange_records'=>[], 'help_one'=>$help_one, 'help_two'=>$help_two, 'help_three'=>$help_three, 'help_four'=>$help_four]);
    }
    
    public function viewProductListPage(Request $req){
        $used_points = 0;
        if($req->session()->has('user')){
            $orders = Order::where('user_id', $req->session()->get('user')->user_id)->get();
            foreach($orders as $order){
                $used_points+=$order->total;
            }
        }    
        if($req->session()->has('user')) 
        $carts = Cart::where('user_id', $req->session()->get('user')->user_id)->get();
        else
        $carts=[];
        if($req->input('type'))
        $products = Product::where('category_id', $req->input('type'))->paginate(8);
        else
        $products = Product::paginate(8);
        return view('product-list', ['used_points'=>$used_points,'products'=>$products, 'carts'=>$carts]);
    }

    /**
     * TEST LOGIN
     */
    public function viewLoginPage(){

        return view('login',['carts'=>[]]);
    }

    public function addCart(Request $req){
        $cart = new Cart;
        $cart->user_id=1;
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
        $carts = Cart::where('user_id', $req->session()->get('user')->user_id)->get();
        else
        $carts=[];

        $selected_carts = $req->input('carts');
       
        foreach($carts as $cart){
            foreach($selected_carts as $sc){
                if($cart->id==$sc['id']){
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
        $carts = Cart::where('checked',1)->where('user_id', $req->session()->get('user')->user_id)->get();
        else
        $carts=[];
        $consump_points = 0;
        foreach($carts as $cart){
            $consump_points += $cart->quantity*$cart->product->points;
        }
        if($consump_points>$req->session()->get('user')->bet_amount)
        return back()->withErrors(['message'=>'Not enough bet amounts!']);
        $newOrder= new Order;
        $newOrder->user_id=$req->session()->get('user')->user_id;
        $newOrder->recipient_name=$req->input('name');
        $newOrder->recipient_tel=$req->input('tel');
        $newOrder->recipient_address=$req->input('address');
        $newOrder->total = 0;
        $newOrder->save();
        $status = 1;
        foreach($carts as $cart){
            $newOrderProduct = new OrderProduct;
            $newOrderProduct->product_id=$cart->product->id;
            $newOrderProduct->quantity = $cart->quantity;
            $newOrderProduct->color = $cart->color;
            $newOrderProduct->size = $cart->size;
            $newOrderProduct->order_id=$newOrder->id;
            $newOrderProduct->save();
            if($newOrderProduct->quantity>$newOrderProduct->product->quantity){
                $status = 0;
            }
            $cart->delete();
        }
        $newOrder->status = $status;
        $newOrder->total = $consump_points;
        $newOrder->save();
        \Storage::disk('public')->put('uploads/orders/qrcode_'.$newOrder->id.'.png',base64_decode(DNS2D::getBarcodePNG(md5($newOrder->id.'shengtian'), "QRCODE")));
        $order_info = (object)[
            'no'=>$newOrder->id,
            'consumption_points'=>$consump_points,
            'your_balance'=>1000000
        ];
        return redirect('order-back/'.$newOrder->id );
    }

    public function viewIdentifyByQRCodePage(){
        return view('identify-by-qr',['carts'=>[]]);
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
            $invoice->user_id = $order->user_id;
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
            $req->session()->put('qrcode',$order->user_id);
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
        $invoice->user_id = $req->session()->get('user')->user_id;
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
        if(!$invoice)return view('404');
        if($req->session()->has('user'))
        $carts = Cart::where('user_id', $req->session()->get('user')->user_id)->get();
        else
        $carts=[];
        $used_points = 0;
        if($req->session()->has('user')){
            $orders = Order::where('user_id', $req->session()->get('user')->user_id)->get();
            foreach($orders as $order){
                $used_points+=$order->total;
            }
        }     
        return view('invoice', ['used_points'=>$used_points,'invoice'=>$invoice, 'carts'=>$carts]);
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
        return back()->withInput(['invoice'=>$invoice]);
    }

    public function getOpenCarts(Request $req){
        if($req->session()->has('user'))
        $carts = Cart::where('user_id', $req->session()->get('user')->user_id)->get();
        else
        $carts=[];
        return $carts;
    }


}

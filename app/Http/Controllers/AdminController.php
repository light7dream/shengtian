<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Order;
use App\Models\Sender;
use App\Models\Stock;
use App\Models\Invoice;
use App\Models\About;
use App\Models\Rule;
use App\Models\Quiz;
use App\Models\OnlineService;
use App\Models\Member;

use Image;

class AdminController extends Controller
{
    public function index(){
           
        return view('admin.index', ['title'=>'Dashboard']);
    }

    public function viewProductsPage(Request $req){

        $title = 'Products Listing';
        if(!isset($req->type))
        $products = Product::all();
        else{
            if($req->type == 0){
                $products = Product::where('category_id', 0)->get();
            }
            else if($req->type == 1){
                $products = Product::where('category_id', 1)->get();
            }
            else if($req->type == 2){
                $products = Product::where('category_id', 2)->get();
            }
            else if($req->type == 3){
                $products = Product::where('category_id', 3)->get();
            }
            else{
                $products = [];
            }
        }
        return view('admin.ecommerce.catalog.products', [
            'title'=>$title,
            'products'=>$products
        ]);
    }

    public function viewAddProductPage(){
        $title = 'Add Product';
        $categories = Category::all();
        return view('admin.ecommerce.catalog.add-product', [
            'title'=>$title,
            'categories'=>$categories,
        ]);
    }

    public function viewEditProductPage($id){
        $title = 'Edit Product';
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.ecommerce.catalog.edit-product', [
            'title'=>$title,
            'product'=>$product,
            'categories'=>$categories
        ]);
    }

    public function viewCategoriesPage(){
        $title = 'Categories Listing';
        $categories = Category::all();
        return view('admin.ecommerce.catalog.categories', [
            'title'=>$title,
            'categories'=>$categories,
        ]);
    }

    public function viewAddCategoryPage(){
        $title  =  'Add Category';
        return view('admin.ecommerce.catalog.add-category', ['title' => $title]);
    }

    public function viewEditCategoryPage($id){
        $title = 'Edit Category';
        $category = Category::find($id);
        return view('admin.ecommerce.catalog.edit-category', [
            'title'=>$title,
            'category'=>$category
        ]);
    }

    public function viewReportsPage(){
        $title = 'Reports';
        return view('admin.ecommerce.reports.view', ['title'=>$title]);
    }

    public function viewSalesPage(Request $req){
        $orders = Order::all();
        foreach($orders as $order){
            if($order->status == 0){
                $status = 0;
                foreach($order->order_products as $op){
                    if($op->quantity < $op->product->quantity){
                        $status = 1;
                        break;
                    }
                }
                $order->status = $status;
            }
        }
        $title = 'Sales Listing';
        return view('admin.ecommerce.sales.listing', ['orders'=>$orders, 'status'=>$req->status, 'title'=>$title]);
    }

    public function viewAddOrderPage(){
        $title = 'Add Order';
        return view('admin.ecommerce.sales.add-order', ['title'=>$title]);
    }

    public function viewOrderDetailsPage($id){
        $order = Order::find($id);
        $title = 'Order details';
        $senders = Sender::all();
        return view('admin.ecommerce.sales.details', ['order'=>$order, 'senders'=>$senders, 'title'=>$title]);
    }

    public function viewEditOrderPage($id){
        $order = Order::find($id);
        if($order){
            if($order->status == 0){
                $status = 0;
                foreach($order->order_products as $op){
                    if($op->quantity < $op->product->quantity){
                        $status = 1;
                        break;
                    }
                }
                $order->status = $status;
            }
        }
        $title = 'Edit Order';
        return view('admin.ecommerce.sales.edit-order', ['order'=>$order, 'title'=>$title]);
    }

    public function viewInvoicePage($id){
        $invoice= Invoice::find($id);
        if(!$invoice)return '';
        $title = 'Invoice';
        return view('admin.invoices.view.invoice-3', ['invoice'=>$invoice, 'title'=>$title]);
    }

    public function viewCreateInvoicePage(){
        $title = 'Add Invoice';
        return view('admin.invoices.create', ['title'=>$title]);
    }

    public function viewAboutPointsPage(){
        $title = 'About Points';
        return view('admin.supports.about-points', ['title'=>$title]);
    }

    public function viewRuleClausePage(){
        $title = 'Rule Clause';
        return view('admin.supports.rule-clause', ['title'=>$title]);
    }

    public function viewFAQPage(){
        $title = 'FAQ';
        $faqs = Quiz::all();
        return view('admin.supports.faq', ['title'=>$title, 'faqs'=>$faqs]);
    }

    public function viewOnlineServicePage(){
        $title = 'Online Service';
        $data = OnlineService::all();
        return view('admin.supports.online-service',  ['title'=>$title, 'services'=>$data]);
    }


    public function viewAddSenderPage(){
        $title='Add a sender';
        return view('admin.ecommerce.senders.add-sender', [
            'title'=>$title
        ]);
    }

    public function viewEditSenderPage($id){
        $title = 'Edit Sender';
        $sender = Sender::find($id);
        return view('admin.ecommerce.senders.edit-sender', ['sender'=>$sender, 'title'=>$title]);
    }

    public function viewAccountSettingsPage(Request $req){
        $title = 'Account Setting';
        return view('admin.account.setting', ['title'=>$title]);
    }
    
    public function viewOverviewPage(Request $req){
        $title = 'Overview';
        return view('admin.account.overview', ['title'=>$title]);
    }
    
    public function viewSecurityPage(Request $req){
        $title = 'Security';
        return view('admin.account.security', ['title'=>$title]);
    }

    public function viewMembersPage(Request $req){
        $members = Member::all();
        return view('admin.ecommerce.members.listing', ['members'=>$members, 'title'=>'Members Listing']);
    }

    public function viewEditMemberPage($id){
        $member = Member::find($id);
        if(!$member)return view('404');
        return view('admin.ecommerce.members.edit-member', ['member'=>$member, 'title'=>'Edit a member']);
    }

    public function addMember(Request $req){
        $this->validate($req, [
            'name'=>'required',
            'password'=>'required',
            'points'=>'required'
        ]);
        $member = new Member;
        $member->name=$req->name;
        $member->password= $req->password;
        $member->points = $req->points;
        $member->last_exchange_at = date('Y-m-d');
        $member->save();
    }

    public function editMember(Request $req){
        $this->validate($req, [
            'id'=>'required'
        ]);

        $member = Member::find($req->id);
        if(!$member)return view('404');
        $member->name=$req->member_name;
        $member->password= $req->member_password;
        $member->created_at = $req->member_created_at;
        $member->last_exchange_at = $req->member_last_exchange_at;
        $member->points = $req->member_total_points;
        $member->used_points = $req->member_used_points;
        $member->save();
    }

    public function deleteMember(Request $req){
        $this->validate($req, [
            'id'=>'required'
        ]);

        Member::where('id', $req->id)->delete();
    }


    /**
     * 
     * API
     * 
     */

    public function deleteDir($dirPath){
        if (!is_dir($dirPath)) {
            throw new InvalidArgumentException("$dirPath must be a directory");
        }
        if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
            $dirPath .= '/';
        }
        $files = glob($dirPath . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                self::deleteDir($file);
            } else {
                unlink($file);
            }
        }
        rmdir($dirPath);
    }

    public function addCategory(Request $req){
        $this->validate($req, [
            'category_name' => 'required',
            'category_description'=>'required',
            'category_image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);
        $newCateory = new Category;
        $newCateory->name = $req->input('category_name');
        $newCateory->description = $req->input('category_description');
        $result = $newCateory->save();
        if($result){
            if($req->hasFile('category_image')){
                $image = $req->file('category_image');
                $destinationPath = storage_path('/app/public/uploads/catalog/categories/'.$newCateory->id);
                if(!file_exists($destinationPath))
                    mkdir($destinationPath, 0777, true);
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/main.png');
            }
            return ';)';
        }
        return ';(';
    }

    public function editCategory(Request $req){
        $this->validate($req, [
            'id' => 'required',
        ]);
        $category = Category::find($req->id);
        if(!is_null($category)){
            if($req->input('category_name'))
            $category->name= $req->input('category_name');
            if($req->input('category_description'))
            $category->description= $req->input('category_description');
            $result = $category->save();
            if($result)
            {
                if($req->hasFile('category_image')){
                    $image = $req->file('category_image');
                    $destinationPath = storage_path('/app/public/uploads/catalog/categories/'.$category->id);
                    if(!file_exists($destinationPath))
                        mkdir($destinationPath,0777, true);
                    $imgFile = Image::make($image->getRealPath());
                    $imgFile->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/main.png');
                }
                return ';)';
            }
        }
        
        return ';(';
        
    }

    public function deleteCategory(Request $req){
        $category = Category::find($req->id);
        if(!is_null($category)){
            $dirPath = storage_path('/app/public/uploads/catalog/categories/').$category->id;
            $this->deleteDir($dirPath);
            $category->delete();
            return ';)';
        }else{
            return ';(';
        }
    }

    public function addProduct(Request $req){
         
        $this->validate($req, [
            'product_name' => 'required',
            'product_description'=>'required',
            'product_price'=>'required',
            'product_category'=>'required',
            'product_quantity'=>'required',
            'mainImage'=>'required'
        ]);       

        $newProduct = new Product;
        $newProduct->name=$req->input('product_name');
        $newProduct->description=$req->input('product_description');
        $newProduct->points=$req->input('product_price');
        $newProduct->category_id=$req->input('product_category');
        $newProduct->sizes=$req->input('product_sizes');
        $newProduct->quantity=$req->input('product_quantity');
        $newProduct->colors=$req->input('product_colors');
        $result = $newProduct->save();

        if($result)
        {
            $destinationPath = storage_path('/app/public/uploads/catalog/products/'.$newProduct->id);
            if(!file_exists($destinationPath))
                mkdir($destinationPath,0777, true);

            if($req->hasFile('mainImage')){
                $image = $req->file('mainImage');
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/main.png');
            }
            if($req->hasFile('subImages'))
            {
                $files = $req->file('subImages');
                foreach($files as $key => $file){
                    $imgFile = Image::make($file->getRealPath());
                    $imgFile->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/sub'.$key.'.png');
                }
            }
            return ';)';
        }
        return ';(';
    }

    public function editProduct(Request $req){
        $product = Product::find($req->id);

        if(!is_null($product)){

            $product->name=$req->input('product_name');
            $product->description=$req->input('product_description');
            $product->points=$req->input('product_price');
            $product->quantity=$req->input('product_quantity');
            $product->category_id=$req->input('product_category');
            $sizes = array_filter($req->input('product_sizes'), function($k){
                return $k!=null;
            });
            $colors = array_filter($req->input('product_colors'), function($k){
                return $k!=null;
            });
            $product->sizes=$sizes;
            $product->colors=$colors;
            $product->save();

            $destinationPath = storage_path('/app/public/uploads/catalog/products/'.$product->id);
            if(!file_exists($destinationPath))
                mkdir($destinationPath,0777, true);
            if($req->hasFile('mainImage')){
                $image = $req->file('mainImage');
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/main.png');
            }
            if($req->input('mainImage_remove')) {
                if(file_exists($destinationPath.'/main.png'))
                    unlink($destinationPath.'/main.png');
            }
            if($req->hasFile('subImages'))
            {
                $files = $req->file('subImages');
                foreach($files as $key => $file){
                    if($file){
                        $imgFile = Image::make($file->getRealPath());
                        $imgFile->resize(400, 400, function ($constraint) {
                            $constraint->aspectRatio();
                        })->save($destinationPath.'/sub'.$key.'.png');
                    }
                }
            }
            foreach($req->input('subImage_removes') as $key => $value){
                if($value){
                    if(file_exists($destinationPath.'/sub'.$key.'.png'))
                            unlink($destinationPath.'/sub'.$key.'.png');
                }
            }
            return ';)';
        }
        return ';(';
    }

    public function deleteProduct(Request $req){
        $product = Product::find($req->id);
        if(!is_null($product)){
            $dirPath = storage_path('/app/public/uploads/catalog/categories/').$product->id;
            $this->deleteDir($dirPath);
            $product->delete();
            return ';)';
        }else{
            return ';(';
        }
    }

    public function editOrder(Request $req){
        $order = Order::find($req->id);
        if($order){
            $order->status = $req->status;
            $order->save();
        }
        return ';)';
    }

    public function deleteOrder(Request $req){
        $order = Order::find($req->id);
        if($order){
            $dirPath = storage_path('/app/public/uploads/orders/qrcode_').$order->id.'.png';
            if(file_exists($dirPath))
            unlink($dirPath);
            $order->delete();
        }
        return ';)';
    }
    
    public function deliver(Request $req){
        $this->validate($req, [
            'id'=>'required',
            'sender'=>'required'
        ]);
        $order = Order::find($req->id);
        if($order){
            $order->sender_id = $req->sender;
            $order->status=2;
            $order->save();
            foreach($order->order_products as $op){
                $product = Product::find($op->product_id);
                if($product){
                    $product->quantity -= $op->quantity;
                    $product->save();
                }
            }
        }
        return redirect('/admin/sales/orders?status=2');
    }

    public function addSender(Request $req){
        $this->validate($req, [
            'sender_name'=>'required',
            'sender_address'=>'required',
            'sender_phone'=>'required'
        ]);
        $sender = new Sender;
        $sender->name=$req->sender_name;
        $sender->phone=$req->sender_phone;
        $sender->address=$req->sender_address;
        $result = $sender->save();
        if($result){
            if($req->hasFile('sender_image')){
                $image = $req->file('sender_image');
                $destinationPath = storage_path('/app/public/uploads/members/senders/');
                if(!file_exists($destinationPath))
                    mkdir($destinationPath, 0777, true);
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.''.$sender->id.'.png');
            }
            return ';)';
        }
        return ';(';
    }

    public function editSender(Request $req){
        $this->validate($req, [
            'id' => 'required',
        ]);
        $sender = Sender::find($req->id);
        if(!is_null($sender)){
            if($req->input('sender_name'))
            $sender->name= $req->input('sender_name');
            if($req->input('sernder_phone'))
            $sender->phone= $req->input('sender_phone');
            if($req->input('sernder_address'))
            $sender->address= $req->input('sender_address');
            $result = $sender->save();
            if($result)
            {
                if($req->hasFile('sender_image')){
                    $image = $req->file('sender_image');
                    $destinationPath = storage_path('/app/public/uploads/members/senders/');
                    if(!file_exists($destinationPath))
                        mkdir($destinationPath,0777, true);
                    $imgFile = Image::make($image->getRealPath());
                    $imgFile->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.''.$sender->id.'.png');
                }
                return ';)';
            }
        }
        
        return ';(';
    }

    public function deleteSender(Request $req){
        $sender = Sender::find($req->id);
        if(!is_null($sender)){
            $dirPath = storage_path('/app/public/uploads/members/senders/').$sender->id.'.png';
            if(file_exists($dirPath))
            unlink($dirPath);
            $sender->delete();
            return ';)';
        }else{
            return ';(';
        }
    }

    public function aboutPoint(Request $req){
        $content = About::all();
        $data = new About;

        if(count($content) ==0)
        {
            $data->content = $req -> content;
            $data->save();
            return  "created";
        } 
        else{        
              $id =  $content[0]->id;
               $new_data =  About::find($id);
               $new_data->content = $req->content;
               $new_data->save();
            return  "updated";
        }
    }

    public function getAboutContent(){
        $content = About::all();
        if(count($content) ==0)
            return  null;
        else       
            return  $content[0]->content;
    }
    
    public function rulesAndClauses(Request $req){
        $content = Rule::all();
        $data = new Rule;

        if(count($content) ==0)
        {
            $data->content = $req -> content;
            $data->save();
            return  "created";
        } 
        else{        
              $id =  $content[0]->id;
               $new_data =  Rule::find($id);
               $new_data->content = $req->content;
               $new_data->save();
            return  "updated";
        }
    }
  
    public function getRulesAndClauses(){
        $content = Rule::all();
        if(count($content) ==0)
            return  null;
        else       
            return  $content[0]->content;
    }

    public function addFaq(Request $req){

        $data = new Quiz;
        $data->question = $req->question;
        $data->answer = $req->answer;
        $data->save();
        return  'added';
    }

    public function deleteFaq(Request $req){
        $id = $req->id;
        Quiz::where('id', $id)->delete();
        return ';)';
    }

    public function editFaq(Request $req){
        $id = $req->id;
        $quiz = Quiz::find($id);
        if(!$quiz) return ';(';
        $quiz->question = $req->question;
        $quiz->answer = $req->answer;
        $quiz->save();
        return ';)';
    }

    public function getAllFaq(){
        $content = Quiz::all();
        if(count($content) ==0)
            return  null;
        else       
            return  $content;
    }

    public function addOnlineService(Request $req){
        $this->validate($req, [
            'service_name' => 'required',
            'service_email'=>'required',
            'service_description'=>'required'
        ]);
        $newService = new OnlineService;
        $newService->name = $req->input('service_name');
        $newService->email = $req->input('service_email');
        $newService->description = $req->input('service_description');
        $result = $newService->save();
        if($result){
            if($req->hasFile('avatar')){
                $image = $req->file('avatar');
                $destinationPath = storage_path('/app/public/uploads/service');
                if(!file_exists($destinationPath))
                mkdir($destinationPath,0777, true);
                $imgFile = Image::make($image->getRealPath());
                $imgFile->resize(400, 400, function ($constraint) {
                    $constraint->aspectRatio();
                })->save($destinationPath.'/'.$newService->id.'.png');
            }
            return ';)';
        }
        return "(;";
    }

    public function editOnlineService(Request $req){
      
        $this->validate($req, [
            'id' => 'required',
        ]);
        $service = OnlineService::find($req->id);
        if(!is_null($service)){
            if($req->input('service_name'))
            $service->name= $req->input('service_name');
            if($req->input('service_email'))
            $service->email= $req->input('service_email');
            if($req->input('service_description'))
            $service->description= $req->input('service_description');
            $result = $service->save();
            if($result)
            {
                $destinationPath = storage_path('/app/public/uploads/service');
                if($req->hasFile('avatar')){
                    $image = $req->file('avatar');
                    if(!file_exists($destinationPath))
                        mkdir($destinationPath,0777, true);
                    $imgFile = Image::make($image->getRealPath());
                    $imgFile->resize(400, 400, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/'.$service->id.'.png');
                }
                else{
                    unlink($destinationPath.'/'.$service->id.'.png');
                }
                return ';)';
            }
        }
        
        return ';(';
    }

    public function deleteOnlineService(Request $req) {
        $this->validate($req, [
            'id' => 'required',
        ]);
        $service = OnlineService::find($req->id);
        if($service){
            $service->delete();
            $destinationPath = storage_path('/app/public/uploads/service');
            $file =$destinationPath.'/'.$service->id.'.png';
            if(file_exists($file))
            unlink($file);
            return ';)';
        }
        return ';(';
    }

}

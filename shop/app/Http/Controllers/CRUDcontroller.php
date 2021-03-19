<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;

use Illuminate\Pagination\Paginator;

use App\Category;

use App\Product;

use App\Categories_Product;

use App\User;

use Carbon\Carbon;

class CRUDcontroller extends Controller
{
	
	//ТУТ НЕМНОГО НЕ УСПЕЛ ДОДЕЛАТЬ - НО ЗНАЮ КАК РЕАЛИЗОВАТЬ
/*
	public function login(Request $request) {
	    
	    
	    $test = $request->input('User_Id');
	    

		if (Session::has('user_id')) {
			
		  if($test==null){
		    
		    $user_id =  Session::get('user_id', 0);
		     $password = Session::get('password', 0);
		  }
		  else{
			   $user_id = $request->input('User_Id');
			   $password = $request->input('Password');
			Session::forget('user_id');
			Session::forget('password');
			   
			Session::put('user_id', $user_id);
		    Session::put('password', $password);
			   
		  }
	    }
	    
	    else{
		    $user_id = $request->input('User_Id');
		    $password = $request->input('Password');
		    
		    
		    Session::put('user_id', $user_id);
		    Session::put('password', $password);
		    
	    }
	    
	    $user_info = User::where('id', $user_id)->first();
	    if($user_info && Hash::check($password, $user_info->password)) {
		    		    

		      return view('user_page.get_products', ['data' => $user_info] );
		    
		    
		} 
		else {
		    return redirect()->route('main')->with('wrong', 'Проверьте правильность введенных данных');
		}
	    
	    
	    
    }
*/
	
	
	
	public function checkAndGet(Request $request){


		$all_categories = DB::table('categories')
    	->select('categories.*')
    	->orderBy('name', 'asc')
    	->get();
    	
    	
    	$name_input;
		$category_select;
		$price_select;
		$date_select;
    	
    	
    	if (Session::has('name_input')) {


			if($request->input('name_input')==null && $request->input('category_select') == null && $request->input('price_select') == null && $request->input('date_select') == null){
				$name_input = Session::get('name_input');
				$category_select = Session::get('category_select'); 
				$price_select = Session::get('price_select');
				$date_select = Session::get('date_select');
			}
			else{
				Session::forget('name_input');
				Session::forget('сategory_select');
				Session::forget('price_select');
				Session::forget('date_select');
	
				$name_input = $request->input('name_input');
				$category_select = $request->input('category_select');
				$price_select = $request->input('price_select');
				$date_select = $request->input('date_select');
	
	
			    Session::put('name_input', $name_input);
				Session::put('category_select', $category_select);
				Session::put('price_select', $price_select);
				Session::put('date_select', $date_select);
			}

	    }
	    else{
			$name_input = '';
			$category_select = 'all';
			$price_select = 'all';
			$date_select = 'all';

			Session::put('name_input', $name_input);
			Session::put('category_select', $category_select);
			Session::put('price_select', $price_select);
			Session::put('date_select', $date_select);

	    }
    	
    	
    	
			
			
		$choosed_filter = array($name_input, $category_select, $price_select, $date_select);


		$where_filter = array(['products.name', 'like', '%'.$name_input.'%']);

/*
		if ($category_select != 'all') {
			$where_filter = array_push($where_filter, ['category_id', '=', intval($category_select)]);
		}
*/

		$all_products = DB::table('categories__products')
		->join('products', 'categories__products.product_id', '=', 'products.id')
		->join('categories', 'categories__products.category_id', '=', 'categories.id')
		->select('products.*', 'categories.name as category_name', 'categories.id as category_id')
		->where($where_filter);

		if ($price_select != 'all') {
			$all_products = $all_products
			->orderBy('price_rub', $price_select);
		}

		if ($date_select != 'all') {
			$all_products = $all_products
			->orderBy('products.created_at', $date_select);
		}

		$all_products = $all_products
		->paginate(50);

		return view('user_page.get_products',['all_products' => $all_products, 'all_categories' => $all_categories, 'choosed_filter' => $choosed_filter]);

	    
    }

    public function getcategoryPage(){
	  $all_categories = DB::table('categories')
    	->select('categories.*')
    	->orderBy('name', 'asc')
    	->get();
	  
	  
	  
	  $all_products = DB::table('categories__products')
		->join('products', 'categories__products.product_id', '=', 'products.id')
		->join('categories', 'categories__products.category_id', '=', 'categories.id')
		->select('products.*', 'categories.name as category_name', 'categories.id as category_id')
		->get();
    	
	  
	  
	  return view('user_page.get_categories',['all_categories' => $all_categories, 'all_products' => $all_products]);
    }
    
    
    public function deleteCategory(Request $request){
	    
	  DB::delete('delete from categories__products where category_id = ?', [$request->input('deleteCategory')]);
	  DB::delete('delete from categories where id = ?', [$request->input('deleteCategory')]);
	  
	  session()->flash('flash_message', '!!Категория '.$request->input('deleteCategory').' была удалена!!');	  
	  return redirect()->route('get_categories');
    }
    
    public function createCategory(Request $request){
		
		
		$category = new Category();
		$category->name = $request->input('name');
		$category->parent_category_id = $request->input('parent_id'); 
		$category->external_id = $request->input('external_id');
		
		$category->save();
	
		
			  
	  session()->flash('flash_message', '!!Категория '.$request->input('name').' была добавлена!!');	  
	  return redirect()->route('get_categories');
    }
    
    
    public function createProduct(Request $request){
		
		
		$product = new Product();
		$product->name = $request->input('name');
		$product->description = $request->input('description');
		$product->price_rub = $request->input('price_rub');
		$product->remainder = $request->input('remainder');
// 		$product->created_at = date('Y-m-d');
		$product->external_id = $request->input('external_id');
		
		$product->save();
	
		
			  
	  session()->flash('flash_message', '!!Товар '.$request->input('name').' был добавлен!!');	  
	  return redirect()->route('get_products');
    }


    
    
    
    
    
    
    public function deleteProduct(Request $request){
	   
	  DB::delete('delete from categories__products where product_id = ?', [$request->input('deleteProduct')]); 
	    
	  DB::delete('delete from products where id = ?', [$request->input('deleteProduct')]);   
	    
	  session()->flash('flash_message', '!!Товар '.$request->input('deleteProduct').' был удален!!');	  
	  return redirect()->route('get_products');

    }
    
    
    
    public function updateCategory(Request $request){
	    
	    $date = Carbon::now()->format('Y-m-d H:i:s');
	  DB::update('update categories set name = ?, updated_at = ?, parent_category_id = ?, external_id = ?  where Id = ?', [$request->input('modal_name'), $date, $request->input('modal_parent_id'), $request->input('modal_external_id'), $request->input('modal_id')]);  
	    
	  session()->flash('flash_message', '!!Категория с id = '.$request->input('modal_id').' была обновлена!!');	  
	  return redirect()->route('get_categories');

    }

   






}


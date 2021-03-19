@extends('user_page_layout')

@section('title-block')
Get Products
@endsection

@section('custom-style-block')
<style>
  header{
	  background-color: #ffffff;
	}
	body{
	  background-color: rgba(0, 0, 0, .85);	
	}
	  .flex-equal > * {
	  -ms-flex: 1;
	  flex: 1;
	}
	@media (min-width: 768px) {
	  .flex-md-equal > * {
	    -ms-flex: 1;
	    flex: 1;
	  }
	}
	
	.overflow-hidden { overflow: hidden; }
	

	  .form-signin {
	  width: 100%;
	  max-width: 330px;
	  padding: 15px;
	  margin: auto;
	}

	.form-signin .form-control {
	  position: relative;
	  box-sizing: border-box;
	  height: auto;
	  padding: 10px;
	  font-size: 16px;
	}
	.form-signin .form-control:focus {
	  z-index: 2;
	}
	.form-signin input[type="number"] {
/*
	  margin-bottom: -1px;
	  border-bottom-right-radius: 0;
	  border-bottom-left-radius: 0;
	  -moz-appearance: textfield;
*/
	  -webkit-inner-spin-button
	}
	.form-signin input[type="number"]::-webkit-inner-spin-button { 
		display: none;
	}
	.form-signin input[type="password"] {
/*
	  margin-bottom: 10px;
	  border-top-left-radius: 0;
	  border-top-right-radius: 0;
*/
	}
	
	
/*
	.password {
	position: relative;
	}
*/
	.password-control {
		position: absolute;
		top: 40px;
		right: 23px;
		display: inline-block;
		width: 20px;
		height: 20px;
		background: url(http://bigproject.std-1055.ist.mospolytech.ru/img/forPassword/view.svg) 0 0 no-repeat;
	}
	.password-control.view {
		background: url(http://bigproject.std-1055.ist.mospolytech.ru/img/forPassword/noview.svg) 0 0 no-repeat;
	}
	

	.navbar {
	  background-color: rgba(0, 0, 0, .85);
	  -webkit-backdrop-filter: saturate(180%) blur(20px);
	  backdrop-filter: saturate(180%) blur(20px);
	}
	#card{
		 background-color: rgb(37 37 37);
	  -webkit-backdrop-filter: saturate(180%) blur(20px);
	  backdrop-filter: saturate(180%) blur(20px);
	
	}
	.navbar a {
	  color: #999;
	  transition: ease-in-out color .15s;
	}
	.navbar a:hover {
	  color: #fff;
	  text-decoration: none;
	}
	#center{
		text-align: center;
	}

/*
	li:not(.nav-item){
	border: 1px double #e4e8eb;
    padding: 7px;
    border-radius: 10px;
    margin-left: 3px;
    margin-right: 3px;
    width: 40px;
    text-align: center;
	}
*/
	}


</style>
@endsection



@section('li-blocks')
			  <li class="nav-item">
	            <a class="nav-link active" href="{{ route('get_products') }}" style="color: #ffffff">
	              <span data-feather="home"></span>
	              Все товары
	              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
  <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659l4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
</svg><span class="sr-only">(current)</span>
	            </a>
	          </li>
			  <li class="nav-item">
	            <a class="nav-link"  href="{{ route('get_categories') }}" >
	              <span data-feather="file"></span>
	              Категории
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link"  href="{{ route('get_json') }}" >
	              <span data-feather="file"></span>
	               Get json
	            </a>
	          </li>
@endsection


@section('main-block')
    <div class="container-fluid"
	  <div class="row"
		<div class="col">
		  <div class="multi-collapse justify-content-md-center collapse show" id="collapseCreateUser">
			<div class="card card-body" id="card">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title">Фильтрация вывода</h5>
				  <button type="button" class="close" data-toggle="collapse" href="#collapseCreateUser" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
				
				<div class="modal-body">
<!--
					{{ Session::get('name_input')}}
						{{Session::get('category_select')}}
						{{Session::get('price_select')}}
						{{Session::get('date_select')}}
-->
					
				        		
			        <form class="form" method="POST" action="{{ route('get_products') }}">
				        {{ csrf_field() }}
				        
				      <div class="form-group">
				      	<div class="row mb-3">
					      <input type="hidden" name="clicked_filter" id="clicked_filter" value="true">
		                  <div class="col-md-12 themed-grid-col">
			                <label for="name-input" class="col-form-label col-form-label-lg">Наименование:</label>
							<input type="text" name="name_input"  id="name_input" class="form-control" placeholder="Наименование" value={{ $choosed_filter[0]}}> 
		                  </div>
<!--
		                  <div class="col-md-5 themed-grid-col">
			                <label class="col-form-label col-form-label-lg">Категории:</label>
							<select class="form-control" id="category_select" name="category_select">
								<option value="all">Любой</option>
									@foreach($all_categories as $category)
									<option value="{{ $category->id }}" >{{ $category->name }}</option>
									@endforeach
							</select>
		                  </div>
-->
				      	</div>
				      </div>
				      <div class="form-group">
				      	<div class="row mb-3">
		                  <div class="col-md-6 themed-grid-col">
			                <label class="col-form-label col-form-label-lg">По цене: </label>
							<select class="form-control" id="price_select" name="price_select">
								<option value="all">Любой</option>
								<option value="asc" {{($choosed_filter[2]=="asc") ? 'selected' : ''}}>По возрастанию</option>
								<option value="desc" {{($choosed_filter[2]=="desc") ? 'selected' : ''}}>По убыванию</option>
							</select>
 		                  </div>
		                  <div class="col-md-6 themed-grid-col">
			                <label class="col-form-label col-form-label-lg">По дате:</label>
							<select class="form-control" id="date_select" name="date_select">
							  <option value="all">Любой</option>
							  <option value="asc" {{($choosed_filter[3]=="asc") ? 'selected' : ''}}>По возрастанию</option>
								<option value="desc" {{($choosed_filter[3]=="desc") ? 'selected' : ''}}>По убыванию</option>
							</select>
		                  </div>
				      	</div>
				      </div>
					  <!-- <div class="row"> -->
					  <div class="row form-element justify-content-center">
					    <div class="col-12">
						  <button type="submit" class="btn btn-warning btn-block" id="sort-btn">Применить</button>
						</div>
					  </div>
					</form>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>  	
    </div>
    
    
    
    
    <div class="container-fluid"
	  <div class="row"
		<div class="col">
		  <div class="multi-collapse justify-content-md-center collapse show" id="allTeachers">
			<div class="card card-body" id="card">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title">Все товары</h5>
				  <button type="button" class="close" data-toggle="collapse" href="#allTeachers" role="button" aria-expanded="false" aria-controls="multiCollapseExample1" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				  </button>
				</div>
				
				<div class="modal-body">
				  <div class="table-responsive">
					<table class="table table-light table-striped">
					  <thead class="thead-light">
					    <tr>
					      <th scope="col">Id</th>
					      <th scope="col">Название</th>
					      <th scope="col">Описание</th>
					      <th scope="col">Дата создания</th>
					      <th scope="col">Цена(руб.)</th>
					      <th scope="col">Остаток</th>
					      <th scope="col">External_ID</th>
					      <th scope="col">Удаление</th>
					    </tr>
					  </thead>
					  <tbody id="tbody">
						  @foreach ($all_products as $product)
					    <tr>
					      <th scope="row">{{ $product->id }}</th>
					      <td>{{ $product->name }}</td>				      
					      <td>{{ $product->description }}</td>
					      <td>{{ $product->created_at }}</td>
					      <td style="text-align: center">{{ $product->price_rub }}</td>
					      <td style="text-align: center">{{ $product->remainder }} шт. </td>
					      <td style="text-align: center">{{ $product->external_id }}</td>
					      <td style="text-align: center">
						    <form class="form"  method="POST" action="{{ route('deleteProduct') }}">
							  {{ csrf_field() }}
							  <input type="hidden" name="deleteProduct" id="deleteProduct" value="{{ $product->id }}">  
						      <button type="submit" class="deleteInformation_button btn btn-sm btn-outline-danger" >
								<svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z">
								  </path>
								  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z">
								  </path>
								</svg>
							  </button>
							</form>
						  </td>
					    </tr>
					       @endforeach
					  </tbody>
					</table>
				  </div>
				  <div id="pagiantion_block" class="d-flex justify-content-between">
						{!! $all_products->links('pagination') !!}
						<button class="btn btn-warning mr-2" type="button" id="addProduct" data-toggle="modal" data-target="#createProductInfo">Добавить товар</button>
				  </div>
				</div>	
			  </div>
			</div>
		  </div>
		</div>
	  </div>  	
    </div>

	<div class="modal fade" id="createProductInfo" tabindex="-1" role="dialog" aria-labelledby="moreInformation" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Добавление товара</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">×</span>
		        </button>
		      </div>
		      <div class="modal-body">
			  	<div class="container themed-container">
					<form class="form"  method="post" action="{{ route('createProduct') }}">
	                    {{ csrf_field() }}
				        <div class="form-group">
					      <div class="row mb-3">
			                <div class="col-md-12 themed-grid-col">
				                <label for="name" >Название</label>
			                    <input type="text" name="name" class="form-control" id="name" placeholder="Введите название товар" required>
			                </div>
			                <div class="col-md-12 themed-grid-col">
				                <label for="description" >Описание</label>			                
								<textarea name="description" class="form-control" id="description" placeholder="Введите описание" required></textarea>
			                </div>
			                <div class="col-md-4 themed-grid-col">
				                <label for="price_rub" >Цена</label>			                
								<input type="text" name="price_rub" class="form-control" id="price_rub" placeholder="Введите стоимость(руб.)" required>
			                </div>
			                <div class="col-md-4 themed-grid-col">
				                <label for="remainder" >Количество</label>
			                    <input type="text" name="remainder" class="form-control" id="remainder" placeholder="Введите количество товара..." required>
			                </div>
			                <div class="col-md-4 themed-grid-col">
				                <label for="external_id" >External_Id</label>
			                    <input type="text" name="external_id" class="form-control" id="external_id" placeholder="Введите External_id...">
			                </div>
						  </div>
			            </div>
						<button class="btn btn-warning mr-2" type="submit" id="addCategory">Добавить товар</button>
				 	</form>
  	
				</div>		     
			  </div>
		    </div>
		  </div>
		</div>

    
    
    
    
    
    
    
@endsection


@section('message')

	@if(Session::has('flash_message'))
		<div class="alert alert-success {{ Session::has('flash_message_important') ? 'alert-important' : '' }} text-center">
			@if(Session::has('flash_message_important'))
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			@endif
				  
			{{ session('flash_message') }}
		</div>
	@endif
	  
		
	

		@if(Session::has('test'))
		  <div class="alert alert-success">
		{{session('test')}}
		
		@endif
	  </div>
	

@endsection




@section('script')

<script>

</script>



@endsection















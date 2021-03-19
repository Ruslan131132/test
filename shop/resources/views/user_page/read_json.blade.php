@extends('user_page_layout')

@section('title-block')
Get json_file
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

	
/*
	.password {
	position: relative;
	}
*/

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
	}


</style>
@endsection



@section('li-blocks')
			  <li class="nav-item">
	            <a class="nav-link" href="{{ route('get_products') }}">
	              <span data-feather="home"></span>
	              Все товары
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="{{ route('get_categories') }}">
	              <span data-feather="home"></span>
	              Категории
	            </a>
	          </li>
			  <li class="nav-item">
	            <a class="nav-link active" href="{{ route('get_json') }}" style="color: #ffffff">
	             <span data-feather="home"></span>
	              Get json
	              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
  <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659l4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
</svg><span class="sr-only">(current)</span>
	            </a>
	          </li>@endsection


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
					Все команды показаны в консоли
				</div>
				  </div>
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
	// Чтение файлов старым методом
	request = new XMLHttpRequest();
				request.open('GET', 'http://bigproject.std-1055.ist.mospolytech.ru/categories.json');
				request.send();
			
				request.onreadystatechange = () => {
					if(request.readyState != 4) return;
					if(request.status != 200){
						alert('Сервер недоступен ' + request.status + ' ' + request.statusText);
						return;
						}
					
					let arr_categories = JSON.parse(request.response);
					console.log(arr_categories);	
					
	}	
				
	request2 = new XMLHttpRequest();
				request2.open('GET', 'http://bigproject.std-1055.ist.mospolytech.ru/products.json');
				request2.send();
			
				request2.onreadystatechange = () => {
					if(request2.readyState != 4) return;
					if(request2.status != 200){
						alert('Сервер недоступен ' + request.status + ' ' + request.statusText);
						return;
						}
					
					let arr_products = JSON.parse(request2.response);	
					console.log(arr_categories.response);
					
				}	
	
	
	
	
	
</script>


@endsection



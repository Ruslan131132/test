@extends('user_page_layout')

@section('title-block')
Get Categories
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
	            <a class="nav-link active" href="{{ route('get_categories') }}" style="color: #ffffff">
	             <span data-feather="home"></span>
	              Категории
	              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down" viewBox="0 0 16 16">
  <path d="M3.204 5h9.592L8 10.481 3.204 5zm-.753.659l4.796 5.48a1 1 0 0 0 1.506 0l4.796-5.48c.566-.647.106-1.659-.753-1.659H3.204a1 1 0 0 0-.753 1.659z"/>
</svg><span class="sr-only">(current)</span>
	            </a>
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="{{ route('get_json') }}">
	              <span data-feather="home"></span>
	              Get json
	            </a>
	          </li>
@endsection


@section('main-block')

<div class="album py-5 ">
	<div class="container">
	  <div class="row" id="print_rest">
		@foreach($all_categories as $category)
									
		  <div class="col-md-3">
		    <div class="card mb-4 shadow-sm">
			  <div class="card-body">
				<div class="row">
					<div class="col-12" style=" height: 60px;"><p class="card-text" >{{ $category->name }}(id-{{ $category->id }})</p></div>
					<div class="col-12" style=" height: 120px;"><hr><small class="text-muted">Parent_id - {{ $category->parent_category_id }},External_id - {{ $category->external_id }}</small></div>
			    </div>	
				<div class="d-flex justify-content-between align-items-center">
				  <div class="btn-group">
					  <form class="form">
						<input type="hidden" name="infoCategory" value="{{ $category->id }}">
						<button type="button" class="moreInformation_button btn btn-sm btn-outline-success" data-toggle="modal" data-target="#moreInformation">...</button>
					  </form>				
				  </div>
				  <div class="btn-group">
					<form class="form">
						<input type="hidden" name="updateCategory" value="{{ $category->id }}">
					    <button type="button" class="changeInformation_button btn btn-sm btn-outline-secondary" data-toggle="modal" data-target="#changeInformation">
							<svg class="bi bi-pencil" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							  <path fill-rule="evenodd" d="M11.293 1.293a1 1 0 0 1 1.414 0l2 2a1 1 0 0 1 0 1.414l-9 9a1 1 0 0 1-.39.242l-3 1a1 1 0 0 1-1.266-1.265l1-3a1 1 0 0 1 .242-.391l9-9zM12 2l2 2-9 9-3 1 1-3 9-9z"></path><path fill-rule="evenodd" d="M12.146 6.354l-2.5-2.5.708-.708 2.5 2.5-.707.708zM3 10v.5a.5.5 0 0 0 .5.5H4v.5a.5.5 0 0 0 .5.5H5v.5a.5.5 0 0 0 .5.5H6v-1.5a.5.5 0 0 0-.5-.5H5v-.5a.5.5 0 0 0-.5-.5H3z"></path>
							</svg>
						</button>
					</form>
				  </div>
									
				  <div class="btn-group">
					  <form class="form"  method="POST" action="{{ route('deleteCategory') }}">
							  {{ csrf_field() }}
						    <input type="hidden" name="deleteCategory" value="{{ $category->id }}">
							<button type="submit" class="deleteInformation_button btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deleteInformation" name="delete_button">
							  <svg class="bi bi-trash" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"></path>
								<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"></path>
							  </svg>
							</button>
					  </form>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		@endforeach
	  </div>
	  <div class="row">
		<div class="col-lg-12" align="center">
                    
					<button class="btn btn-warning mr-2" type="button" id="addCategory" data-toggle="modal" data-target="#createCategoryInfo">Добавить категорию</button>
		</div>
	  </div>	
    </div>
 </div>





 		<div class="modal fade" id="createCategoryInfo" tabindex="-1" role="dialog" aria-labelledby="moreInformation" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Добавление категории</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">×</span>
		        </button>
		      </div>
		      <div class="modal-body">
			  	<div class="container themed-container">
					<form class="form"  method="post" action="{{ route('createCategory') }}">
	                    {{ csrf_field() }}
				        <div class="form-group">
					      <div class="row mb-3">
			                <div class="col-md-3 themed-grid-col">
				                <label for="name" >Название</label>
			                    <input type="text" name="name" class="form-control" id="name" placeholder="Введите название категории" required>
			                </div>
			                <div class="col-md-3 themed-grid-col">
				                <label for="parent_id" >Parent_Id</label>
			                    <input type="text" name="parent_id" class="form-control" id="parent_id" placeholder="Введите Parent_id..." required>
			                </div>
			                <div class="col-md-3 themed-grid-col">
				                <label for="external_id" >External_Id</label>
			                    <input type="text" name="external_id" class="form-control" id="external_id" placeholder="Введите External_id...">
			                </div>
						  </div>
			            </div>
						<button class="btn btn-warning mr-2" type="submit" id="addCategory">Добавить категорию</button>
				 	</form>
  	
				</div>		     
			  </div>
		    </div>
		  </div>
		</div>




<div class="modal fade" id="moreInformation" tabindex="-1" role="dialog" aria-labelledby="moreInformation" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Товары в этой категории</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">×</span>
		        </button>
		      </div>
		      <div class="modal-body">
			  	<div class="container themed-container" id="categoryInfoPrint">
				</div>		     
			  </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK</button>
		      </div>
		    </div>
		  </div>
		</div>







		<div class="modal fade" id="changeInformation" tabindex="-1" role="dialog" aria-labelledby="moreInformation" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLongTitle">Редактирование записи</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">×</span>
		        </button>
		      </div>
		      <div class="modal-body">
				<form class="form" method="post" action="{{ route('updateCategory') }}">
                    {{ csrf_field() }}
			        <div class="form-group">
				      <div class="row mb-3">
		                <div class="col-md-3 themed-grid-col">
				                <label for="name" >Название</label>
			                    <input type="text" name="modal_name" class="form-control" id="modal_name" placeholder="Введите название категории" required>
			                    <input type="hidden" name="modal_id" class="form-control" id="modal_id" placeholder="Введите название категории" required>
			                </div>
			                <div class="col-md-3 themed-grid-col">
				                <label for="parent_id" >Parent_Id</label>
			                    <input type="text" name="modal_parent_id" class="form-control" id="modal_parent_id" placeholder="Введите Parent_id..." required>
			                </div>
			                <div class="col-md-3 themed-grid-col">
				                <label for="external_id" >External_Id</label>
			                    <input type="text" name="modal_external_id" class="form-control" id="modal_external_id" placeholder="Введите External_id...">
			            </div>
					  </div>
		            </div>
		            <button class="btn btn-warning mr-2" type="submit" id="chCategory">Изменить</button>
		      	

				</form>
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
	let all_updateInformation_buttons = document.getElementsByClassName('changeInformation_button btn btn-sm btn-outline-secondary');
		
		for (let button of all_updateInformation_buttons) { 
			button.onclick = () => {//начало события клика на выбранную кнопку редактирования
					
					
				document.getElementById('modal_id').innerHTML="";			
				document.getElementById('modal_name').innerHTML="";
				document.getElementById('modal_parent_id').innerHTML="";
				document.getElementById('modal_external_id').innerHTML="";
				
							
							
				console.log(String(button.parentNode.parentNode.parentNode.parentNode.firstElementChild.firstElementChild.firstElementChild.innerHTML));//"имя"+(+"id"+)				
				console.log(String(button.parentNode.parentNode.parentNode.parentNode.firstElementChild.lastElementChild.lastElementChild.innerHTML));//parent_id, external_id
				
				
				
				let name_id = String(button.parentNode.parentNode.parentNode.parentNode.firstElementChild.firstElementChild.firstElementChild.innerHTML);
				let parent_extrenal_id = String(button.parentNode.parentNode.parentNode.parentNode.firstElementChild.lastElementChild.lastElementChild.innerHTML);
				
				//Все найденные переменные:
				let cat_name = String(name_id.substring(0, name_id.indexOf('(')));
				let cat_id = Number(name_id.substring(name_id.indexOf('-')+1, name_id.indexOf(')')));
				let parent_id = Number(parent_extrenal_id.substring(parent_extrenal_id.indexOf(',')-1, parent_extrenal_id.indexOf(',')));
				let external_id_str = parent_extrenal_id.substring(parent_extrenal_id.indexOf(',')+1, parent_extrenal_id.length);
				let external_id = Number(external_id_str.substring(external_id_str.indexOf('-')+2, external_id_str.length));
				
				
				console.log(cat_name);
				console.log(cat_id);
				console.log(parent_id);
				console.log(external_id);
				
				
				
				
				
				document.getElementById('modal_id').value = cat_id;
				document.getElementById('modal_name').value = cat_name;
				document.getElementById('modal_parent_id').value = parent_id;
				document.getElementById('modal_external_id').value = external_id;

				
				
				
				
				
			}};		
			
			
			
			
	let all_moreInformation_buttons = document.getElementsByClassName('moreInformation_button btn btn-sm btn-outline-success');
		
		for (let button of all_moreInformation_buttons) { 
			button.onclick = () => {//начало события клика на выбранную кнопку информации о категории - "..."			
				let arr = <?php echo json_encode($all_products);?>; // <-- no quotes, no parsify
				console.log(arr);
			
			let name_id = String(button.parentNode.parentNode.parentNode.parentNode.firstElementChild.firstElementChild.firstElementChild.innerHTML);	
			let cat_id = Number(name_id.substring(name_id.indexOf('-')+1, name_id.indexOf(')')));

			console.log(cat_id);
			
			let arr_print = arr.filter((element) => {
	    	if(element.category_id == cat_id)
				return element;
				console.log(element);
    		})
    		
    		console.log(arr_print);
    		
    		document.getElementById('categoryInfoPrint').innerHTML = "";
				arr_print.forEach((element) => {
					divItem = document.createElement('div');
					divItem.className = "row";
					divItem.innerHTML = `${element.name}`
						
				  	document.getElementById('categoryInfoPrint').append(divItem);
			})
			
		}};
	
</script>


@endsection



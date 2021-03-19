<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="shop test">
    <meta name="author" content="Ruslan Khasanshin">
    <meta name="generator" content="Jekyll v4.0.1">
    <link rel="apple-touch-icon" sizes="180x180" href="http://bigproject.std-1055.ist.mospolytech.ru/img/shop_icon.png">
    <title>Shop · Main</title>

    <!-- Bootstrap core CSS -->
	
	@include('css.bootstrap_css')    
    
    <!-- Custom styles for this project -->
	@include('css.main_css')
  </head>
  
  <body>



    <nav class="navbar sticky-top navbar-expand-md fixed-top ">
	  <a class="navbar-brand" href="#"><img src="http://bigproject.std-1055.ist.mospolytech.ru/img/shop_icon.png" alt="logo" width="30" height="30" class="round"></a>	
	  <button style="color: #999" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
	    <svg width="24" height="24" viewBox="0 0 16 16" class="bi bi-caret-down-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
		  <path fill-rule="evenodd" d="M3.544 6.295A.5.5 0 0 1 4 6h8a.5.5 0 0 1 .374.832l-4 4.5a.5.5 0 0 1-.748 0l-4-4.5a.5.5 0 0 1-.082-.537z"/>
		  <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
		</svg>
	  </button>			
	  <div class="collapse navbar-collapse justify-content-md-center" id="navbarCollapse">
	    <ul class="navbar-nav">   
	  	  <li class="nav-item active">
	  		<a class="nav-link" href="https://vk.com/id559197115">Тестирование · Руслан</a>
	  	  </li>
        </ul>
	  </div>
	</nav>
	
	
	<div class="d-md-flex flex-md-equal my-md-3 pl-md-3">
	  <div class="bg-light mr-md-3 py-3 px-3 py-md-5 px-md-3 text-center overflow-hidden" style="width: 100%">
	    <div class="my-3 p-3">
	      <h2 class="display-5">Вход</h2>
	      <p class="lead">
	      </p>
	    </div>
	    <div class="text-center">
		    <form class="form-signin" method="POST" >
			  @if(session('wrong'))
			    <div class="alert alert-danger">
			      {{ session('wrong') }}
			    </div>
			  @endif
			  {{ csrf_field() }}
			  
			  <label for="User_Id" class="sr-only">email</label>
			  <input type="email" name="User_Id"  id="User_Id" class="form-control" placeholder="ID" required autofocus>
			  <label for="inputPassword" class="sr-only">Password</label>
			  <input type="password" name="Password" id="Password" class="form-control" placeholder="Пароль" required>
			  <button class="btn btn-lg btn-warning btn-block" type="submit">Войти</button>
			</form>
	    </div>
	  </div>
	</div>
	
	<br class="clearfix w-100 d-md-none pb-3">
	
	<div class="container-fluid" style="background-color: #262626">
	<footer class="container py-5">
	  <div class="row">
	    <div class="col-12 col-md">
	      <small class="d-block mb-3 text-muted">&copy; 2021 · Тестирование · Руслан</small>
	      <p>
		    <a href="https://www.facebook.com"> <img src="http://bigproject.std-1055.ist.mospolytech.ru/img/social-links/facebook.png" width="26" height="26"></a>
		    <a href="http://twitter.com"> <img src="http://bigproject.std-1055.ist.mospolytech.ru/img/social-links/twitter.png" width="26" height="26"></a>
		    <a href="https://vk.com/id559197115">
			    <svg id="VK_Logo" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 202 202" width="26" height="26"><style>.st0{clip-path:url(#SVGID_2_);fill:#5181b8}.st1{fill-rule:evenodd;clip-rule:evenodd;fill:#fff}</style><g id="Base"><defs><path id="SVGID_1_" d="M71.6 5h58.9C184.3 5 197 17.8 197 71.6v58.9c0 53.8-12.8 66.5-66.6 66.5H71.5C17.7 197 5 184.2 5 130.4V71.5C5 17.8 17.8 5 71.6 5z"/></defs><use xlink:href="#SVGID_1_" overflow="visible" fill-rule="evenodd" clip-rule="evenodd" fill="#5181b8"/><clipPath id="SVGID_2_"><use xlink:href="#SVGID_1_" overflow="visible"/></clipPath><path class="st0" d="M0 0h202v202H0z"/></g><path id="Logo" class="st1" d="M162.2 71.1c.9-3 0-5.1-4.2-5.1h-14c-3.6 0-5.2 1.9-6.1 4 0 0-7.1 17.4-17.2 28.6-3.3 3.3-4.7 4.3-6.5 4.3-.9 0-2.2-1-2.2-4V71.1c0-3.6-1-5.1-4-5.1H86c-2.2 0-3.6 1.7-3.6 3.2 0 3.4 5 4.2 5.6 13.6v20.6c0 4.5-.8 5.3-2.6 5.3-4.7 0-16.3-17.4-23.1-37.4-1.4-3.7-2.7-5.3-6.3-5.3H42c-4 0-4.8 1.9-4.8 4 0 3.7 4.7 22.1 22.1 46.4C70.9 133 87.2 142 102 142c8.9 0 10-2 10-5.4V124c0-4 .8-4.8 3.7-4.8 2.1 0 5.6 1 13.9 9 9.5 9.5 11.1 13.8 16.4 13.8h14c4 0 6-2 4.8-5.9-1.3-3.9-5.8-9.6-11.8-16.4-3.3-3.9-8.2-8-9.6-10.1-2.1-2.7-1.5-3.9 0-6.2 0-.1 17.1-24.1 18.8-32.3z"/>
			    </svg>
		    </a>
		    <a href="http://www.odnoklassniki.ru"> <img src="http://bigproject.std-1055.ist.mospolytech.ru/img/social-links/odnoklassniki.png" width="26" height="26"></a>
		    <a href="https://www.youtube.com"> <img src="http://bigproject.std-1055.ist.mospolytech.ru/img/social-links/youtube.png" width="26" height="26"></a>
	      </p>

	    </div>
	    <div class="col-6 col-md">
	      <h5 style="color: white">О компании</h5>
	      <ul class="list-unstyled text-small">
	        <li><a class="text-muted" href="#">О нас</a></li>
	        <li><a class="text-muted" href="#">Руководство</a></li>
	        <li><a class="text-muted" href="#">Новости</a></li>
	        <li><a class="text-muted" href="#">Контакты</a></li>
	      </ul>
	    </div>
	    <div class="col-6 col-md">
	      <h5 style="color: white">Возможности</h5>
	      <ul class="list-unstyled text-small">
	        <li><a class="text-muted" href="#">Сотрудникам</a></li>
	        <li><a class="text-muted" href="#">Покупателям</a></li>
	        <li><a class="text-muted" href="#">Студентам</a></li>
	        <li><a class="text-muted" href="#">Госорганам</a></li>
	      </ul>
	    </div>
	    <div class="col-6 col-md">
	      <h5 style="color: white">Партнерам</h5>
	      <ul class="list-unstyled text-small">
	        <li><a class="text-muted" href="#">Реклама</a></li>
	      </ul>
	    </div>
	    <div class="col-6 col-md">
	      <h5 style="color: white">Поддержка</h5>
	      <ul class="list-unstyled text-small">
	        <li><a href="#">Портал</a></li>
	        <li><a href="#">Подключить ОО</a></li>
			
	      </ul>
	    </div>
	  </div>
	</footer>
	</div>

	
	
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<!-- 	<script src="bootstrap-4.4.1-dist/js/bootstrap.js" ></script> -->
	@include('js.bootstrap_js')
<!-- 	<script src="main.js"></script> -->
  </body>
</html>

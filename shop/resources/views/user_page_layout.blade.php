<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ruslan Khasanshin">
    <meta name="generator" content="Jekyll v4.0.1">
    <link rel="apple-touch-icon" sizes="180x180" href="http://bigproject.std-1055.ist.mospolytech.ru/img/shop_icon.png">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>User · @yield('title-block')</title>
    <!-- Bootstrap core CSS -->
	@include('css.bootstrap_css')

    @yield('custom-style-block')
	
  </head>
  <header>
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
		  @yield('li-blocks')
        </ul>
	  </div>
	  <form class="form-inline my-2 my-md-0">
        <a class="btn btn-danger btn-block"  href="/" style="color:#ffffff">Выйти</a>
      </form>

	</nav>
  </header>
  <body>
	@yield('message')
	@yield('main-block')
	

		
	

	

		
	
	
			
			
			
			
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	@include('js.jquery_js')
	@include('js.bootstrap_js')
	
	@yield('script')

	<script>
	  $('div.alert').not('.alert-important').delay(3000).slideUp(300);
	  
	</script>
	
	
<!--     <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script> -->
<!--     <script src="../bootstrap-4.4.1-dist/js/bootstrap.bundle.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    
<!--     <script src="user.js"></script> -->
  </body>
</html>
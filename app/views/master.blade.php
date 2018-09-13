@section('sidebar')
<div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/">
                        Panda Bar
                    </a>
                </li>
                <li>
                    <a href="/seeuser">Añadir Perfil</a>
                </li>
                <li>
                    <a href="/seeprofile">Perfiles</a>
                </li>
                <li>
                    <a href="/seepicture">Overview</a>
                </li>
                <li>
                    <a href="/expire">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Inicio</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the .</p>
                        <a href="#menu-toggle" class="btn btn-danger" id="menu-toggle">Menu</a>
                    </div>
                </div>

				<div class="row">
					<div class="col-lg-12">
					<div class="container">
						<div class="row">
							<div class=" col-md-6 col-md-offset-3">
								<div class=" formulario panel panel-login">
									<div class="panel-heading">
										<div class="row">
											<div class="col-xs-6">
												<a href="#" class="active btn btn-warning" id="login-form-link">Login</a>
											</div>
											<div class="col-xs-6">
												<a href="#" class="btn btn-warning" id="register-form-link">Registro</a>
											</div>
										</div>
										<hr>
									</div>
									<div class="formulario panel-body">
										<div class="row">
											<div class="col-lg-12">
												<form id="login-form" role="form" style="display: block;">
													
													<div class="form-group">
														<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Username" value="" required>
													</div>
													<div class="form-group">
														<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required>
													</div>
													
													<div class="form-group">
														<div class="row">
															<div class="col-sm-6 col-sm-offset-3">
																<input type="submit" onclick="check()" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-warning" value="Ingresar">
															</div>
														</div>
													</div>
												
												</form>
												<form id="register-form" role="form" style="display: none;">
													<div class="form-group">
														<input type="text" name="username" id="username2" tabindex="1" class="form-control" placeholder="Username">
													</div>
													<div class="form-group">
														<input type="password" name="password" id="password2" tabindex="2" class="form-control" placeholder="Password">
													</div>
													
													<div class="form-group">
														<div class="row">
															<div class="col-sm-6 col-sm-offset-3">
																<input type="submit" onclick="add()" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-warning" value="Registrate Ahora">
															</div>
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

					<div align="center">

					<button onclick="search()" class="btn btn-warning">Usuarios</button>
					</div>


					
					<div id='place'align='center'>
					

					</div>

			
	</div>



<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modificar Usuario</h4>
      </div>
      <div class="modal-body">
	  <table class="table table-striped">
                        <tr>
                           <td><input type="hidden"  id="iddd"></td>
                           <td>Usuario</td>
                           <td><input type="text"  id="changeduser" required ></td>
                           <td>Contraseña</td>
                           <td><input type="password"  id="changedpass" required></td>
                        </tr>
		</table>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="updateUser()" class="btn btn-warning" data-dismiss="modal">Guardar</button>
      </div>
    </div>

  </div>
</div>


					</div>

				</div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->
     <!-- Menu Toggle Script -->
@stop

@section('estilos')
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="/css/css/bootstrap.min.css">
<link rel="stylesheet" href="/css/css/sidebar.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/jquery.dataTables.css"/>
<link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.css" />
@stop

@section('funciones')
<script src="/css/js/jquery.js"></script>
<script src="/css/js/bootstrap.min.js"></script>
<script src="/css/js/login.js"></script>
<script src="/css/js/sidebar.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.1/jquery.jgrowl.min.js"></script>
@stop



@section('sidebarsimple')
<div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/">
                        Panda Bar
                    </a>
                </li>
                <li>
                    <a href="/seeuser">Añadir Perfil</a>
                </li>
                <li>
                    <a href="/seeprofile">Perfiles</a>
                </li>
                <li>
                    <a href="/seepicture">Overview</a>
                </li>
                <li>
                    <a href="/expire">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Ingresar Perfil</h1>
                        <a href="#menu-toggle" class="btn btn-warning" id="menu-toggle">Menu</a>
                    </div>
                </div>
				<div class="row">
                    <div class="col-lg-12">
                        <h1>Datos</h1>

                        
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            
            <div align="center" class="form">
                
                {{ Form::open(array('url' => '/registerall', 'files' => true)) }}

                {{ Form::label('photo','Foto') }}
                
                <!--así se crea un campo file en laravel-->
                {{ Form::file('photo',array('required' => 'required'))}}
                <br>
                {{ Form::label('username', 'Username') }}

                {{ Form::text('username', Input::old('username'),array('placeholder'=>'Usuario','required' => 'required')) }}
                <br>

                {{ Form::label('password', 'Password') }}

                {{ Form::password('password',array('placeholder'=>'Password','required' => 'required'))}}

                
                <br />
                {{ Form::submit('Regístrarme', array("class" => "button expand round btn btn-warning",)) }}

                {{ Form::close() }}

            </div>   
        
        </div>

            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                    <div id="imagePreview">
                    
                    </div>
            </div>
            
 <!-- Page Content 
            <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
                        <form id="leformate" enctype="multipart/form-data">
                        <input type="file" name="lefile" id="lefile">
                  
                        <input type="text" name="leuser" id="leuser">
                        <br>
                        <input type="text" name="lepass" id="lepass">
                        <br>
                        <p>
                        <input type="submit" name="submit" class="btn btn-warning">
                        </form>
               
            </div>

-->

            
                        
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

@stop


@section('sidebaruser')
<div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/">
                        Panda Bar
                    </a>
                </li>
                <li>
                    <a href="/seeuser">Añadir Perfil</a>
                </li>
                <li>
                    <a href="/seeprofile">Perfiles</a>
                </li>
                <li>
                    <a href="/seepicture">Overview</a>
                </li>
                <li>
                    <a href="/expire">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Perfiles de Usuarios</h1>
                        <a href="#menu-toggle" class="btn btn-danger" id="menu-toggle">Menu</a>
                    </div>
                </div>
				<div class="row">
                    <div class="col-lg-12">
                        <h1>Datos</h1>
                        <div align="center">

	                    <button onclick="charge()" class="btn btn-warning">Ver Perfiles</button>
	                </div>
	
	                <div id='pla'align='center'>
	

                    </div>
                        
                    </div>
                </div>
            </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

@stop


@section('sidevision')
<div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/">
                        Panda Bar
                    </a>
                </li>
                <li>
                    <a href="/seeuser">Añadir Perfil</a>
                </li>
                <li>
                    <a href="/seeprofile">Perfiles</a>
                </li>
                <li>
                    <a href="/seepicture">Overview</a>
                </li>
                <li>
                    <a href="/expire">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid">
               
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Perfiles de Usuarios</h1>
                        <a href="#menu-toggle" class="btn btn-danger" id="menu-toggle">Menu</a>
                    </div>
                </div>

				<div class="row">
                    <div class="col-lg-12">
                        <h1>Datos</h1>
                        <div align="left">

	                        <button onclick="chargenew()" class="btn btn-warning">Ver Datos</button>
                            <button onclick="orderer()" class="btn btn-warning">Ver Datos ordenados</button>
	                    </div>                        
                    </div>
                </div>

                <div class="row" id= "content">


                </div> 

                <div class="row" id='pic'>

                </div>      

           

            </div> <!-- contenedor -->

        </div>
        <!-- /#page-content-wrapper -->

    </div>

@stop


@section('extreme')
<div id="wrapper" class="toggled">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="/">
                        Panda Bar
                    </a>
                </li>
                <li>
                    <a href="/seeuser">Añadir Perfil</a>
                </li>
                <li>
                    <a href="/seeprofile">Perfiles</a>
                </li>
                <li>
                    <a href="/seepicture">Overview</a>
                </li>
                <li>
                    <a href="/expire">Events</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <div class="container-fluid">
               
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Construct</h1>
                        <a href="#menu-toggle" class="btn btn-danger" id="menu-toggle">Menu</a>
                    </div>
                </div>

				<div class="row">
                    <div class="col-lg-12">
                        <h1>Datos</h1>
                        <div align="left">

	                        <button onclick="cruck()" class="btn btn-warning">Probar Constructores</button>
	                    </div>                        
                    </div>
                </div>

                <div class="row" id= "content">


                </div> 

                <div class="row" id='pic'>

                </div>      

           

            </div> <!-- contenedor -->

        </div>
        <!-- /#page-content-wrapper -->

    </div>

@stop

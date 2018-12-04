<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="Css/index.css">
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
    <title>Inicio</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a id="fuente" class="navbar-brand" href="#">MSP</a>
                </div>
                <div class="nav navbar-nav navbar-right">
                    <a id="hover" class="navbar-brand" data-toggle="modal" data-target="#Modalogin" href="#"> Iniciar sesion</a>
                    <a id="hover" class="navbar-brand" data-toggle="modal" data-target="#ModalRegistro" href="#"> Registrarse</a>
                </div>
            </div>
        </nav>   
    </header>
    <main role="main">
        <section class="jumbotron text-center" id="fondo">
            <div class="container">
                <h1 id="fuente" class="jumbotron-heading text-white">Restaurante corazon triste</h1>
                <p id="fuente" class="lead text-white">Inicia sesion para realizar pedidos a domicilio</p>
                <p>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#Modalogin">
                    Iniciar Sesion
                    </button>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalRegistro">
                    Registrarse
                    </button>
                </p>
            </div>
        </section>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="Img/Arg.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="Img/San.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="Img/Mex.jpg" alt="Card image cap">
                            <div class="card-body">
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>        
                </div>
            </div>
        </div>
    </main>
    
    
    
    <!--/////////////////////////// COMENTARIOS/ //////////////////////////////////////////////-->
    
    <script type="text/javascript">
			function ajax(){
				var req =new XMLHttpRequest();
				
				req.onreadystatechange=function(){
					if(req.readyState==4 && req.status==200){
						document.getElementById('chat').innerHTML=req.responseText;
					}
				}
				
				/*///////////////HACE QUE LA PAGINA SE RECARGUE CADA SEGUNDO ////////////////*/
				req.open('GET','comentariosV1.1/observacion.php',true);
				req.send();
                /*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/
                
			}
			
			setInterval(function(){ajax();},1000);
		</script>
    
       <div class="container">
               		<!--//////////////////////SE INCLUYE CAPA OBSERVACION///////////////-->
				<div id="contenedor" >
					<div id="caja-chat">
						<div id="chat">									
						</div>
					</div>
				</div>						
				<span></span>
                <form action="index.php" method="post" class="">
                    <div class="form-group"></div>
                        <div class="row">
                            <div class="col-11 ">
                            <input name="comentario" class="form-control"  placeholder="mensaje">
                            </div>
                            <div class="col-1">
                            <input  class="btn btn-primary"  type="submit" name="enviar" value="enviar">
                            </div>
                        </div>
                     </form>
				 
		
                          
                           <!--//////////////////PHP PARA INSERTAR DATOS//////////////////-->
                            <?php
                             
                                if(isset($_POST['enviar']))
                                 {
                                            if(isset($_SESSION['idcliente']))
                                             {

                                            $idcliente = $_SESSION["idcliente"];
                                            $comentario=$_POST['comentario'];

                                                $consulta ="INSERT INTO observacion( comentario,cliente_idcliente) VALUES ('$comentario','$idcliente')";
                                                $ejecutar =$conexion->query($consulta);								
                                            }
                                            else
                                            {   
                                                    echo"<div class='alert alert-danger'>";
                                                    echo"no se inicio sesion";
                                                    echo"<div>";
                                            }		

                                }
                           ?>
                           <!--/////////////////////////////////////////////////////////////////////////////////////-->
                    
			</div>		
			<!--/////////////////////////////////////////////////////////////////////////////////////////////////-->		 
	
	         <script type="text/javascript">
               valor = document.getElementById("mens").value;
                if( valor == null ) {
                  return false;
                }
             </script>
        
    <!--////////////////////////// FIN COMENTARIOS ///////////////////////////////////////////-->
    
    
    
    
    
    <footer class="text-muted">
        <div class="container">
            <p>&copy; Todos los derechos reservados maspro</p>
        </div>
    </footer>

    <!--FORMULARIO DE AUTENTIFICACIÓN -->
    <div class="modal fade" id="Modalogin" tabindex="-1" role="dialog" aria-labelledby="LabelModalogin" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="formulario" action="" id="FormLogin" autocomplete="off" >
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <img id="img-user" class="img-responsive" src="Img/user.png">
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <p class="text_login">Iniciar sesion</p>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="iddocumento">Numero de documento</label>
                        <input class="form-control" type="text" name="documento" id="iddocumento" placeholder="Documento" />
                    </div>
                    <div class="form-group">
                        <label for="idcontrasena">Contraseña</label>
                        <input class="form-control" type="password" name="contrasena" id="idcontrasena" placeholder="Contraseña" />
                    </div>
                    <div class="form-group">
                        <input type="button" name="login" id="login" value="Iniciar sesion" class="btn btn-success">
                    </div>
                    <div class="form-group">
                        <span id="result"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!--FORMULARIO DE REGISTRO -->
    <div class="modal fade" id="ModalRegistro" tabindex="-1" role="dialog" aria-labelledby="LabelModalRegistro" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form class="formulario" action="" id="FormRegi" autocomplete="off">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <img id="img-user" class="img-responsive" src="Img/user.png">
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-8 offset-md-2">
                                        <p class="text_login">Registrarse</p>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="nombre">Nombre</label>
                            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="apellido">Apellido</label>
                            <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Apellido" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="direccion">Dirección</label>
                            <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email">Email</label>
                            <input class="form-control" type="text" name="email" id="email" placeholder="Email" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="telefono">Telefono</label>
                            <input class="form-control" type="text" name="telefono" id="telefono" placeholder="Telefono" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="tipo_doc">Tipo documento</label>
                            <select class="form-control" name="Id_Tipo_Doc" id="tipo_doc" >
                                <?php
                                    //  CONSULTA PARA TRAER LOS CC

                                    include ('conexion.php');

                                    $sql2 = "SELECT * FROM tipodocumento "; 

                                      if (!$result2 = $db->query($sql2))
                                        {
                                          die('No hace subconsulta a tipo documento del select ['.$db->error.']');
                                        }

                                      while ($row2 = $result2->fetch_assoc())
                                      { 
                                        $IId_Tipo_Doc=stripslashes($row2["idtipodocumento"]);
                                        $DDes=stripslashes($row2["descripcion"]);
                                        echo "<option value='$IId_Tipo_Doc'>$DDes</option>";
                                      }

                                    // FIN CONSULTA DE TRAER LOS CC
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="documento">Documento</label>
                            <input class="form-control" type="text" name="documento" id="documento" placeholder="Documento" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="contrasena">Contraseña</label>
                            <input class="form-control" type="password" name="contrasena" id="contrasena" placeholder="Contraseña" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="conf_contrasena">Confirmar contraseña</label>
                            <input class="form-control" type="password" name="conf_contrasena" id="conf_contrasena" placeholder="Confirmar contraseña" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="button">&nbsp</label>
                            <input type="button" name="Registrarse" id="Registrarse" value="Registrarme" class="form-control btn btn-success">
                        </div>
                    </div>
                    <div class="form-group">
                        <span id="result2"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="js/jquery-3.3.1.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#login').click(function(){
            var docu = $('#iddocumento').val();
            var pass = $('#idcontrasena').val();
            if($.trim(docu).length > 0 && $.trim(pass).length > 0){
                if (isNaN(docu)){
                    $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Solo se permite numeros en el campo <strong>documento</strong>¡</div>");
                    $('#iddocumento').value = "";
                }
                else {
                    $.ajax({
                        url:"Login.php",
                        method:"POST",
                        data:{docu:docu, pass:pass},
                        cache:"false",
                        beforeSend:function() {
                            $('#login').val("Conectando...");
                        },
                        success:function(data) {
                            $('#login').val("Iniciar sesion");
                            var datos = $.parseJSON(data);
                            // CLIENTE
                            if (datos.status == "1") {
                                $(location).attr('href','Cliente/Carrito_compras.php');
                            }
                            // ADMIN
                            else if (datos.status == "2") {
                                $(location).attr('href','capa_admin.php');
                            }
                            // CAJERO
                            else if (datos.status == "3") {
                                $(location).attr('href','capa_cajero.php');
                            }   
                            // DATOS INCORRECTOS
                            else if (datos.status == "4") {
                                $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!El <strong>documento </strong> o <strong>contraseña </strong>son incorrectos¡</div>");
                            }
                            // uSUARIO BLOQUEADO
                            else if (datos.status == "5") {
                                $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!El <strong>usuario </strong>esta <strong>bloqueado </strong>!</div>");
                            }
                        }
                    });
                }

            } else {
                $("#result").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Ningun campo puede estar vacio¡</div>");
            };
        });
    });
    </script>

    <script>
    $(document).ready(function() {
        $('#Registrarse').click(function(){
            var nom = $('#nombre').val();
            var apell = $('#apellido').val();
            var direc = $('#direccion').val();
            var emai = $('#email').val();
            var tele = $('#telefono').val();
            var tipdoc = $('#tipo_doc').val();
            var docu = $('#documento').val();
            var contr = $('#contrasena').val();
            var conf_contr = $('#conf_contrasena').val();
            if($.trim(nom).length > 0 && $.trim(apell).length > 0 && $.trim(direc).length > 0 && $.trim(emai).length > 0 && $.trim(tele).length > 0 && $.trim(tipdoc).length > 0 && $.trim(docu).length > 0 && $.trim(contr).length > 0 && $.trim(conf_contr).length > 0){
                if (contr == conf_contr) {
                    $.ajax({
                        url:"Registrarse.php",
                        method:"POST",
                        data:{nom:nom, apell:apell, direc:direc, emai:emai, tele:tele, tipdoc:tipdoc, docu:docu, contr:contr},
                        cache:"false",
                        beforeSend:function() {
                            $('#Registrarse').val("Verificando...");
                        },
                        success:function(data) {
                            $('#Registrarse').val("Registrarme");
                            // MOSTRAR SI EL REGISTRO FUE EXITOSO
                            var datos = $.parseJSON(data);

                            if (datos.statuss == "1") {
                                $("#result2").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Ya existe un usuario registrado con este correo¡</div>");
                            }
                            else if (datos.statuss == "2") {
                                $("#result2").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Registrado exitosamente¡</div>");
                            }
                        }
                    });
                } 
                else {
                    $("#result2").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Las contraseñas no coinciden¡</div>");
                }

            } else {
                $("#result2").html("<div class='alert alert-dismissible alert-danger'><button type='button' class='close' data-dismiss='alert'>&times;</button>!Ningun campo puede estar vacio¡</div>");
            };
        });
    });
    </script>
    <!--Comentario-->
    <!--Comentario-->
</body>
</html>
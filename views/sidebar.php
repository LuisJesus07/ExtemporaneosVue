<div class="container-fluid p-0">
  
<!-- Bootstrap row -->
<div class="row" id="body-row">
    <!-- Sidebar -->
    <div id="sidebar-container" class="sidebar-expanded d-none d-md-block"><!-- d-* hiddens the Sidebar in smaller devices. Its itens can be kept on the Navbar 'Menu' -->
        <!-- Bootstrap List Group -->
        <ul class="list-group">
            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>TIPO DE CUENTA</small>
            </li>
            <!-- /END Separator -->
            <!-- Menu with submenu -->
            <a href="#submenu1" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-dashboard fa-fw mr-3"></span> 
                    <span class="menu-collapsed"><?php if($_SESSION['datosUsuario']['privilegios'] == 1){echo "Administrador";}else{echo "Alumno";}  ?></span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            
            <!-- Info alumno -->
            <a href="#submenu2" data-toggle="collapse" aria-expanded="false" class="bg-dark list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-user fa-fw mr-3"></span>
                    <span class="menu-collapsed">Mi información</span>
                    <span class="submenu-icon ml-auto"></span>
                </div>
            </a>
            <!-- Submenu content -->
            <div id='submenu2' class="collapse sidebar-submenu">
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed"><?php echo $_SESSION['datosUsuario']['nombre']?></span>
                </a>
                <a href="#" class="list-group-item list-group-item-action bg-dark text-white">
                    <span class="menu-collapsed"><?php echo $_SESSION['datosUsuario']['correo']?></span>
                </a>
            </div>            

            <!-- Separator with title -->
            <li class="list-group-item sidebar-separator-title text-muted d-flex align-items-center menu-collapsed">
                <small>OPCIONES</small>
            </li>

            <!-- Mostrar sidebar dependiendo del tipo de usuario alumno=2 admin=1-->
            <?php if($_SESSION['datosUsuario']['privilegios'] == 2){ ?>
            <!-- /END Separator -->
            <a href="solicitarExamen.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-clipboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Solicitar Exámenes</span>
                </div>
            </a>
            <a href="consultarExamenes.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-clipboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Mis Exámenes</span>
                </div>
            </a>

            <?php }else{ ?>

            <a href="filtradoBusqueda.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-clipboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Ver Solicitudes</span>
                </div>
            </a>
            <a href="solicitudesEnEspera.php" class="bg-dark list-group-item list-group-item-action">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span class="fa fa-clipboard fa-fw mr-3"></span>
                    <span class="menu-collapsed">Aceptar Solicitudes</span>
                </div>
            </a>
            <?php } ?>
            <!-- Separator without title -->
            <li class="list-group-item sidebar-separator menu-collapsed"></li>            
            <!-- /END Separator -->
            <a data-toggle="sidebar-colapse" class="bg-dark list-group-item list-group-item-action d-flex align-items-center">
                <div class="d-flex w-100 justify-content-start align-items-center">
                    <span id="collapse-icon" class="fa fa-2x mr-3"></span>
                    <span id="collapse-text" class="menu-collapsed">Ocultar</span>
                </div>
            </a>
            <!-- Logo -->
            <a href="https://www.facebook.com/DeptoCSyJUABCS/" target="_blank"><li class="list-group-item logo-separator d-flex justify-content-center">
                <img src='../../public/img/fb.png' width="30" height="30" />    
            </li></a>  
        </ul><!-- List Group END-->
    </div><!-- sidebar-container END -->


    
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Sistema de Despachos</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

        <!-- BLOQUE NAVEGACION A FACTURAS -->
        <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-list-columns"></i> Facturas
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <li class="dropdown-item"><a href="./facturar_producto.php" class="nav-link"><i class="bi bi-receipt"></i> Facturar Salida de Producto</a></li>
                    <li class="dropdown-item"><a href="#" class="nav-link"><i class="bi bi-eye"></i> Facturas Generadas</a></li>
                </ul>
        </li>

        <!-- BLOQUE NAVEGACION A CATALOGOS -->
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-list-columns"></i> Catalogos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <li class="dropdown-item"><a href="#" class="nav-link"><i class="bi bi-truck"></i> Vehiculos</a></li>
                <li class="dropdown-item"><a href="#" class="nav-link"><i class="bi bi-people"></i> Colaboradores</a></li>
                <li class="dropdown-item"><a href="./perfiles.php" class="nav-link"><i class="bi bi-person-fill"></i> Perfiles</a></li>
                <li class="dropdown-item"><a href="./modelos.php" class="nav-link">Modelos Vehiculos</a></li>
                <li class="dropdown-item"><a href="./marcas.php" class="nav-link">Marcas Vehiculos</a></li>
                <li class="dropdown-item"><a href="./rutas.php" class="nav-link"><i class="bi bi-sign-turn-right"></i> Rutas</a></li>
                <li class="dropdown-item"><a href="#" class="nav-link"><i class="bi bi-cart2"></i> Productos</a></li>
                <li class="dropdown-item"><a href="#" class="nav-link"><i class="bi bi-people-fill"></i> Clientes</a></li>
            </ul>
        </li>


        <!-- BLOQUE NAVEGACION A AJUSTES -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-gear"></i> Ajustes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="#"><i class="bi bi-arrow-repeat"></i> Cambiar contraseña</a></li>
            <li><a class="dropdown-item" href="#"></a></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-box-arrow-left"></i> Cerrar Sesión</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>
<?php 

    
    if (isset($_GET['id'])==null) {
    echo "<script> location.replace('index.php?view=Cuentas&type=activa'); </script>";
    exit;
    }

    $cuenta=new Cuenta(new Connexion);
    $cuenta->setpkcobropago($_GET['id']);
    $cuenta->setfkusuario($_SESSION['id']);
    $cuenta=$cuenta->getAllById();

    if (mysqli_num_rows($cuenta)==null) {
   echo "<script> location.replace('index.php?view=Cuentas&type=activa'); </script>";
    exit;
    }

    $cuenta=$cuenta->fetch_array(MYSQLI_ASSOC);
 
 ?>

 <div class="col-md-12">
              <div class="content-box-large">
                <div class="panel-heading">
                    <h2>Modificar Cuenta</h2>
                   </div>

                   <div>
                            <div >
                                <div >
                                     <ol class="breadcrumb text-left">
                                        <li>
                                              <a href="?"><i class="fa fa-dashboard"></i> Dashboard</a>
                                        </li>
                                        <li class="active">
                                              <a href="#"><i class="glyphicon glyphicon-random"></i> Cuentas Por</a>
                                        </li>
                                        <li class="active">
                                              <a href="?view=Cuentas&type=activa"><i class="glyphicon glyphicon-cog"></i> Activas</a>
                                        </li>
                                         <li class="active">
                                              <a href="#"><i class="glyphicon glyphicon-cog"></i> Modificar Cuenta</a>
                                        </li>
                                      
                                    </ol>
                                </div>
                            </div>
                        </div>


                  <div class="content-box-large">

          <div class="panel-body">
                                
                <div class="panel-body">
                 <form class="form-horizontal" role="form">
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="hidden" id="id" value="<?php echo $cuenta['pk_cobro_pago']; ?>">
                      <input type="text" class="form-control" id="txt_nombre" placeholder="Nombre de la Cuenta" value="<?php echo $cuenta['nombre']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Monto</label>
                    <div class="col-sm-10">
                      <input  type="number" min="0" step="1" class="form-control" id="txt_monto" placeholder="Monto de la Cuenta por Cobrar o Pagar" value="<?php echo $cuenta['monto']; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Tipo</label>
                     <div class="col-sm-10">
                      <select class="form-control form-control-sm" id="tipo">
                        <option value="pagar" <?php if($cuenta['type']=='pagar') echo "selected"; ?>>Pagar</option>
                        <option value="cobrar" <?php if($cuenta['type']=='cobrar') echo "selected"; ?>>Cobrar</option>
                     </select>
                    </div>
                  </div>
                 
                  <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Comentario</label>
                     <div class="col-sm-10">
                     <textarea class="form-control" placeholder="Digite algun comentario" id="txt_comentario" rows="3"><?php echo $cuenta['comentario']; ?>
                     </textarea>
                    </div>

                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-primary" id="actualizar_Cuentas">GUARDAR</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          

          </div>
        </div>
                </div>
              </div>
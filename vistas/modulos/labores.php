<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar labores del Personal OTTO
      <small>(Todas las labores que se muestran en el calendario).</small>

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar labores</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

      </div>

      <div class="box-body">

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">


        <thead>

         <tr>

           <th style="width:10px">#</th>
           <th>Título</th>
           <th>Descripción</th>
           <th>Inicio</th>
           <th>Final</th>

         </tr>

        </thead>

        <tbody>

        <?php

$item  = null;
$valor = null;

$labores = ControladorLabores::ctrMostrarLabores($item, $valor);

foreach ($labores as $key => $value) {

    echo '<tr>

                    <td>' . ($key + 1) . '</td>

                    <td>' . $value["title"] . '</td>

                    <td>' . $value["descripcion"] . '</td>

                    <td>' . $value["start"] . '</td>

                    <td>' . $value["end"] . '</td>

                  </tr>';

}

?>

        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>
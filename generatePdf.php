<?php
require_once '../DCR/vendor/autoload.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();

$html = '
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
    <title>Tabla</title>
  </head>
  <body>
    <div class="cont">
      <div class="trr">
        <table class="table">
          <thead>
            <th class="col align-middle text-center">
              <img src="SVM SIN FONDO.png" class="logo" alt="" />
            </th>
            <th class="col align-middle text-center">
              <span class="fs-4">FICHA DE SOPORTE TÉCNICO</span>
            </th>
          </thead>
        </table>
      </div>
      <div class="trr2">
        <table class="table">
          <tbody>
            <tr>
              <td class="col-4 tdborder">Folio:</td>
              <td class="nostyle"></td>
              <td rowspan="5" class="nostyle align-middle text-center">
                <span class="fontright"
                  ><a
                    href="https://maps.app.goo.gl/4jTBRwYSQMByyVZ88"
                    target="_blank"
                  >
                    Dirección Caslle 35 #354 x 26 y 28, Emiliano Zapata Norte,
                    Mérida, Yucatánn</a
                  >
                  <br />
                  Teléfono: <a href="tel:9992207019">9992207019</a> <br />
                  E-mail: <br />
                  <a href="mailto:sistemas@gruposvm.com"
                    >sistemas@gruposvm.com</a
                  ></span
                >
              </td>
            </tr>
            <tr>
              <td class="col-1 tdborder">Fecha:</td>
            </tr>
            <tr>
              <td class="col-1 tdborder">Cliente:</td>
              <td class="col-4 tdborder">Estado:</td>
            </tr>
            <tr>
              <td class="col-1 tdborder" colspan="2">Dirección:</td>
            </tr>
            <tr>
              <td class="col-1 tdborder">Ciudad:</td>
              <td class="col-1 tdborder">Referencia:</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="trr2">
        <div class="row">
          <div class="col">
            <table class="table" style="margin-bottom: 0px;">
              <tbody>
                <tr>
                  <td class="col tdborder" colspan="4">Sistema:</td>
                </tr>
                <tr>
                  <td class="col-4 tdborder">CCTV</td>
                  <td class="col-1 tdborder"></td>
                  <td class="col-4 tdborder">VIDEO PORTERO</td>
                  <td class="col-1 tdborder"></td>
                </tr>
                <tr>
                  <td class="col-5 tdborder">CONTROL DE ACCESO</td>
                  <td class="col-1 tdborder"></td>
                  <td class="col-5 tdborder">SOPORTE PCS</td>
                  <td class="col-1 tdborder"></td>
                </tr>
                <tr>
                  <td class="col-5 tdborder">ALARMA</td>
                  <td class="col-1 tdborder"></td>
                  <td class="col-5 tdborder">VOZ Y DATOS</td>
                  <td class="col-1 tdborder"></td>
                </tr>
                <tr>
                  <td class="col-5 tdborder">CERCO ELÉCTRICO</td>
                  <td class="col-1 tdborder"></td>
                  <td class="col-5 tdborder">OTRO</td>
                  <td class="col-1 tdborder"></td>
                </tr>
                <tr>
                  <td class="col tdborder" colspan="4">DIAGNÓSTICO</td>
                </tr>
                <tr>
                  <td class="col tdborder" colspan="4" rowspan="4">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut,
                    sed illum incidunt nemo rem consequatur repudiandae
                    voluptatem expedita eos nostrum architecto at recusandae id
                    quasi
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col">
            <table class="table">
              <tbody>
                <tr>
                  <td class="col tdborder" colspan="4">SERVICIO REPORTADO</td>
                </tr>
                <tr>
                  <td class="col-8 tdborder">Mantenimiento</td>
                  <td class="col-1 tdborder"></td>
                </tr>
                <tr>
                  <td class="col-8 tdborder">Revisión</td>
                  <td class="col-1 tdborder"></td>
                </tr>
                <tr>
                  <td class="col-8 tdborder">Instalación</td>
                  <td class="col-1 tdborder"></td>
                </tr>
                <tr>
                  <td class="col-8 tdborder">Otro</td>
                  <td class="col-1 tdborder"></td>
                </tr>
                <tr>
                  <td class="col-8 tdborder" colspan="4"><b>Material utilizado:</b> Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid perspiciatis fugit ullam nesciunt, veniam dolorem assumenda expedita eos dolores odit. Vitae itaque amet cumque illo odit sequi fugit animi eligendi?</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="trr3">
        <table class="table">
            <tbody>
                <tr>
                    <td class="col tdborder text-center" colspan="5">DESCRIPCIÓN DEL TRABAJO REALIZADO</td>
                </tr>
                <tr>
                    <td class="col tdborder" colspan="5">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo totam laboriosam, ipsa nam quisquam nihil distinctio veritatis modi fuga rerum animi sapiente corporis explicabo non a assumenda, eum, quasi sit.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, delectus, quos perferendis est dicta in blanditiis culpa repudiandae quo ea suscipit quis? Facilis, placeat saepe dolore tempora distinctio
                    </td>
                </tr>
                <tr>
                    <td class="col tdborder">NOMBRE DEL TÉCNICO:</td>
                    <td class="col tdborder">NOMBRE DEL USUARIO:</td>
                </tr>
            </tbody>
        </table>
      </div>
    </div>
  </body>
</html>

<style>
  .cont {
    width: 21cm;
    height: 29.7cm;
    border: 1px;
    border-color: black;
    border-style: solid;
    margin: 15px;
  }
  .logo {
    width: 200px;
  }
  .tdborder {
    border: 1px;
    border-style: solid;
    border-color: black;
  }
  .trr {
    margin: 15px;
    border: 1px;
    border-color: black;
    border-style: solid;
  }
  .trr2 {
    margin: 15px;
  }
  .fontsize {
    width: 30px;
  }
  .nostyle {
    border: transparent;
  }
  .fontright {
    font-size: 12px;
  }
  a {
    text-decoration: none;
    color: black;
  }
  .trr3{
    margin-left: 15px;
    margin-right: 15px;
    margin-top: 0px;
    margin-bottom: 15px;
  }
</style>

';

$dompdf->loadHtml($html);

// (Opcional) Configura el tamaño y la orientación del papel
$dompdf->setPaper('A4', 'portrait');

// Renderiza el HTML como PDF
$dompdf->render();

// Envía el PDF generado al navegador para su descarga
$dompdf->stream('archivo.pdf', array('Attachment' => 1));
?>

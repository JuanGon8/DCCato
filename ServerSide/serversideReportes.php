<?php
require 'serverside.php';
$table_data->get('vista_reportes','folio',array('folio', 'nombre', 'descripcion', 'departamento', 'fecha', 'prioridad', 'asignado', 'diagnostico_t', 'materiales','tipo_servicio','estado','fecha_proceso', 'hora_concluido', 'estado_g','evidencia'));

?>
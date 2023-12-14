<?php
require 'serverside.php';
$table_data->get('vista_empleados','codigo',array('codigo', 'fecha_alta','ap_pat', 'ap_mat', 'nombre', 'ubicacion', 'salario_diario', 'sbc', 'departamento', 'turno', 'nss', 'rfc', 'curp', 'sexo', 'fecha_nac', 'puesto', 'entidad', 'cp', 'estado_civil', 'e_banco', 'n_ecuenta', 'suc_epago','imss_pat'));

?>
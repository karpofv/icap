								<b>Funcionario que hace el llamado de atención</b>
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Cédula</th>
											<th>Nombres</th>
											<th>Apellidos</th>
											<th>Rango</th>
										</tr>
									</thead>
									<tbody id="tbfuncionario">
<?php
			                                $funcionarios = paraTodos::arrayConsulta("*", "funcionarios f, rangos r", "f.fun_rango=r.rang_codigo and fun_cedula = $_POST[cedula]");
                                            foreach($funcionarios as $rowf){
?>
                                            <tr>
                                                <td id="tcedfun"><?php echo $rowf['fun_cedula']?></td>
                                                <td id="tnomfun"><?php echo $rowf['fun_nombre']?></td>
                                                <td id="tapefun"><?php echo $rowf['fun_apellido']?></td>
                                                <td id="trango"><?php echo $rowf['rang_descrip']?></td>                                                
                                            </tr>
<?php
                                            }
?>
                                                
									</tbody>
								</table>
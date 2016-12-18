 var msg = confirm('Esta seguro que desea eliminar el registro?');
        									if (msg) {
        										$.ajax({
        											type: 'POST',
        											url: 'controller.php',
        											data: { editar: $editarrt, org: <?php echo $org; ?>, cedula: <?php echo $row['expf_funcedula']?>, eliminar: 1},
        											success: function(html) { $('#tbfuncionario').html(html); }
        										});
        									} return false;
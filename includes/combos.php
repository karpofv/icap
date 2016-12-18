<?php
	class Combos {
    	public static function CombosSelect($permiso,$id,$select,$from,$elId,$ElNombre,$busco) {
			$res_ = paraTodos::arrayConsulta($select,$from,$busco);
			foreach ($res_ as $row) {
				print "<option value=\"$row[$elId]\"";
				if ($row["$elId"] == $id) {
					print ("selected");
                }
				print(">$row[$ElNombre]</option>\n");
			}			        	
    	}
	}
?>

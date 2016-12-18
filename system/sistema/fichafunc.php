								<section class="col col-6">
									<?php
										$url = $ruta_base."assets/images/fotos/$cedula.jpg";
										$urlexist = paraTodos::url_exists($url);
										if ($urlexist) {
											$foto = $url;
										} else {											
											$foto = $ruta_base."assets/images/fotos/sinfoto";
										}
									?>
									<img id="imgperfil" src="<?php echo $foto;?>.jpg" alt="img" class="online" width="150px;">									
								</section>
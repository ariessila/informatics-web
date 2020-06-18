<div class='content--sidebar'>

        				<div class='content--sidebar__widget'>

        					<div class='widget widget--agenda'>

                                <div class='widget__title'>
									
									<h3>
									<?php 
									
										echo ($model == 'id')?"<i class='fa fa-calendar-o widget__icon'></i><a href='kalender-akademik'>AGENDA</i></a>":"<i class='fa fa-calendar-o widget__icon'></i><a href='kalender-akademik'>AGENDA</i></a>";
									
									
									?>
										
									
									</h3>

								</div>


                                <div class='widget__content'>

            					<div class='agenda__content__section'>
            						
            					<div class='agenda__content__section__list'>
										
										<ul class='agenda__list'>
											
											<?php 
											$event = $event->getEventBesar(0,4);
											foreach($event as $event){
												$tanggal = $libs->tgl_indo2($event['tanggal_mulai']);
												if($model == 'id'){
													echo "
													<li><p><a href='".ROOT.$model."/agenda/".$event['id']."-".$event['link']."'>".$event['judul_id']."</a></p><span class='agenda__list__date'>".$tanggal."</span></li>
													";				
												}else{
													echo "
													<li><p><a href='".ROOT.$model."/agenda/".$event['id']."-".$event['link']."'>".$event['judul_en']."</a></p><span class='agenda__list__date'>".$tanggal."</span></li>
													";				
												}
																			
											}
											
											?>
            								
										</ul>
									

            					</div>
								<div class='agenda__content__section'>

            						<div class='widget__title'>
									<?php 
									echo ($model=='id')?"<h3><i class='fa fa-calendar-o widget__icon'></i> KALENDER AKADEMIK </h3>":"<h3><i class='fa fa-calendar-o widget__icon'></i> ACADEMIC CALENDAR </h3>";
									?>
            						
									</div>
            						
            						<div class='agenda__content__section__list'>
										<ul class='agenda__list'>
											
											<?php 
											$akademik = $kalender->getKalenderByBulan(0,6,date('Y-m-d'));
											foreach($akademik as $akademik){
												$tanggal = $libs->tgl_indo2($akademik['tanggal_mulai']);
												if($model == 'id'){
													echo "
													<li><p><a href='javascript:;'>".$akademik['judul_id']."</a></p><span class='agenda__list__date'>".$tanggal."</span></li>
													";				
												}else{
													echo "
													<li><p><a href='javascript:;'>".$akademik['judul_en']."</a></p><span class='agenda__list__date'>".$tanggal."</span></li>
													";				
												}
																			
											}
											
											?>
											
										</ul>		

            						</div>

            					</div>
	
									

            					</div>

            				</div>

                            </div> 




							<div class='widget widget--announcement'>

        						<div class='widget__title'>
        							<h3>
        								<a>
											<?php echo ($model=='id')?'DAFTAR ARTIKEL TERBARU':'NEWS';?>
										</a>
        							</h3>
        						</div>


        						<div class='widget__content'>

        							<ul class='widget__content--announcement'>
										
										<?php 
										$berita = $artikel->getArtikel($model,0,6);
									
										foreach($berita as $berita){
											if($berita['publish'] == 'Y'){
												$tanggal = $libs->tgl_indo($berita['tanggal']);
												echo "
															
													<li>
														<p class='widget__content--announcement__date'>".$tanggal."</p>
														<p class='widget__content--announcement__title'><a href='".ROOT.$model.'/news/'.$berita['id'].'-'.$berita['link']."'>".$berita['judul']."</a></p>
													</li>											
												";		
											}
											
										}
										
										?>
									

        							</ul>

        						</div>

        					</div>
							&nbsp
							<?php

							$a = explode('-',$parameter);
							$page = $a[0];
							
							if(is_numeric($page) and $metode == 'page' and $parameter == '18'){
								echo "
							<div class='widget widget--announcement' id='login'>

        						<div class='widget__title'>
        							<h2>
										<strong>Login </strong>
        							</h2>
        						</div>


        						<div class='widget__content'>
								<form action='".ROOT."lecture_area/login/' method='POST' id='login'>
        							<ul class='widget__content--announcement'>
										<li>
											<label> Username</label>
											<input type='text' name='username'/>
										</li>
										<li> &nbsp </li>
										<li>
											<label> Password </label>
											<input type='password' name='password' id='password' />
										</li>
										<li> &nbsp </li>
										<li>
											<input type='submit' name='login' value='login' / >
										</li>
								</form>
        							</ul>";
									if(isset($_GET['login'])){
										echo "
										<b style='color:red;'>Username & Password salah</b>
										";
									}
								
								echo "
								
        						</div>

        					</div>	
								
								";
							}
							
							?>
							

        				</div>

        			</div>
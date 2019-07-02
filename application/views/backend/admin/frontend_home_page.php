<div class="panel panel-primary" data-collapsed="0">
    
    <div class="panel-body">

		<ul class="nav nav-tabs">
			<li class="active">
				<a href="#tab1" data-toggle="tab">
					<span class="visible-xs"><i class="entypo-home"></i></span>
					<span class="hidden-xs">
						<?php echo get_phrase('cursorul_principal'); ?>
					</span>
				</a>
			</li>
			<li>
				<a href="#tab2" data-toggle="tab">
					<span class="visible-xs"><i class="entypo-cc-nd"></i></span>
					<span class="hidden-xs">
						<?php echo get_phrase('sectiunea_mesajelor'); ?>
					</span>
				</a>
			</li>
		</ul>

		<div class="tab-content" style="padding: 20px 0 0 0;">
			<div class="tab-pane active" id="tab1">
				<form action="<?php echo site_url('admin/frontend_settings/slider');?>" 
					method="post" class="form-groups form-horizontal"
						enctype="multipart/form-data">
					<?php $slider = json_decode($sliders);?>
					<?php for ($i=0; $i < count($slider); $i++) { ?>
						<div class="panel panel-white" data-collapsed="0"
							style="border: 0;">
							
							<div class="panel-body">

									<div class="form-group">
										<label for="field-1" class="col-sm-3 control-label">
											<?php echo get_phrase('titlul_website');?>
										</label>
										<div class="col-sm-6">
											<input type="text" class="form-control" name="title_<?php echo $i;?>"
												value="<?php echo $slider[$i]->title;?>"
													required>
										</div>
									</div>
									<div class="form-group">
										<label for="field-1" class="col-sm-3 control-label">
											<?php echo get_phrase('descriere');?>
										</label>
										<div class="col-sm-6">
											<textarea class="form-control" rows="5"
												name="description_<?php echo $i;?>"
													required><?php echo $slider[$i]->description;?></textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-sm-3 control-label"><?php echo get_phrase('image');?></label>
										
										<div class="col-sm-6">
											
											<div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden">
												<div class="fileinput-new thumbnail" style="width: 356px; height: 200px;" data-trigger="fileinput">
													<img src="<?php echo base_url();?>uploads/frontend/slider_images/<?php echo $slider[$i]->image;?>" 
														alt="...">
												</div>
												<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 356px; max-height: 200px; line-height: 6px;"></div>
												<div>
													<span class="btn btn-white btn-file">
														<span class="fileinput-new"><?php echo get_phrase('selectteaza_imagine');?></span>
														<span class="fileinput-exists"><?php echo get_phrase('schimba');?></span>
														<input type="file" name="slider_image_<?php echo $i;?>" accept="image/*">
													</span>
													<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('sterge');?></a>
												</div>
											</div>
											
										</div>
									</div>

							</div>
						</div>
					<?php } ?>
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"></label>
						<div class="col-sm-2">
							<button type="submit" class="btn btn-info btn-block">
								<?php echo get_phrase('savlveaza_schimbarile');?>
							</button>
						</div>
					</div>
				</form>

			</div>

			<div class="tab-pane" id="tab2">
				<?php $welcome = json_decode($welcome_content);?>
				<form action="<?php echo site_url('admin/frontend_settings/welcome_section');?>" 
					class="form-groups form-horizontal" method="post"
						enctype="multipart/form-data">

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">
								<?php echo get_phrase('sautare_titlu');?>
							</label>
							<div class="col-sm-6">
								<input type="text" class="form-control" name="title"
									value="<?php echo $welcome[0]->title;?>"
										required>
							</div>
						</div>
						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label">
								<?php echo get_phrase('mesajul_salutare');?>
							</label>
							<div class="col-sm-6">
								<textarea class="form-control" rows="8"
									name="message"
										required><?php echo $welcome[0]->description;?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label"><?php echo get_phrase('imaginea_din_stanga');?></label>
							
							<div class="col-sm-6">
								
								<div class="fileinput fileinput-new" data-provides="fileinput"><input type="hidden">
									<div class="fileinput-new thumbnail" style="width: 250px; height: 250px;" data-trigger="fileinput">
										<img src="<?php echo base_url();?>uploads/frontend/<?php echo $welcome[0]->image;?>" 
											alt="...">
									</div>
									<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 250px; max-height: 250px; line-height: 6px;"></div>
									<div>
										<span class="btn btn-white btn-file">
											<span class="fileinput-new"><?php echo get_phrase('selecteaza_imagine');?></span>
											<span class="fileinput-exists"><?php echo get_phrase('schimba');?></span>
											<input type="file" name="left_image" accept="image/*">
										</span>
										<a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput"><?php echo get_phrase('sterge');?></a>
									</div>
								</div>
								
							</div>
						</div>

						<div class="form-group">
							<label for="field-1" class="col-sm-3 control-label"></label>
							<div class="col-sm-2">
								<button type="submit" class="btn btn-info btn-block">
									<?php echo get_phrase('salveaza_schimbarile');?>
								</button>
							</div>
						</div>
				
				</form>

			</div>
		</div>
        
    </div>

</div>

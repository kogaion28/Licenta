<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo get_phrase('editeaza_profil');?></h4>
                </div>
            </div>
            <div class="panel-body">
                <?php
                foreach($edit_data as $row):
                    ?>
                    <?php echo form_open(site_url('admin/manage_profile/update_profile_info'), array('class' => 'form-horizontal form-groups validate','target'=>'_top'));?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('nume');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>" required/>
                            </div>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-offset-3 col-sm-5">
                              <button type="submit" class="btn btn-success">
                                  <i class="fa fa-check"></i>&nbsp;
                                  <?php echo get_phrase('actualizare_profil');?></button>
                          </div>
                            </div>
                    </form>
                    <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</div>


<!--password-->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" >
            <div class="panel-heading">
                <div class="panel-title">
                    <h4><?php echo get_phrase('schimba_paroala');?></h4>
                </div>
            </div>
            <div class="panel-body">
					<?php
                    foreach($edit_data as $row):
                        ?>
                        <?php echo form_open(site_url('admin/manage_profile/change_password'), array('class' => 'form-horizontal form-groups validate','target'=>'_top'));?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('parola_curenta');?></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="password" value="" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('noua_parola');?></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="new_password" value="" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('confirma_noua_parola');?></label>
                                <div class="col-sm-5">
                                    <input type="password" class="form-control" name="confirm_new_password" value="" required/>
                                </div>
                            </div>
                            <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-success">
                                      <i class="fa fa-check"></i>&nbsp;
                                      <?php echo get_phrase('actualizaeza_parola');?></button>
                              </div>
								</div>
                        </form>
						<?php
                    endforeach;
                    ?>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('adauga_donator_de_sange'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups" action="<?php echo site_url('laboratorist/blood_donor/create'); ?>" 
                    method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('nume'); ?></label>

                        <div class="col-sm-7">
                            <input type="text" name="name" class="form-control" id="field-1" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email'); ?></label>

                        <div class="col-sm-7">
                            <input type="email" name="email" class="form-control" id="field-1" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('adresa'); ?></label>

                        <div class="col-sm-7">
                            <textarea rows="5" name="address" class="form-control" id="field-ta"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('telefon'); ?></label>

                        <div class="col-sm-7">
                            <input type="text" name="phone" class="form-control" id="field-1" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('sex'); ?></label>

                        <div class="col-sm-7">
                            <select name="sex" class="form-control">
                                <option value=""><?php echo get_phrase('select_sex'); ?></option>
                                <option value="male"><?php echo get_phrase('male'); ?></option>
                                <option value="female"><?php echo get_phrase('female'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('varsta'); ?></label>

                        <div class="col-sm-7">
                            <input type="number" name="age" class="form-control" id="field-1" >
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('grupa_de_sange'); ?></label>

                        <div class="col-sm-7">
                            <select name="blood_group" class="form-control select2" required>
                                <option value=""><?php echo get_phrase('selecteaza_grupa_de_sange'); ?></option>
                                <option value="A+">A+</option>
                                <option value="A-">A-</option>
                                <option value="B+">B+</option>
                                <option value="B-">B-</option>
                                <option value="AB+">AB+</option>
                                <option value="AB-">AB-</option>
                                <option value="O+">O+</option>
                                <option value="O-">O-</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('last_donation_date'); ?></label>

                        <div class="col-sm-7">
                            <input type="text" name="last_donation_timestamp" class="form-control datepicker" id="field-1" required>
                        </div>
                    </div>

                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> &nbsp;
                            <?php echo get_phrase('salveaza');?>
                        </button>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>

<?php
$patient_info = $this->db->get('patient')->result_array();
$doctor_info = $this->db->get('doctor')->result_array();
?>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('addauga_raport'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups" action="<?php echo site_url('nurse/report/create'); ?>" 
                    method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('tipul'); ?></label>

                        <div class="col-sm-7">
                            <select name="type" class="form-control select2" required>
                                <option value=""><?php echo get_phrase('selecteaza_tipul'); ?></option>
                                <option value="operation"><?php echo get_phrase('operati'); ?></option>
                                <option value="birth"><?php echo get_phrase('nascuti'); ?></option>
                                <option value="death"><?php echo get_phrase('decedati'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('descriere'); ?></label>

                        <div class="col-sm-7">
                            <textarea rows="5" name="description" class="form-control" id="field-ta"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('data'); ?></label>

                        <div class="col-sm-7">
                            <input type="text" name="timestamp" class="form-control datepicker" id="field-1" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('pacienti'); ?></label>

                        <div class="col-sm-7">
                            <select name="patient_id" class="form-control select2" required>
                                <option value=""><?php echo get_phrase('selecteaza_pacient'); ?></option>
                                <?php foreach ($patient_info as $row) { ?>
                                    <option value="<?php echo $row['patient_id']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('doctor'); ?></label>

                        <div class="col-sm-7">
                            <select name="doctor_id" class="form-control select2" required>
                                <option value=""><?php echo get_phrase('selecteaza_doctor'); ?></option>
                                <?php foreach ($doctor_info as $row) { ?>
                                    <option value="<?php echo $row['doctor_id']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label">Select File</label>
                        <div class="col-sm-6">
                            <input type="file" class="file2 btn btn-info" multiple="multiple" data-label="&nbsp;Browse Files"
                                style="left: 21.25px; top: 3.5px;" name="userfile[]">
                        </div>
                    </div>

                    <div class="col-sm-3 control-label col-sm-offset-2">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> <?php echo get_phrase('salveaza');?>
                        </button>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>

<?php
$patient_info = $this->db->get('patient')->result_array();
$single_report_info = $this->db->get_where('report', array('report_id' => $param2))->result_array();
foreach ($single_report_info as $row) {
?>
    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-primary" data-collapsed="0">

                <div class="panel-heading">
                    <div class="panel-title">
                        <h3><?php echo get_phrase('editeaza_raport'); ?></h3>
                    </div>
                </div>

                <div class="panel-body">

                    <form role="form" class="form-horizontal form-groups" action="<?php echo site_url('doctor/report/update/'.$row['report_id']); ?>" 
                        method="post" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('tipul'); ?></label>

                            <div class="col-sm-7">
                                <select name="type" class="form-control select2" required>
                                    <option value=""><?php echo get_phrase('selecteaza_tipul'); ?></option>
                                    <option value="operation" <?php if ($row['type'] == 'operation') echo 'selected';?>>
                                        <?php echo get_phrase('operati'); ?>
                                    </option>
                                    <option value="birth" <?php if ($row['type'] == 'birth') echo 'selected';?>>
                                        <?php echo get_phrase('nasteri'); ?>
                                    </option>
                                    <option value="death" <?php if ($row['type'] == 'death') echo 'selected';?>>
                                        <?php echo get_phrase('decese'); ?>
                                    </option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('descriere'); ?></label>

                            <div class="col-sm-7">
                                <textarea rows="5" name="description" class="form-control" id="field-ta"><?php echo $row['description']; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('data'); ?></label>

                            <div class="col-sm-7">
                                <input type="text" name="timestamp" class="form-control datepicker" id="field-1" value="<?php echo date("m/d/Y", $row['timestamp']); ?>" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('pacient'); ?></label>

                            <div class="col-sm-7">
                                <select name="patient_id" class="form-control select2" required>
                                    <option value=""><?php echo get_phrase('selecteaza_pacient'); ?></option>
                                    <?php foreach ($patient_info as $row2) { ?>
                                        <option value="<?php echo $row2['patient_id']; ?>" <?php if ($row['patient_id'] == $row2['patient_id']) echo 'selected';?>>
                                            <?php echo $row2['name']; ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-3 control-label col-sm-offset-2">
                            <button type="submit" class="btn btn-success">
                                <i class="fa fa-check"></i> <?php echo get_phrase('actualizeaza');?>
                            </button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
<?php } ?>

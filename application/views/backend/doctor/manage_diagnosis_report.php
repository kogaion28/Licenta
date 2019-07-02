<?php
$prescription_id        = $param2;
$doctor_id              = $param3;
$diagnosis_report_info  = $this->db->get_where('diagnosis_report', array('prescription_id' => $param2))->result_array();
?>
<?php if ( !empty($diagnosis_report_info) ) { ?>
<table class="table table-bordered table-striped dataTable" id="table-2">
    <thead>
        <tr>
            <th><?php echo get_phrase('data');?></th>
            <th><?php echo get_phrase('tip_raport');?></th>
            <th><?php echo get_phrase('tip_document');?></th>
            <th><?php echo get_phrase('descriere');?></th>
            <th><?php echo get_phrase('optiuni');?></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($diagnosis_report_info as $row) { ?>   
            <tr>
                <td><?php echo date("d M, Y -  H:i", $row['timestamp']); ?></td>
                <td><?php echo $row['report_type']; ?></td>
                <td><?php echo $row['document_type']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td>
                    <a href="<?php echo base_url().'uploads/diagnosis_report/'.$row['file_name']; ?>" class="btn btn-info">
                        <i class="fa fa-download"></i>
                    </a>
                    <?php if($doctor_id == $this->session->userdata('login_user_id')) { ?>
                    <a onclick="confirm_modal('<?php echo site_url('doctor/diagnosis_report/delete/'.$row['diagnosis_report_id']); ?>')"
                        class="btn btn-danger btn-sm">
                            <i class="fa fa-trash-o"></i>
                    </a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php } else { ?>
    <p style="font-size: 15px;">No diagnosis report has been created for this prescription yet.</p>
<?php } if($doctor_id == $this->session->userdata('login_user_id')) { ?>
<hr>
<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('adagua_rapor_diagnostic'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups" action="<?php echo site_url('doctor/diagnosis_report/create'); ?>" 
                    method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('data'); ?></label>

                        <div class="col-sm-7">
                            <div class="date-and-time">
                                <input type="text" name="date_timestamp" class="form-control datepicker" data-format="D, dd MM yyyy" placeholder="date here">
                                <input type="text" name="time_timestamp" class="form-control timepicker" data-template="dropdown" data-show-seconds="false" data-default-time="00:05 AM" data-show-meridian="false" data-minute-step="5"  placeholder="time here">
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('tipul_raportului'); ?></label>

                        <div class="col-sm-7">
                            <select name="report_type" class="form-control">
                                <option value=""><?php echo get_phrase('selecteaza_tipul_raportului'); ?></option>
                                <option value="xray"><?php echo get_phrase('razele-x'); ?></option>
                                <option value="blood_test"><?php echo get_phrase('test_sange'); ?></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('documente'); ?></label>

                        <div class="col-sm-7">

                            <input type="file" name="file_name" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse" />

                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('tiplu_document'); ?></label>

                        <div class="col-sm-7">
                            <select name="document_type" class="form-control">
                                <option value=""><?php echo get_phrase('selecteaza_tipul_documentului'); ?></option>
                                <option value="image"><?php echo get_phrase('imagine'); ?></option>
                                <option value="doc"><?php echo get_phrase('doc'); ?></option>
                                <option value="pdf"><?php echo get_phrase('pdf'); ?></option>
                                <option value="excel"><?php echo get_phrase('excel'); ?></option>
                                <option value="other"><?php echo get_phrase('other'); ?></option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('descriere'); ?></label>

                        <div class="col-sm-9">
                            <textarea name="description" class="form-control html5editor" id="field-ta" data-stylesheet-url="assets/css/wysihtml5-color.css"></textarea>
                        </div>
                    </div>
                    
                    <input type="hidden" name="prescription_id" value="<?php echo $prescription_id; ?>">

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
<?php } ?>

<script type="text/javascript">
    jQuery(window).load(function ()
    {
        var $ = jQuery;

        $("#table-2").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>"
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });

        // Highlighted rows
        $("#table-2 tbody input[type=checkbox]").each(function (i, el)
        {
            var $this = $(el),
                    $p = $this.closest('tr');

            $(el).on('change', function ()
            {
                var is_checked = $this.is(':checked');

                $p[is_checked ? 'addClass' : 'removeClass']('highlight');
            });
        });

        // Replace Checboxes
        $(".pagination a").click(function (ev)
        {
            replaceCheckboxes();
        });
    });
</script>
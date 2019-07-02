<?php if($menu_check == 'from_prescription') { ?>
<button onclick="showAjaxModal('<?php echo site_url('modal/popup/add_prescription');?>');" 
    class="btn btn-primary pull-right">
        <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('adauga_reteta'); ?>
</button>
<div style="clear:both;"></div>
<br>
<?php } ?>
<table class="table table-bordered table-striped datatable" id="table-2">
    <thead>
        <tr>
            <th><?php echo get_phrase('data');?></th>
            <th><?php echo get_phrase('pacient');?></th>
            <th><?php echo get_phrase('doctor');?></th>
            <th><?php echo get_phrase('optiuni');?></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($prescription_info as $row) { ?>   
            <tr>
                <td><?php echo date("d M, Y -  H:i", $row['timestamp']); ?></td>
                <td>
                    <?php $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;
                        echo $name;?>
                </td>
                <td>
                    <?php $name = $this->db->get_where('doctor' , array('doctor_id' => $row['doctor_id'] ))->row()->name;
                        echo $name;?>
                </td>
                <td>
                    <?php if($menu_check == 'from_prescription') { ?>
                        <a  onclick="showAjaxModal('<?php echo site_url('modal/popup/edit_prescription/'.$row['prescription_id'].'/'.$menu_check);?>');" 
                            class="btn btn-info btn-sm">
                                <i class="fa fa-pencil"></i>&nbsp;
                                <?php echo get_phrase('editeaza');?>
                        </a>
                    <?php } ?>
                    <a  onclick="showAjaxModal('<?php echo site_url('modal/popup/show_prescription/'.$row['prescription_id']);?>');" 
                        class="btn btn-default btn-sm">
                            <i class="fa fa-eye"></i>&nbsp;
                            <?php echo get_phrase('vezi_reteta');?>
                    </a>
                    <a  onclick="showAjaxModal('<?php echo site_url('modal/popup/manage_diagnosis_report/'.$row['prescription_id'].'/'.$row['doctor_id']);?>');" 
                        class="btn btn-default btn-sm">
                            <i class="fa fa-eye"></i>&nbsp;
                            <?php echo get_phrase('vezi_raport_diagnostic');?>
                    </a>
                    <?php if($menu_check == 'from_prescription') { ?>
                        <a onclick="confirm_modal('<?php echo site_url('doctor/prescription/delete/'.$row['prescription_id'].'/'.$menu_check.'/'.$row['patient_id']); ?>')"
                            class="btn btn-danger btn-sm">
                                <i class="fa fa-trash-o"></i>&nbsp;
                                <?php echo get_phrase('sterge');?>
                        </a>
                    <?php } ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

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
<button onclick="showAjaxModal('<?php echo site_url('modal/popup/add_bed_allotment');?>');" 
    class="btn btn-primary pull-right">
        <i class="fa fa-plus"></i> &nbsp;<?php echo get_phrase('adauga_alocare_pat'); ?>
</button>
<div style="clear:both;"></div>
<br>
<table class="table table-bordered table-striped datatable" id="table-2">
    <thead>
        <tr>
            <th><?php echo get_phrase('nr_pat');?></th>
            <th><?php echo get_phrase('tip_pat');?></th>
            <th><?php echo get_phrase('pacienti');?></th>
            <th><?php echo get_phrase('alocare_timp');?></th>
            <th><?php echo get_phrase('descarcare_timp');?></th>
            <th><?php echo get_phrase('optiuni');?></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($bed_allotment_info as $row) { ?>   
            <tr>
                <td>
                    <?php $bed_number = $this->db->get_where('bed' , array('bed_id' => $row['bed_id'] ))->row()->bed_number;
                        echo $bed_number;?>
                </td>
                <td>
                    <?php $type = $this->db->get_where('bed' , array('bed_id' => $row['bed_id'] ))->row()->type;
                        echo $type;?>
                </td>
                <td>
                    <?php $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;
                        echo $name;?>
                </td>
                <td><?php echo date("m/d/Y", $row['allotment_timestamp']); ?></td>
                <td><?php echo date("m/d/Y", $row['discharge_timestamp']); ?></td>
                <td>
                    <a  onclick="showAjaxModal('<?php echo site_url('modal/popup/edit_bed_allotment/'.$row['bed_allotment_id']);?>');" 
                        class="btn btn-info btn-sm">
                            <i class="fa fa-pencil"></i> &nbsp;
                            <?php echo get_phrase('editeaza');?>
                    </a>
                    <a onclick="confirm_modal('<?php echo site_url('nurse/bed_allotment/delete/'.$row['bed_allotment_id']); ?>')"
                        class="btn btn-danger btn-sm">
                            <i class="fa fa-trash-o"></i>
                        <?php echo get_phrase('sterge');?>
                    </a>
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
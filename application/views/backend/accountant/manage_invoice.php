<table class="table table-bordered table-striped datatable" id="table-2">
    <thead>
        <tr>
            <th><?php echo get_phrase('numar_factura_fiscala'); ?></th>
            <th><?php echo get_phrase('titlu'); ?></th>
            <th><?php echo get_phrase('pacient'); ?></th>
            <th><?php echo get_phrase('data_creieri'); ?></th>
            <th><?php echo get_phrase('dator_date'); ?></th>
            <th><?php echo get_phrase('tva_percentaj'); ?></th>
            <th><?php echo get_phrase('discont'); ?></th>
            <th><?php echo get_phrase('status'); ?></th>
            <th><?php echo get_phrase('optiuni'); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($invoice_info as $row) { ?>   
            <tr>
                <td><?php echo $row['invoice_number'] ?></td>
                <td><?php echo $row['title'] ?></td>
                <td>
                    <?php $name = $this->db->get_where('patient' , array('patient_id' => $row['patient_id'] ))->row()->name;
                        echo $name;?>
                </td>
                <td><?php echo $row['creation_timestamp'] ?></td>
                <td><?php echo $row['due_timestamp'] ?></td>
                <td><?php echo $row['vat_percentage'] ?></td>
                <td><?php echo $row['discount_amount'] ?></td>
                <td><?php echo $row['status'] ?></td>
                <td>
                    <a  onclick="showAjaxModal('<?php echo site_url('modal/popup/edit_invoice/'.$row['invoice_id']); ?>');" 
                        class="btn btn-info btn-sm">
                        <i class="fa fa-pencil"></i> &nbsp;
                        <?php echo get_phrase('editeaza');?>
                    </a>
                    <a  onclick="showAjaxModal('<?php echo site_url('modal/popup/view_invoice/'.$row['invoice_id']); ?>');" 
                        class="btn btn-default btn-sm">
                        <i class="fa fa-eye"></i> &nbsp;
                        <?php echo get_phrase('vezi_factura');?>
                    </a>
                    <a onclick="confirm_modal('<?php echo site_url('accountant/invoice_manage/delete/'.$row['invoice_id']); ?>')"
                       class="btn btn-danger btn-sm">
                        <i class="fa fa-trash-o"></i> &nbsp;
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

<table class="table table-bordered table-striped datatable" id="table-2">
    <thead>
        <tr>
            <th><?php echo get_phrase('nume'); ?></th>
            <th><?php echo get_phrase('varsta'); ?></th>
            <th><?php echo get_phrase('sex'); ?></th>
            <th><?php echo get_phrase('grupa_de_sange'); ?></th>
            <th><?php echo get_phrase('ultima_donatie_la_data'); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($blood_donor_info as $row) { ?>   
            <tr>
                <td><?php echo $row['name'] ?></td>
                <td><?php echo $row['age'] ?></td>
                <td><?php echo $row['sex'] ?></td>
                <td><?php echo $row['blood_group'] ?></td>
                <td><?php echo date("m/d/Y", $row['last_donation_timestamp']) ?></td>
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
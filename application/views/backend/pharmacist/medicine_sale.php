<a href="<?php echo site_url('pharmacist/create_medicine_sale'); ?>i"
    class="btn btn-primary pull-right">
        <i class="fa fa-plus"></i> &nbsp;<?php echo get_phrase('add_medicine_sale'); ?>
</a>
<div style="clear:both;"></div>
<br>
<table class="table table-bordered table-striped datatable" id="table-2">
    <thead>
        <tr>
            <th style="width: 67px;">#</th>
            <th><?php echo get_phrase('medicamente'); ?></th>
            <th><?php echo get_phrase('pret_total'); ?></th>
            <th><?php echo get_phrase('pacient'); ?></th>
            <th><?php echo get_phrase('optiuni'); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php
        $counter        = 1;
        $this->db->order_by('medicine_sale_id', 'desc');
        $medicine_sales = $this->db->get('medicine_sale')->result_array();
        foreach ($medicine_sales as $row) { ?>   
            <tr>
                <td><?php echo $counter++; ?></td>
                <td>
                    <div>
                        <table style="width: 100%;">
                            <tr>
                                <td style="text-align: center;"><?php echo get_phrase('nume_medicamnet'); ?></td>
                                <td style="text-align: center;"><?php echo get_phrase('cantitate'); ?></td>
                                <td style="text-align: center;"><?php echo get_phrase('pret'); ?></td>
                            </tr>
                            <tr>
                                <td colspan="4"><hr style="margin: 5px 0px;"></td>
                            </tr>
                            <?php
                            $medicines      = json_decode($row['medicines']);
                            foreach($medicines as $row2) { ?>
                                <tr>
                                    <td style="text-align: center;">
                                        <?php
                                        $medicine_info = $this->db->get_where('medicine', array('medicine_id' => $row2->medicine_id))->row();
                                        echo $medicine_info->name; ?>
                                    </td>
                                    <td style="text-align: center;"><?php echo $row2->quantity; ?></td>
                                    <td style="text-align: center;"><?php echo $row2->quantity * $medicine_info->price; ?></td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                </td>
                <td><?php echo $row['total_amount'] ?></td>
                <td>
                    <?php echo $this->db->get_where('patient', array('patient_id' => $row['patient_id']))->row()->name; ?>
                </td>
                <td>
                    <a onclick="showAjaxModal('<?php echo site_url('modal/popup/medicine_sale_invoice/' . $row['medicine_sale_id']); ?>');" 
                        class="btn btn-default btn-sm">
                        <i class="fa fa-eye"></i> &nbsp;
                        <?php echo get_phrase('vezi_factura_fiscala');?>
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
            "sPaginationType": "bootstrap"
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });
    });
</script>
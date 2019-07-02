<div id="invoice_entry">
    <div class="form-group">
        
        <div id="form_element"></div>
        
        <div class="col-sm-2">
            <button type="button" class="btn btn-default" onclick="deleteParentElement(this)">
                <i class="fa fa-trash-o"></i>
            </button>
        </div>

    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <?php echo form_open(site_url('accountant/invoice_add/create'), array('class' => 'form-horizontal form-groups validate invoice-add', 'enctype' => 'multipart/form-data')); ?>
        <div class="form-group">
            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('tipul'); ?></label>

            <div class="col-sm-3">
                <select name="type" class="form-control" id="element_type">
                    <option value="text"><?php echo get_phrase('text'); ?></option>
                    <option value="textarea"><?php echo get_phrase('textarea'); ?></option>
                </select>
            </div>
            
            <div class="col-sm-3">
                <button type="button" class="btn btn-default btn-sm"
                        onClick="add_entry()">
                    <i class="fa fa-plus"></i> &nbsp;
                    <?php echo get_phrase('adăugați_elementul_de_formă'); ?>
                </button>
            </div>
        </div>
        <?php echo form_close(); ?>
    </div>
</div>

<script>

    // CREAREA INTRARII INTRARII FACTURILOR
    var blank_invoice_entry = '';
    $(document).ready(function () {
        blank_invoice_entry = $('#invoice_entry').html();
        $('#invoice_entry').remove();
    });

    function add_entry()
    {
        var element_type = document.getElementById("element_type").value;
        
        $.ajax({
            url: '<?php echo site_url('accountant/get_form_element/'); ?>' + element_type,
                        success: function (response)
                        {
                            //jQuery('.main_data').html(response);
                            //document.write(response);
                            $("#form_element").append(response);
                        }
                    });
        
    }

    //Eliminarea intrării în factură
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }

</script>
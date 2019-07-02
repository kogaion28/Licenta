<?php
$edit_data = $this->db->get_where('invoice', array('invoice_id' => $param2))->result_array();
foreach ($edit_data as $row):
?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary" data-collapsed="0">
                <div class="panel-heading">
                    <div class="panel-title" >
                        <?php echo get_phrase('editeaza_factura_fiscala'); ?>
                    </div>
                </div>
                <div class="panel-body">

                    <?php echo form_open(site_url('accountant/invoice_manage/update/' . $param2), array('class' => 'form-horizontal form-groups invoice-edit', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('titlu_factura_fiscala'); ?></label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="title" id="title" data-validate="required"
                                   data-message-required="<?php echo get_phrase('cerere_valuare'); ?>"
                                   value="<?php echo $row['title']; ?>" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('numar_factura_fiscala'); ?></label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="invoice_number"  value="<?php echo $row['invoice_number']; ?>"  readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('pacient'); ?></label>

                        <div class="col-sm-7">
                            <select name="patient_id" class="select2" required>
                                <option value=""><?php echo get_phrase('selecteaza_un_pacient'); ?></option>
                                <?php
                                $patients = $this->db->get('patient')->result_array();
                                foreach ($patients as $row2):
                                    ?>
                                    <option value="<?php echo $row2['patient_id']; ?>"
                                        <?php if ($row['patient_id'] == $row2['patient_id']) echo 'selected'; ?>>
                                            <?php echo $row2['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('data_creieri'); ?></label>

                        <div class="col-sm-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-calendar"></i></span>
                                <input type="text" class="form-control datepicker" name="creation_timestamp"
                                       value="<?php echo $row['creation_timestamp']; ?>" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('due_data'); ?></label>

                        <div class="col-sm-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-calendar"></i></span>
                                <input type="text" class="form-control datepicker" name="due_timestamp"
                                       value="<?php echo $row['due_timestamp']; ?>" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('tva_percente'); ?></label>

                        <div class="col-sm-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-info-circled"></i></span>
                                <input type="text" class="form-control" name="vat_percentage"
                                       value="<?php echo $row['vat_percentage']; ?>" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('valoarea_discont'); ?></label>

                        <div class="col-sm-7">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-info-circled"></i></span>
                                <input type="text" class="form-control" name="discount_amount"
                                       value="<?php echo $row['discount_amount']; ?>" >
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('statusul_platilor'); ?></label>

                        <div class="col-sm-7">
                            <select name="status" class="select2" required>
                                <option value=""><?php echo get_phrase('selecteaza_un_status'); ?></option>
                                <option value="paid" <?php if ($row['status'] == 'paid') echo 'selected'; ?>>
                                    <?php echo get_phrase('platit'); ?>
                                </option>
                                <option value="unpaid"<?php if ($row['status'] == 'unpaid') echo 'selected'; ?>>
                                    <?php echo get_phrase('neplatit'); ?>
                                </option>
                            </select>
                        </div>
                    </div>

                    <hr>
                    <!-- INTRAREA FACTURII ESTE AICI-->
                    <div id="invoice_entry">
                        <?php
                        $invoice_entries = json_decode($row['invoice_entries']);
                        foreach ($invoice_entries as $invoice_entry) {
                            ?>
                            <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label">
                                    <?php echo get_phrase('factura_fiscala_intrare'); ?></label>

                                <div class="col-sm-7">
                                    <input type="text" class="form-control" name="entry_description[]"
                                           value="<?php echo $invoice_entry->description; ?>"
                                           placeholder="<?php echo get_phrase('descriere'); ?>" >
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" class="form-control" name="entry_amount[]"
                                           value="<?php echo $invoice_entry->amount; ?>"
                                           placeholder="<?php echo get_phrase('cantitate'); ?>" min=0>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-danger" onclick="deleteParentElement(this)">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </div>

                            </div>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- INTRAREA FACTURII ESTE AICI-->

                    <!-- INTRAREA TEMPORARĂ A FACTURĂ ESTE ÎNCEPUTĂE-->
                    <div id="invoice_entry_temp">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('intrarea_facturii'); ?></label>

                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="entry_description[]"  value=""
                                       placeholder="<?php echo get_phrase('descriere'); ?>" >
                            </div>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="entry_amount[]"  value=""
                                       placeholder="<?php echo get_phrase('cantitatea'); ?>" >
                            </div>
                            <div class="col-sm-2">
                                <button type="button" class="btn btn-danger" onclick="deleteParentElement(this)">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </div>

                        </div>
                    </div>
                    <!-- INTRAREA TEMPORARĂ A FACTURĂ ESTE AICI-->


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="button" class="btn btn-default btn-sm"
                                    onClick="add_entry()">
                                <i class="fa fa-plus"></i> &nbsp;
                                <?php echo get_phrase('adauga_factura_fiscala_intrare'); ?>
                            </button>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-8">
                            <button type="submit" class="btn btn-info" id="submit-button">
                                <?php echo get_phrase('actualizare_factura_fiscala'); ?></button>
                            <span id="preloader-form"></span>
                        </div>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>



<script>

    // CREAREA INTRARII INTRARII FACTURILOR
    var blank_invoice_entry = '';
    $(document).ready(function () {
        blank_invoice_entry = $('#invoice_entry_temp').html();
        $('#invoice_entry_temp').remove();
    });

    function add_entry()
    {
        $("#invoice_entry").append(blank_invoice_entry);
    }

    // Eliminarea intrării în factură
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }

</script>

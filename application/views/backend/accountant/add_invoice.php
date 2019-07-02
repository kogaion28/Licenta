<div class="row">
    <div class="col-md-12">
        <div class="panel panel-primary" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title" >
                    <i class="fa fa-plus"></i> &nbsp;
                    <?php echo get_phrase('adauga_factura_fiscala'); ?>
                </div>
            </div>
            <div class="panel-body">

                <?php echo form_open(site_url('accountant/invoice_add/create'), array('class' => 'form-horizontal form-groups invoice-add', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('factura_fiscala_titlu'); ?></label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="title" id="title" data-validate="required"
                               data-message-required="<?php echo get_phrase('valoare_necesară'); ?>" value="" autofocus required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('număr_de_factură'); ?></label>

                    <div class="col-sm-7">
                        <input type="text" class="form-control" name="invoice_number"  value="<?php echo rand(10000, 100000); ?>"  readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('pacient'); ?></label>

                    <div class="col-sm-7">
                        <select name="patient_id" class="select2" id = "patient" required>
                            <option value = ""><?php echo get_phrase('selecteaza_un_pacient'); ?></option>
                            <?php
                            $patients = $this->db->get('patient')->result_array();
                            foreach ($patients as $row2):
                                ?>
                                <option value="<?php echo $row2['patient_id']; ?>">
                                    <?php echo $row2['name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label">
                        <?php echo get_phrase('data_creieri'); ?></label>

                    <div class="col-sm-7">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-calendar"></i></span>
                            <input type="text" class="form-control datepicker" name="creation_timestamp"
                                   value="<?php echo date("m/d/Y"); ?>" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('due_data'); ?></label>

                    <div class="col-sm-7">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-calendar"></i></span>
                            <input type="text" class="form-control datepicker" name="due_timestamp"
                                   value="" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('vat_procentaj'); ?></label>

                    <div class="col-sm-7">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-info-circled"></i></span>
                            <input type="text" class="form-control" name="vat_percentage"
                                   value="" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('reducere'); ?></label>

                    <div class="col-sm-7">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="entypo-info-circled"></i></span>
                            <input type="text" class="form-control" name="discount_amount"
                                   value="" >
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('statusul_plati'); ?></label>

                    <div class="col-sm-7">
                        <select name="status" class="select2" id = "payment_status" required>
                            <option value= ""><?php echo get_phrase('select_a_status'); ?></option>
                            <option value="paid"><?php echo get_phrase('paid'); ?></option>
                            <option value="unpaid"><?php echo get_phrase('unpaid'); ?></option>
                        </select>
                    </div>
                </div>

                <hr>

                <!-- FORMULARUL INTRARE ESTE ÎNCEPUT AICI-->
                <div id="invoice_entry">
                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('intrarea_facturii'); ?></label>

                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="entry_description[]"  value=""
                                   placeholder="<?php echo get_phrase('descriere'); ?>" >
                        </div>
                        <div class="col-sm-2">
                            <input type="number" class="form-control" name="entry_amount[]"  value=""
                                   placeholder="<?php echo get_phrase('suma'); ?>" min=0>
                        </div>
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-danger" onclick="deleteParentElement(this)">
                                <i class="fa fa-trash-o"></i>
                            </button>
                        </div>

                    </div>
                </div>
                <!-- FORMULARUL DE INTRARE ESTE AICI-->


                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                        <button type="button" class="btn btn-primary btn-sm"
                                onClick="add_entry()">
                            <i class="fa fa-plus"></i> &nbsp;
                            <?php echo get_phrase('adauga_intarare_factura'); ?>
                        </button>
                    </div>
                </div>

                <hr>

                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                        <button type="submit" class="btn btn-info" id="submit-button">
                            <?php echo get_phrase('creaza_o_noua_intrare'); ?></button>
                        <span id="preloader-form"></span>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>

<script>
    // CREAREA INTRARII INTRARII FACTURILOR
    var blank_invoice_entry = '';
    $(document).ready(function () {
        blank_invoice_entry = $('#invoice_entry').html();
        //$('#submit-button').attr('disabled', true);
    });

    function add_entry()
    {
        $("#invoice_entry").append(blank_invoice_entry);
    }

    // Eliminarea intrării în factură
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }
  //   var payment_status;
  //   var patient;
  //   $('#payment_status').change(function(){
  //     payment_status = $('#payment_status').val();
  //     check_button();
  //   });
  //   $('#patient').change(function(){
  //     patient = $('#patient').val();
  //     check_button();
  //   });
  // function check_button(){
  //   if (typeof payment_status !== "undefined" && payment_status !== '' && typeof patient !== "undefined" && patient !== '') {
  //     console.log('payment_status: '+payment_status+' Patient: '+patient);
  //     $('#submit-button').removeAttr('disabled');
  //   }
  //   else{
  //     $('#submit-button').attr('disabled', true);
  //   }
  // }

</script>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-primary" data-collapsed="0">

            <div class="panel-heading">
                <div class="panel-title">
                    <h3><?php echo get_phrase('adauga_pat'); ?></h3>
                </div>
            </div>

            <div class="panel-body">

                <form role="form" class="form-horizontal form-groups" action="<?php echo site_url('nurse/bed/create'); ?>" 
                    method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('nr_pat'); ?></label>

                        <div class="col-sm-7">
                            <input type="number" name="bed_number" class="form-control" id="field-1" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('tipul'); ?></label>

                        <div class="col-sm-7">
                            <select name="type" class="form-control select2" required>
                                <option value=""><?php echo get_phrase('selecteaza_tipul'); ?></option>
                                <option value="ward"><?php echo get_phrase('cartier'); ?></option>
                                <option value="cabin"><?php echo get_phrase('cabină'); ?></option>
                                <option value="icu"><?php echo get_phrase('unitatea_de_terapie_intensivă'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="field-ta" class="col-sm-3 control-label"><?php echo get_phrase('descriere'); ?></label>

                        <div class="col-sm-7">
                            <textarea rows="5" name="description" class="form-control" id="field-ta"></textarea>
                        </div>
                    </div>

                    <div class="col-sm-3 control-label col-sm-offset-1">
                        <button type="submit" class="btn btn-success">
                            <i class="fa fa-check"></i> <?php echo get_phrase('salveaza');?>
                        </button>
                    </div>
                </form>

            </div>

        </div>

    </div>
</div>

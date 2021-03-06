<div class="panel panel-primary" data-collapsed="0">

    <div class="panel-heading">
        <div class="panel-title">
            <h3><?php echo get_phrase('raport_file'); ?></h3>
        </div>
    </div>

    <div class="panel-body">
        <?php
        $files = $this->db->get_where('report', array('report_id' => $param2))->row()->files;
        if($files == '') { ?>
            <div class="alert alert-info"><?php echo get_phrase('fara_file');?></div>
        <?php } else { ?>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th><?php echo get_phrase('numele_filei'); ?></th>
                        <th><?php echo get_phrase('optiuni'); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $counter    = 1;
                    $files      = json_decode($files);
                    foreach ($files as $file_name) { ?>
                        <tr>
                            <td><?php echo $file_name; ?></td>
                            <td>
                                <a href="<?php echo base_url() . 'uploads/report_file/' . $file_name; ?>" class="btn btn-blue btn-sm btn-icon icon-left">
                                    <i class="entypo-download"></i>
                                    Download
                                </a>
                                <a href="<?php echo site_url('nurse/report/delete_report_file/'.$param2.'/'.$counter); ?>" 
                                    class="btn btn-danger btn-sm btn-icon icon-left" onclick="return checkDelete();">
                                    <i class="entypo-cancel"></i>
                                    Delete
                                </a>
                            </td>
                        </tr>
                    <?php $counter++; } ?>
                </tbody>
            </table>
        <?php } ?>

    </div>

</div>
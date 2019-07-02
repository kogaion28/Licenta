<?php
$edit_data = $this->db->get_where('payroll', array('payroll_id' => $param2))->result_array();
foreach ($edit_data as $row):
    $user = $this->db->get_where($row['user_type'], array($row['user_type'] . '_id' => $row['user_id']))->row();
    $date = explode(',', $row['date']);
    $month_list = array('january', 'february', 'march', 'april', 'may', 'june', 'july',
        'august', 'september', 'october', 'november', 'december');
    for ($i = 0; $i < 12; $i++)
        if ($i == $date[0])
            $month = get_phrase($month_list[$i-1]);
    ?>
    <div id="payroll_print">
        <table width="100%" border="0">
            <tr>
                <td width="50%"><img src="uploads/logo.png" style="max-height:80px;"></td>
                <td align="right">
                    <h4><?php echo get_phrase('cod_salarizare'); ?> : <?php echo $row['payroll_code']; ?></h4>
                    <h5><?php echo get_phrase('angajat'); ?> : <?php echo $user->name; ?></h5>
                    <h5><?php echo get_phrase('tip_cont'); ?> : <?php echo get_phrase($row['user_type']); ?></h5>
                    <h5><?php echo get_phrase('data'); ?> : <?php echo $month . ', ' . $date[1]; ?></h5>
                    <h5>
                        <?php echo get_phrase('status'); ?> :
                        <?php
                        if($row['status'] == 0)
                            echo get_phrase('platit');
                        else
                            echo get_phrase('neplatit'); ?>
                    </h5>
                </td>
            </tr>
        </table>
        
        <hr><br>
        <h4 style="text-align: center;"><?php echo get_phrase('total_alocati'); ?></h4>
        <?php if($row['allowances'] == '') { ?>
            <div class="alert alert-info"><?php echo get_phrase('fara_alocati');?></div>
        <?php } else { ?>
            <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th width="60%"><?php echo get_phrase('tipul'); ?></th>
                        <th><?php echo get_phrase('suma'); ?></th>
                    </tr>
                </thead>

                <tbody>
                    <div>
                        <?php
                        $total_allowance    = 0;
                        $allowances         = json_decode($row['allowances']);
                        $i = 1;
                        foreach ($allowances as $allowance)
                        {
                            $total_allowance += $allowance->amount; ?>
                            <tr>
                                <td class="text-center"><?php echo $i++; ?></td>
                                <td>
                                    <?php echo $allowance->type; ?>
                                </td>
                                <td class="text-right">
                                    <?php echo $allowance->amount; ?>
                                </td>
                            </tr>
                        <?php }  ?>
                    </div>
                </tbody>
            </table>
        <?php } ?>
        
        <br>
        <h4 style="text-align: center;"><?php echo get_phrase('deducere_totala'); ?></h4>
        <?php if ($row['deductions'] == '') { ?>
            <div class="alert alert-info"><?php echo get_phrase('fara_deducere'); ?></div>
        <?php } else { ?>
            <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th width="60%"><?php echo get_phrase('tiplu'); ?></th>
                        <th><?php echo get_phrase('suma'); ?></th>
                    </tr>
                </thead>

                <tbody>
                <div>
                    <?php
                    $total_deduction = 0;
                    $deductions = json_decode($row['deductions']);
                    $i = 1;
                    foreach ($deductions as $deduction) {
                        $total_deduction += $deduction->amount;
                        ?>
                        <tr>
                            <td class="text-center"><?php echo $i++; ?></td>
                            <td>
                                <?php echo $deduction->type; ?>
                            </td>
                            <td class="text-right">
                                <?php echo $deduction->amount; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </div>
                </tbody>
            </table>
        <?php } ?>
        
        <br>
        <h3 style="text-align: center; margin-bottom: 0px;"><?php echo get_phrase('salarizare_total'); ?></h3>
        <center><hr style="margin: 5px 0px 5px 0px; width: 50%;"></center>
        <center>
            <table>
                <tr>
                    <td style="font-weight: 600; font-size: 15px; color: #000;">
                        <?php echo get_phrase('salar_de_baza'); ?></td>
                    <td style="font-weight: 600; font-size: 15px; color: #000; width: 15%;
                        text-align: center;"> : </td>
                    <td style="font-weight: 600; font-size: 15px; color: #000;
                        text-align: right;"><?php echo $row['joining_salary']; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: 600; font-size: 15px; color: #000;">
                        <?php echo get_phrase('total_alocati'); ?></td>
                    <td style="font-weight: 600; font-size: 15px; color: #000;
                        width: 15%; text-align: center;"> : </td>
                    <td style="font-weight: 600; font-size: 15px; color: #000;
                        text-align: right;"><?php echo $total_allowance; ?></td>
                </tr>
                <tr>
                    <td style="font-weight: 600; font-size: 15px; color: #000;">
                        <?php echo get_phrase('deducere_total'); ?></td>
                    <td style="font-weight: 600; font-size: 15px; color: #000;
                        width: 15%; text-align: center;"> : </td>
                    <td style="font-weight: 600; font-size: 15px; color: #000;
                        text-align: right;"><?php echo $total_deduction; ?></td>
                </tr>
                <tr>
                    <td colspan="3"><hr style="margin: 5px 0px;"></td>
                </tr>
                <tr>
                    <td style="font-weight: 600; font-size: 15px; color: #000;">
                        <?php echo get_phrase('salariu_net'); ?></td>
                    <td style="font-weight: 600; font-size: 15px; color: #000;
                        width: 15%; text-align: center;"> : </td>
                    <td style="font-weight: 600; font-size: 15px; color: #000;
                        text-align: right;">
                        <?php
                        $net_salary = $row['joining_salary'] + $total_allowance - $total_deduction;
                        echo $net_salary; ?>
                    </td>
                </tr>
            </table>
        </center>
        <br>
    </div>

    <a onClick="PrintElem('#payroll_print')" class="btn btn-primary hidden-print">
        <i class="fa fa-print"></i>&nbsp;
        <?php echo get_phrase('printiaza_salarizae_detali'); ?>
    </a>


<?php endforeach; ?>




<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'payroll', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Payroll Details</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>
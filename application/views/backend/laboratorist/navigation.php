<div class="sidebar-menu">
    <header class="logo-env" >

        <!-- logo -->
        <div class="logo" style="">
            <a href="<?php echo site_url('login'); ?>">
                <img src="<?php echo base_url('uploads/logo.png');?>"  style="max-height:60px;"/>
            </a>
        </div>

        <!-- logo collapse icon -->
        <div class="sidebar-collapse" style="">
            <a href="#" class="sidebar-collapse-icon with-animation">

                <i class="entypo-menu"></i>
            </a>
        </div>

        <!-- open/close menu icon (do not remove if you want to enable menu on mobile devices) -->
        <div class="sidebar-mobile-menu visible-xs">
            <a href="#" class="with-animation">
                <i class="entypo-menu"></i>
            </a>
        </div>
    </header>
    <div class="sidebar-user-info">

        <div class="sui-normal">
            <a href="#" class="user-link">
                <img src="<?php echo $this->crud_model->get_image_url($this->session->userdata('login_type'), $this->session->userdata('login_user_id'));?>" alt="" class="img-circle" style="height:44px;">

                <span><?php echo get_phrase('salutare'); ?>,</span>
                <strong><?php
                    echo $this->db->get_where($this->session->userdata('login_type'), array($this->session->userdata('login_type') . '_id' =>
                        $this->session->userdata('login_user_id')))->row()->name;
                    ?>
                </strong>
            </a>
        </div>

        <div class="sui-hover inline-links animate-in"><!-- You can remove "inline-links" class to make links appear vertically, class "animate-in" will make A elements animateable when click on user profile -->
            <a href="<?php echo site_url('laboratorist/manage_profile');?>">
                <i class="entypo-pencil"></i>
                <?php echo get_phrase('editeaza_profil'); ?>
            </a>

            <a href="<?php echo site_url('laboratorist/manage_profile');?>">
                <i class="entypo-lock"></i>
                <?php echo get_phrase('schimba_parola'); ?>
            </a>

            <span class="close-sui-popup">×</span><!-- this is mandatory -->
        </div>
    </div>

    <ul id="main-menu" class="">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->

        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo site_url('laboratorist');?>">
                <i class="fa fa-desktop"></i>
                <span><?php echo get_phrase('pagina_principala'); ?></span>
            </a>
        </li>

        <li class="<?php if ($page_name == 'manage_blood_bank') echo 'active'; ?>">
            <a href="<?php echo site_url('laboratorist/blood_bank');?>">
                <i class="fa fa-tint"></i>
                <span><?php echo get_phrase('banca_de_sange'); ?></span>
            </a>
        </li>

        <li class="<?php if ($page_name == 'manage_blood_donor') echo 'active'; ?>">
            <a href="<?php echo site_url('laboratorist/blood_donor');?>">
                <i class="fa fa-user"></i>
                <span><?php echo get_phrase('donatiri_de_sange'); ?></span>
            </a>
        </li>

        <li class="<?php if ($page_name == 'pathology_report') echo 'active'; ?>">
            <a href="<?php echo site_url('laboratorist/pathology_report');?>">
                <i class="fa fa-file-text-o"></i>
                <span><?php echo get_phrase('raprot_patologic'); ?></span>
            </a>
        </li>

        <!-- PAYROLL -->
        <li class="<?php if ($page_name == 'payroll_list') echo 'active'; ?> ">
            <a href="<?php echo site_url('laboratorist/payroll_list');?>">
                <span><i class="entypo-tag"></i> <?php echo get_phrase('stat_de_plata'); ?></span>
            </a>
        </li>

        <li class="<?php if ($page_name == 'edit_profile') echo 'active'; ?> ">
            <a href="<?php echo site_url('laboratorist/manage_profile');?>">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('profil'); ?></span>
            </a>
        </li>

    </ul>

</div>

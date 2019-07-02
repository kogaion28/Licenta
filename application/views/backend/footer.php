<?php $version = $this->db->get_where('settings', array('type' => 'version'))->row()->description;?>
<!-- Footer -->
<footer class="main">
	&copy; 2019 <strong>MedicSoft</strong>
    <strong class="pull-right"> Versiunea <?php echo $version;?></strong>
    Dezvoltat de 
	<a href="https://github.com/kogaion28/Licenta"
    	target="_blank">Jude Bogdan Laurentiu</a>
</footer>

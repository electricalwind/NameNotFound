
		</div> <!-- page-container -->
	</div> <!-- site-container -->

	<script src="<?= lib_url('jquery/jquery-2.0.3.min.js'); ?>"></script>
	<script src="<?= lib_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
<?php foreach ($layoutJs as $js) { ?>
	<script src="<?= js_url($js); ?>"></script>
<?php } ?>

</body>
</html>


<style>
</style>
<nav id="sidebar" class='mx-lt-5 bg-dark' >
		
		<div class="sidebar-list">

				<a href="index.php?page=home" class="nav-item nav-home"><span class='icon-field'></i></span> Home</a>
				<a href="index.php?page=vacancy" class="nav-item nav-vacancy"><span class='icon-field'></span> Jobs</a>		
				<?php if($_SESSION['login_type'] == 1): ?>
					<a href="index.php?page=users" class="nav-item nav-users"><span class='icon-field'></span> Users</a>
					<a href="index.php?page=applications" class="nav-item nav-applications"><span class='icon-field'></span> Applications</a>	
					<a href="index.php?page=site_settings" class="nav-item nav-site_settings"><span class='icon-field'></span> Settings</a>
				
			<?php endif; ?>
		</div>

</nav>
<script>
	$('.nav-<?php echo isset($_GET['page']) ? $_GET['page'] : '' ?>').addClass('active')
</script>

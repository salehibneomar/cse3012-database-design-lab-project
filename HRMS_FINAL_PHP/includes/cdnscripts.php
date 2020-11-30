	<script src="../js/modernizr-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<script src="../js/sweetalert.min.js"></script>
	<script src="../js/sortable.min.js"></script>
	<script>
		document.getElementById('di').addEventListener("click",function(){
			swal({
				text: "Designed and Developed by:"+"\n"+
				"Saleh Ibne Omar"+"\n"+
				"(c) 2019 Allrights Reserved.",
				icon: "info",
				});
			});
	</script>
<?php
    if(!(isset($panel_sys)) || empty($panel_sys)){
        header("Location: ../index.php");
    }
?>
<script type="text/javascript">
$(document).ready(function() {
	$("#harga").change(function(){				
    	$.ajax({
            type : "POST",
			url: "<?php echo base_url(); ?>whz/admin/calculate",
            data : "harga=" + $("#harga").val(),
            success: function(data)
			{ 
				$("#jual").html(data);
			}
    	});
	});
});

</script>
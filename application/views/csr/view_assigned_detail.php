<?php //echo "<pre>"; print_r($filters); print_r($numbers); echo "</pre>"; 
//echo "<pre>"; print_r($detail); echo "</pre>";?>
<div class="page">
      <div class="page-main">
          <div class="page-content">
              <div class="container">
                <div class="row row-cards row-deck update_series_wrapper" id="generated_numbers">
                <?php if(isset($detail) && count($detail) > 0){
						$this->load->view("templates/telesales");
				}?>
                </div>
              </div>
          </div>
      </div>
<script>
<?php if(isset($detail) && count($detail) > 0){?>
var number_id = '<?php echo $detail["id"]?>';
var assign_to = '<?php echo $detail["assigned_by"]?>';
<?php }?>
$(document).ready(function(){
	$(".assign_back").click(function(){
		if($.trim($("#comment").val()) == ""){
			//$("#error").html("Please enter comment.");
			alert("Please enter comment.");
		}
		else{
			$.ajax({
				type: "POST",
				url: "/teamlead_agent/assign-number",
				data: {
					"id" : number_id,
					"assign_to" : assign_to,
					"comment" : $.trim($("#comment").val())
				},
				success: function(msg){
					alert("Status Updated");
					window.location("/");
					
				}
			});
		}
	});
	
	$("#team_members, #tl_csr").change(function(){
		if($.trim($("#comment").val()) == ""){
			alert("Please enter comment.");
		}
		else{
			$.ajax({
				type: "POST",
				url: "/teamlead_agent/assign-number",
				data: {
					"id" : number_id,
					"assign_to" : $(this).val(),
					"comment" : $.trim($("#comment").val())
				},
				success: function(msg){
					alert("Status Updated");
					window.location("/");
					
				}
			});
		}
	});
});

</script>
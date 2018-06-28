$(document).ready(function() {
	
	$("#vf_status").click(function(event) {
		event.preventDefault();
		
		var selected_val = $(this).val();

		if(selected_val == '0') {
			$("#tl_csr_div, #tl_csr_dropdown").show();
			$("button.ml-auto").removeAttr('disabled');
			$("#not_vf_reason").hide();
		}
		else if(selected_val == '1') {
			$("#tl_csr_div, #tl_csr_dropdown").hide();
			$("button.ml-auto").attr('disabled', 'true');
			$("#not_vf_reason").show();
		}
	});

	$(".aprv-dse-doc").click(function(event) {
		event.preventDefault();
		
		var id = $(this).data('id');
		var url = site_url + "back-office/update-dse-document";

		$.post(url, {id: id, status: 'done'}, function(data) {
			$("#row-" + id).hide('slow');
		});

	});

	if($(".hasDateTimePicker").length) {
		$(".hasDateTimePicker").datetimepicker(
	        {
	            dateFormat: 'dd mm yy', 
	            timeFormat: 'H:mm TT'
	        }
	    );
	}

	if($("#colorSelector").length) {
		$("#colorSelector").ColorPicker({
			onShow: function (colpkr) {
				$(colpkr).fadeIn(500);
				return false;
			},
			onHide: function (colpkr) {
				$(colpkr).fadeOut(500);
				return false;
			},
			onChange: function (hsb, hex, rgb) {
				$('#colorSelector div').css('backgroundColor', '#' + hex);
				$("#color").val('#'+ hex);
			}
		});
	}

	if($(".dse-lg-form").length) {
		$(".dse-lg-form").click(function(event) {
			event.preventDefault();

			var assigned_by = $(this).data('assigned-by');
			var form_action = $(this).data('form-action');

			$('#telesale-model form').append('<input type="hidden" name="assigned_by" id="assigned_by" value="' + assigned_by + '">');
			$('#telesale-model form').attr('action', form_action);

			$("#mobile_no").val($(".number_td a", $(this).closest("tr")).text());
			$('#telesale-model').modal({
				show: true, 
                backdrop: 'static',
                keyboard: false
			});
		});
	}

	if($(".custom-file-input").length) {
		$(".custom-file-input").change(function() {

			var files_count = $(this)[0].files.length;
			$(this).parent().children("span").remove()
			$(this).parent().append("<span>" + files_count + " file(s) chosen...</span>");
		});
	}

	if($(".del-user").length) {
		$(".del-user").click(function(event) {
			event.preventDefault();

			if(confirm("Are you sure you want to delete this User?")) {
				var url = $(this).data('url');
				var $this = $(this);
				$.post(url, function(result) {
					if(result == "deleted") {
						$this.parents('tr').hide('slow');
					}
				});
			}
		});
	}

	if($("#select_specific").length) {
		$("#select_specific").change(function() {
			if(!this.checked) {
				$(".assign_number_check").prop("checked", false);
			}
			else {
				var amount = $("#select_amount").val();

				if(amount > 0) {
					$("#unselect-all").prop("checked", false);
					
					$(".assign_number_check").slice(0, amount).prop("checked", true);
				}
				else {
					alert('Please enter amount of assignees.');
				}
			}
		});
	}

	if($("#btn-enable-all").length) {
		$("#btn-enable-all").click(function(event) {
			event.preventDefault();

			$("*").removeAttr("disabled").removeAttr("readonly");
		});
	}

	if($(".jsdatatable").length && typeof $.fn.DataTable == "function") {
		
		if ($(".jsdatatable").hasClass('assign-table')) {
			$.fn.dataTable.ext.search.push(
			    function( settings, data, dataIndex ) {
			        var min = parseInt( $('#min').val(), 10 );
			        var max = parseInt( $('#max').val(), 10 );
			        var age = parseFloat( data[1] ) || 0; // use data for the age column
			 
			        if ( ( isNaN( min ) && isNaN( max ) ) ||
			             ( isNaN( min ) && age <= max ) ||
			             ( min <= age   && isNaN( max ) ) ||
			             ( min <= age   && age <= max ) )
			        {
			            return true;
			        }
			        return false;
			    }
			);
		}

		var table = $(".jsdatatable").DataTable(
		{
		  "pageLength": 100, 
		  "oLanguage": {
		        "sSearch": "Contains:"
		    }, 
		   "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]]
		}
		);

		$('#min, #max').keyup(function() {
	        table.draw();
	    });
	}

});

function load_telesales_modal() {
	if ($('#telesale-model').length) {
		$('#telesale-model').modal({
		    show: true, 
		    backdrop: 'static',
		    keyboard: false
		});
	}
}
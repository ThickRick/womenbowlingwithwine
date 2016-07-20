$(document).ready(function(){
	$("#captain span").click( function(){
		$("#captain").prop("checked", true);
		$("#rover").prop("checked", false);
		$('input[name=captain_status]').val(['1']);
	});
	$("#rover span").click( function(){
		$("#captain").prop("checked", false);
		$("#rover").prop("checked", true);
		$('input[name=captain_status]').val(['0']);
	});
});


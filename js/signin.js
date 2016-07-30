$(document).ready(function(){

	$(".sgn_btn").click(function(){
		var usr = $("#sgn_user").val();
		var psr = $("#sgn_pazz").val();
		var tk = $(".sgn_btn").attr("data-dist");
		var hekp = [];
		
		$.ajax({
			url: "php/verification.php",
			type: "POST",
			dataType: "json",
			data: {
				user : usr,
				pass : psr,
				token : tk
			},
			success: function(data){
				$.each(data, function(key, val){
					hekp.push(data[key]);
				});

				if(hekp[0]=="invalid"){
					$('#inv-lg').modal('show');
					setTimeout(function(){
						location.reload(); 
					}, 1000);
				}

				if(hekp[0]=="done"){
					window.location.replace(hekp[1]);
				}
				console.log(hekp[0]);
			}
		});
	});
});
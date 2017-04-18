$(document).ready(function(){
	$.ajax({
		url : "http://192.168.0.103:888/thulu/graph.php",
		type : "GET",
		success : function(data){
			console.log(data);
	

			var category = [];
			var units = [];
			

			for(var i in data) {
				category.push(data[i].category);
				units.push(data[i].units);
				
			}

			var chartdata = {
				labels: category,
				datasets: [
					{
						label: "units",
						fill: false,
						lineTension: 0.1,
						backgroundColor: "rgba(59, 89, 152, 0.75)",
						borderColor: "rgba(59, 89, 152, 1)",
						pointHoverBackgroundColor: "rgba(59, 89, 152, 1)",
						pointHoverBorderColor: "rgba(59, 89, 152, 1)",
						data: units
					}
					
				]
			};

			var ctx = $("#mycanvas");

			var LineGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
		},
		error : function(data) {

		}
	});
});
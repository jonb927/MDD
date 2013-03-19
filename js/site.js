/* $(function(){
	//FINALLY it works needed to use a proxy 
	url = "ba-simple-proxy.php?url=www.zillow.com%2Fwebservice%2FGetDeepSearchResults.htm%3Fzws-id%3DX1-ZWz1dff33xsnwr_1vfab%26address%3D226%2520Camerton%2520Lane%26citystatezip%3D19734";
	
		$.ajax({
		type: 'GET',
		url: url,
		dataType: "xml",
		success: function(response){
			console.log(response);
		}
		});
	this also works
	$.getJSON('http://www.zillow.com/webservice/GetMonthlyPayments.htm?zws-id=X1-ZWz1dff33xsnwr_1vfab&price=226000&output=json&callback=?', function(data){
		console.log(data);
	});
});*/
$(function(){
	//var request = new XMLHttpRequest();
	//request.open('GET', 'http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=X1-ZWz1dff33xsnwr_1vfab&address=226+Camerton+Lane&citystatezip=19734', true);
	//request.send();
	
	//$.get("http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=X1-ZWz1dff33xsnwr_1vfab&address=226+Camerton+Lane&citystatezip=19734",
	//		function(data){
	//			console.log(data);
	//		});
	
	$.ajax({
		type: 'GET',
		url: 'http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=X1-ZWz1dff33xsnwr_1vfab&address=226+Camerton+Lane&citystatezip=19734',
		dataType: "xml",
		success: function(response){
			console.log(response);
		}
		});
/*	.getJSON('http://www.zillow.com/webservice/GetDeepSearchResults.htm?zws-id=X1-ZWz1dff33xsnwr_1vfab&address=226+Camerton+Lane&citystatezip=19734', function(data){
	console.log(data);
	});*/
});
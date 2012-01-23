console.log('is this thing on?');

$(document).ready(function() {
	$.ajax({
		api: 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyAc3a2WfPaSbA1B25u78zFQRfAide8T34c&sort=alpha',
		dataType: 'json',
		success: function(){
			console.log('call to google successful');
		}
	});
	
	
});

	
	
// function getScript(url) {
//   var scripttag = document.createElement("script");
//   scripttag.setAttribute("type","text/javascript");
//   scripttag.setAttribute("src",url);
//   document.getElementsByTagName("head")[0].appendChild(scripttag);
// }
// 
// function searchYahoo(query) {
//   var url = "https://www.googleapis.com/webfonts/v1/webfonts?key=";
//   url+= "AIzaSyAc3a2WfPaSbA1B25u78zFQRfAide8T34c";
//   url+= "&sort=alpha";
//   url+= "&output=json";
//   url+= "&callback=parseResponse";
//   getScript(url);
// }
	
console.log('is this thing on?');

	//$(document).ready(function($) {


		// 
		// 	$.each(fonts, function(i, val) {
		// 		variantsList = "";
		// 		$.each(val.variants, function(ii,vv){
		// 			variantsList += templatify(variantsTemplate, {variant: nicerVariant(vv), style: variantStyle(vv)})
		// 		})
		// 		html += templatify(template, {
		// 			'name': val.family,
		// 			'extlink': specimenUrlPrefix + encodeURIComponent(val.family),
		// 			'variants': variantsList
		// 		})
		// 	})
		// 	target.html(html)
		// }
		// 
		// function templatify(html, data) {
		// 					var r
		// 					$.each(data, function(i,val){
		// 						r = new RegExp('%'+i+'%', 'g')
		// 						html = html.replace(r, val);
		// 					})
		// 					return html
		// 				}
		// 
		// function nicerVariant(variant) {
		// 	return variant.replace('italic', ' italic')
		// }
		// 
		// function variantStyle(variant) {
		// 	var text = variant.replace(/regular/i, '400').replace(/bold/i, '700'),
		// 		isItalic = /italic/.test(text),
		// 		weight = text.replace('italic', ''),
		// 		style = (weight !== '') ? 'font-weight:'+weight+';' : ''
		// 	return (isItalic) ? style + 'font-style:italic;'  : style
		// }
		// 


		//});
		



$(document).ready(function() {
	
	var targets = '#h1_select, #h2_select, #p_select';  //these are used throughout
	
	
	
	// ajax call
	$.ajax({
		url: 'https://www.googleapis.com/webfonts/v1/webfonts?key=AIzaSyAc3a2WfPaSbA1B25u78zFQRfAide8T34c&sort=alpha&sort=desc',
		dataType: 'jsonp',
		success: onJson,
		error: noLove
	});
	
	// ajax success function
	function onJson(data){
		if(data.kind === "webfonts#webfontList"){
			getFonts(data.items);
			changeFonts(data.items);
		} else {
			noLove();
		}
	}
	
	//error message
	function noLove(){
		//error message goes here
	}
	
	
	// font calls and option set up
	function getFonts(fontList){
		var base = "http://fonts.googleapis.com/css?family=";
		var defaultList = $('#h1_select').children();
		$(targets).empty();
		$(targets).append('<option disabled>*** Google Fonts ***</option>');
		for (var i=0; i < fontList.length; i++) {
			//this tool is for latin fonts only so far - sorry, Cyrillic and Greek
			if(fontList[i].subsets.indexOf('latin') != -1){
				var fontName = fontList[i].family;
				var fontCallName = fontList[i].family.replace(/\s+/g, '+');
				var fontNameLetters = fontList[i].family.replace(/\s+/g, '');
				//this adds the stylesheet link to Google Web Fonts, but with only the font's name as a subset of characters
				$('<link rel="stylesheet" href="' + base + fontCallName +'&subset=latin&text=' + fontNameLetters +'" />').appendTo('head');
				$(targets).append('<option value="'+ fontName +'">'+ fontName +'</option>');
			}
		};
		
		//readding the default font list so it appears at the end of the <select> and everything is ordered properly
		$(targets).append('<option disabled>*** System Fonts ***</option>');
		$(targets).append(defaultList);
	}
	
	// hiding submit button when JS is present
	$('#submit').hide();
	
	function changeFonts(fontList){
		$(targets).change(function(){
			console.log('font has changed');
			var base = "http://fonts.googleapis.com/css?family=";
			var fontName = $(this).val();
			$('<link rel="stylesheet" href="' + base + fontName.replace(/\s+/g, '+') +'&subset=latin" />').appendTo('head');
			for (var i=0; i < fontList.length; i++) {
				if(fontList[i].family == fontName){
					console.log(fontList[i].variants);
				}
			};

		});
		
	}

	
});

	

	
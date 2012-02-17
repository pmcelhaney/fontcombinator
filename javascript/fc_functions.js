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
	
		console.log('no love!');
		$('<h2>I&rsquo;m sorry, but we can&rsquo;t seem to reach Google Fonts.</h2>').prependTo('body');
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
				//this adds the stylesheet link to Google Web Fonts, but with only the font's name as a subset of characters, for performance
				$('<link rel="stylesheet" href="' + base + fontCallName +'&subset=latin&text=' + fontNameLetters +'"  type="text/css" />').appendTo('head');
				$(targets).append('<option value="'+ fontName +'">'+ fontName +'</option>');
				
			}
		};
		
		//readding the default font list so it appears at the end of the <select> and everything is ordered properly
		$(targets).append('<option disabled>*** System Fonts ***</option>');
		$(targets).append(defaultList);
		$(targets).chosen();
		$('li.active-result').each(function(){
			$(this).css('font-family', $(this).html());
		});
		
	}
	
	// hiding submit button when JS is present
	$('#submit').hide();
	
	function changeFonts(fontList){
		$(targets).change(function(){
			var base = "http://fonts.googleapis.com/css?family=";
			var fontName = $(this).val();
			
			//handy way to target the right element based on which select changed
			var elem = $(this).attr('id').split('_select')[0];
			$(elem).css('font-style', 'normal');
			//gets rid of any variant drop down added previously
			$(this).siblings('.variant_select').remove();
			$('#'+ elem + '_variant_chzn').remove();
			
			
			//this for loop adding variants based on which font is selected
			for (var i=0; i < fontList.length; i++) {
				var variants = fontList[i].variants;
				//checking to see if the selected font has more than one variant 
				if(fontList[i].family == fontName && variants.length > 1){
					var variantCall = variants.toString();
					console.log(variants);
					//adding stylesheet call with all variants
					$('<link rel="stylesheet" href="' + base + fontName.replace(/\s+/g, '+') +':' + variantCall + '&subset=latin" type="text/css" />').appendTo('head');
					//create a drop down menu
					$('<select class="variant_select" id="'+ elem +'_variant" name="'+ elem +'v"><select>').insertAfter('#' +elem + '_select_chzn');
					for (var i=0; i < variants.length; i++) {
						var variantName = variants[i].replace('italic',' italic');
						//special handling of variants results
						if(variantName == 'regular'){
							$('<option value="400" selected>400</option>').appendTo('#' + elem +'_variant');
						} else if (variantName == '400'){
							$('<option value="'+variantName+'" selected>'+variantName+'</option>').appendTo('#' + elem +'_variant');
						} else if (variantName == ' italic'){
							$('<option value="400 italic">400 italic</option>').appendTo('#' + elem +'_variant');
						} else {
							$('<option value="'+variantName+'">'+variantName+'</option>').appendTo('#' + elem +'_variant');
						}	
					};

					$(elem).css('font-family', fontName).css('font-weight', '400');
					$('.variant_select').chosen();
					
					return false;  //had to throw this in to stop infinite loop
				} else if(fontList[i].family == fontName){
					//do something else when there is only one variant
					//adding plain stylesheet call w/ no variant addendum
					$('<link rel="stylesheet" href="' + base + fontName.replace(/\s+/g, '+') +'&subset=latin" type="text/css"  />').appendTo('head');
				}
			}; //end of variant for loop
			$(elem).css('font-family', fontName);

		});// end of targets change
	}  //end of function changeFonts
	
	
	function variantChange(){
		$('body').on('change','.variant_select',function(){
			var elem = $(this).attr('id').split('_variant')[0];
			var variant = $(this).val();
			if(variant.indexOf(' italic') == -1){
				$(elem).css('font-weight',variant);
				$(elem).css('font-style','normal');
			} else {
				$(elem).css('font-weight', variant.replace(' italic',''));
				$(elem).css('font-style','italic');
			}
		}); //end of variant_select change
		
	};
	variantChange();
	
	
	function elementSupportsAttribute (element,attribute) {
		var test = document.createElement(element);
		if (attribute in test){
			return true;
			} else {
				return false;
			}
	}
	
	if(elementSupportsAttribute('input','type="range"')){
		//alert('yay');
	}
	
	$('input[type=number]').change(function(){
		console.log('yay');
	});
	
});

// TODO: 

// - replace size inputs w/ ranges
// - add jquery color picker
// - add footer/explanation
// - STYLE - nice design this time, k?	
// - add background color
// - add bookmarkable string
	
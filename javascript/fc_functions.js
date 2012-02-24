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
			if(fontList[i].subsets.indexOf('latin') !== -1){
				var fontName = fontList[i].family;
				var fontCallName = fontList[i].family.replace(/\s+/g, '+');
				var fontNameLetters = fontList[i].family.replace(/\s+/g, '');
				//this adds the stylesheet link to Google Web Fonts, but with only the font's name as a subset of characters, for performance
				$('<link rel="stylesheet" href="' + base + fontCallName +'&subset=latin&text=' + fontNameLetters +'"  type="text/css" />').appendTo('head');
				$(targets).append('<option value="'+ fontName +'">'+ fontName +'</option>');
				
			}
		}
		
		//readding the default font list so it appears at the end of the <select> and everything is ordered properly
		$(targets).append('<option disabled>*** System Fonts ***</option>');
		$(targets).append(defaultList);
		$(targets).chosen();
		$('.chzn-container').css('width','180px');
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
				if(fontList[i].family === fontName && variants.length > 1){
					var variantCall = variants.toString();
					
					//adding stylesheet call with all variants
					$('<link rel="stylesheet" href="' + base + fontName.replace(/\s+/g, '+') +':' + variantCall + '&subset=latin" type="text/css" />').appendTo('head');
					//create a drop down menu
					$('<select class="variant_select" id="'+ elem +'_variant" name="'+ elem +'v"><select>').insertAfter('#' +elem + '_select_chzn');
					for (var i=0; i < variants.length; i++) {
						var variantName = variants[i].replace('italic',' italic');
						//special handling of variants results
						if(variantName === 'regular'){
							$('<option value="400" selected>400</option>').appendTo('#' + elem +'_variant');
						} else if (variantName === '400'){
							$('<option value="'+variantName+'" selected>'+variantName+'</option>').appendTo('#' + elem +'_variant');
						} else if (variantName === ' italic'){
							$('<option value="400 italic">400 italic</option>').appendTo('#' + elem +'_variant');
						} else {
							$('<option value="'+variantName+'">'+variantName+'</option>').appendTo('#' + elem +'_variant');
						}
						
					}

					$(elem).css('font-family', fontName).css('font-weight', '400');
					//get the chosen drop down to take on the css style
					$("#" + elem + "_select_chzn .chzn-single").css('font-family', fontName);
					$('.variant_select').chosen();
	
					$('#' + elem + '_variant_chzn').css('font-family', fontName);
					$('#' + elem + '_variant_chzn li').each(function(){
						$(this).css('font-family', fontName);
						if($(this).html().indexOf('italic') === -1){
							$(this).css('font-weight', $(this).html());
						} else {
							$(this).css('font-weight', $(this).html().split(' italic')[0]).css('font-style','italic');
						}
					});
						
					return false;  //had to throw this in to stop infinite loop
				} else if(fontList[i].family === fontName){
					//do something else when there is only one variant
					//adding plain stylesheet call w/ no variant addendum
					$('<link rel="stylesheet" href="' + base + fontName.replace(/\s+/g, '+') +'&subset=latin" type="text/css"  />').appendTo('head');
					//get the chosen drop down to take on the css style
					$("#" + elem + "_select_chzn .chzn-single").css('font-family', fontName);
				}
			} //end of variant for loop
			
			//actually, you know, change fonts
			$(elem).css('font-family', fontName);

		});// end of targets change
	}  //end of function changeFonts
	
	
	function variantChange(){
		$('body').on('change','.variant_select',function(){
			var elem = $(this).attr('id').split('_variant')[0];
			var variant = $(this).val();
			if(variant.indexOf(' italic') === -1){
				$(elem).css('font-weight',variant);
				$(elem, '#' + elem + '_variant_chzn').css('font-style','normal');
				$('#' + elem + '_variant_chzn').css('font-weight', variant).css('font-style', 'normal');
			} else {
				$(elem).css('font-weight', variant.replace(' italic',''));
				$(elem).css('font-style','italic');
				$('#' + elem + '_variant_chzn').css('font-weight', variant.replace(' italic','')).css('font-style', 'italic');
			}
			
		}); //end of variant_select change
		
	}
	variantChange();
	
	//fontsize change
	
	$('#h1size, #h2size, #psize').on('change', function(){
		var elem = $(this).attr('id').split('size')[0];
		$(elem).css('font-size', $(this).val() + 'px');
	});
	
	
	
	$('#h1color, #h2color, #pcolor').on('focus', function(){
		
		$('#h1color, #h2color, #pcolor').ColorPicker({
		onShow: function(){
			thisEl = $(this).attr('id');
			thisElem = thisEl.split('color')[0];
		},
		onChange: function(hsb, hex, rgb, el) {
			$('#' + thisEl).val(hex);
			$(el).ColorPickerHide();
			$(thisElem).css('color', '#'+hex)
		},
		onBeforeShow: function () {
			$(this).ColorPickerSetColor(this.value);
		}
	})
	.bind('keyup', function(){
		$(this).ColorPickerSetColor(this.value);
	});
});

	$('body').attr('spellcheck',false); //because of firefox's spellcheck, which has a nasty red underline
	
	$('#control_option').on('change',function(){
		var control = $(this).val();
		var controlId = '#' + control + '_sec';
		
		if(!($(controlId).hasClass('active'))){
			$('.control.active').fadeOut('fast', function(){
				$('.control.active').removeClass('active');
				$(controlId).fadeIn('fast', function(){
					$(this).addClass('active');
					$('.chzn-container').css('width','180px');
				});
			});
			
		}
	});
	

	
});

// TODO:

// - add footer/explanation
// - STYLE - nice design this time, k?
// - add background color switching
// - add background texture additions
// - add bookmarkable string
	
function initialiseOptions(termSet) {//takes a termset object and converts to select dropdown
	var ddOptions = "";
	for (var i=0; i<termSet.length;i++) {
		ddOptions += "<option value='" + termSet[i].slug + "'>" + termSet[i].name + "</option>";
	}
	return ddOptions;
}

$(document).ready(function() {
	
	var options = {};
	options.climateOptions = initialiseOptions(climates);
	options['hot'] = initialiseOptions(hot);
	options['cold'] = initialiseOptions(cold);

	
	$("#climate").append(options.climateOptions);
	var selectedVal = $("#climate").val();
	$("#budget").append(options[selectedVal]);
	$("#climate").change(function() {
		$("#budget").empty();
		var selectedVal = $("#climate").val();
		$("#budget").append(options[selectedVal]);
		//should keep selected one the same even on change		
	});
	
	
});




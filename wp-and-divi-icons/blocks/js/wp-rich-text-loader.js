(function($) {
	var url = $('#wp-rich-text-js').attr('src');
	url = decodeURIComponent(url.substring(url.indexOf('?src=') + 5));
	$.get({
		url: url,
		async: false,
		dataType: 'text'
	}).done(function(response) {
		var script = response;
		
		// Add filter to the toHTMLString function return value
		var targetFunctionName = 'toHTMLString';
		var targetFunctionPos = script.indexOf(targetFunctionName); // first occurrence should be the export
		if (targetFunctionPos !== -1) {
			var exportFunctionReturnPos = script.indexOf('return ', targetFunctionPos);
			var endExportFunctionPos = script.indexOf('}', exportFunctionReturnPos);
			var exportFunctionReturnVar = script.substring(exportFunctionReturnPos + 7, endExportFunctionPos).trim();
			if (exportFunctionReturnVar[exportFunctionReturnVar.length - 1] === ';') {
				exportFunctionReturnVar = exportFunctionReturnVar.substring(0, exportFunctionReturnVar.length - 1).trim();
			}
			for (var i = exportFunctionReturnVar.length - 1; i >= 0; --i) {
				if (exportFunctionReturnVar[i] === ' ' || exportFunctionReturnVar[i] === '/') {
					exportFunctionReturnVar = exportFunctionReturnVar.substring(i + 1);
					break;
				}
			}
			
			var functionDefinitionStartPos = -1;
			do {
				functionDefinitionStartPos = script.indexOf('function ' + exportFunctionReturnVar, functionDefinitionStartPos + 1);
			} while (functionDefinitionStartPos !== -1 && script[functionDefinitionStartPos + 9 + exportFunctionReturnVar.length] !== ' ' && script[functionDefinitionStartPos + 9 + exportFunctionReturnVar.length] !== '(');
			
			
			if (functionDefinitionStartPos !== -1) {
				script = 
					script.substring(0, functionDefinitionStartPos)
					+ 'function ' + exportFunctionReturnVar + '() { return wp.hooks.applyFilters(\'ags_unofficial_rich_text_html_string\', '
						+ 'AGS_OVERRIDDEN_' + exportFunctionReturnVar + '.apply(null, arguments)'
					+ '); }' 
					+ 'function AGS_OVERRIDDEN_' // prefix original function name
					+ script.substring(functionDefinitionStartPos + 9);
			}
		}
		
		script = '// Contents of this script tag loaded from ' + url + '\n// and automatically modified ' + (new Date()).toLocaleDateString() + '\n' + script;
		$('<script>').text(script).insertAfter('#wp-rich-text-js');
	});
})(jQuery);
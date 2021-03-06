var teampassData = [];

function handleFileChange2(evt) {
	//Retrieve the first (and only!) File from the FileList object
	var f = evt.target.files[0];

	if (f) {
		var r = new FileReader();
		r.onload = function(e) {
			var contents = e.target.result;
			teampassData = JSON.parse(contents);
			console.log(contents);
		}
		r.readAsText(f);
	} else {
		alert("Failed to load file");
	}
}

function importTeamPassDialog() {
	// Check for the various File API support.
	if (window.File && window.FileReader && window.FileList && window.Blob) {

		$('<div id="teampassPopup"><p>First follow the instructions <a href="https://github.com/brantje/passman/wiki/Import-teampass" target="_blank" class="link">here</a><input type="file" id="importFile"/>').dialog({
			buttons : {
				"Import" : function() {
					$('#teampassPopup').html('Importing... this may take a while')
					setTimeout(importTeamPass,1000);
				},
				"Cancel" : function() {
					$(this).dialog("close");

				}
			},
			title : "Import password and folders from teamteampass."
		})
		document.getElementById('importFile').addEventListener('change', handleFileChange2, false);
	} else {
		alert('The File APIs are not fully supported by your browser. Therefore an import is not supported');
	}
}

function importTeamPass() {

	$(document).data('importFolders', [])
	
	importTeampassItems()

	//clean up

}
function importTeampassItems() {
	var count =1 ;
	$('#teampassPopUp').html('<div id="progressbar"></div>');
	$("#progressbar").progressbar();
	console.log(teampassData);
	$.each(teampassData.items, function(k,v) {
		
		var createUrl = OC.generateUrl('apps/passman/api/v1/item');
		var encPw = (this.pw) ? encryptThis(this.pw) : '';
		
			postData = {

				'label' : this.label,
				'desc' : encryptThis( (this.description) ? this.description : ''),
				'account' : encryptThis( (this.login) ? this.login : ''),
				'pw1' : encPw,
				'email' : encryptThis( (this.email) ? this.email : ''),
				'url' : (this.url) ? this.url : '',
				'tags': this.folder_title
			}
			$.ajax({
				async : true,
				type : "POST",
				url : createUrl,
				dataType : 'JSON',
				data : postData,
				success : function(data) {
					var percent = Math.round(count/teampassData.items.length*100)
					$('#teampassPopup').html(percent+'%...')
					count++;
					if(count==teampassData.items.length-1){
						teampassImportDone()
					}
				}
			});
		
	})
}


function teampassImportDone(){
	$('#teampassPopup').dialog('destroy').remove();
	$('<div>The import was a success!</div>').dialog({
		title: "Teampass import",
		buttons : {
				"close": function(){
					$(this).dialog('destroy').remove();
				}
		}
	});
	loadItems();
	$('#importFile').val('');
	teampassData = [];
	$(document).data('importFolders', {})
}

function findImportFolderByName(name) {
	var foundFolder = '';
	$.each($(document).data('importFolders'), function() {
		if (this.text.indexOf(name) > -1)
			foundFolder = this;
	})
	return foundFolder;
}



$(document).ready(function() {
	if ($(document).data('importers')) {
		var importers = $(document).data('importers');
		importers.push['Teampass', 'importTeamPassDialog']
	} else {
		var importer = [['Teampass', 'importTeamPassDialog']];
		$(document).data('importers', importer);
	}

})

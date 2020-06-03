// HTML
function getRes1(e){
	var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "forms/projects.php",
	  data: currentForm.serialize(),
	  success: function(result){
	  	$('#result1 tbody').html(result);
	  }
	});
}

// XML
function getRes2(e){
	var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "forms/project-time.php",
	  data: currentForm.serialize(),
	  dataType: "xml",
	  success: function(result){
  		$('#result2 tbody').html(
  			'<tr>'+
  			'<td>' + $(result).find('totalTime').text() + '</td>' +
  			'</tr>'
  		);
	  }
	});
}

// JSON
function getRes3(e){
	var currentForm = $(e).parents('form');

	$.ajax({
	  type: "GET",
	  url: "forms/workers.php",
	  data: currentForm.serialize(),
	  dataType: "json",
	  success: function(result){
  		$('#result3 tbody').html(
  			'<tr>'+
  			'<td>' + result + '</td>' +
  			'</tr>'
  		);
	  }
	});
}
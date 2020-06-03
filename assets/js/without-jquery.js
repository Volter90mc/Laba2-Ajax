var ajax; // глобальная переменная для хранения обработчика запросов
InitAjax();
function InitAjax() {
	try { /* пробуем создать компонент XMLHTTP для IE старых версий */
	ajax = new ActiveXObject("Microsoft.XMLHTTP");
	} catch (e) {
		try {//XMLHTTP для IE версий >6
			ajax = new ActiveXObject("Msxml2.XMLHTTP");
		} catch (e) {
			try {// XMLHTTP для Mozilla и остальных
				ajax = new XMLHttpRequest();
			} catch(e) { ajax = 0; }
		}
	}
}




// HTML

function getRes1() {
	if (!ajax) {
		alert("Ajax не инициализирован");
		return;
	}
	var name = document.querySelectorAll('#form1 select[name="project"]')[0].value;
	var date = document.querySelectorAll('#form1 input[name="targetDate"]')[0].value;
	var time = document.querySelectorAll('#form1 input[name="targetTime"]')[0].value;
	
	ajax.onreadystatechange = Form1Callback;
	var params = 'project=' + encodeURIComponent(name) + '&targetDate=' + encodeURIComponent(date) + '&targetTime=' + encodeURIComponent(time);
	ajax.open("GET", "forms/projects.php?"+params);
	ajax.send(null);
}
function Form1Callback() {
	if (ajax.readyState == 4) {
		if (ajax.status == 200) {
			// если ошибок нет
			var result = document.querySelectorAll('#result1 tbody')[0];
			result.innerHTML = ajax.responseText;

		}
		else alert(ajax.status + " - " + ajax.statusText);
		ajax.abort();
	}

}

// XML

function getRes2() {
	if (!ajax) {
		alert("Ajax не инициализирован");
		return;
	}
	var name = document.querySelectorAll('#form2 select[name="project"]')[0].value;
	
	ajax.onreadystatechange = Form2Callback;
	var params = 'project=' + encodeURIComponent(name);
	ajax.open("GET", "forms/project-time.php?"+params);
	ajax.send(null);
}
function Form2Callback() {
	if (ajax.readyState == 4) {
		if (ajax.status == 200) {
			// если ошибок нет
			var result = document.querySelectorAll('#result2 tbody')[0];
			var data = ajax.responseXML.children[0].children[0].firstChild.nodeValue;
			result.innerHTML = '<tr><td>' + data + '</td></tr';

		}
		else alert(ajax.status + " - " + ajax.statusText);
		ajax.abort();
	}

}

// JSON

function getRes3() {
	if (!ajax) {
		alert("Ajax не инициализирован");
		return;
	}
	var name = document.querySelectorAll('#form3 select[name="chief"]')[0].value;
	
	ajax.onreadystatechange = Form3Callback;
	var params = 'chief=' + encodeURIComponent(name);
	ajax.open("GET", "forms/workers.php?"+params);
	ajax.send(null);
}
function Form3Callback() {
	if (ajax.readyState == 4) {
		if (ajax.status == 200) {
			// если ошибок нет
			var result = document.querySelectorAll('#result3 tbody')[0];
			var data = JSON.parse(ajax.responseText);
			result.innerHTML = '<tr><td>' + data + '</td></tr';

		}
		else alert(ajax.status + " - " + ajax.statusText);
		ajax.abort();
	}

}
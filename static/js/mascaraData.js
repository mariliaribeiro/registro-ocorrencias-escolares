function mascaraData(data) {
 	var evt = window.event;
 	kcode=evt.keyCode;
 	if (kcode == 8) return;
 	if (data.value.length == 2) { data.value = data.value + '/'; }
 	if (data.value.length == 5) { data.value = data.value + '/'; }
 }
 

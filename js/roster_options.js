function addFunc() {
	document.getElementById("removing").style.display = "none";
	document.getElementById("adding").style.display = "block";
}

function remFunc() {
	document.getElementById("adding").style.display = "none";
	$("#newpar").val('');
	document.getElementById("removing").style.display = "block";
}
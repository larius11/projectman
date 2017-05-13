function formOptions(){
	var selection = document.getElementById("duty").value;
	
	if(selection=="Recognize Partners"){
		document.getElementById("partners").style.display = "block";
	}else{
		document.getElementById("partners").style.display = "none";
		$("#recfor").val('');
	}

	if(selection=="Other"){
		document.getElementById("otherinfo").style.display = "block";
	}else{
		document.getElementById("otherinfo").style.display = "none";
		$("#mylist").empty();
		$("#other_name").val('');
		window.myi = 1;
	}
}
function updateProgress(id, index){
	var current = document.getElementById(id).style.width;
	var left = document.getElementById("dom-target-"+id).textContent;
	var per = document.getElementById("per-target-"+id).textContent;
	var value = document.getElementById("box-"+id+"-"+index).checked;
	current = parseFloat(parseFloat(current).toFixed(4));
	per = parseFloat(parseFloat(per).toFixed(4));
	var calc_den = 100-current;
	var calc_num = 0;


	if (calc_den <= 0 && left != 0){
		alert("FALSE");
		return false;
	}

	if(per == 0){
		per = parseFloat((calc_den/left).toFixed(3));
		document.getElementById("per-target-"+id).textContent = per;

	}

	if (!value){
		calc_num = current - per;
		left++;
	}else{			
		calc_num = current + per;
		left--;
	}

	document.getElementById("dom-target-"+id).textContent = left;
	document.getElementById(id).style.width = calc_num + '%';
	document.getElementById("fin-target-"+id).value = calc_num.toString();
}
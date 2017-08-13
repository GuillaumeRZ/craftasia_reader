const files = document.querySelector('#filesList');

const fileEdition = document.querySelector('#fileEdition');
const saveButton = document.querySelector('#saveFile');

const xhttp = new XMLHttpRequest();
if (!xhttp) {
	console.error('Cannot create an XMLHTTP instance');
}

function openFile() {
	// Opening the file selected and display the text
	xhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
      		// fileEdition refers to the textarea
      		fileEdition.value = this.responseText;
    	}
  	};
  	// this.value refers to the current path contain in our <option> selected
  	xhttp.open("GET", files.value, true);
  	xhttp.send();
}

function saveFile() {
	console.log(fileEdition.value);
	console.log(files.value);

}

// Manage the first loading
window.onload = openFile;

files.addEventListener('change', openFile);
saveButton.addEventListener('click', saveFile);

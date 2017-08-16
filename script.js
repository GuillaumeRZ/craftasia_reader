const files = document.querySelector('#filesList');
const fileEdition = document.querySelector('#fileEdition');
const saveButton = document.querySelector('#saveFile');

/* Create XMLHTTP instance */
const xhttp = new XMLHttpRequest();
if (!xhttp) {
  console.error('Cannot create an XMLHTTP instance');
}

function openFile() {
  /* Opening the file selected and display the text */
  xhttp.onreadystatechange = function () {
    if (this.readyState === 4 && this.status === 200) {
      /* fileEdition.value refers to the textarea content */
      fileEdition.value = this.responseText;
      fileEditionBackup = fileEdition.value; // WARNING: Must be define ?..
    }
  };
  /* this.value refers to the current path contain in our <option> selected */
  xhttp.open('GET', files.value, true);
  xhttp.send();
}

function saveFile() {
  /* Get the current date and time for backup files */
  let currentDate = new Date();
  currentDate = `${currentDate.getDate()}-${currentDate.getMonth()}-${currentDate.getFullYear()}-${currentDate.getHours()}:${currentDate.getMinutes()}:${currentDate.getSeconds()}`;

  /* Format the file title with current time */
  let formatBackupFilename = files.value.split('.');
  formatBackupFilename = `${formatBackupFilename[0]}-backup-${currentDate}.${formatBackupFilename[1]}`;
  /* Then format the path when the backup will be push */
  let filePathBackup = formatBackupFilename.split('/');
  filePathBackup = `${filePathBackup[0]}/${filePathBackup[1]}/backup/${filePathBackup[2]}/${filePathBackup[3]}`;
  console.log(filePathBackup);

  /* LOGS DEBUG */
  console.log(`path: ${files.value}`);
  console.log(`Content: ${fileEdition.value}`);
  console.log(`pathBackup: ${filePathBackup}`);
  console.log(`contentBackup: ${fileEditionBackup}`);

  /* Send all the data to savedFile.php */
  $.ajax({
    type: 'POST',
    url: 'savedFile.php',
    data: {
      filePath: files.value,
      fileEdition: fileEdition.value,
      filePathBackup,
      fileEditionBackup
    },
  }).done((res) => {
    $('#result').html(res);
  }).fail((res) => {
    alert('Une erreur est survenue');
  });
}

/* Manage the first .txt loading in our page */
window.onload = openFile;

/* Listener */
files.addEventListener('change', openFile);
saveButton.addEventListener('click', saveFile);

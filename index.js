// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("openModalBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Get the close and save buttons
var closeBtn = document.getElementById("closeModalBtn");
var saveBtn = document.getElementById("saveModalBtn");

// Add click event listeners for close and save buttons
closeBtn.onclick = function() {
    modal.style.display = "none";
}

saveBtn.onclick = function() {
    // Add functionality to save button here
    alert("Save button clicked!");
}
  // Get the modal of add student 
  var modal = document.getElementById("myModal");
  var myform =document.getElementById('addForm');

  // Get the button that opens the modal
  var btn = document.getElementById("myBtn");
  // // Get the cancel that close the modal
  // var calcel = document.getElementById("cancel");

  // Get the <span> element that closes the modal
  var span = document.getElementsByClassName("close")[0];

  // When the user clicks on the button, open the modal
  btn.onclick = function(e) {
    e.preventDefault();
    // myform.reset();
    // modal.document.getElementsByTagName('form')[0].reset();
    // window.location.href=window.location;
    modal.style.display = "flex";
  }

  // When the user clicks on <span> (x), close the modal
  span.onclick = function() {
    modal.style.transition = "all 0.8s ease-out;";
    modal.style.display = "none";
    
  }
  

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }

// add student model end here

// Edit Student model start here
var model1=document.getElementById("myModalEdit");
model1.getElementsByClassName("close")[0].onclick=function(){document.getElementById("myModalEdit").style.display='none'};
    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target == model1) {
        model1.style.display = "none";
      }
    }
// edit student model ends here

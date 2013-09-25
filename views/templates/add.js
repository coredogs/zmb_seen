/* 
 * JS for adding a new sighting.
 */

$(document).ready(function() {
  $("#number_zombies").focus();
  //WHen save button is clicked...
  $("#save").click(function() {
    //Validate number of zombies.
    var number_zombies = $("#number_zombies").val();
    if (number_zombies == "" || isNaN(number_zombies) || number_zombies < 1) {
      alert("Please enter the number of zombies.");
      $("#number_zombies").focus();
      return;
    }
    //Validate location.
    var where = $("#where").val();
    if (where == "") {
      alert("Please enter a location.");
      $("#where").focus();
      return;
    }
    //Send data to save controller.
    var url = 'index.php?save&number_zombies=' + number_zombies 
        + '&where=' + encodeURIComponent(where);
    location = url;
  });
});


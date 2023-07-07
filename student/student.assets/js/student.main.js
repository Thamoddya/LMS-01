$(document).ready(function () {
  $(document).on("contextmenu", function (e) {
    e.preventDefault();
  });
});

var players = videojs(document.querySelectorAll(".video-js"));

players.ready(function () {
  var myPlayers = this;

  myPlayers.forEach(function (player) {
    // Disable context menu
    player.on("contextmenu", function (e) {
      e.preventDefault();
    });

    // Disable download button
    player.controlBar.removeChild("downloadButton");
  });
});



function changeBorderColor(input) {
  input.style.borderColor = "blue";
}

$.ajax({
  dataType: "json",
  url: "js/data.json",
  success: function(data) {
    $.each(data, function(i, photo) {
      $("ul.gallery").append("<li><img src='images/square/" + photo.path + "' alt='" + photo.title + "'></li>");

      $("img").mouseenter(function(){
        $(this).addClass("gray");
        var a = $(this).attr("alt");
        var d;
        for (var i = 0; i < data.length; i++) {
          if (data[i].title == a) {
            d = "<div id='preview'><img src='images/medium/" + data[i].path + "' alt='" + data[i].title + "'><p>" + data[i].title + "</p><p>" + data[i].country + "</p><p>" + data[i].taken + "</div>";
            break;
          }
        }
        $("body").append(d);
      });

      $("img").mouseleave(function(){
        $(this).removeClass("gray");
        $("#preview").remove();
      });

      $("img").mousemove(function(event) {
        $("#preview").css({top: event.pageY + 10, left: event.pageX + 10, zIndex: 5, display: 'block'});
      });
    });
  },
  error: function() {
    console.log("File Not Found.");
  }
});

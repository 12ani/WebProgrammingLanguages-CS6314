$(document).ready(function() {

  $("#username").after("<span id='sp1'></span>");
  $("#password").after("<span id='sp2'></span>");
  $("#email").after("<span id='sp3'></span>");

	$("#username").focusin(function() {
    $("#sp1").show();
		$("#sp1").removeClass("ok, error");
		$("#sp1").addClass("info");
		$("#sp1").text("infoMessage");
	});

	$("#username").focusout(function() {
		if ($("#username").val().length == 0) {
			$("#sp1").hide();
		}
		else if (/^[a-zA-Z0-9]+$/.test($("#username").val()) == false) {
      $("#sp1").show();
			$("#sp1").removeClass("ok, info");
			$("#sp1").addClass("error");
			$("#sp1").text("Error");

		}
		else {
      $("#sp1").show();
			$("#sp1").removeClass("error, info");
			$("#sp1").addClass("ok");
			$("#sp1").text("OK");
		}
	});

	$("#password").focusin(function() {
    $("#sp2").show();
		$("#sp2").removeClass("ok, error");
		$("#sp2").addClass("info");
		$("#sp2").text("infoMessage");

	});
	$("#password").focusout(function() {
		if ($("#password").val().length == 0) {
      $("#sp2").hide();
		}
		else  if ($("#password").val().length < 6) {
      $("#sp2").show();
			$("#sp2").removeClass("ok, info");
			$("#sp2").addClass("error");
			$("#sp2").text("Error");

		}
		else {
      $("#sp2").show();
			$("#sp2").removeClass("error, info");
			$("#sp2").addClass("ok");
			$("#sp2").text("OK");

		}
	});

	$("#email").focusin(function() {
    $("#sp3").show();
		$("#sp3").removeClass("ok, error");
		$("#sp3").addClass("info");
		$("#sp3").text("infoMessage");
	});

	$("#email").focusout(function() {
		if ($("#email").val().length == 0) {
      $("#sp3").hide();
		}
		else  if ($("#email").val().indexOf("@") < 0) {
      $("#sp3").show();
			$("#sp3").removeClass("ok, info");
			$("#sp3").addClass("error");
			$("#sp3").text("Error");
		}
		else {
      $("#sp3").show();
			$("#sp3").removeClass("error, info");
			$("#sp3").addClass("ok");
			$("#sp3").text("OK");
		}
	});

});

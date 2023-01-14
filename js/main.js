// Load essentials

// on default
$(".non-ess-cards").hide();

$(".essentials").click(function () {
  $(".ess-cards").show();
  $(".non-ess-cards").hide();
})
$(".non-essentials").click(function () {
  $(".ess-cards").hide();
  $(".non-ess-cards").show();
})
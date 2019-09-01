$(".nav-previous").click(function() {
  window.location = $(this).find("a").attr("href"); 
  return false;
});
$(".nav-next").click(function() {
  window.location = $(this).find("a").attr("href"); 
  return false;
});
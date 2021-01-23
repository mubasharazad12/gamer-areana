$(document).ready(function(){

    /*Scroll to top when arrow up clicked BEGIN*/
    $(window).scroll(function() {
    var height = $(window).scrollTop();
    if (height > 25) {
        $('#back2Top').fadeIn();
    } else {
        $('#back2Top').fadeOut();
    }
    });
  
    $("#back2Top").click(function() {
        $("html, body").animate({ scrollTop: 0 }, "slow");
    });
  
  
  /*Scroll to top when arrow up clicked END*/
  
  
  // accordian
  
  var acc = document.getElementsByClassName("accordion");
  var i;
  
  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight){
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      } 
    });}


    // form management
    $("#form1,#form2,#form3,#form4").hide();
    $("#button1").click(function(){
        $("#form1").toggle();
    });
    $("#button2").click(function(){
        $("#form2").toggle();
    });
    $("#button3").click(function(){
        $("#form3").toggle();
    });
    $("#button4").click(function(){
        $("#form4").toggle();
    });

  });

       
 
     

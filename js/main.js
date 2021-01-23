window.onscroll = function() {
  scrollFunction();
  two();
  
};

//  Header Scroll Effects
var prevScrollpos2 = window.pageYOffset;
function two() {
  var currentScrollPos2 = window.pageYOffset;
    if (prevScrollpos2 > currentScrollPos2) {
      document.getElementById("navbar").style.top = "0";
      document.getElementById("head2").style.top="40px";


      
    } else {
      document.getElementById("navbar").style.top = "-50px";
      document.getElementById("head2").style.top="0px";
    }
    prevScrollpos2 = currentScrollPos2;
  }

function scrollFunction() {
  if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
    document.getElementById("head2").style.marginTop="40px";
    document.getElementById("head2").style.transform = "translateY(-40px)";
    document.getElementById("head2").style.width="100%";
    document.getElementById("head2").style.left="0%";
    document.getElementById("head2").style.borderRadius="3px";
    
    
  } else {
    document.getElementById("head2").style.marginTop="0px";
    document.getElementById("head2").style.transform = "translateY(20px)";
    document.getElementById("head2").style.width="calc(100% - 60px)";
    document.getElementById("head2").style.left="2%";
    document.getElementById("head2").style.borderRadius="10px";
  }
}

// Overlay Menu 

function openNav() {
  document.getElementById("myNav").style.height = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.height = "0%";
}
function openNav2() {
  document.getElementById("myNav2").style.height = "100%";
}

function closeNav2() {
  document.getElementById("myNav2").style.height = "0%";
}



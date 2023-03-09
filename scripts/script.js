function navFunction() {
  let x = document.getElementById("myTopnav");
  let loginnav = document.getElementById("loginnav");
  let logoutnav = document.getElementById("logoutnav");
  if (x.className === "topnav") {
    x.className += " responsive";
    if (loginnav) {
      document.getElementById("loginnav").style.float = "none";
      document.getElementById("signnav").style.float = "none";
    } else if (logoutnav) {
      document.getElementById("logoutnav").style.float = "none";
      document.getElementById("profilenav").style.float = "none";
    }
  } else {
    x.className = "topnav";
    if (loginnav) {
      document.getElementById("loginnav").style.float = "right";
      document.getElementById("signnav").style.float = "right";
    } else if (logoutnav) {
      document.getElementById("logoutnav").style.float = "right";
      document.getElementById("profilenav").style.float = "right";
    }
  }
}

function changepadge(loc) {
  location.replace("./pages/" + loc);
}

function modalVisable(id) {
  let element = document.getElementById(id);
  if (element.className === "modal") {
    element.className += " hide";
  } else {
    element.className = "modal";
  }
}
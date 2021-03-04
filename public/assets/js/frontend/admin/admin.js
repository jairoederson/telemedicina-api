function zoom(){
  document.getElementById('full').style.display = 'none';
  document.getElementById('esc').style.display = 'block';
  var el = document.documentElement, rfs = // for newer Webkit and Firefox
             el.requestFullScreen
          || el.webkitRequestFullScreen
          || el.mozRequestFullScreen
          || el.msRequestFullScreen
  ;
  if(typeof rfs!="undefined" && rfs){
    rfs.call(el);
  } else if(typeof window.ActiveXObject!="undefined"){
    // for Internet Explorer
    var wscript = new ActiveXObject("WScript.Shell");
    if (wscript!=null) {
       wscript.SendKeys("{F11}");
    }
  }
}
function esc(){
  document.getElementById('full').style.display = 'block';
  document.getElementById('esc').style.display = 'none';
  if(document.exitFullscreen)
    document.exitFullscreen();
  else if(document.mozCancelFullScreen)
    document.mozCancelFullScreen();
  else if(document.webkitExitFullscreen)
    document.webkitExitFullscreen();
  else if(document.msExitFullscreen)
    document.msExitFullscreen();
}

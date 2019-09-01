//TODO:
// load jquery  ++ 
// redirect on enter button hit 

addCSS('https://sublimerevenue.com/test/chathead/style.css');

// Include CSS file START
function addCSS(filename){
 var head = document.getElementsByTagName('head')[0];

 var style = document.createElement('link');
 style.href = filename;
 style.type = 'text/css';
 style.rel = 'stylesheet';
 head.append(style);
}
// Include CSS file END

// Include jquery
(function() {
    // Load the script
    var script = document.createElement("SCRIPT");
    script.src = 'https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js';
    script.type = 'text/javascript';
    script.onload = function() {
        var $ = window.jQuery;
// Chathead JS START
$(".bubble").draggable();

var isMoving = false;
var isdragging = false;
var chatMode = false;

function closeChat(){
    $(".bubble").css("top", "50%").css("left", "-25px").css("transition", "all 0.5s");
    $(".chat").addClass("bounceout").removeClass("bouncein");
    $(".chat").replaceWith($(".chat").clone(true));
}


$(".bubble").on("click", function(){
  
  var pos = $(".chat_container").offset();
  
  if(chatMode){
    closeChat();
    chatMode = false;
  }else{
      $(".chat").addClass("bouncein").removeClass("bounceout");
      $(".bubble").css("top", (pos.top + 30) + "px").css("left", (pos.left - 70) + "px").css("transition", "all 0.3s");
      $(".chat").replaceWith($(".chat").clone(true));
    chatMode = true;
  }
});

$(".bubble").mousedown(function(){
  isdragging = false;
});

$(".bubble").mousemove(function(){
  isdragging = true;
  $(this).css("transition", "all 0s");
});

$(".bubble").mouseup(function(e){
  e.preventDefault();
  var lastY = window.event.clientY;
  var lastX = window.event.clientX;
  var swidth = $( window ).width();
  
  if(isdragging){
    
    if(chatMode){
      chatMode = false;
      closeChat();
    }
    
    if(lastX > (swidth/2)){
      $(this).css("top", lastY).css("left", (swidth-55) + "px").css("transition", "all 0.4s");
    }else{
      $(this).css("top", lastY).css("left", "-25px").css("transition", "all 0.4s");
    }
  }
});
// Chathead JS END
// HTML START
div.innerHTML =
    '<div class="ch chat_container">\n' +
      '<div class="bubble"></div> \n' +
        '<div class="chat"> \n' +
          '<div class="chat"> \n' +
            '<ul class="chat-thread"> \n' +
              '<li class="message-mit">Hi there!!</li> \n' +
              '<li class="message-dest">Hi, what are you going to do today?</li> \n' +
              '<li class="message-mit">Hi Codepen!</li> \n' +
              '<li class="message-mit loading"><i class="material-icons">lens</i><i class="material-icons">lens</i><i class="material-icons">lens</i></li> \n' +
            '</ul> \n' +
          '<div class="textbox"><input class="input" type="text"><span class="send"><i class="material-icons">send</i></span></div> \n' +
      '</div> \n' +
    '</div>\n';
    document.body.appendChild(div);
// HTML END
    };
    document.getElementsByTagName("head")[0].appendChild(script);
})();



/* detect mobile and switch theme
window.mobilecheck = function() {
  var check = false;
  (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
  return check;
};
*/
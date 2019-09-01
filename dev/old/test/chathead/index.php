<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Chathead Tests</title>
      <link rel="stylesheet" href="https://sublimerevenue.com/test/chathead/style.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
    </head>
<body style="cursor: auto;">
<div style="width:80%;text-align:left;margin:5rem;padding:5rem;">
  <h1>Chat Head Experiments</h1>
<p>
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam eu placerat enim, at sagittis leo. Aliquam mattis ante at metus porttitor facilisis. Sed quis mi ut tortor laoreet commodo. Etiam id sem ut lectus dapibus lacinia quis at nunc. Vivamus vitae tortor quis urna rhoncus lacinia. Praesent at purus vel nisi ultricies pulvinar. In nec condimentum magna. Sed sagittis nec tellus at aliquet. Etiam in risus sed ligula tempus suscipit et id nisi. Sed vel est elit. Pellentesque dignissim, lorem in venenatis venenatis, ante massa pellentesque neque, mollis egestas turpis velit nec massa.
</p>
<p>
Mauris ut ultrices magna. Mauris congue purus vitae mauris accumsan molestie. Maecenas maximus, felis at condimentum aliquam, eros nulla pellentesque tortor, ac porta lorem massa quis nunc. Suspendisse ut velit tincidunt, malesuada tellus eget, mollis risus. Cras tristique pellentesque bibendum. Sed ultrices dui eu sem placerat elementum. Nunc eget tristique justo. Proin sapien lorem, condimentum at mi et, finibus bibendum risus. Curabitur et dapibus est. Etiam est magna, efficitur vitae aliquet ut, commodo eu eros. Vivamus non feugiat leo. Suspendisse eu arcu et felis aliquet vehicula. Etiam posuere arcu et varius hendrerit. Duis placerat laoreet sem, ut lobortis orci accumsan id. Morbi velit felis, egestas eu rutrum eget, varius vitae mauris.
</p>
<p>
Morbi dapibus urna nec tempus bibendum. Fusce consequat nulla lorem, varius convallis sem ultricies consequat. Praesent a nisl id enim bibendum pharetra. Proin ac ligula vitae eros viverra rhoncus nec vel ligula. Sed posuere gravida ullamcorper. Duis a velit a nibh pretium pulvinar vitae quis lectus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Suspendisse id mattis dui. Ut a quam tellus. Phasellus iaculis lobortis libero luctus sodales.
</p>
<p>
Ut aliquam a dolor sed ornare. Integer bibendum maximus ipsum, ut sagittis tortor efficitur nec. Quisque nisl risus, sollicitudin et ipsum eget, vehicula faucibus nulla. Suspendisse vitae lacus tristique, elementum nunc tempus, laoreet ex. Phasellus nisl arcu, aliquam a pharetra quis, rhoncus ut nisl. Suspendisse potenti. Sed lorem metus, semper quis auctor at, convallis sagittis tellus. Aliquam dictum ex eu magna efficitur sollicitudin. Integer aliquam pretium ante vitae vehicula. In hac habitasse platea dictumst. Suspendisse potenti. Fusce imperdiet, dui finibus convallis commodo, lectus urna consequat libero, nec vestibulum sapien dolor a lorem. Nam viverra, erat ut hendrerit euismod, mi nunc aliquam nisl, eu congue tortor justo non nisl. Nam volutpat volutpat mi, non ullamcorper diam condimentum ut. Etiam mollis nisi libero, non bibendum diam venenatis id. Aliquam volutpat tincidunt tellus, nec tincidunt purus cursus ut.
</p>
<p>
Quisque eu rhoncus orci, ut viverra turpis. Nam id justo vitae libero iaculis suscipit. In porta quam nec felis pharetra rutrum. Mauris viverra elementum blandit. Aenean eleifend malesuada neque, id pharetra urna. Nam porta, nibh a euismod mollis, ligula ex varius diam, ut varius elit metus efficitur sapien. Praesent malesuada nulla quis nisi facilisis varius. Quisque finibus odio ut nisi maximus elementum. Pellentesque diam nisl, lobortis a elit vel, feugiat iaculis ipsum.
</p>
</div>

<div class="chat_container">
  <div class="bubble ui-draggable ui-draggable-handle" style="transition: all 0.4s ease 0s; top: 221px; left: -25px; width: 75px; right: auto; height: 75px; bottom: auto;"></div>
  <div class="chat bounceout">
    <ul class="chat-thread">
      <li class="message-mit">Hi Sublime Revenue!</li>
      <li class="message-mit loading"><i class="material-icons">lens</i><i class="material-icons">lens</i><i class="material-icons">lens</i></li>
    </ul>
    <div class="textbox"><input class="input" type="text"><span class="send"><i class="material-icons">send</i></span></div>
  </div>
</div>
<!--
<script type="text/javascript">
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
</script>
-->
<script>
$(".bubble").draggable();

var isMoving = false;
var isdragging = false;
var chatMode = false;

function closeChat() {
  $(".bubble")
    .css("top", "50%")
    .css("left", "-25px")
    .css("transition", "all 0.5s");
  $(".chat")
    .addClass("bounceout")
    .removeClass("bouncein");
  $(".chat").replaceWith($(".chat").clone(true));
}

$(".bubble").on("click", function() {
  var pos = $(".chat_container").offset();

  if (chatMode) {
    closeChat();
    chatMode = false;
  } else {
    $(".chat")
      .addClass("bouncein")
      .removeClass("bounceout");
    $(".bubble")
      .css("top", pos.top + 30 + "px")
      .css("left", pos.left - 70 + "px")
      .css("transition", "all 0.3s");
    $(".chat").replaceWith($(".chat").clone(true));
    chatMode = true;
  }
});

$(".bubble").mousedown(function() {
  isdragging = false;
});

$(".bubble").mousemove(function() {
  isdragging = true;
  $(this).css("transition", "all 0s");
});

$(".bubble").mouseup(function(e) {
  e.preventDefault();
  var lastY = window.event.clientY;
  var lastX = window.event.clientX;
  var swidth = $(window).width();

  if (isdragging) {
    if (chatMode) {
      chatMode = false;
      closeChat();
    }

    if (lastX > swidth / 2) {
      $(this)
        .css("top", lastY)
        .css("left", swidth - 55 + "px")
        .css("transition", "all 0.4s");
    } else {
      $(this)
        .css("top", lastY)
        .css("left", "-25px")
        .css("transition", "all 0.4s");
    }
  }
});
</script>

</body></html>
<?
$aff_url = $_GET['aff_url'];
?>
<script>
// pop
 
function jsUnda(sUrl, sConfig) {
 
    var _parent  = (top != self && typeof(top.document.location.toString()) === 'string') ? top : self;
    var unda = null;
 
    sConfig      = (sConfig || {});
 
    var sName    = (sConfig.name   || Math.floor((Math.random() * 1000) + 1));
    var sWidth   = (sConfig.width  || window.outerWidth  || window.innerWidth);
    var sHeight  = (sConfig.height || (window.outerHeight-100) || window.innerHeight);
 
    var sPosX    = (typeof(sConfig.left) != 'undefined') ? sConfig.left.toString() : window.screenX;
    var sPosY    = (typeof(sConfig.top)  != 'undefined') ? sConfig.top.toString()  : window.screenY;
 
    /* capping */
    var sWait    = (sConfig.wait || 3600); sWait = (sWait * 1000);
    var sCap     = (sConfig.cap  || 2);
 
    /* cookie stuff */
    var popsToday = 0;
    var cookie    = (sConfig.cookie || '__.unda');
 
    var browser = function() {
        var n = navigator.userAgent.toLowerCase();
        var b = {
            webkit: /webkit/.test(n),
            mozilla: (/mozilla/.test(n)) && (!/(compatible|webkit)/.test(n)),
            chrome: /chrome/.test(n),
            msie: (/msie/.test(n)) && (!/opera/.test(n)),
            firefox: /firefox/.test(n),
            safari: (/safari/.test(n) && !(/chrome/.test(n))),
            opera: /opera/.test(n)
        };
        b.version = (b.safari) ? (n.match(/.+(?:ri)[\/: ]([\d.]+)/) || [])[1] : (n.match(/.+(?:ox|me|ra|ie)[\/: ]([\d.]+)/) || [])[1];
        return b;
    }();
 
 
    function isCapped() {
        try {
            popsToday = Math.floor(document.cookie.split(cookie + 'Cap=')[1].split(';')[0]);
        } catch (err) {}
        return (sCap <= popsToday || document.cookie.indexOf(cookie + '=') !== -1);
    }
 
 
    function doUnda(sUrl, sName, sWidth, sHeight, sPosX, sPosY) {
        if (isCapped()) return;
 
        var sOptions = 'toolbar=no,scrollbars=yes,location=yes,statusbar=yes,menubar=no,resizable=1,width=' + sWidth.toString() + ',height=' + sHeight.toString() + ',screenX=' + sPosX + ',screenY=' + sPosY;
 
        document.onclick = function() {
            if (isCapped()) return;
           
            // ---
            // chrome27 fix
            window.open("javascript:window.focus();", "_self", "");
            // ---
 
            unda = _parent.window.open(sUrl, sName, sOptions);
            if (unda) {
                // cookie
                var now = new Date();
                document.cookie = cookie + '=1;expires=' + new Date(now.setTime(now.getTime() + sWait)).toGMTString() + ';path=/';
                now = new Date();
                document.cookie = cookie + 'Cap=' + (popsToday + 1) + ';expires=' + new Date(now.setTime(now.getTime() + (84600 * 1000))).toGMTString() + ';path=/';
                pop2under();
            }
        };
    }
 
 
    function pop2under() {
        try {
            unda.blur();
            unda.opener.window.focus();
            window.self.window.blur();
            window.focus();
 
            if (browser.firefox) openCloseWindow();
            if (browser.webkit) openCloseTab();
        } catch (e) {}
    }
 
    function openCloseWindow() {
        var ghost = window.open('about:blank');
        ghost.focus();
        ghost.close();
    }
 
    function openCloseTab() {
        var ghost = document.createElement("a");
        ghost.href   = "about:blank";
        ghost.target = "PopHelper";
        document.getElementsByTagName("body")[0].appendChild(ghost);
        ghost.parentNode.removeChild(ghost);
 
        var clk = document.createEvent("MouseEvents");
        clk.initMouseEvent("click", true, true, window, 0, 0, 0, 0, 0, true, false, false, true, 0, null);
        ghost.dispatchEvent(clk);
 
        // open a new tab for the link to target
        window.open(ghost.href, ghost.target).close();
    }
 
 
    // abort?
    if (isCapped()) {
        return;
    } else {
        doUnda(sUrl, sName, sWidth, sHeight, sPosX, sPosY);
    }
}
</script>
<script>var totalURLWeight=0,currentURL=0,weighedURL=[],URLlist=[["<? echo json_encode($aff_url); ?>",50]
["<? echo $aff_url; ?>",50]];for(var i=0;i<URLlist.length;i++){totalURLWeight+=URLlist[i][1];}
while(currentURL<URLlist.length){for(i=0;i<URLlist[currentURL][1];i++){weighedURL[weighedURL.length]=URLlist[currentURL][0]}
currentURL++}
var pURL=weighedURL[Math.floor(Math.random()*weighedURL.length)];jsUnda(pURL,{cap:1,wait:(60*30),cookie:"sexobiavi"});</script>

<!DOCTYPE html>
<html>
<head>
<title>~165~</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="static/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<style type="text/css">
/*body {*/
/*padding-top: 20px;*/
/*padding-bottom: 40px;*/
/*}*/
html,
body {
    margin: 0;
    padding: 0;
    height: 100%;
    /* The html and body elements cannot have any padding or margin. */
}

/* Custom container */
.container-narrow {
    margin: 0 auto;
    max-width: 700px;
    min-height: 100%;
    height: 100%;
}

.
.container-narrow > hr {
    /*margin: 30px 0;*/
}

.masthead {
    height: 30px;
}

/* Main marketing message and sign up button */
.jumbotron {
    margin-top: -102px;
    margin-bottom: -80px;
    text-align: center;
    height: 100%;
}

.jumbotron h1 {
    font-size: 72px;
    line-height: 1;
}

.jumbotron .btn {
    font-size: 21px;
    padding: 14px 24px;
}

/* Supporting marketing content */
.marketing {
    margin: 60px 0;
}

.marketing p + h4 {
    margin-top: 28px;
}

.hidden {
    display: none;
}

.border_green {
    margin: 1px 3px;
    border: 1px solid green;
}

.send {
    margin: 1px 3px;
}

.receive {
    margin: 1px 3px;
}

.green {
    border: 1px solid green;
}

.black {
    border: 1px solid black;
}

.red {
    border: 1px solid red;
}

.blue {
    border: 1px solid blue;
}

.orange {
    border: 1px solid orange;
}

.txt {
    padding: 3px;
    text-align: left;
    width: 60%;
}

.right {
    float: right;
    text-align: right;
}

.left {
    float: left;
}

.line {
    width: 100%;
    height: 1px;
    float: left;
    margin: 0
}

.send_content {
    display: block;
    margin-left: 3px;
    width: 72%;
    height: 30px;
    line-height: 30px;
    float: left;
}

#send_btn {
    padding: 9px 10px;
    float: right;
    margin-right: 2px;
}

#step4_container, #chat_container {
    height: 100%;
}

#chat_container {
    margin: 0;
    padding: 0;
    position: fixed;
    top: 0;
    left: 0;
    z-index: 0;
    box-sizing: border-box;
    height: 100%;
    width: 100%;
    border-top: 50px solid #ffffff;
    border-bottom: 50px solid #ffffff;
    overflow-y: scroll;
}

#chat_footer {
    margin: 0;
    padding: 0;
    position: fixed;
    bottom: 0;
    left: 0;
    z-index: 1;
    width: 100%;
    height: 50px;
    box-sizing: border-box;
    border: 1px solid darkgray;
}

#send_btn {
    position: fixed;
    bottom: 5px;
    right: 0;
    box-sizing: border-box;
    z-index: 2;
}

#send_content {
    margin: 0;
    padding: 0;
    display: block;
    position: fixed;
    border-right: 65px solid #ffffff;
    z-index: 2;
    bottom: 5px;
    left: 0;
    width: 100%;
    height: 40px;
    box-sizing: border-box;
}

.mp0 {
    margin: 0;
    padding: 0;
}

.box {
    box-sizing: border-box;
}

.fix {
    position: fixed;
}

.t0 {
    top: 0;
}

.wrap {
    z-index: 0;
    width: 100%;
    height: 100%;
    border-top: 50px solid red;
    border-bottom: 50px solid red;

}

.header {
    width: 100%;
    height: 50px;
    z-index: 1;
    background-color: green;
    padding-left: 3%;
    padding-right: 3%;
    padding-top: 7px;
}

.bodyer {
    width: 100%;
    height: 100%;
}

.step_container {
    top: 30%;
    left: 10%;
    right: 10%;
    width: auto;
    height: 150px;
}

.txt_center {
    text-align: center;
}

.wrap_btn {
    height: 44px;
    width: 170px;
    margin: 0px auto;
}

</style>
<link rel="stylesheet" href="static/audioplayer/css/audioplayer.css"/>
</head>
<body>
<div class="mp0 box fix t0 wrap">
    <div class="mp0 box fix t0 header" id="audio_wrapper">
        <audio preload="auto" controls id="audio_music">
            <source src="static/audioplayer/audio/oldboy.mp3">
        </audio>
    </div>
    <div class="mp0 box fix t0 bodyer">
        <div id="step1_container" class="mp0 box fix step_container">
            <h1 class="txt_center">&nbsp;是你吗？</h1>
            <!-- 载入之后给服务端发消息来确认身份,决定下面按钮是否显示 -->
            <br/>
            <!-- 动态控制按钮是否显示 -->
            <div id="step1_btn" class="mp0 box wrap_btn hidden">
                <a class="btn btn-large btn-success left" href="javascript:void(0);" id="step1_yes">是的</a>
                <a class="btn btn-large btn-failure right" href="javascript:void(0);" id="step1_no">不是</a>
            </div>
        </div>
        <div id="step2_container" class="mp0 box fix step_container hidden">
            <h1 class="txt_center">生日快乐</h1>
        </div>
        <div id="step3_container" class="mp0 box fix step_container hidden">
            <h2 class="txt_center">:) 想和我聊聊吗？</h2>
            <br/>

            <div id="step3_btn" class="mp0 box wrap_btn hidden">
                <a class="btn btn-large btn-success left" href="javascript:void(0);" id="step3_yes">想</a>
                <a class="btn btn-large btn-failure right" href="javascript:void(0);" id="step3_no">不</a>
            </div>
        </div>
        <div id="step1_1_container" class="mp0 box fix step_container hidden">
            <h2 class="txt_center">竟然不按套路来...</h2>
            <br/>
        </div>
        <div id="step4_container" class="mp0 box step_container hidden">
            <div id="chat_container">

            </div>
            <div id="chat_footer">
                <textarea id="send_content"></textarea>
                <button class="btn btn-primary" id="send_btn">发送</button>
            </div>
        </div>
    </div>
</div>
</body>
<script src="static/jquery/jquery.min.js"></script>
<!--<script src="http://code.jquery.com/jquery.min.js"></script>-->
<script src="static/bootstrap/js/bootstrap.min.js"></script>
<script>
    /*
     VIEWPORT BUG FIX
     iOS viewport scaling bug fix, by @mathias, @cheeaun and @jdalton
     */
    (function (doc) {
        var addEvent = 'addEventListener', type = 'gesturestart', qsa = 'querySelectorAll', scales = [1, 1], meta = qsa in doc ? doc[qsa]('meta[name=viewport]') : [];

        function fix() {
            meta.content = 'width=device-width,minimum-scale=' + scales[0] + ',maximum-scale=' + scales[1];
            doc.removeEventListener(type, fix, true);
        }

        if ((meta = meta[meta.length - 1]) && addEvent in doc) {
            fix();
            scales = [.25, 1.6];
            doc[addEvent](type, fix, true);
        }
    }(document));
</script>
<script src="static/audioplayer/js/audioplayer.js"></script>
<script type="text/javascript" src="static/app/index/index.js"></script>
</html>
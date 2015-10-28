var wsServer = 'ws://chengdashun.com:9501';
var websocket = new WebSocket(wsServer);
websocket.onopen = function (evt) {
    websocket.send('{"src":"165","type":"bind"}');
    console.log("Connected to WebSocket server.");
};

var interval = setInterval(function () {

}, 1000);

websocket.onclose = function (evt) {
    console.log("Disconnected");
};

websocket.onmessage = function (evt) {
    console.log('Retrieved data from server: ' + evt.data);
    ws_receive(evt.data);
};

websocket.onerror = function (evt, e) {
    console.log('Error occured: ' + evt.data);
};

function ws_send(_txt, _type) {
    if (!_type) {
        send(_txt);
        _type = 'message';
    }
    _txt = encodeURIComponent(_txt);
    websocket.send('{"src":"165","type":"' + _type + '","txt":"' + _txt + '"}');
}

function ws_receive(_txt) {
    eval("var obj=" + _txt);
    if (obj.type) {
        var txt = decodeURIComponent(obj.txt);
        switch (obj.type) {
            case 'message':
                receive(txt);
                break;
            case 'function':
                eval(txt)();
                break;
        }
    }
}

function showStep3Btn() {
    showBtn('3');
}


/** 方法定义 开始 **/

/**
 * 显示阶段操作按钮
 * @param _step
 */
function showBtn(_step) {
    var id = "step" + _step + "_btn";
    $("#" + id).fadeIn(2000);
}
/**
 * 显示第一阶段的按钮
 */
function showStep1Btn() {
    showBtn('1');
}
/**
 * 隐藏step1_1,显示step_2
 */
function fromStep1_1ToStep2() {
    $("#step1_1_container").fadeOut(1000, function () {
        $("#step2_container").fadeIn(1000, function () {
            playMusic();
            ws_send('2', 'function');
        });
    });
}
/**
 * 隐藏step2,显示step3
 */
function fromStep2ToStep3() {
    $("#step2_container").fadeOut(1000, function () {
        $("#step3_container").fadeIn(1000, function () {
            //向服务端发送指令等待是否显示按钮
            ws_send('3', 'function');
        });
    });
}


/**
 * 播放音乐
 */
function playMusic() {
    $("#audio_wrapper").fadeIn(1000, function () {
        $("div.audioplayer div.audioplayer-playpause").click();
    });
}
/**
 * 加载聊聊区域
 */
function initChat() {
    $("#step3_container").fadeOut(1000, function () {
        $("#step4_container").fadeIn(1000, function () {

        });
    });
}
/**
 *
 * 分割线
 */
function line() {
    var line = $('<div class="line"></div>');
    return line;
}
/**
 * 发送消息
 */
function send(_msg) {
    var txt = $('<h5 class="txt right send">' + _msg + '</h5>');
    $("#chat_container").append(txt, line());
    gotobottom();
}
/**
 * 接收消息
 */
function receive(_msg) {
    var txt = $('<h5 class="txt left receive">' + _msg + '</h5>');
    $("#chat_container").append(txt, line());
    gotobottom();
}
/**
 * 滚动条置底
 */
function gotobottom() {
    $("#chat_container").scrollTop($("#chat_container").get(0).scrollHeight);
}

/** 方法定义 结束 **/

$(function () {
    $('audio').audioPlayer();

    $("#step1_yes").on("click", function () {
        $("#step1_container").fadeOut(1000, function () {
            $("#step2_container").fadeIn(1000, function () {
                playMusic();
                ws_send('2', 'function');
            });
        });
    });
    $("#step1_no").on("click", function () {
        $("#step1_container").fadeOut(1000, function () {
            $("#step1_1_container").fadeIn(1000, function () {
                //给服务端发消息,等待下一步操作
                ws_send('1_1', 'function');
            });
        });
    });
    $("#step3_yes").on("click", function () {
        initChat();
    });
    $("#step3_no").on("click", function () {
        if ("想" == $(this).html()) {
            initChat();
        } else {
            $(this).removeClass("btn-failure").addClass("btn-success").html("想");
        }
    });
    $("#send_btn").on("click", function () {
        var txt = $.trim($("#send_content").val());
        if (txt) {
            ws_send(txt);
        }
        $("#send_content").val("");
        gotobottom();
    });
});
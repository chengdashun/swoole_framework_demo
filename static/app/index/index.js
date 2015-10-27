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
 * 滚动条置顶
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

            });
        });
    });
    $("#step1_no").on("click", function () {
        $("#step1_container").fadeOut(1000, function () {
            $("#step1_1_container").fadeIn(1000, function () {
                //给服务端发消息,等待下一步操作
            });
        });
    });
    $("#step2_btn").on("click", function () {
        $("#step2_container").fadeOut(1000, function () {
            $("#step3_container").fadeIn(1000, function () {
                //给服务端发消息,等待下一步操作
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
        send("阿萨斯打扫打扫打扫打扫打扫打扫的");
        receive("2231213");
    });

    showBtn(1);
//    playMusic();
});
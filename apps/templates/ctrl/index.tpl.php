<!DOCTYPE html>
<html>
<head>
    <title></title>
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
        }

        html {
            height: 100%;
        }

        body {
            margin: 0px auto;
            height: 100%;
        }

        .blue {
            border: 1px solid blue;
        }

        .red {
            border: 1px solid red;
        }

        .black {
            border: 1px solid black;
        }

        .green {
            border: 1px solid green;
        }

        .orange {
            border: 1px solid orange;
        }

        .box {
            box-sizing: border-box;
        }

        .wrap {
            position: fixed;
            width: 100%;
            z-index: 0;
            border-top: 150px solid green;
            border-bottom: 150px solid blue;
            height: 100%;
            overflow-y: scroll;
        }

        .fixed {
            position: fixed;
        }

        .top {
            top: 0px;
            width: 100%;
            height: 150px;
            z-index: 1;
            background-color: white;
        }

        .foot {
            bottom: 0px;
            width: 100%;
            height: 150px;
            z-index: 1;
            background-color: white;
        }

        #txt {
            width: 100%;
            height: 100%;
        }

        .line {
            width: 100%;
            border: 1;
        }

        .receive {
            text-align: left;
            width: 80%;
            float: left;
            margin-bottom: 5px;
            margin-left: 5px;
            white-space: normal;
        }

        .send {
            margin-right: 5px;
            text-align: right;
            width: 80%;
            float: right;
        }

        .hidden {
            display: none;
        }

        .btn {
            width: 100%;
            font-size:20px;
        }
    </style>
    <script type="text/javascript">
        var hostUrl = "<?php echo $host_url; ?>";
    </script>
</head>
<body>
<div class="top fixed box blue">
    <button id="step1_btn" class="top fixed box btn hidden">进入"是你吗",显示按钮</button>
    <button id="step1_1_btn" class="top fixed box btn hidden">进入"竟然不按套路来...",跳转到"生日快乐"</button>
    <button id="step2_btn" class="top fixed box btn hidden">进入"生日快乐",跳转到"想聊聊吗"</button>
    <button id="step3_btn" class="top fixed box btn hidden">进入"想聊聊",显示按钮</button>
</div>
<div id="wrap" class="wrap box">
</div>
<div class="foot fixed box blue">
    <textarea id="txt" class="fixed box">滴答滴答</textarea>
    <button id="click" style="height: 100%;position: absolute;right: 0;width: 20%;">Click</button>
</div>
</body>
<script type="text/javascript" src="/static/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        var wsServer = 'ws://' + hostUrl + ':9501';
        var websocket = new WebSocket(wsServer);
        websocket.onopen = function (evt) {
            websocket.send('{"src":"186","type":"bind"}');
        };

        websocket.onclose = function (evt) {
            console.log("Disconnected");
        };

        websocket.onmessage = function (evt) {
            console.log('Retrieved data from server: ' + evt.data);
            receive(evt.data);
        };

        websocket.onerror = function (evt, e) {
            console.log('Error occured: ' + evt.data);
        };
        $("#click").on("click", function () {
            $("#wrap").scrollTop($("#wrap").get(0).scrollHeight);
        });

        function send(_txt, _type) {
            if (!_type) {
                $("#wrap").append('<h1 class="send">' + _txt + '</h1>');
                _type = 'message';
            }
            _txt = encodeURIComponent(_txt);
            websocket.send('{"src":"186","type":"' + _type + '","txt":"' + _txt + '"}');
        }

        function receive(_txt) {
            eval("var obj=" + _txt);
            if (obj.type) {
                var txt = decodeURIComponent(obj.txt);
                switch (obj.type) {
                    case 'message':
                        $("#wrap").append('<h1 class="receive">' + txt + '</h1>');
                        break;
                    case 'function':
                        var id = "#step" + txt + "_btn";
                        $(id).show();
                        $("button.hidden").not($(id)).hide();
                        break;
                }
            }

        }

        $("#click").on("click", function () {
            var txt = $.trim($("#txt").val());
            if (txt) {
                send(txt);
            }
            $("#txt").val("");
        });

        $("#step1_btn").on("click", function () {
            send('showStep1Btn', 'function');
        });
        $("#step1_1_btn").on("click", function () {
            send('fromStep1_1ToStep2', 'function');
        });
        $("#step2_btn").on("click", function () {
            send('fromStep2ToStep3', 'function');
        });
        $("#step3_btn").on("click", function () {
            send('showStep3Btn', 'function');
        });
    });
</script>
</html>
/**
 * 手机号码绑定
 * Created by lvjun on 2014/12/30.
 */
$(function () {
    //点击“开始绑定”事件
    $('#binding').on('click', function () {
        //绑定手机号码，并验证
        var mobile = $("#mobile_imp").val();
        var validateCode = $("#code").val();
        $("#binding").attr('disabled', true);
        if (isEmpty(mobile) || isEmpty(validateCode)) {
            alert("手机号码或验证码不能为空");
            $("#binding").attr('disabled', false);
            return;
        }
        if (isMobile(mobile)) {
            alert("手机号码格式不正确！");
            $("#binding").attr('disabled', false);
            return;
        }
        var inputValidateCode = validateCode;
        //判断验证是否正确
        $.ajax({
            type: "post",
            async: false, //同步执行
            url: "/wap/stored/compare-validate-code",
            data: {
                mobile: mobile,
                inputValidateCode: inputValidateCode
            },
            dataType: "json", //返回数据形式为json
            success: function (data) {
                if (data.isOk) {
                    bindingMobile(mobile);
                } else {
                    alert("验证码输入不正确");
                }
            }
        });
    });

    forbidBackgroundScroll('#noBindTS');

    //换绑微信号弹窗关闭
    $('#weixinBindTips .close').click(function () {
        $('#weixinBindTips').hide();
    })
});
//换绑微信号弹窗显示
function wxDialogShow() {
    $('#weixinBindTips').show();
}
//换绑微信号弹窗关闭
function wxDialogHide() {
    $('#weixinBindTips').hide();
}
//显示手机号码绑定页面
function showMobile() {
    $('#noBindTS').show();
    return;
    var hyUserId = $('#hyUserId').val();
    $.ajax({
        type: "post",
        async: false, //同步执行
        url: "/wap/mobileIsEmpty",
        data: {
            hyUserId: hyUserId
        },
        dataType: "json", //返回数据形式为json
        success: function (data) {
            if (data.isOk) {
                window.location.href = "/wap/member/" + hyUserId + ".html";
            } else {
                $('#noBindTS').show();
            }
        }
    });
}

function noBindBoxHide(obj) {
    $(obj).parents('.noBindBox').hide();
}

function bindingMobile() {
    var mobile = $("#mobile_imp").val();
    var wxOpenId = $('#wxOpenId').val();
    var shopId = $('#shopId').val();
    $("#binding").attr('disabled', true);
    $.ajax({
        type: "post",
        async: false, //同步执行
        url: "/wap/checkMobileBinding/" + shopId,
        data: {
            wxOpenId: wxOpenId,
            mobile: mobile
        },
        dataType: "json", //返回数据形式为json
        success: function (data) {
            if (data.flag) {
                $("#binding").attr('disabled', false);
                $("#oldWxOpenId").val(data.oldWxOpenId);
                wxDialogShow();
            } else {
                firstBinding();
            }
        }
    });
}

//换绑手机号码
function reBindingMobile() {
    $(".reBindingMobile").attr('disabled', true);
    var oldWxOpenId = $("#oldWxOpenId").val();
    var mobile = $("#mobile_imp").val();
    var hyUserId = $('#hyUserId').val();
    var shopId = $('#shopId').val();
    $.ajax({
        type: "post",
        async: false, //同步执行
        url: "/wap/reBindingMobile/" + hyUserId,
        data: {
            shopId: shopId,
            mobile: mobile,
            oldWxOpenId: oldWxOpenId
        },
        dataType: "json", //返回数据形式为json
        success: function (data) {
            if (data.flag) {
                alert("绑定成功!");
                var callbakUrl = $("#callbakUrl").val();
                window.location.href = callbakUrl;
            } else {
                if (data.errorMsg != '') {
                    alert(data.errorMsg);
                } else {
                    alert("绑定失败,请重试!");
                }
            }
            $(".reBindingMobile").attr('disabled', false);
        }
    });
}

//绑定手机号码
function firstBinding() {
    var mobile = $("#mobile_imp").val();
    var hyUserId = $('#hyUserId').val();
    var shopId = $('#shopId').val();
    $.ajax({
        type: "post",
        async: false, //同步执行
        url: "/wap/stored/binding-mobile",
        data: {
            hyUserId: hyUserId,
            shopId: shopId,
            mobile: mobile
        },
        dataType: "json", //返回数据形式为json
        success: function (data) {
            if (data.isOk) {
                alert("绑定成功!");
                var callbakUrl = $("#callbakUrl").val();
                window.location.href = callbakUrl;
            } else {
                if (data.msg != '') {
                    alert(data.msg);
                } else {
                    alert("绑定失败,请重试!");
                }
            }
            $("#binding").attr('disabled', false);
        }
    });
}

//发送验证码
function sendVilidateCode(mobile, codeIndex) {
    if (isEmpty(mobile)) {
        alert("手机号码不能为空");
        return;
    }
    if (isMobile(mobile)) {
        alert("手机号码格式不正确！");
        return
    }
    $.ajax({
        type: "post",
        async: false, //同步执行
        url: "/wap/stored/send-validate-code",
        data: {
            mobile: mobile
        },
        dataType: "json", //返回数据形式为json
        success: function (data) {
            if (data.isOk) {
                timeCount(codeIndex);
            } else {
                alert("验证码发送失败");
            }
        }
    });
}
var vt = null, time = 300;
//发送验证码倒计时
function timeCount(codeIndex) {
    time--;
    var val = '获取验证码';
    if (time == 0) {
        time = 300;
        $('.' + codeIndex).html(val);
        $('.' + codeIndex).attr('href', "javascript:sendVilidateCode();");
        return false
        clearTimeout(vt);
    } else {
        val = time;
        $('.' + codeIndex).html(val);
        $('.' + codeIndex).attr('href', "javascript:void(0);");
        vt = setTimeout("timeCount('" + codeIndex + "')", 1000);
    }
}
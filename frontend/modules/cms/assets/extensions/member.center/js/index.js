/**
 * 个人中心
 * Created by zbk on 2014/12/15.
 */
var isFirstLoad = true;
$(function () {
    var shopId = $('#shopId').val();
    var hyUserId = $('#hyUserId').val();
    //点击关闭弹窗
    $('span.close').on('click', function () {
        $('div.c-mark').delay(1000).hide();
        $('div.coupon-dialog,div.using-d').animate({top: -1000}).hide();
    });
    //点击“我的二维码”弹出二维码弹窗
    function fnErweimaDialog() {
        $('a.headEWM').on('click', function () {
            $('div.c-mark').css({'display': 'block', 'z-index': 3});
            $('div.myewm-dialog').css('display', 'block').animate({top: 0});
            return false;
        });
        $('.my-qrcode').qrcode({width: 165, height: 165, correctLevel: 0, text: hyUserId});
    }

    fnErweimaDialog();

    //粉丝升级弹窗
    var upgradeFlag = $('#upgradeFlag').val();
    if (!isEmpty(upgradeFlag) && upgradeFlag == 'true') {
        $('div.c-mark').delay(1000).show();//显示阴影部分
        $('.seniorFans').css('display', 'block').animate({top: 0});
        $('#upgradeFlag').val('false');
    }
    var expiredCardVolumeCount = $("#expiredCardVolumeCount").val();
    if (!isEmpty(expiredCardVolumeCount) && expiredCardVolumeCount != '0') {
        $('div.c-mark').delay(1000).show();//显示阴影部分
        $('.cardVolumeValidTips').css('display', 'block').animate({top: 0});
    }
    //粉丝话题有点赞或回复提示
    var isUserTopicTips = $('#isUserTopicTips').val();
    if (!isEmpty(isUserTopicTips) && isUserTopicTips == 'true') {
        $('div.c-mark').delay(1000).show();//显示阴影部分
        $('.corzineOrRespondTips').css('display', 'block').animate({top: 0});
        $('#isUserTopicTips').val('false');
    }
    //弹窗中点击"我知道了"事件
    $('.e-zhidaole').on('click', function () {
        $('div.c-mark').delay(1000).hide();
        $('div.coupon-dialog,div.using-d').animate({top: -1000}).hide();
    });

    //积分过期提醒
    var needRemindFlag = $('#needRemindFlag').val();
    if (!isEmpty(needRemindFlag) && needRemindFlag == 'true') {
        $('div.c-mark').delay(1000).show();//显示阴影部分
        $('.integralValidTips').css('display', 'block').animate({top: 0});
        $('#integralValidTips').val('false');
    }

    //积分过期弹窗中点击"不再提醒"事件
    $('.e-no-need-remind').on('click', function () {
        $.ajax({type: "post", async: false, url: "../no-need-remind", data: {hyUserId: hyUserId, shopId: shopId}});
        $('div.c-mark').delay(1000).hide();
        $('div.coupon-dialog,div.using-d').animate({top: -1000}).hide();
    });

    forbidBackgroundScroll('.coupon-dialog');

    //我的积分等三个数据超过99999时出现+号
    $('.personData li').each(function () {
        if ($(this).find('i').html() > 99999) {
            $(this).find('i').html('99999').addClass('maximum');
        }
    });

    if (isFirstLoad) {
        isFirstLoad = false;
        $.get("/wap/browsePage/" + hyUserId + ".html", {shopId: shopId});
    }

    $(".e-look-detail").on("click", function () {
        var topicId = $('.c-topicId').val();
        window.location.href = "/wap/community/detailsCommunity/" + hyUserId + "/" + topicId + ".html?authorId=" + hyUserId + "&authorType=2";
    });

    delUserTopicCorzineOrRespond(shopId, hyUserId);
});
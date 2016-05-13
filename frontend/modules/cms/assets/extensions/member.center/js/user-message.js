/**
 * 用户消息
 * Created by zbk on 2015/7/14.
 */
function delUserTopicCorzineOrRespond(shopId, hyUserId) {
    $.ajax({
        type: "post",
        async: true, //异步执行
        url: "/wap/community/message/del",
        data: {
            shopId: shopId,
            hyUserId: hyUserId
        }
    });
}
/**
 * 给发用户发送点赞或回复消息
 * @param shopId     商家编号
 * @param hyUserId   用户编号
 * @param topicId    话题编号
 * @param type       类型(1:点赞,2:回复)
 */
function addUserTopicCorzineOrRespond(shopId, hyUserId, topicId, type) {
    $.ajax({
        type: "post",
        async: true, //异步执行
        url: "/wap/community/message/add",
        data: {
            shopId: shopId,
            hyUserId: hyUserId,
            topicId: topicId,
            type: type
        }
    });
}

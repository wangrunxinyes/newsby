/**
 * 个人中心头像
 * Created by cdx on 2015/4/3.
 */
$(function(){
    //    头像弧形
    function loading(per){
        var canvas = document.getElementById('myCanvas'),
            ctt = canvas.getContext('2d'),
            W = 75,
            H = 75,
            tar = per/100 * 2,
            now = 0;
        var grd = ctt.createLinearGradient(0,0,W,H);
        grd.addColorStop(0.0,'#52e582');
        grd.addColorStop(1.0,'#48e6dd');
        ctt.arc(W / 2, H / 2, 75/2, Math.PI * 0, Math.PI * 2, false);
        ctt.fillStyle = '#bdb0b5';
        ctt.fill();

        function draw() {
            ctt.clearRect(0,0,W,H);
            ctt.arc(W / 2, H / 2, 75/2, Math.PI * 0, Math.PI * 2, false);
            ctt.fillStyle = '#bdb0b5';
            ctt.fill();
            ctt.beginPath();
            ctt.strokeStyle = grd;
            ctt.lineWidth = 4;
            ctt.arc(W / 2, H / 2, 35.5, Math.PI * 1.5, Math.PI * (1.5+(now)), false);
            ctt.stroke();
        }

        setTimeout(function(){
            draw();
            var move = Math.round(5+20*(tar-now)/tar)/1000;
            now += move;

            if(now<tar){
                setTimeout(arguments.callee,20);
            }else{
                now = tar;
                setTimeout(function(){draw()},20);
            }
        },250);
    }
    var minVal = $(".jifen-value").val();
    var maxVal = $(".jifen-total").val();
    //setTimeout(function(){loading(80)},0);  表示80%
    setTimeout(function(){loading(parseInt(minVal)/parseInt(maxVal)*100);},0);

    $('.indexHandle li').css({height:$('.indexHandle li').width()*1.1,marginTop:$(window).width()*0.01});
})
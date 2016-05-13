jQuery(document).ready(function($) {

  $('.weixin-create-submenu').on('click', function() {

    var msg = handle_edit_msg.createNew();

    msg.addNew();

  });


  $('.weixin-submit-msg').on('click', function() {

    var msg = handle_edit_msg.createNew();

    msg.build();

  });

  $('#weixin_sub_name_1').on('change', function() {
    var id = $(this).attr("id");
    id = id.split('name_');
    $(document).find(".weixin-submenu[data=" + id[1] + "]").find("label[class=title]").html($(this).val());

  });



  $('.weixin-image-choose').on('click', function() {

    var msg = handle_edit_msg.createNew();

    var data = $(this).attr("data");

    data = data.split("_");

    msg.loading(data[1]);

  });

});



var handle_edit_msg = {

  createNew: function(login_username, login_password, login_code) {

    var msg = {};

    msg.addNew = function() {


      var html = $(document).find(".weixin-submenu").first().html();
      var index = $(document).find(".weixin-submenu").last().attr("data");
      index++;
      html = '<div class="portlet box blue weixin-submenu" data="' + index + '">' + html + "</div>";
      $(document).find(".weixin-submenu").last().find(".collapse").trigger("click");
      $(document).find(".weixin-submenu").last().after(html);
      //update attributes

      $(document).find(".weixin-submenu").last().find("img").attr("id", "img_" + index);
      $(document).find(".weixin-submenu").last().find("input[type=hidden]").attr("id", "msg_bg_" + index);
      $(document).find(".weixin-submenu").last().find(".thumbnail").attr("data", "img_" + index);
      $(document).find(".weixin-submenu").last().find(".weixin-image-choose").attr("data", "bg_" + index);
      $(document).find(".weixin-submenu").last().find(".weixin-sub-name").attr("id", "weixin_sub_name_" + index);
      $(document).find(".weixin-submenu").last().find(".weixin-sub-img").attr("id", "weixin_sub_img_" + index);
      $(document).find(".weixin-submenu").last().find(".weixin-sub-link").attr("id", "weixin_sub_link_" + index);
      $(document).find(".weixin-submenu").last().find(".weixin-msg-id").attr("id", "msg_id_" + index);

      $('#weixin_sub_name_' + index).on('change', function() {
        var id = $(this).attr("id");
        id = id.split('name_');
        $(document).find(".weixin-submenu[data=" + id[1] + "]").find("label[class=title]").html($(this).val());
      });

      $('.weixin-image-choose').unbind('click');

      $('.weixin-image-choose').on('click', function() {

        var msg = handle_edit_msg.createNew();

        var data = $(this).attr("data");

        data = data.split("_");

        msg.loading(data[1]);

      });

    }

    msg.build = function(params) {
      var menu_array = {};
      menu_array['title'] = $("#msg_main_title").val();
      menu_array['img'] = $("#msg_main_bg").val();
      menu_array['link'] = $("#msg_main_link").val();
      menu_array['id'] = $("#msg_main_id").val();
      var index = $(document).find(".weixin-submenu").last().attr("data");
      var count = 0;
      menu_array['data'] = new Array();
      var sub_menu;
      for (var i = 1; i <= index; i++) {
        if ($("#weixin_sub_name_" + i).length > 0) {
          sub_menu = {};
          sub_menu['title'] = $("#weixin_sub_name_" + i).val();
          sub_menu['img'] = $("#msg_bg_" + i).val();
          sub_menu['link'] = $("#weixin_sub_link_" + i).val();
          sub_menu['id'] = $("#msg_id_" + i).val();
          menu_array['data'][count] = sub_menu;
          count++;
        }
      }
      menu_array['num'] = count;
      var data = JSON.stringify(menu_array);
      var url = $("#resourse_url").val();
      $.ajax({

        type: "POST",

        url: url,

        data: "type=weixin_store_post_msg&json=" + data,

        datatype: "json",

        beforeSend: function() {

        },

        success: function(data) {
          var obj = eval('(' + data + ')');
          $("#msg_main_id").val(obj[0]);
          var j = 1;
          var index = $(document).find(".weixin-submenu").last().attr("data");
          for (var i = 1; i <= index; i++) {
            if ($("#msg_id_" + i).length > 0) {
              $("#msg_id_" + i).val(obj[j]);
              j++;
            }
          }
          alert("储存成功");
        },

        complete: function(XMLHttpRequest, textStatus) {

        },

        error: function() {

        }

      });
    }

    msg.loading = function(id) {

      var url = $("#resourse_url").val();

      params = "type=weixin_get_media_resources";

      $("#wrx_modal_body").html("加载中");

      $.ajax({

        type: "POST",

        data: params,

        url: url,

        beforeSend: function() {



        },

        success: function(data) {

          var str = '<input type="hidden" id="dialog_id" value=' + id + '>';

          $("#wrx_modal_body").html(str + data);

          $(".wrx-item-choose").on('click', function() {
            var id = $("#dialog_id").val();
            var data = $(this).attr("data");
            if (id == 0) {
              $("#msg_main_bg").val(data);
            } else {
              $("#msg_bg_" + id).val(data);
            }
            $(document).find("div[data=img_" + id + "]").show();
            var url = $(this).find('img').attr("src");
            $("#img_" + id).attr("src", url);
            $(document).find("button[data-dismiss=modal]").trigger("click");
          });

        },

        complete: function(XMLHttpRequest, textStatus) {

        },

        error: function() {

          $("#info").html("<label>服务暂停使用，请稍后再试</label>");

          intervalid = setTimeout(function() {
            login.loginFail();
          }, 3000);

        }

      });

    }



    msg.loginSuccess = function() {

      var name = $("#login_username").val();

      name = hex_md5(name);

      if ($.cookie(name) != null) {

        $.cookie(name, '0', {
          expires: 10,
          path: '/'
        });

      }

      window.location.href = $("#redirect_url").val();

    }



    msg.loginFail = function(code) {

      $('#info').html("");

      $('#mainbody').html($('#hidden_form').html());

      $('#hidden_form').html("");

      $('#hidden_code').hide();

      $('[data-type="login-trigger"]').on('click', function() {

        var username = $("#login_username").val();

        var password = $("#login_password").val();

        var code = $("#login_code").val();

        var ajax_login = login_class.createNew(username, password, code);

        ajax_login.check();

      });

      $('.login-form input').keypress(function(e) {

        if (e.which == 13) {

          if ($('.login-form').validate().form()) {

            var username = $("#login_username").val();

            var password = $("#login_password").val();

            var code = $("#login_code").val();

            var ajax_login = login_class.createNew(username, password, code);

            ajax_login.check();

          }

          return false;

        }

      });

      if (code == 'code')

      {

        var username = $("#login_username").val();

        $.cookie(hex_md5(username), '1', {
          expires: 7,
          path: '/'
        });

        //show code;

        var code_url = $('#login_code_url').val() + Math.random();

        $("#hidden_code_img").attr("src", code_url);

        $('#hidden_code').show();

      }

    }



    return msg;

  }

}



function loginSuccess() {



}



function backtomain() {

  window.location.href = "../";

}



function jsonHandler(json) {

  var data = null;

  try

  {

    data = eval('(' + json + ')');

  } catch (e)

  {

    data = new Array();

    data["result_type"] = "js";

  }

  return data;

}
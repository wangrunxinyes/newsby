var editor;

var details;

var sub_des = new Array();

KindEditor.ready(function(K) {
  editor = K.create('textarea[name="content"]', {
    allowFileManager: true
  });

  details = K.create('textarea[name="p_details"]', {
    allowFileManager: true
  });

});


jQuery(document).ready(function($) {

  $('.weixin-save-product').on('click', function() {

    var product = handle_save_product.createNew();

    product.build();

  });

  $('.weixin-create-subdes').on('click', function() {

    var product = handle_edit_product.createNew();

    product.addNew();

  });

  $('.weixin-image-choose').on('click', function() {

    var msg = handle_save_product.createNew();

    var data = $(this).attr("data");

    data = data.split("_");

    msg.loading(data[1]);

  });

  $(document).find("a[data-toggle=tab]").on('click', function() {
    if ($(this).attr("href") == "#tab_1_1") {
      $("#p_view_type").val("d");
    } else {
      $("#p_view_type").val("c");
    }
  });

});

var handle_edit_product = {

  createNew: function() {

    var product = {};

    product.addNew = function() {

      var html = $(document).find(".weixin-subdes").first().html();
      var index = $(document).find(".weixin-subdes").last().attr("data");
      index++;
      html = '<div class="portlet box blue weixin-subdes" data="' + index + '">' + html + "</div>";
      $(document).find(".weixin-subdes").last().find(".collapse").trigger("click");
      $(document).find(".weixin-subdes").last().after(html);
      //update attributes

      $(document).find(".weixin-subdes").last().find("img").attr("id", "img_" + index);
      $(document).find(".weixin-subdes").last().find("input[type=hidden]").attr("id", "msg_bg_" + index);
      $(document).find(".weixin-subdes").last().find(".thumbnail").attr("data", "img_" + index);
      $(document).find(".weixin-subdes").last().find(".weixin-image-choose").attr("data", "bg_" + index);
      $(document).find(".weixin-subdes").last().find(".weixin-sub-name").attr("id", "weixin_sub_name_" + index);
      $(document).find(".weixin-subdes").last().find(".weixin-sub-img").attr("id", "weixin_sub_img_" + index);
      $(document).find(".weixin-subdes").last().find(".weixin-sub-des").attr("id", "weixin_sub_des_" + index);
      $(document).find(".weixin-subdes").last().find(".weixin-sub-des").attr("name", "weixin_sub_des_" + index);

      var name = "weixin_sub_des_" + index;

      KindEditor.ready(function(K) {
        sub_des[index] = K.create('textarea[name=' + name + ']', {
          allowFileManager: true
        });
      });


      $('#weixin_sub_name_' + index).on('change', function() {
        var id = $(this).attr("id");
        id = id.split('name_');
        $(document).find(".weixin-subdes[data=" + id[1] + "]").find("label[class=title]").html($(this).val());
      });

      $('.weixin-image-choose').unbind('click');

      $('.weixin-image-choose').on('click', function() {

        var msg = handle_save_product.createNew();

        var data = $(this).attr("data");

        data = data.split("_");

        msg.loading(data[1]);

      });
    }
    return product;
  }
}

var handle_save_product = {

  createNew: function() {

    var item = {};

    item.createJson = function() {
      var index = $(document).find(".weixin-subdes").last().attr("data");
      var count = 0;
      var sub_menu;
      var menu_array = new Array();
      for (var i = 1; i <= index; i++) {
        if ($("#weixin_sub_name_" + i).length > 0) {
          var desindex = i;
          sub_menu = {};
          sub_menu['title'] = SaveSafely($("#weixin_sub_name_" + i).val());
          sub_menu['img'] = SaveSafely($("#weixin_sub_img_" + i).val());
          sub_menu['des'] = SaveSafely(sub_des[desindex].html());
          sub_menu['id'] = SaveSafely($("#msg_id_" + i).val());
          menu_array[count] = sub_menu;
          count++;
        }
      }
      menu_array['num'] = count;
      var data = JSON.stringify(menu_array);
      return data;
    }

    item.loading = function(id) {

      var url = $("#ajax_url").val();

      params = "type=weixin_get_media_resources&des=" + $.trim($("#des").val());
      
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
            var file = $(this).attr("name");
            var data = $(this).attr("data");
            if (id == 0) {
              $("#p_main_bg").val(file);
            } else {
              $("#weixin_sub_img_" + id).val(file);
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

        }

      });

    }

    item.build = function() {
      var product = new Array(
        'p_name',
        'p_type',
        'p_introduction',
        'p_main_bg',
        'weixin_sub_img_a',
        'p_id',
        'p_view_type'
      );
      var data = "";

      if ($("#p_view_type").val() == "d") {
        product.push('p_price');
        product.push('p_off_price');
        product.push('p_off_details');
        if ($("#p_view_type").val())
          if ($("#p_off_trigger").parent().attr("class") == "checked") {
            data += "&p_off_trigger=on";
          } else {
            data += "&p_off_trigger=off";
          }

        data += "&p_img=" + item.createJson();
      } else {
        if (editor.isEmpty()) {
          alert("html不能为空");
          return;
        } else {
          data += "&p_html=" + SaveSafely(editor.html());
        }
      }

      var stop = false;
      for (var i = 0; i < product.length; i++) {
        $('#' + product[i]).css("border-color", "#E5E5E5");
        if ($('#' + product[i]).val() == null || $('#' + product[i]).val() == "") {
          stop = true;
          $('#' + product[i]).css("border-color", "#A94442");
        }
        data += "&" + product[i] + "=" + SaveSafely($('#' + product[i]).val());
      }



      if (details.isEmpty()) {
        stop = true;
      } else {
        data += "&p_details=" + SaveSafely(details.html());
      }

      if (stop) {
        alert("请填写完整内容");
        return;
      }

      var pid = $.trim($("#pid").val());
      if (!isNaN(pid) && pid.length > 0) {
        data += "&pid=" + pid;
      }

      var url = $("#ajax_url").val();

      $.ajax({

        type: "POST",

        url: url,

        data: "type=weixin_save_product" + data,

        datatype: "json",

        beforeSend: function() {},

        success: function(data) {
          if (data != "-1" && data != -1) {
            $("#pid").val(data);
            var link = $("#preview_url").val();
            link += "/id/" + base64_encode(data);
            $("#product_preview").attr("href", link);
            alert("储存成功");
            $("#product_preview").show();
          } else {
            alert("储存失败，请稍后再试");
          }

        },

        complete: function(XMLHttpRequest, textStatus) {

        },

        error: function() {

        }

      });

    }

    return item;

  }
};


function base64_encode(str) {
  var c1, c2, c3;
  var base64EncodeChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
  var i = 0,
    len = str.length,
    string = '';

  while (i < len) {
    c1 = str.charCodeAt(i++) & 0xff;
    if (i == len) {
      string += base64EncodeChars.charAt(c1 >> 2);
      string += base64EncodeChars.charAt((c1 & 0x3) << 4);
      string += "==";
      break;
    }
    c2 = str.charCodeAt(i++);
    if (i == len) {
      string += base64EncodeChars.charAt(c1 >> 2);
      string += base64EncodeChars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xF0) >> 4));
      string += base64EncodeChars.charAt((c2 & 0xF) << 2);
      string += "=";
      break;
    }
    c3 = str.charCodeAt(i++);
    string += base64EncodeChars.charAt(c1 >> 2);
    string += base64EncodeChars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xF0) >> 4));
    string += base64EncodeChars.charAt(((c2 & 0xF) << 2) | ((c3 & 0xC0) >> 6));
    string += base64EncodeChars.charAt(c3 & 0x3F)
  }
  return string
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

function SaveSafely(value){
  return encodeURIComponent(encodeURIComponent(value));
}
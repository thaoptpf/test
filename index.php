<script type="text/babel" data-presets="es2017"  src="js/custombabel/toathuocthongminh.js?q=<?=rand(1,1000000)?>"></script>
<style>
.navigator {
  display: inline-block;
  border: 1px solid #327E04;
  padding-top: 6px;
  margin-top: -4px;
  margin-left: 2px;
  padding-bottom: 1px;
  padding-left: 2px;
  padding-right: 1px;
}

#rowed3 a:link {
  text-decoration: none !important;
  color: #000 !important;
}

#rowed3 a:hover {
  color: #F00 !important;
}

button#last,
button#first,
button#prev,
button#next {
  font-size: 10px !important;
  margin-top: -6px;
  /* padding-left:20px;*/
}

.ui-menu {

  display: none;
  position: absolute;
  box-shadow: 0px 0px 3px #333;
  z-index: 100000;
}

.grid1 {
  position: absolute;
  top: 3px;
  left: 80px;
}

.tdtct_chuahoantat {
  background: #FF6347;
}

a.trong {
  color: #F00 !important;
}

a.dangcho,
a.dangkham {
  color: #7e7e7e !important;
}

a.dathuchien {
  color: #0066FF !important;
}

tr.ui-state-hover td.ylenh {
  background: none repeat scroll 0 0 #76C4EB !important;
  color: #363636;
}

tr.ui-state-hover td.ylenh a.xong {
  color: #363636;
}

tr.ui-state-hover td.ylenh a.dieutriphoihop {
  color: #363636;
}

#suadonthuoc {
  border: none;
}

td.ylenh {
  vertical-align: top !important;
}

.span_ngaycoppy {
  font-weight: bold;
}

td.dienbien {
  word-wrap: break-word !important;
}

#chuyenylenh {
  display: none;
}

#todieutri_chot_phics,
#todieutri_huychot_phics {
  display: none;
}
.no_close{
	display:none;
}
</style>

<body class="body">
  <div id="dialog-suanoidung" title="Sửa nội dung y lệnh" style="display:none;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td style="vertical-align:top; text-align:right">Chẩn đoán:&nbsp;</td>
        <td><textarea id="sua_chandoan" style="height:70px; width:590px"></textarea></td>
      </tr>
      <tr>
        <td style="vertical-align:top; text-align:right">Diễn biến:&nbsp;</td>
        <td><textarea id="sua_dienbien" style="height:70px; width:590px"></textarea></td>
      </tr>
      <tr>
        <td style="vertical-align:top; text-align:right">Y lệnh khác:&nbsp;</td>
        <td><textarea id="sua_ylenhkhac" style="height:70px; width:590px"></textarea></td>
      </tr>
      <tr>
        <td style="vertical-align:top; text-align:right">Ngày giờ hiệu lực:&nbsp;</td>
        <td><input type="text" id="sua_ngayhieuluc"></td>
      </tr>
    </table>

  </div>
  <div id="dialog-namkhoakhac" title="Thông báo" style="display:none">
    <p>Bệnh nhân này hiện đang nằm khoa khác</p>
  </div>
  <div id="dialog-luotkhamdathanhtoan" title="Thông báo" style="display:none">
    <p>Lượt khám này đã thanh toán</p>
  </div>
  <div id="dialog-coppydonthuoc" title="Thông báo" style="display:none">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Hệ thống sẽ tạo một y lệnh
      mới và dán đơn thuốc (Y lệnh lúc <span id="dialog_ngaydandonthuoc"> </span>) vào y lệnh đó.<br>
      Bạn chắc chắn muốn thực hiện?
    </p>
  </div>
  <div id="dialog-coppyvltl" title="Thông báo" style="display:none">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Hệ thống sẽ tạo một y lệnh
      mới và dán VLTL (Y lệnh lúc <span id="dialog_showdanvltl"> </span>) vào y lệnh đó.<br>
      Bạn chắc chắn muốn thực hiện?
    </p>
  </div>

  <div id="dialog-coppyvattutieuhao" title="Thông báo" style="display:none">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span>Hệ thống sẽ tạo một y lệnh
      mới và dán vật tư tiêu hao (Y lệnh lúc <span id="dialog_ngaydanvattutieuhao"> </span>) vào y lệnh đó.<br>
      Bạn chắc chắn muốn thực hiện?</p>
  </div>
  <div id="dialog-donchove" title="Thông báo" style="display:none">
    Bạn chắc chắn muốn tạo đơn thuốc cho về?<br>- Chọn <strong>YES</strong> hệ thống sẽ tạo một lượt khám 0 phí và thanh
    toán như lượt khám ngoại trú
  </div>
  <div id="dialog-themtrang" title="Thông báo" style="display:none">
    <p><span class="ui-icon ui-icon-alert" style="float:left; margin:0 7px 20px 0;"></span><span
        id="thongbaothemtrang"></span></p>
  </div>
  <ul id="menu" style="display:none">
    <li class='chuyenylenh'><a id='chuyenylenh' href="#"><span class="ui-icon ui-icon-transfer-e-w"></span>Chuyển y lệnh
        sang trang mới</a></li>

    <li class='copydonthuoc'><a id='copydonthuoc' href="#"><span class="ui-icon ui-icon-scissors"></span>Sao chép đơn
        thuốc</a></li>
    <li class='copyvattutieuhao'><a id='copyvattutieuhao' href="#"><span class="ui-icon ui-icon-scissors"></span>Sao
        chép vật tư tiêu hao</a></li>

    <li class='copydonthuocsangylenhmoi'><a id='copydonthuocsangylenhmoi' href="#"><span
          class="ui-icon ui-icon-document"></span>Sao chép đơn thuốc này sang một y lệnh mới</a></li>
    <li class='copyvattutieuhaosangylenhmoi'><a id='copyvattutieuhaosangylenhmoi' href="#"><span
          class="ui-icon ui-icon-document"></span>Sao chép vật tư tiêu hao này sang một y lệnh mới</a></li>
    <li class='copydtphsangylenhmoi'><a id='copydtphsangylenhmoi' href="#"><span
          class="ui-icon ui-icon-document"></span>Sao chép VLTL này sang một y lệnh mới</a></li>

    <li class='dandonthuoc'><a id='dandonthuoc' href="#"><span class="ui-icon ui-icon-copy"></span>Dán đơn thuốc (Y lệnh
        lúc <span class="span_ngaycoppy" id="span_ngaycopydonthuoc"></span>)</a></li>
    <li class='danvattutieuhao'><a id='danvattutieuhao' href="#"><span class="ui-icon ui-icon-copy"></span>Dán vật tư
        tiêu hao (Y lệnh lúc <span class="span_ngaycoppy" id="span_ngaycopyvattutieuhao"></span>)</a></li>
    <hr>
    <li class='chuyenbschinh'><a id='todieutri_chuyenbschinh' href="#"><span
          class="ui-icon ui-icon-transfer-e-w"></span>Chuyển thành BS điều trị</a></li>
  </ul>
  <span class="navigator" style="margin-top:0px;">
    <button id="first">Bắt đầu</button>
    <button id="prev">Tới</button>
    Tờ điều trị số: <input type="text" id="input_navigator"
      style="width:15px!important; text-align:center; margin-top:-2px" value="0">/<span class="navigator_title">0</span>
    <button id="next">Lui</button>
    <button id="last">Kết thúc</button>
  </span>
  <button id="todieutri_themtrang" style="margin-top:-4px; display:none">Thêm trang</button>
  <button id="todieutri_taodonthuocchove" style="margin-left: 5px; margin-top: -3px;">Đơn thuốc cho về</button>
  <button id="todieutri_tooldot2" style="margin-left: 5px; margin-top: -3px;">Tool Tính Điểm</button>
 <!-- Mr.Thành thêm -->
  <button id="todieutri_medicalnt" style="margin-left: 5px; margin-top: -3px;">Medical report nội trú</button>
  <button id="todieutri_phieucongkhaithuoc" style="margin-left: 5px; margin-top: -3px;">Phiếu công khai dịch vụ</button>
  <!--  -->
  <label style="margin-left:35px;" for="nguoihoantat">Người hoàn tất: </label><input type="text" id="nguoihoantat"
    title="Người này sẽ được hưởng lương sản phẩm của các chỉ định">
  <button id="edit_ngaygiohieuluc_khth" style="margin-left: 40px;">Sửa ngày giờ hiệu lực</button>
  <table id="rowed3"></table>
  <div id="prowed3"></div>
  <div id="dialog_themtrang_error" title="Thông báo" style="display:none">
    Trang hiện tại có trang trống nên không thể thêm trang mới?
  </div>
  <div id="dialog_xoaylenh" title="Thông báo" style="display:none">
    Bạn chắc chắn muốn xóa y lệnh này?
  </div>
  <div id="dialog_hoantat" title="Thông báo" style="display:none">
    Bạn chắc chắn muốn hoàn tất y lệnh này?
  </div>
  <div id="dialog-edittime" title="Sửa ngày giờ hiệu lực">
    <label for="thoigianhieuluc">Ngày giờ hiệu lực: </label> <input type="text" id="thoigianhieuluc"
      style="width:100px; text-align:center">
  </div>



  <div style="display: none;" id="dialog_thongbaovltl">
    <h2 style="">- Bệnh nhân này cần phối hợp điều trị Đông Y- PHCN.
      <br>
      - Bạn có muốn chỉ định VLTL cho bệnh nhân này không?
    </h2>
  </div>
</body>
<script type="text/javascript">
var report_code = ["ToDieuTri", "PhieuChiDinh"];
var report_name = ["Tờ điều trị", "Phiếu chỉ định"];
var DauVao = {
  'ID_LuotKham': <?=$_GET["idluotkham"]?>
}
var DieuKien = ['IsThanhToan', 'IsKhoaBHYT', 'IsKhoaBHCC', 'IsKhoaCap1']
$(document).ready(function() {
  openform_shortcutkey(); //mở bằng phím tắt được thiết lập trong DB
  window.rs_tdt = '';
  window.id_todieutri = '';
  window.idtodieutrichitiet = '';
  window.n_hoantat = 0;
  window.n_sua = 0;
  window.n_suathoigianhieuluc = 0;
  window.saochepdonthuoc = '';
  window.saochepvattutieuhao = '';
  checkbox_grid('gs_ChonIn', '#rowed3');
  //window.idphongban=<?=$_SESSION['user']['id_phongban']?>;
  window.idphongban = <?=$_GET['idkhoa']?>;
  create_combobox_new('#nguoihoantat', create_bs_chidinh, 'bw', '', 'data_bacsi_todieutri', 0);
  create_ylenh();
  getdieutri();
  $("#themylenh").addClass('ui-state-disabled');
  $("#todieutri_sua").addClass('ui-state-disabled');
  $("#todieutri_xoa").addClass('ui-state-disabled');
  $("#todieutri_hoantat").addClass('ui-state-disabled');
  $("#todieutri_in").addClass('ui-state-disabled');
  $("#todieutri_chidinh_cls").addClass('ui-state-disabled');
  $("#todieutri_chidinh_dtph").addClass('ui-state-disabled');
  $("#todieutri_indonthuocchove").addClass('ui-state-disabled');
  $("#menu").menu();
  $(document).bind("contextmenu", function(e) {
    var selr = jQuery('#rowed3').jqGrid('getGridParam', 'selrow');
    var rowData = $("#rowed3").getRowData(selr);
    return false;
  });
  $(document).bind("mouseup", function(e) {
    $("#menu").hide();
  });

  $("#thoigianhieuluc,#sua_ngayhieuluc").datetimeEntry({
    datetimeFormat: 'H:M D/O/y',
    spinnerImage: ''
  });
  $("#thoigianhieuluc,#sua_ngayhieuluc").dblclick(function(e) {
    var today = new Date();
    var hours = today.getHours();
    var minutes = today.getMinutes();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yy = today.getFullYear().toString().substr(2, 2);

    if (dd < 10) {
      dd = '0' + dd
    }

    if (mm < 10) {
      mm = '0' + mm
    }
    if (hours < 10) {
      hours = '0' + hours
    }
    if (minutes < 10) {
      minutes = '0' + minutes
    }

    today = dd + '/' + mm + '/' + yy;
    $(this).val(hours + ':' + minutes + ' ' + today);
  });
  <?php
		$data= new SQLServer;//tao lop ket noi SQL
        $params = array($_GET["idbenhannoitru"]);//tao param cho store 
        $store_name="{call GD2_ToDieuTriGetChanDoanByID_BenhAnNoiTru(?)}";//tao bien khai bao store
        $get=$data->query( $store_name,$params);//Goi store
        $excute= new SQLServerResult($get);//Ket noi lop xu ly SQL và truyen gia tri tra ve tu lop ket noi SQL
        $cdnoichuyenden= $excute->get_as_array();//Tra ve mang toan bo data lay duoc  
		echo "window.cd_noichuyenden='".$cdnoichuyenden[0]['CD_NoiChuyenDen']."';";
		
		
	?>
  //window.saochepdonthuoc='';
  //window.saochepvattutieuhao='';

  $("#copydonthuoc").click(function(e) {
    window.saochepdonthuoc = window.iddonthuoccopy;
    $("#span_ngaycopydonthuoc").html(window.ylenhngaycopy);
  });
  $("#copyvattutieuhao").click(function(e) {
    window.saochepvattutieuhao = window.iddonthuoccopy;
    $("#span_ngaycopyvattutieuhao").html(window.ylenhngaycopy);
  });

  //===============================
  var eventMethod = window.addEventListener ? "addEventListener" : "attachEvent";
  var eventer = window[eventMethod];
  var messageEvent = eventMethod == "attachEvent" ? "onmessage" : "message";
  eventer(messageEvent, function(e) {
    tam = e.data.split('|||');
    tam1 = e.data.split(';');
    if (tam1[0] == 'toolbs') {
      parent.postMessage('toolbs|||', '*');
    }
  })
  //===============================

  $("#dialog-suanoidung").dialog({
    resizable: false,
    autoOpen: false,
    width: 740,
    modal: true,
    buttons: {
      "Lưu": function() {
        $.post('resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_ylenh_update', {
          idtodieutrichitiet: window.idtodieutrichitiet,
          dienbien: $("#sua_dienbien").val(),
          chandoan: $("#sua_chandoan").val(),
          ylenhkhac: $("#sua_ylenhkhac").val(),
          ngaygiohieuluc: $("#sua_ngayhieuluc").val(),
        }).done(function(data) {
          $("#dialog-suanoidung").dialog("close");
          taidulieu(window.id_todieutri);
        });

      },
      "Thoát": function() {
        $(this).dialog("close");
      }
    }
  });


  $("#todieutri_chuyenbschinh").click(function(e) {
    $.ajax({
      type: 'POST',
      async: false,
      url: 'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=todieutri_bschinh&oper=kiemtra&id_todieutrichitiet=' +
        window.idtodieutrichitiet,
      //data: {},
      success: function(data, status, xhr) {
        data = $.parseJSON(data);
        if (data.ThongBao != '') {
          alert(data.ThongBao);
        } else {
          var re_confirm_bschinh = confirm("Bạn chắc chắn muốn chuyển bác sỹ " + data.NickName +
            " thành bác sỹ điều trị chính trong ngày " + data.NgayGioHieuLuc + "?");
          if (re_confirm_bschinh === true) {
            $.ajax({
              type: 'POST',
              async: false,
              url: 'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=todieutri_bschinh&oper=update&id_todieutrichitiet=' +
                window.idtodieutrichitiet,
              //data: {},
              success: function(data, status, xhr) {
                tooltip_message("Đã lưu");
                taidulieu(window.id_todieutri);
              }
            });
          }
        }
      }
    }); //end ajax
  });
  $("#dialog_thongbaovltl").dialog({
    resizable: false,
    autoOpen: false,
    height: 240,
    width: 520,
    modal: true,
    dialogClass: 'no_close',
    closeOnEscape: false,
    open: function(event, ui) {
      $(".no_close .ui-dialog-titlebar-close").addClass('no_close');
    },
    title: "Thông báo",
    buttons: {
      "Có, mở form": function() {
        // alert(window.id_todieutri);

        $.ajax({
          type: 'POST',
          async: false,
          dataType: 'json',
          url: 'resource.php?module=<?=$modules?>&view=<?=$view?>&action=controller_thongbaovltl&oper=insert_thongbaovltl',
          data: {
            id_benhannoitru: '<?=$_GET["idbenhannoitru"]?>',
            id_bstuvan: $("#nguoihoantat_hidden").val(),
            cotuvan: 1,
          },
          success: function(data) {

          }
        });
        $("#dialog_thongbaovltl").dialog("close");
        parent.postMessage('moylenh|||' + window.rs_tdt[window.rs_tdt.length - 1], '*');
        // window.parent.moylenh(window.id_todieutri);

      },
      "Không": function() {
        $.ajax({
          type: 'POST',
          async: false,
          dataType: 'json',
          url: 'resource.php?module=<?=$modules?>&view=<?=$view?>&action=controller_thongbaovltl&oper=insert_thongbaovltl',
          data: {
            id_benhannoitru: '<?=$_GET["idbenhannoitru"]?>',
            id_bstuvan: $("#nguoihoantat_hidden").val(),
            cotuvan: 0,
          },
          success: function(data) {

          }
        });
        $("#dialog_thongbaovltl").dialog("close");
      }
    }
  });

  $("#dandonthuoc").click(function(e) {
    $.post(
      'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=check_dathanhtoan&id_luotkham=<?=$_GET['idluotkham']?>&getkhoa=1'
    ).done(function(data) {
      data = data.split('|||');
      //alert(data[1]);
      if (data[0] == "true") {
        if (window.idphongban == data[1]) {
          $.post(
            'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_dandonthuoc&nhomphanloaithuoc=1&iddonthuoc=' +
            window.saochepdonthuoc + '&idtodieutri=' + window.id_todieutri + '&idtodieutrichitiet=' +
            window.idtodieutrichitiet +
            '&idluotkham=<?=$_GET['idluotkham']?>&idbenhnhan=<?=$_GET['idbenhnhan']?>&idkhoa=<?=$_GET['idkhoa']?>'
          ).done(function(data) {
            window.n_sua = 1;
            taidulieu(window.id_todieutri);
          });
        } else {
          //tooltip_message("Bệnh nhân này hiện đang nằm khoa khác");
          $("#dialog-namkhoakhac").dialog('open');
        }
      } else {
        //tooltip_message("Lượt khám này đã thanh toán");
        $("#dialog-luotkhamdathanhtoan").dialog('open');
      }
    });
  });
  $("#danvattutieuhao").click(function(e) {
    $.post(
      'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=check_dathanhtoan&id_luotkham=<?=$_GET['idluotkham']?>&getkhoa=1'
    ).done(function(data) {
      data = data.split('|||');
      //alert(data[1]);
      if (data[0] == "true") {
        if (window.idphongban == data[1]) {
          $.post(
            'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_dandonthuoc&nhomphanloaithuoc=2&iddonthuoc=' +
            window.saochepvattutieuhao + '&idtodieutri=' + window.id_todieutri + '&idtodieutrichitiet=' +
            window.idtodieutrichitiet +
            '&idluotkham=<?=$_GET['idluotkham']?>&idbenhnhan=<?=$_GET['idbenhnhan']?>&idkhoa=<?=$_GET['idkhoa']?>'
          ).done(function(data) {
            window.n_sua = 1;
            taidulieu(window.id_todieutri);
          });
        } else {
          //tooltip_message("Bệnh nhân này hiện đang nằm khoa khác");
          $("#dialog-namkhoakhac").dialog('open');
        }
      } else {
        //tooltip_message("Lượt khám này đã thanh toán");
        $("#dialog-luotkhamdathanhtoan").dialog('open');
      }
    });

  });

  $("#copydonthuocsangylenhmoi").click(function(e) {
    $("#dialog_ngaydandonthuoc").html(window.ylenhngaycopy);
    $.post(
      'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=check_dathanhtoan&id_luotkham=<?=$_GET['idluotkham']?>&getkhoa=1'
    ).done(function(data) {
      data = data.split('|||');
      //alert(data[1]);
      if (data[0] == "true") {
        if (window.idphongban == data[1]) {
          $("#dialog-coppydonthuoc").dialog('open');
        } else {
          //tooltip_message("Bệnh nhân này hiện đang nằm khoa khác");
          $("#dialog-namkhoakhac").dialog('open');
        }
      } else {
        //tooltip_message("Lượt khám này đã thanh toán");
        $("#dialog-luotkhamdathanhtoan").dialog('open');
      }
    });

  });
  $("#copydtphsangylenhmoi").click(function(e) {
    $("#dialog_showdanvltl").html(window.ylenhngaycopy);
    $.post(
      'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=check_dathanhtoan&id_luotkham=<?=$_GET['idluotkham']?>&getkhoa=1'
    ).done(function(data) {
      data = data.split('|||');
      //alert(data[1]);
      if (data[0] == "true") {
        if (window.idphongban == data[1]) {
          $("#dialog-coppyvltl").dialog('open');
        } else {
          //tooltip_message("Bệnh nhân này hiện đang nằm khoa khác");
          $("#dialog-namkhoakhac").dialog('open');
        }
      } else {
        //tooltip_message("Lượt khám này đã thanh toán");
        $("#dialog-luotkhamdathanhtoan").dialog('open');
      }
    });
  });

  $("#copyvattutieuhaosangylenhmoi").click(function(e) {
    $("#dialog_ngaydanvattutieuhao").html(window.ylenhngaycopy);
    $.post(
      'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=check_dathanhtoan&id_luotkham=<?=$_GET['idluotkham']?>&getkhoa=1'
    ).done(function(data) {
      data = data.split('|||');
      //alert(data[1]);
      if (data[0] == "true") {
        if (window.idphongban == data[1]) {
          $("#dialog-coppyvattutieuhao").dialog('open');
        } else {
          //tooltip_message("Bệnh nhân này hiện đang nằm khoa khác");
          $("#dialog-namkhoakhac").dialog('open');
        }
      } else {
        //tooltip_message("Lượt khám này đã thanh toán");
        $("#dialog-luotkhamdathanhtoan").dialog('open');
      }
    });
  });

  $(document).keyup(function(e) {
    if (jwerty.is("ctrl+shift+z", e)) {
      if (window.idtodieutrichitiet > 0) {
        $.post(
          'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=ylenh_getthongtintodieutrichitiet&id=' +
          window.idtodieutrichitiet).done(function(data) {
          alert(data);
        });
        return false;
      }
    }
  });
  $("#dialog-edittime").dialog({
    resizable: false,
    autoOpen: false,
    height: 140,
    modal: true,
    buttons: {
      "Lưu": function() {
        if ($("#thoigianhieuluc").val() != '') {
          $(this).dialog("close");
          $.post(
            'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=todieutri_suagiohieuluc&hienmaloi=a&id_todieutrichitiet=' +
            window.idtodieutrichitiet + '&ngaygio=' + $("#thoigianhieuluc").val()).done(function(data) {
            window.n_suathoigianhieuluc = 1;
            taidulieu(window.id_todieutri);
            tooltip_message("Đã lưu");
          });
        } else {
          tooltip_message("Vui lòng nhập thời gian hiệu lực");
        }
      },
      "Thoát": function() {
        $(this).dialog("close");
      }
    }
  });
  $("#dialog-namkhoakhac").dialog({
    resizable: false,
    autoOpen: false,
    height: 150,
    width: 350,
    modal: true,
    buttons: {
      "OK": function() {
        $(this).dialog("close");
      }
    }
  });
  $("#dialog-luotkhamdathanhtoan").dialog({
    resizable: false,
    autoOpen: false,
    height: 150,
    width: 350,
    modal: true,
    buttons: {
      "OK": function() {
        $(this).dialog("close");
      }
    }
  });

  $("#dialog-themtrang").dialog({
    resizable: false,
    autoOpen: false,
    height: 180,
    width: 350,
    modal: true,
    buttons: {
      "YES": function() {
        $(this).dialog("close");
        $.post(
          'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=todieutri_themtrang&idbenhannoitru=<?=$_GET['idbenhannoitru']?>&chandoan=' +
          window.cd_noichuyenden).done(function(data) {
          tooltip_message("Đã lưu");
          getdieutri();
        });
      },
      "NO": function() {
        $(this).dialog("close");
      }
    },
    open: function() {
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').focus();
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').addClass('n_btn1');
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(1)').addClass('n_btn2');
      //var hasFocus = $('.n_btn1').is(':focus');
      $('.ui-dialog').keyup(function(e) {
        if (e.keyCode === 37) {
          $('.n_btn1').focus();
          $('.n_btn2').focusout();
        }
        if (e.keyCode === 39) {
          $('.n_btn2').focus();
          $('.n_btn1').focusout();
        }
      })
    }
  });

  $("#dialog-coppydonthuoc").dialog({
    resizable: false,
    autoOpen: false,
    height: 200,
    width: 320,
    modal: true,
    buttons: {
      "YES": function() {
        $(this).dialog("close");
        $.post(
          'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_dandonthuoc&nhomphanloaithuoc=1&iddonthuoc=' +
          window.iddonthuoccopy + '&idtodieutri=' + window.rs_tdt[window.rs_tdt.length - 1] +
          '&idtodieutrichitiet=0&idluotkham=<?=$_GET['idluotkham']?>&idbenhnhan=<?=$_GET['idbenhnhan']?>&idkhoa=<?=$_GET['idkhoa']?>'
        ).done(function(data) {
          window.n_themmoi = 1;
          getdieutri();
        });
      },
      "NO": function() {
        $(this).dialog("close");
      }
    },
    open: function() {
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').focus();
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').addClass('n_btn1');
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(1)').addClass('n_btn2');
      //var hasFocus = $('.n_btn1').is(':focus');
      $('.ui-dialog').keyup(function(e) {
        if (e.keyCode === 37) {
          $('.n_btn1').focus();
          $('.n_btn2').focusout();
        }
        if (e.keyCode === 39) {
          $('.n_btn2').focus();
          $('.n_btn1').focusout();
        }
      })
    }
  });

  $("#dialog-coppyvltl").dialog({
    adfas
    resizable: false,
    autoOpen: false,
    height: 200,
    width: 320,
    modal: true,
    buttons: {
      "YES": function() {
        $(this).dialog("close");
        $.post(
          'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_danvltl&idtodieutrichitiet=' +
          window.idtodieutrichitiet + '&idtodieutri=' + window.rs_tdt[window.rs_tdt.length - 1] +
          '&idluotkham=<?=$_GET['idluotkham']?>&idbenhnhan=<?=$_GET['idbenhnhan']?>&idkhoa=<?=$_GET['idkhoa']?>'
        ).done(function(data) {
          window.n_themmoi = 1;
          getdieutri();
        });
      },
      "NO": function() {
        $(this).dialog("close");
      }
    },
    open: function() {
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').focus();
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').addClass('n_btn1');
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(1)').addClass('n_btn2');
      //var hasFocus = $('.n_btn1').is(':focus');
      $('.ui-dialog').keyup(function(e) {
        if (e.keyCode === 37) {
          $('.n_btn1').focus();
          $('.n_btn2').focusout();
        }
        if (e.keyCode === 39) {
          $('.n_btn2').focus();
          $('.n_btn1').focusout();
        }
      })
    }
  });


  $("#dialog-coppyvattutieuhao").dialog({
    resizable: false,
    autoOpen: false,
    height: 200,
    width: 320,
    modal: true,
    buttons: {
      "YES": function() {
        $(this).dialog("close");
        $.post(
          'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_dandonthuoc&nhomphanloaithuoc=2&iddonthuoc=' +
          window.iddonthuoccopy + '&idtodieutri=' + window.rs_tdt[window.rs_tdt.length - 1] +
          '&idtodieutrichitiet=0&idluotkham=<?=$_GET['idluotkham']?>&idbenhnhan=<?=$_GET['idbenhnhan']?>&idkhoa=<?=$_GET['idkhoa']?>'
        ).done(function(data) {
          window.n_themmoi = 1;
          getdieutri();
        });
      },
      "NO": function() {
        $(this).dialog("close");
      }
    },
    open: function() {
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').focus();
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').addClass('n_btn1');
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(1)').addClass('n_btn2');
      //var hasFocus = $('.n_btn1').is(':focus');
      $('.ui-dialog').keyup(function(e) {
        if (e.keyCode === 37) {
          $('.n_btn1').focus();
          $('.n_btn2').focusout();
        }
        if (e.keyCode === 39) {
          $('.n_btn2').focus();
          $('.n_btn1').focusout();
        }
      })
    }
  });

  $("#dialog-donchove").dialog({
    resizable: false,
    autoOpen: false,
    height: 180,
    width: 350,
    modal: true,
    buttons: {
      "YES": function() {
        $(this).dialog("close");
        parent.postMessage('mobenhan|||', '*');
      },
      "NO": function() {
        $(this).dialog("close");
      }
    },
    open: function() {
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').focus();
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').addClass('n_btn1');
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(1)').addClass('n_btn2');
      //var hasFocus = $('.n_btn1').is(':focus');
      $('.ui-dialog').keyup(function(e) {
        if (e.keyCode === 37) {
          $('.n_btn1').focus();
          $('.n_btn2').focusout();
        }
        if (e.keyCode === 39) {
          $('.n_btn2').focus();
          $('.n_btn1').focusout();
        }
      })
    }
  });

  $("#chandoan").val(window.cd_noichuyenden);
  $("#dialog_xoaylenh").dialog({
    resizable: false,
    autoOpen: false,
    height: 140,
    modal: true,
    buttons: {
      "OK": function() {
        $(this).dialog("close");
        $.post(
          'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_todieutrichitiet_del&idtodieutrichitiet=' +
          window.idtodieutrichitiet).done(function(data) {
          if ($.trim(data) == '') {
            tooltip_message("Đã xóa");
            taidulieu(window.id_todieutri);
          } else {
            tooltip_message("Không thành công");
          }
        });
      },
      'Cancel': function() {
        $(this).dialog("close");
      }
    },
    open: function() {
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').focus();
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').addClass('n_btn1');
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(1)').addClass('n_btn2');
      //var hasFocus = $('.n_btn1').is(':focus');
      $('.ui-dialog').keyup(function(e) {
        if (e.keyCode === 37) {
          $('.n_btn1').focus();
          $('.n_btn2').focusout();
        }
        if (e.keyCode === 39) {
          $('.n_btn2').focus();
          $('.n_btn1').focusout();
        }
      })
    }
  });

  $("#dialog_hoantat").dialog({
    resizable: false,
    autoOpen: false,
    height: 140,
    modal: true,
    buttons: {
      "OK": function() {
        if ($("#nguoihoantat").val() == 'false') {
          alert("Vui lòng chọn bác sĩ");
        } else {
          $(this).dialog("close");
          $.post(
            'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_todieutri_hoantat&oper=hoantat&idluotkham=<?=$_GET['idluotkham']?>&id_todieutri=' +
            window.id_todieutri + '&idtodieutrichitiet=' + window.idtodieutrichitiet + '&nguoichidinh=' + $(
              "#nguoihoantat_hidden").val()).done(function(data) {
            data = $.parseJSON(data);
            if (data.IsLock == 0) {
              tooltip_message("Đã hoàn tất");
              taidulieu(window.id_todieutri);

              //CHECK HIỂN THỊ THÔNG BÁO KẾT HỢP ĐIỀU TRỊ VẬT LÝ TRỊ LIỆU
              $.ajax({
                type: 'POST',
                async: false,
                dataType: 'json',
                url: 'resource.php?module=<?=$modules?>&view=<?=$view?>&action=controller_thongbaovltl&oper=check_thongbaovltl',
                data: {
                  id_benhannoitru: '<?=$_GET["idbenhannoitru"]?>'
                },
                success: function(data) {
                  if (data == 1) {
                    $("#dialog_thongbaovltl").dialog('open');
                  }
                }
              });
              //



            } else {
              alert(data.Notes);
              //tooltip_message("Không thành công");
            }
          });
        }
      },
      'Cancel': function() {
        $(this).dialog("close");
      }
    },
    open: function() {
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').focus();
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(0)').addClass('n_btn1');
      $(this).closest('.ui-dialog').find('.ui-dialog-buttonpane button:eq(1)').addClass('n_btn2');
      //var hasFocus = $('.n_btn1').is(':focus');
      $('.ui-dialog').keyup(function(e) {
        if (e.keyCode === 37) {
          $('.n_btn1').focus();
          $('.n_btn2').focusout();
        }
        if (e.keyCode === 39) {
          $('.n_btn2').focus();
          $('.n_btn1').focusout();
        }
      })
    }
  });

  $("#dialog_themtrang_error").dialog({
    resizable: false,
    autoOpen: false,
    height: 140,
    modal: true,
    buttons: {
      "OK": function() {
        $(this).dialog("close");
      }
    }
  });
  $("#rowed3").setGridWidth($('.body').width() - 11);
  $("#rowed3").setGridHeight($('.body').height() - 150);
  $(window).resize(function() {
    $("#rowed3").setGridWidth($('.body').width() - 11);
    $("#rowed3").setGridHeight($('.body').height() - 150);
  });
  $("#input_navigator").keyup(function(e) {
    if (window.rs_tdt.length > 0) {
      if ($("#input_navigator").val() < 1 && $("#input_navigator").val() != '') {
        $("#input_navigator").val(1);
      } else if ($("#input_navigator").val() > window.rs_tdt.length && $("#input_navigator").val() != '') {
        $("#input_navigator").val(window.rs_tdt.length);
      }
      taidulieu(window.rs_tdt[$("#input_navigator").val() - 1]);
    } else {
      $("#input_navigator").val(0);
    }
  });
  $("#todieutri_themtrang").click(function(e) {
    $.post(
      'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=check_dathanhtoan&id_luotkham=<?=$_GET['idluotkham']?>'
    ).done(function(data) {
      //alert(data);
      if (data == "true") {
        var checkpageisnull = jQuery("#rowed3").jqGrid('getGridParam', 'records');
        if (checkpageisnull > 0 || $("#input_navigator").val() == 0) {
          if (window.rs_tdt.length > 0) {
            $("#thongbaothemtrang").html(
              'Thêm trang mới các trang trước sẽ bị khóa. Bạn có muốn thêm mới không?');
          } else {
            $("#thongbaothemtrang").html('Bạn có chắc chắn muốn thêm trang mới không?');
          }
          $("#dialog-themtrang").dialog('open');
        } else {
          $("#dialog_themtrang_error").dialog('open');
        }
      } else {
        //tooltip_message("Lượt khám này đã thanh toán");
        $("#dialog-luotkhamdathanhtoan").dialog('open');
      }
    });
  });
  $("#chuyenylenh").click(function(e) {
    if ($("#input_navigator").val() == window.rs_tdt.length) {
      $.post(
        'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=todieutri_themtrang&idbenhannoitru=<?=$_GET['idbenhannoitru']?>&chandoan=' +
        window.cd_noichuyenden).done(function(data) {
        getdieutri();
        setTimeout(function() {
          //alert(window.rs_tdt.length);
          $.post(
            'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_todieutri_chuyentrang&idtodieutrichitiet=' +
            window.idtodieutrichitiet + '&tutrang=' + window.rs_tdt[window.rs_tdt.length - 2] +
            '&dentrang=' + window.rs_tdt[window.rs_tdt.length - 1]).done(function(data) {
            if ($.trim(data) == '') {
              tooltip_message("Chuyển thành công");
              taidulieu(window.rs_tdt[window.rs_tdt.length - 1]);
            } else {
              tooltip_message("Chuyển không thành công");
            }
          });
        }, 500);
      });
    } else {
      /*	$.post('resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_todieutri_chuyentrang&idtodieutrichitiet='+ window.idtodieutrichitiet+'&toitrang='+window.rs_tdt[$("#input_navigator").val()]).done(function(data)
        {
            if ($.trim(data) == '') {
				tooltip_message("Chuyển thành công");
				taidulieu(window.rs_tdt[$("#input_navigator").val()]);
			}else{
				tooltip_message("Chuyển không thành công");
				}
		});*/
    }
  });
  //Mr.Thành thêm button medical nội trú
  $("#todieutri_medicalnt").click(function() {
    parent.medical_nt(id_benhnhan = <?= $_GET["idbenhnhan"]?>);
    //alert(id_benhnhan=<?= $_GET["idbenhnhan"]?>);
  });
  $("#todieutri_phieucongkhaithuoc").click(function() {
    //192.168.1.105:81/giaidoan2/resource.php?module=lamsang&view=benhan_noitru&id_form=2564&idluotkham=910814&idbenhnhan=181448&idkham=&mabenhan=&tenbenhan=&id_benhannoitru=43984&idloaibenhan=1&tenbenhnhan=Ater%20Test&ngaytaobenhan=31/07/17&idkhoa=306
    $.cookie("in_status", "print_preview");
    // window.open("resource.php?module=report&view=<?=$modules?>&xemtruocin=1&action=voucher_nhaxe_reprint&header=top&sokiemsoat="+sokiemsoat11+"&type=report&id_form=10&report_name=InPhieuGiuXe",'denghithanhtoan');
    //phieucongkhaithuoc
    window.open(
      "resource.php?module=report&view=<?=$modules?>&action=PhieuCongKhaiDichVu&header=top&idbenhnhan=" +
      <?= $_GET["idbenhnhan"]?> + "&idluotkham=" + <?=$_GET['idluotkham']?> + "&id_benhannoitru=" +
      <?=$_GET['idbenhannoitru']?> + "&type=report&id_form=10&report_name=PhieuCongKhaiThuoc");
  });
  //

  $("#todieutri_taodonthuocchove").click(function(e) {
    $("#dialog-donchove").dialog('open');
  });
  $("#todieutri_tooldot2").click(function(e) {
   alert();
  });

  $("#todieutri_themtrang,#todieutri_taodonthuocchove,#todieutri_tooldot2,#todieutri_medicalnt,#todieutri_phieucongkhaithuoc,#edit_ngaygiohieuluc_khth")
    .button({
      text: true
    });
  //$( "#themylenh,#todieutri_sua,#todieutri_xoa,#todieutri_hoantat" ).button('disable');
  edit_ngaygiohieuluc();
  phanquyen();
  $("#first").button({
      text: false,
      icons: {
        primary: "ui-icon-seek-first"
      }
    })
    .click(function() {
      kiemtrakhoa_hsbanoi(1, "<?=$_GET['idbenhannoitru']?>");
      if (window._khoahsba == 1 || window._khoahsba == 2 || window._khoahsba == 3) {
        return false;
      }
      navigator_load("first", "first");
    });
  $("#last").button({
      text: false,
      icons: {
        primary: "ui-icon-seek-end"
      }
    })
    .click(function() {
      kiemtrakhoa_hsbanoi(1, "<?=$_GET['idbenhannoitru']?>");
      if (window._khoahsba == 1 || window._khoahsba == 2 || window._khoahsba == 3) {
        return false;
      }
      navigator_load("end", "first");
    });
  $("#next").button({
      text: false,
      icons: {
        primary: "ui-icon-seek-next"
      }
    })
    .click(function() {
      kiemtrakhoa_hsbanoi(1, "<?=$_GET['idbenhannoitru']?>");
      if (window._khoahsba == 1 || window._khoahsba == 2 || window._khoahsba == 3) {
        return false;
      }
      navigator_load(1, "first");
    });
  $("#prev").button({
      text: false,
      icons: {
        primary: "ui-icon-seek-prev"
      }
    })
    .click(function() {
      kiemtrakhoa_hsbanoi(1, "<?=$_GET['idbenhannoitru']?>");
      if (window._khoahsba == 1 || window._khoahsba == 2 || window._khoahsba == 3) {
        return false;
      }
      navigator_load(-1, "first");
    });

}) //end ready

function create_ylenh() {
  mydata = [];
  $("#rowed3").jqGrid({
    data: mydata,
    datatype: "local",
    colNames: ["Ngày giờ", "Ngày giờ hiệu lực", "Chẩn đoán", "Diễn biến bệnh", "Y lệnh", "Vật tư tiêu hao",
      "Ngày chỉ định", "Thư ký", "Ngày hoàn tất", "Bác sỹ", "", "", "cls", "xn", "dtph", 'Cho phép TH',
      'donthuocchove', 'ID_BacSy', 'DemThuocThongThuong', 'DemVatTuTieuHao', 'DemVLTL', 'Chọn in', 'DaChotCongCS'
    ],
    colModel: [{
        name: 'Ngaygio',
        index: 'Ngaygio',
        search: false,
        width: "10%",
        align: 'center',
        hidden: false,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'NgayGioHieuLuc',
        index: 'NgayGioHieuLuc',
        search: false,
        width: "10%",
        align: 'center',
        hidden: false,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'chandoan',
        index: 'chandoan',
        search: false,
        width: "15%",
        align: 'left',
        editable: false,
        classes: 'ylenh chandoan'
      },
      {
        name: 'dienbien',
        index: 'dienbien',
        search: false,
        width: "25%",
        align: 'left',
        editable: false,
        classes: 'ylenh dienbien'
      },
      {
        name: 'ylenh',
        index: 'ylenh',
        search: false,
        width: "45%",
        align: 'left',
        hidden: false,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'vattutieuhao',
        index: 'vattutieuhao',
        search: false,
        width: "20%",
        align: 'left',
        hidden: false,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'ngaychidinh',
        index: 'ngaychidinh',
        search: false,
        width: "8%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'thuky',
        index: 'thuky',
        search: false,
        width: "7%",
        align: 'center',
        hidden: false,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'ngayhoantat',
        index: 'ngayhoantat',
        search: false,
        width: "9%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'bacsy',
        index: 'bacsy',
        search: false,
        width: "7%",
        align: 'center',
        hidden: false,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'iddonthuoc',
        index: 'iddonthuoc',
        search: false,
        width: "8%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'iddonthuoctralai',
        index: 'iddonthuoctralai',
        search: false,
        width: "8%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'canlamsang',
        index: 'canlamsang',
        search: false,
        width: "8%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'xetnghiem',
        index: 'xetnghiem',
        search: false,
        width: "8%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'dieutriphoihop',
        index: 'dieutriphoihop',
        search: false,
        width: "8%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'chophepthuchien',
        index: 'chophepthuchien',
        search: false,
        width: "8%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'donthuocchove',
        index: 'donthuocchove',
        search: false,
        width: "8%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'ID_BacSy',
        index: 'ID_BacSy',
        search: false,
        width: "8%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'DemThuocThongThuong',
        index: 'DemThuocThongThuong',
        search: false,
        width: "8%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'DemVatTuTieuHao',
        index: 'DemVatTuTieuHao',
        search: false,
        width: "8%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'DemVLTL',
        index: 'DemVLTL',
        search: false,
        width: "8%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
      {
        name: 'ChonIn',
        index: 'ChonIn',
        width: "7%",
        editable: true,
        stype: 'text',
        search: true,
        searchoptions: {
          sopt: ['eq', 'ne'],
          value: ':;1:Có;0:Không'
        },
        editable: true,
        align: 'center',
        hidden: false,
        edittype: "checkbox",
        formatter: "checkbox",
        formatoptions: {
          disabled: false
        },
        formoptions: {
          rowpos: 13,
          colpos: 1
        },
        editoptions: {
          value: "1:0",
          dataEvents: [{
            type: 'click',
            fn: function(e) {
              //alert($("#"+$(e.target).attr('id')).is(':checked'));

              if ($("#" + $(e.target).attr('id')).is(':checked')) {
                var tthai = 1;
              } else {
                var tthai = 0;
              }
              var row = $(e.target).closest('tr.jqgrow');
              var tam = row.attr('id');
              rowId = $('#rowed3').getCell(tam, 'id');
              /*                window.selectedVal = "";
              				window.selected = $("input[type='radio'][name='action']:checked");
              				if (selected.length > 0) {
              					window.selectedVal = selected.val();
              				}*/

            }
          }]
        }
      },
      {
        name: 'DaChotCongCS',
        index: 'DaChotCongCS',
        search: false,
        width: "9%",
        align: 'center',
        hidden: true,
        editable: false,
        classes: 'ylenh'
      },
    ],
    loadonce: true,
    scroll: false,
    modal: true,
    shrinkToFit: true,
    rowNum: 10000000,
    height: 100,
    width: 100,
    viewrecords: false,
    ignoreCase: true,
    pager: '#prowed3',
    pgbuttons: false,
    pgtext: null,
    //cellEdit: true,
    //cellsubmit: 'remote',
    //cellurl : 'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_ngaythuoc',
    onCellSelect: function(rowid, iCol, cellcontent, e) {
      $("#rowed3").find("tr").each(function(index, element) { //
        $(element).removeClass('ui-state-highlight');
      });
      window.idtodieutrichitiet = rowid;
      // alert(window.idtodieutrichitiet)
      var rowData = jQuery('#rowed3').jqGrid('getRowData', rowid);
      window.donthuoc = rowData['iddonthuoc'];
      window.donthuoctralai = rowData['iddonthuoctralai'];
      console.log(window.donthuoc + '_' + window.donthuoctralai);
      if (rowData['ID_BacSy'] != '') {
        setval_new('#nguoihoantat', rowData['ID_BacSy']);
      } else {
        setval_new('#nguoihoantat', <?=$_SESSION['user']['id_user']?>);
      }
      if (rowData['bacsy'] != '') {
        //$("#themylenh").addClass('ui-state-disabled');
        $("#todieutri_sua").removeClass('ui-state-disabled');
        $("#todieutri_xoa").addClass('ui-state-disabled');
        $("#todieutri_hoantat").addClass('ui-state-disabled');
        //alert(rowData['xetnghiem'])
        if (rowData['canlamsang'] == 1 || rowData['xetnghiem'] == 1) {
          $("#todieutri_chidinh_cls").removeClass('ui-state-disabled');
        } else {
          $("#todieutri_chidinh_cls").addClass('ui-state-disabled');
        }
        if (rowData['dieutriphoihop'] == 1) {
          $("#todieutri_chidinh_dtph").removeClass('ui-state-disabled');
        } else {
          $("#todieutri_chidinh_dtph").addClass('ui-state-disabled');
        }
        if (rowData['donthuocchove'] == 1) {
          $("#todieutri_indonthuocchove").removeClass('ui-state-disabled');
        } else {
          $("#todieutri_indonthuocchove").addClass('ui-state-disabled');
        }
      } else {
        //$("#themylenh").removeClass('ui-state-disabled');

        $("#todieutri_sua").removeClass('ui-state-disabled');
        $("#todieutri_hoantat").removeClass('ui-state-disabled');
        $("#todieutri_indonthuocchove").addClass('ui-state-disabled');
        if (rowData['chophepthuchien'] == 1) {
          $("#todieutri_chidinh_cls").removeClass('ui-state-disabled');
          $("#todieutri_chidinh_dtph").removeClass('ui-state-disabled');
          $("#todieutri_xoa").addClass('ui-state-disabled');
          if (rowData['donthuocchove'] == 1) {
            $("#todieutri_indonthuocchove").removeClass('ui-state-disabled');
          } else {
            $("#todieutri_indonthuocchove").addClass('ui-state-disabled');
          }
        } else {
          $("#todieutri_chidinh_cls").addClass('ui-state-disabled');
          $("#todieutri_chidinh_dtph").addClass('ui-state-disabled');
          $("#todieutri_xoa").removeClass('ui-state-disabled');
        }
      }
      if (iCol == 1) {
        //alert('222');
      }
      $('#rowed3 tr td[aria-describedby="rowed3_ChonIn"] input[type="checkbox"]').removeAttr("disabled");
    },
    /*serializeCellData: function (postdata) {
				postdata.ID_LuotKham=$("#rowed3").getRowData( rowed3_select)['ID_LuotKham'];
				postdata.id_donthuoc=$("#rowed3").getRowData( rowed3_select)['ID_DonThuoc'];
				postdata.id_benhnhan=window.id_benhnhan;
                return postdata;
		},*/
    onSelectRow: function(id) {

    },
    onRightClickRow: function(rowid, iRow, iCol, e) {
      emr_checkLock(<?=$_GET['idluotkham']?>, 0, 0, 0, <?=$_SESSION['user']['id_user']?>,
        8); //Check khoa dùng hàm chung
      if (window.emrIsLock == 1) {
        return false;
      }
      $("#rowed3").find("tr").each(function(index, element) { //
        $(element).removeClass('ui-state-highlight');
      });
      var rowData = jQuery('#rowed3').jqGrid('getRowData', rowid);
      //alert(rowData['DemVLTL']);
      window.idtodieutrichitiet = rowid;
      window.iddonthuoccopy = rowData['iddonthuoc'];
      window.ylenhngaycopy = rowData['Ngaygio'];
      if (rowData['DemThuocThongThuong'] > 0) {
        $(".copydonthuoc").show();
        $(".copydonthuocsangylenhmoi").show();
      } else {
        $(".copydonthuoc").hide();
        $(".copydonthuocsangylenhmoi").hide();
      }
      if (rowData['DemVatTuTieuHao'] > 0) {
        $(".copyvattutieuhao").show();
        $(".copyvattutieuhaosangylenhmoi").show();
      } else {
        $(".copyvattutieuhao").hide();
        $(".copyvattutieuhaosangylenhmoi").hide();
      }
      if (rowData['DemVLTL'] > 0) {
        $(".copydtphsangylenhmoi").show();
        //alert(222);
      } else {
        $(".copydtphsangylenhmoi").hide();
      }
      if (window.rs_tdt.length == $("#input_navigator").val()) {
        $(".chuyenylenh").show();
      } else {
        $(".chuyenylenh").hide();
      }

      if (window.saochepdonthuoc != '') {
        $(".dandonthuoc").show();
        window.n_donthuoc_ = 1;
      } else {
        $(".dandonthuoc").hide();
        window.n_donthuoc_ = 0;
      }
      if (window.saochepvattutieuhao != '') {
        $(".danvattutieuhao").show();
        window.n_vtth_ = 1;
      } else {
        $(".danvattutieuhao").hide();
        window.n_vtth_ = 0;
      }
      var rowData = jQuery('#rowed3').jqGrid('getRowData', rowid);
      if (rowData['bacsy'] != '') {
        $(".dandonthuoc").hide();
        $(".danvattutieuhao").hide();
      } else {
        if (window.n_donthuoc_ == 1) {
          $(".dandonthuoc").show();
        } else {
          $(".dandonthuoc").hide();
        }
        if (window.n_vtth_ == 1) {
          $(".danvattutieuhao").show();
        } else {
          $(".danvattutieuhao").hide();
        }

      }
      if ($("#menu").width() + e.pageX > $(document).width()) {
        $("#menu").css('left', e.pageX - $("#menu").width() + "px");
      } else {
        $("#menu").css('left', e.pageX + "px");
      }
      if ($("#menu").height() + e.pageY + 30 > $(document).height()) {
        $("#menu").css('top', e.pageY - $("#menu").height() + "px");
      } else {
        $("#menu").css('top', e.pageY + "px");
      }
      $("#menu").show(300);
      $(document).bind("contextmenu", function(e) {
        return false;
      });
    },
    ondblClickRow: function(rowid, iRow, iCol, e) {
      var rowData = $("#rowed3").getRowData(rowid);
      if (iCol == 1) {
        emr_checkLock(<?=$_GET['idluotkham']?>, 0, 0, 0, <?=$_SESSION['user']['id_user']?>,
          8); //Check khoa dùng hàm chung
        if (window.emrIsLock == 1) {
          return false;
        }
        if (rowData['ID_BacSy'] == '') {
          if (rowData['NgayGioHieuLuc'] != '') {
            $("#thoigianhieuluc").val(rowData['NgayGioHieuLuc']);
          } else {
            $("#thoigianhieuluc").val('');
          }
          $("#dialog-edittime").dialog('open');
        } else {
          tooltip_message("Y lệnh này đã hoàn tất");
        }
      }
    },
    loadComplete: function(data) {
      grid_filter_enter("#rowed3");
      if (window.n_sua == 1) {
        $("#rowed3").jqGrid('setSelection', window.idtodieutrichitiet, true);
        window.n_sua = 0;
      } else if (window.n_hoantat == 1) {
        $("#rowed3").jqGrid('setSelection', window.idtodieutrichitiet, true);
        window.n_hoantat = 0;
      } else if (window.n_themmoi == 1) {
        var tmp = $("#rowed3").jqGrid('getDataIDs');
        $("#rowed3").jqGrid('setSelection', tmp[tmp.length - 1], true);
        window.n_themmoi = 0;
      } else if (window.n_suathoigianhieuluc == 1) {
        $("#rowed3").jqGrid('setSelection', window.idtodieutrichitiet, true);
        window.n_suathoigianhieuluc = 0;
      }

      $("tr.ui-state-hover td.yelenh a.xong").css('color', '#363636');
      $("tr.ui-state-hover td.yelenh a.dieutriphoihop").css('color', '#363636');
      //alert($("#rowed3").getGridParam("reccount"));
      /*if($("#rowed3").getGridParam("reccount")>0){
      	$("#todieutri_in").removeClass('ui-state-disabled');
      }else{
      	$("#todieutri_in").addClass('ui-state-disabled');
      }*/
      var d = 0;
      var tmp1 = $("#rowed3").jqGrid('getDataIDs');
      var rowData2 = $("#rowed3").getRowData(tmp1[0]);
      for (var i = 0; i < tmp1.length; i++) {
        var rowData = $("#rowed3").getRowData(tmp1[i]);
        if (rowData["ngayhoantat"] == "") {
          //if(rowData["chophepthuchien"]==1){
          //	jQuery("#rowed3").jqGrid('setCell', tmp1[i], 'Ngaygio', '', {'background': '#f5f203'});
          //}else{
          jQuery("#rowed3").jqGrid('setCell', tmp1[i], 'Ngaygio', '', {
            'background': '#FF6347'
          });
          //}
        } else {
          d = d + 1;
        }
      }
      if (d > 0) {
        $("#todieutri_in").removeClass('ui-state-disabled');
      } else {
        $("#todieutri_in").addClass('ui-state-disabled');
      }
      $(".ui-search-input input[type='checkbox']").prop('checked', true);
      if (rowData2['DaChotCongCS'] == 1) {
        //alert("Đã chốt");
        $("#todieutri_chot_phics").hide();
        $("#todieutri_huychot_phics").show();
      } else {
        //alert("Chưa chốt");
        $("#todieutri_huychot_phics").hide();
        $("#todieutri_chot_phics").show();
      }
      kiemtrakhoa_hsbanoi(0, "<?=$_GET['idbenhannoitru']?>");
    },
    caption: 'Tờ điều trị <span><div class="grid1 "><div class="hinhvuong tdtct_chuahoantat"></div><label class="diengiai" style="margin-top: 5px">Chưa hoàn tất</label></div></span> <span style="font-size:11px; margin-left: 140px;"> - Nhóm máu: <?=$cdnoichuyenden[0]['NhomMau']?></span> <?=$cdnoichuyenden[0]['HoTenHoSoMe']?>'
  });
  $("#rowed3").jqGrid('filterToolbar', {
    searchOperators: false,
    searchOnEnter: false,
    defaultSearch: "cn"
  });
  jQuery("#rowed3").jqGrid('navGrid', '#prowed3', {
    edit: false,
    add: false,
    del: false
  });
  $("#rowed3").jqGrid('bindKeys', {});
  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "Thêm mới",
    buttonicon: 'ui-icon-document-b',
    id: 'themylenh',
    onClickButton: function() {
      //thảo bổ sung				
      Option = {}
      QuanLyDieuKienUpdate(DieuKien, DauVao, Option).then(function(data) {})
      //thảo bổ sung 

      //   	emr_checkLock(<?=$_GET['idluotkham']?>,0,0,0,<?=$_SESSION['user']['id_user']?>,8);//Check khoa dùng hàm chung
      //   	if(window.emrIsLock==1){
      //     return false;
      // }
      kiemtrakhoa_hsbanoi(1, "<?=$_GET['idbenhannoitru']?>"); // Khoa hồ sơ 3 cấp
      if (window._khoahsba == 1 || window._khoahsba == 2 || window._khoahsba == 3) {
        return false;
      }
      $.post(
        'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=check_lock&idluotkham=<?=$_GET['idluotkham']?>&getkhoa=1'
      ).done(function(data) {
        var datacheck = $.trim(data).split('|||');
        if (datacheck[0] == 0) {
          if (window.idphongban == datacheck[1]) {
            parent.postMessage('moylenh|||' + window.rs_tdt[window.rs_tdt.length - 1], '*');
            window.n_themmoi = 1;
          } else {
            $("#dialog-namkhoakhac").dialog('open');
          }
        } else {
          alert_khoa(datacheck[0]);
        }
      });
    },
    title: "Thêm mới",
    position: "last"
  });
  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "Sửa",
    buttonicon: ' ui-icon-pencil',
    id: 'todieutri_sua',
    onClickButton: function() {
      // if(<?=$_SESSION['user']['id_user']?>==178){

      //thảo bổ sung	
      Option = {
        callback: () => {
          fetchDataAsync([],
            'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=data_noidungbenhan&idtodieutrichitiet=' +
            window.idtodieutrichitiet).then(function(data) {
            data = data.split('|||');
            $("#sua_dienbien").val(data[1]);
            $("#sua_chandoan").val(data[0]);
            $("#sua_ylenhkhac").val(data[2]);
            $("#sua_ngayhieuluc").val(data[3]);
            $("#dialog-suanoidung").dialog("open");
          })
        }
      }
      QuanLyDieuKienUpdate(DieuKien, DauVao, Option).then(function(data) {

      })
      //thảo bổ sung 
      //       	}
      //       	else{
      //       		emr_checkLock(<?=$_GET['idluotkham']?>,0,0,0,<?=$_SESSION['user']['id_user']?>,8,0);//Check khoa dùng hàm chung
      //        	if(window.emrIsLock==1){
      //        		$.post('resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=data_noidungbenhan&idtodieutrichitiet='+window.idtodieutrichitiet).done(function(data){
      // 	data=data.split('|||');
      // 	$("#sua_dienbien").val(data[1]);
      // 	$("#sua_chandoan").val(data[0]);
      // 	$("#sua_ylenhkhac").val(data[2]);
      // 	$("#sua_ngayhieuluc").val(data[3]);
      // 	$( "#dialog-suanoidung" ).dialog( "open" );
      // });
      //          return false;
      //      }
      //       	}


      kiemtrakhoa_hsbanoi(1, "<?=$_GET['idbenhannoitru']?>"); //khoa ho so 3 cấp
      if (window._khoahsba == 1 || window._khoahsba == 2 || window._khoahsba == 3) {
        return false;
      }
      $.post(
        'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=check_lock&idluotkham=<?=$_GET['idluotkham']?>&getkhoa=1'
      ).done(function(data) {
        var datacheck = $.trim(data).split('|||');
        if (datacheck[0] == 0) {
          if (window.idphongban == datacheck[1]) {
            window.n_sua = 1;
            var rowData = jQuery('#rowed3').jqGrid('getRowData', window.idtodieutrichitiet);
            if (rowData['bacsy'] != '') {
              window._n_dahoantat = 1;
            } else {
              window._n_dahoantat = 0;
            }
            parent.postMessage('suaylenh|||' + window.id_todieutri + '|||' + window.idtodieutrichitiet +
              '|||' + window.donthuoc + '|||' + window.donthuoctralai + '|||' + window._n_dahoantat, '*');
          } else {
            $("#dialog-namkhoakhac").dialog('open');
          }
        } else {
          if (datacheck[0] == 4) {
            $.post(
              'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=data_noidungbenhan&idtodieutrichitiet=' +
              window.idtodieutrichitiet).done(function(data) {
              data = data.split('|||');
              $("#sua_dienbien").val(data[1]);
              $("#sua_chandoan").val(data[0]);
              $("#sua_ylenhkhac").val(data[2]);
              $("#sua_ngayhieuluc").val(data[3]);
              $("#dialog-suanoidung").dialog("open");
            });
          } else {
            alert_khoa(datacheck[0]);
          }
        }
      });
    },
    title: "Sửa",
    position: "last"
  });
  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "Xóa",
    buttonicon: 'ui-icon-closethick',
    id: 'todieutri_xoa',
    onClickButton: function() {
      //thảo bổ sung				
      Option = {}
      QuanLyDieuKienUpdate(DieuKien, DauVao, Option).then(function(data) {})
      //thảo bổ sung 
      //   	emr_checkLock(<?=$_GET['idluotkham']?>,0,0,0,<?=$_SESSION['user']['id_user']?>,8);//Check khoa dùng hàm chung
      //   	if(window.emrIsLock==1){
      //     return false;
      // }
      kiemtrakhoa_hsbanoi(1, "<?=$_GET['idbenhannoitru']?>"); // khoa ho so 3 cap
      if (window._khoahsba == 1 || window._khoahsba == 2 || window._khoahsba == 3) {
        return false;
      }
      $.post(
        'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=check_lock&idluotkham=<?=$_GET['idluotkham']?>&getkhoa=1'
      ).done(function(data) {
        var datacheck = $.trim(data).split('|||');
        if (datacheck[0] == 0) {
          if (window.idphongban == datacheck[1]) {
            $("#dialog_xoaylenh").dialog('open');
          } else {
            $("#dialog-namkhoakhac").dialog('open');
          }
        } else {
          alert_khoa(datacheck[0]);
        }
      });
    },
    title: "Xóa",
    position: "last"
  });
  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "Hoàn tất",
    buttonicon: 'ui-icon-locked',
    id: 'todieutri_hoantat',
    onClickButton: function() {

      //thảo bổ sung				
      Option = {}
      QuanLyDieuKienUpdate(DieuKien, DauVao, Option).then(function(data) {})
      //thảo bổ sung 

      // 	emr_checkLock(<?=$_GET['idluotkham']?>,0,0,0,<?=$_SESSION['user']['id_user']?>,8);//Check khoa dùng hàm chung
      //   	if(window.emrIsLock==1){
      //     return false;
      // }

      kiemtrakhoa_hsbanoi(1, "<?=$_GET['idbenhannoitru']?>"); //khoa ho so 3 cap
      if (window._khoahsba == 1 || window._khoahsba == 2 || window._khoahsba == 3) {
        return false;
      }
      $.post(
        'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=check_lock&idluotkham=<?=$_GET['idluotkham']?>'
      ).done(function(data) {
        var datacheck = $.trim(data).split('|||');
        if (datacheck == 0) {
          window.n_hoantat = 1;
          if ($("#nguoihoantat").val() == '' || $("#nguoihoantat").val() == 'false') {
            alert("Vui lòng chọn BS hoàn tất");
          } else {
            var __array=[623,694,639,1339,975,1218,35,1155,978,178];
            var __isOpen;
            if(__array.indexOf($('#nguoihoantat_hidden').val()) > -1){
              __isOpen=1;
            }else{
              __isOpen=0;       
            } 
            fetchData ({store_name:'GD2_N_GetThongTinToDieuTriChiTiet',data:[window.idtodieutrichitiet]}, urlSlickGrid).then(function(data){
              data=jQuery.parseJSON(data);             
              new ToaThuocThongMinh({ ID_DonThuoc:data[0].ID_DonThuoc,isOpen:__isOpen });       
              // $("#dialog_hoantat").dialog('open');
            })       
            // $("#dialog_hoantat").dialog('open');
          }
        } else {
          alert_khoa(datacheck);
        }
      });
    },
    title: "Hoàn tất",
    position: "last"
  });
  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "In tờ điều trị",
    buttonicon: 'ui-icon-print',
    id: 'todieutri_in',
    onClickButton: function() {
      kiemtrakhoa_hsbanoi(2, "<?=$_GET['idbenhannoitru']?>");
      if (window._khoahsba == 3) {
        return false;
      }
      if ($("#input_navigator").val() < 10) {
        var so = "0" + $("#input_navigator").val();
      } else {
        var so = $("#input_navigator").val();
      }
      var id_chon = '';
      $('#rowed3 tr td[aria-describedby="rowed3_ChonIn"] input[type="checkbox"]').each(function() {
        var row = $(this).closest('tr.jqgrow');
        var tam = row.attr('id');
        //var rowData = $("#rowed3").getRowData(tam);
        //$(this).prop('checked', true);
        if ($(this).is(":checked")) {
          id_chon += tam + ";;";
        }
        //$(this).prop('checked')
      });
      $.cookie("in_status", "print_preview");
      if ($.cookie("os_name") == 'Linux') {
        var mapForm = document.createElement("form");
        mapForm.target = "Map";
        mapForm.method = "POST"; // or "post" if appropriate
        mapForm.action =
          "resource.php?module=report&view=<?=$modules?>&action=todieutri&header=top&idluotkham=<?= $_GET["idluotkham"]?>&idbenhannoitru=<?= $_GET["idbenhannoitru"]?>&idtodieutri=" +
          window.id_todieutri + "&so=" + so + "&type=report&id_form=10&report_name=ToDieuTri";

        var mapInput = document.createElement("input");
        mapInput.type = "text";
        mapInput.name = "idchon";
        mapInput.value = id_chon;
        mapForm.appendChild(mapInput);

        document.body.appendChild(mapForm);

        map = window.open("", "Map");

        if (map) {
          mapForm.submit();
        } else {
          alert('Vui lòng cấu hình firefox cho phép mở popup.');
        }
      } else {
        dialog_report("Xem trước khi in", 90, 90, "u78787878975f",
          "resource.php?module=report&view=<?=$modules?>&action=todieutri&header=top&idluotkham=<?= $_GET["idluotkham"]?>&idbenhannoitru=<?= $_GET["idbenhannoitru"]?>&idtodieutri=" +
          window.id_todieutri + "&so=" + so + "&idchon=" + id_chon + "&type=report&id_form=10", 'ToDieuTri');
      }
    },
    title: "In tờ điều trị",
    position: "last"
  });
  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "In CLS",
    buttonicon: 'ui-icon-print',
    id: 'todieutri_chidinh_cls',
    onClickButton: function() {
      kiemtrakhoa_hsbanoi(2, "<?=$_GET['idbenhannoitru']?>");
      if (window._khoahsba == 3) {
        return false;
      }
      var selRow = jQuery("#rowed3").jqGrid('getGridParam', 'selrow');
      //alert(selRow)
      var rowData = jQuery('#rowed3').jqGrid('getRowData', selRow);
      $.cookie("in_status", "print_preview");
      dialog_report("Xem trước khi in", 90, 90, "u78787878975f",
        "resource.php?module=report&view=<?=$modules?>&action=todieutri_phieuchidinh&header=top&id_benhnhan=<?= $_GET["idbenhnhan"]?>&idtodieutrichitiet=" +
        window.idtodieutrichitiet + "&canlamsang=" + rowData['canlamsang'] + "&xetnghiem=" + rowData[
          'xetnghiem'] + "&type=report&id_form=10", 'PhieuChiDinh');
    },
    title: "In CLS",
    position: "last"
  });
  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "In ĐTPH",
    buttonicon: 'ui-icon-print',
    id: 'todieutri_chidinh_dtph',
    onClickButton: function() {
      kiemtrakhoa_hsbanoi(2, "<?=$_GET['idbenhannoitru']?>");
      if (window._khoahsba == 3) {
        return false;
      }
      var selRow = jQuery("#rowed3").jqGrid('getGridParam', 'selrow');
      var rowData = jQuery('#rowed3').jqGrid('getRowData', selRow);
      $.cookie("in_status", "print_preview");
      dialog_report("Xem trước khi in", 90, 90, "u78787878975f",
        "resource.php?module=report&view=<?=$modules?>&action=todieutri_dieutriphoihop_all&header=top&id_benhnhan=<?= $_GET["idbenhnhan"]?>&idtodieutrichitiet=" +
        window.idtodieutrichitiet + "&type=report&id_form=10", 'PhieuChiDinh');
    },
    title: "In ĐTPH",
    position: "last"
  });
  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "In đơn thuốc (B.án 2,3)",
    buttonicon: 'ui-icon-print',
    id: 'todieutri_intoathuoc',
    onClickButton: function() {
      kiemtrakhoa_hsbanoi(2, "<?=$_GET['idbenhannoitru']?>");
      if (window._khoahsba == 3) {
        return false;
      }
      var selRow = jQuery("#rowed3").jqGrid('getGridParam', 'selrow');
      var rowData = jQuery('#rowed3').jqGrid('getRowData', selRow);
      $.cookie("in_status", "print_preview");
      dialog_report("Xem trước khi in", 90, 90, "u78787878975f",
        "resource.php?module=report&view=<?=$modules?>&action=benhan_intoathuoc_noitru&header=top&id_luotkham=<?= $_GET["idluotkham"]?>&type=report&id_form=10",
        'InDonThuoc_Bsy');
    },
    title: "In đơn thuốc (B.án 2,3)",
    position: "last"
  });
  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "In Đ.thuốc cho về",
    buttonicon: 'ui-icon-print',
    id: 'todieutri_indonthuocchove',
    onClickButton: function() {
      kiemtrakhoa_hsbanoi(2, "<?=$_GET['idbenhannoitru']?>");
      if (window._khoahsba == 3) {
        return false;
      }
      var selRow = jQuery("#rowed3").jqGrid('getGridParam', 'selrow');
      var rowData = jQuery('#rowed3').jqGrid('getRowData', selRow);
      $.cookie("in_status", "print_preview");
      window.open('resource.php?module=report&view=lamsang&action=intoathuocchove&header=top&id_donthuoc=' +
        rowData['iddonthuoc'] +
        '&type=report&id_form=10&tenin=TenGoc&check=&xemtruocin=1&report_name=InDonThuoc_Bsy');
    },
    title: "In Đ.thuốc cho về",
    position: "last"
  });
  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "Kích hoạt xếp hàng",
    buttonicon: 'ui-icon-active',
    id: 'todieutri_kichhoat_cls',
    onClickButton: function() {
      var cf = confirm("Bạn chắc chắn muốn kích hoạt xếp hàng cho bệnh nhân này không?");
      if (cf === true) {
        emr_xephangluotkham(<?=$_GET["idluotkham"]?>, 2, 0, false); // Đẩy vào phòng xếp hàng
      }
    },
    title: "Kích hoạt xếp hàng",
    position: "last"
  });
  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "Chốt công CS,ĐT",
    buttonicon: 'ui-icon-locked',
    id: 'todieutri_chot_phics',
    onClickButton: function() {
      //thảo bổ sung				
      Option = {}
      QuanLyDieuKienUpdate(DieuKien, DauVao, Option).then(function(data) {})
      //thảo bổ sung 
      //emr_checkLock(<?=$_GET['idluotkham']?>,0,0,0,<?=$_SESSION['user']['id_user']?>,8);//Check khoa dùng hàm chung
      //   	if(window.emrIsLock==1){
      //     return false;
      // }
      kiemtrakhoa_hsbanoi(2, "<?=$_GET['idbenhannoitru']?>");
      if (window._khoahsba == 3) {
        return false;
      }
      var cf = confirm("Bạn chắc chắn muốn chốt công chăm sóc, điều trị không?");
      if (cf === true) {
        $.ajax({
          type: 'POST',
          async: false,
          url: 'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_todieutri_congcs&oper=chot&idluotkham=<?=$_GET['idluotkham']?>&hienmaloi=a',
          //data: {},
          success: function(data, status, xhr) {
            data = $.parseJSON(data);
            if (data.IsLock == 1) {
              alert(data.Notes);
            } else {
              getdieutri();
            }
          }
        }); //end ajax
      }

    },
    title: "Chốt công CS,ĐT",
    position: "last"
  });
  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "Hủy chốt công CS,ĐT",
    buttonicon: 'ui-icon-unlocked',
    id: 'todieutri_huychot_phics',
    onClickButton: function() {
      //thảo bổ sung				
      Option = {}
      QuanLyDieuKienUpdate(DieuKien, DauVao, Option).then(function(data) {})
      //thảo bổ sung 
      kiemtrakhoa_hsbanoi(2, "<?=$_GET['idbenhannoitru']?>");
      if (window._khoahsba == 3) {
        return false;
      }
      var cf = confirm("Bạn chắc chắn muốn hủy chốt công chăm sóc, điều trị không?");
      if (cf === true) {
        $.ajax({
          type: 'POST',
          async: false,
          url: 'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_todieutri_congcs&oper=huychot&idluotkham=<?=$_GET['idluotkham']?>&hienmaloi=a',
          //data: {},
          success: function(data, status, xhr) {
            data = $.parseJSON(data);
            if (data.IsLock == 1) {
              alert(data.Notes);
            } else {
              getdieutri();
            }
          }
        }); //end ajax
      }
    },
    title: "Hủy chốt công CS,ĐT",
    position: "last"
  });

  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "Xem công CS,ĐT",
    buttonicon: 'ui-icon-active',
    id: 'todieutri_xem_phi_csdt',
    onClickButton: function() {
      parent.postMessage('xemphichamsoc|||', '*');
    },
    title: "Xem công CS,ĐT",
    position: "last"
  });

  $("#rowed3").jqGrid('navButtonAdd', '#prowed3', {
    caption: "Hủy XN nhóm máu (TTV)",
    buttonicon: 'ui-icon-close',
    id: 'todieutri_huy_xn_nhommau',
    onClickButton: function() {
      var cf = confirm("Bạn chắc chắn muốn hủy y lệnh làm nhóm máu của bệnh nhân này không?");
      if (cf === true) {
        huyXetNghiemNhomMau(<?=$_GET['idluotkham']?>);
      }
    },
    title: "Hủy XN nhóm máu (TTV)",
    position: "last"
  });
}

function create_bs_chidinh(elem, datalocal) {
  datalocal = jQuery.parseJSON(datalocal);
  $(elem).jqGrid({
    datastr: datalocal,
    datatype: "jsonstring",
    colNames: ['NickName', 'Họ tên', 'Phòng ban'],
    colModel: [{
        name: 'NickName',
        index: 'NickName',
        hidden: false,
        width: 40
      },
      {
        name: 'HoTen',
        index: 'HoTen',
        hidden: false,
        width: 100
      },
      {
        name: 'PhongBan',
        index: 'PhongBan',
        hidden: false,
        width: 100
      },
    ],
    hidegrid: false,
    gridview: true,
    loadonce: true,
    scroll: 1,
    modal: true,
    rowNum: 1000,
    rowList: [],
    height: 250,
    width: 500,
    viewrecords: true,
    ignoreCase: true,
    shrinkToFit: true,
    cmTemplate: {
      sortable: false
    },
    sortorder: "desc",
    serializeRowData: function(postdata) {},
    onSelectRow: function(id) {

      var rowData_dvcs = $(this).getRowData(id);
      setval_new('#combo_chamsoc', rowData_dvcs['ID_DM_LoaiChamSoc']);

    },
    ondblClickRow: function(id, rowIndex, columnIndex) {},
    loadComplete: function(data) {},
  });
  $(elem).jqGrid('filterToolbar', {
    searchOperators: false,
    searchOnEnter: false,
    defaultSearch: "cn"
  });
  $(elem).jqGrid('bindKeys', {});
}

function navigator_load(_value) {
  //alert(_value)
  if (_value == 'end') {
    $("#input_navigator").val(window.rs_tdt.length);
    window.id_todieutri = window.rs_tdt[window.rs_tdt.length - 1];
  } else if (_value == 'first') {
    if (window.rs_tdt.length > 0) {
      $("#input_navigator").val(1);
    }
    window.id_todieutri = window.rs_tdt[0];
  } else {
    var tam = $("#input_navigator").val();
    if (parseInt(tam) + parseInt(_value) > window.rs_tdt.length || parseInt(tam) + parseInt(_value) < 1) {
      return false;
    } else {
      $("#input_navigator").val(parseInt(tam) + parseInt(_value));
      window.id_todieutri = window.rs_tdt[parseInt(tam) + parseInt(_value) - 1];
    }
  }
  //	alert(window.id_todieutri);
  taidulieu(window.id_todieutri);
}

function dialog() {
  var winW = $('body').width();
  var winH = $('body').height();
  $('#ylenh_dialog').dialog({
    title: 'Nhập lý do sửa',
    resizable: false,
    height: winH,
    width: winW,
    modal: true,
    autoOpen: false,
    close: function(event, ui) {

    },
  })
}

function getdieutri() {
  $.post(
    'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=data_todieutri&idbenhannoitru=<?=$_GET['idbenhannoitru']?>'
  ).done(function(data) {
    if (data != '') {
      window.rs_tdt = data.split('|||'); //123321
      $(".navigator_title").html(window.rs_tdt.length);
      $("#input_navigator").val(window.rs_tdt.length);
      window.id_todieutri = window.rs_tdt[window.rs_tdt.length - 1];
      taidulieu(window.id_todieutri);
      /* if(window.rs_tdt.length<1){
      	$.post('resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=todieutri_themtrang&idbenhannoitru=<?=$_GET['idbenhannoitru']?>&chandoan='+window.cd_noichuyenden).done(function(data){
      		//tooltip_message("Đã lưu");
      		getdieutri();
        });	 
       }*/
    }
  });
}

function taidulieu(_val) {
  if (window.id_todieutri != '' && window.rs_tdt.length == $("#input_navigator").val()) {
    $("#themylenh").removeClass('ui-state-disabled');
  } else {
    $("#themylenh").addClass('ui-state-disabled');
  }
  $('#rowed3').jqGrid('clearGridData');
  //$("#themylenh").addClass('ui-state-disabled');
  $("#todieutri_sua").addClass('ui-state-disabled');
  $("#todieutri_xoa").addClass('ui-state-disabled');
  $("#todieutri_hoantat").addClass('ui-state-disabled');
  $("#todieutri_chidinh_cls").addClass('ui-state-disabled');
  $("#todieutri_chidinh_dtph").addClass('ui-state-disabled');
  $("#todieutri_indonthuocchove").addClass('ui-state-disabled');
  $("#rowed3").jqGrid('setGridParam', {
    datatype: 'json',
    url: "resource.php?module=<?=$modules?>&view=<?=$view?>&action=data_todieutrigetall&phanloai=0&idtodieutri=" +
      _val
  }).trigger('reloadGrid');

}

function moform(_val, _val2, _val3, _val4) {
  console.log(_val + "-" + _val2 + "-" + _val3 + "-" + _val4)
  if (_val3 == 'Xong') {
    if (_val == 3918) {
      parent.postMessage('goiform|||' + _val + '|||Framingham', '*');
    } else if (_val2 == '') {
      tooltip_message("Form này chưa sẵn sàng để gọi");
    } else if (_val2 == 25) {
      parent.postMessage('goiform|||' + _val + '|||vat_ly_tri_lieu|||' + _val4, '*');
    } else if (_val2 == 52) {
      parent.postMessage('goiform|||' + _val + '|||ke_hoach_hoa_gia_dinh|||' + _val4, '*');
    } else if (_val2 == 90) {
      parent.postMessage('goiform|||' + _val + '|||tiem_chung|||' + _val4, '*');
    } else {
      parent.postMessage('goiform|||' + _val + '|||' + _val2 + '|||' + _val4, '*');
    }
  }
}

function alert_khoa(input) {
  if (input == 1) {
    tooltip_message("Lượt khám này đã hoàn tất ra viện");
    //	$("#thongbao").html("Thông báo: Lượt khám này đã hoàn tất ra viện");
  } else if (input == 2) {
    tooltip_message("Lượt khám này đã khóa BHYT");
    //	$("#thongbao").html("Thông báo: Lượt khám này đã khóa BHYT");
  } else if (input == 3) {
    tooltip_message("Lượt khám này đã khóa BHCC");
    //	$("#thongbao").html("Thông báo: Lượt khám này đã khóa BHCC");
  } else if (input == 4) {
    tooltip_message("Lượt khám này đã thanh toán");
    //	$("#thongbao").html("Thông báo: Lượt khám này đã thanh toán");
  } else if (input == 5) {
    tooltip_message("Lượt khám này đã ra viện quá 10 ngày");
    //	$("#thongbao").html("Thông báo: Lượt khám này đã thanh toán");
  }
}

function checkbox(a) {
  var tmp1 = $("#rowed3").jqGrid('getDataIDs');

  if ($(a).is(':checked')) {
    $('#rowed3 tr td[aria-describedby="rowed3_ChonIn"] input[type="checkbox"]').each(function() {
      var row = $(this).closest('tr.jqgrow');
      var tam = row.attr('id');
      $(this).prop('checked', true);
      //$(this).prop('checked')
    });
  } else {

    $('#rowed3 tr td[aria-describedby="rowed3_ChonIn"] input[type="checkbox"]').each(function() {
      var row = $(this).closest('tr.jqgrow');
      var tam = row.attr('id');
      $(this).prop('checked', false);
      //$(this).prop('checked')
    });
  }
}

function edit_ngaygiohieuluc() {
  $('#edit_ngaygiohieuluc_khth').click(function(e) {
    //thảo bổ sung				
    Option = {}
    QuanLyDieuKienUpdate(DieuKien, DauVao, Option).then(function(data) {})
    //thảo bổ sung 
    if (window.idtodieutrichitiet == '') {
      alert('Vui lòng chọn dòng cần chỉnh sửa');
      return false;
    }
    var dataRow = jQuery('#rowed3').jqGrid('getRowData', window.idtodieutrichitiet);
    console.log(window.idtodieutrichitiet)
    $('div [aria-describedby*="dialog_suangaygiohieuluc"]').remove();
    $('#dialog_suangaygiohieuluc').remove();
    $('#dialog-namkhoakhac').append('<div id="dialog_suangaygiohieuluc" style="display:none">\
			<table>\
			<tr>\
			<td>\
			<label for="ngay_edit">Ngày giờ chỉ định</label>\
			</td>\
			<td>\
			<label for="ngay_edit">Sửa ngày giờ chỉnh định</label>\
			</td>\
			</tr>\
			<tr>\
			<td><input type="text" value="' + dataRow['Ngaygio'] + '" disabled></td>\
			<td><input type="text" style="width: 45px; float: left;" id="time_chidinh"><input style="float:left" type="text" id="date_chidinh"></td>\
			<td colspan="2">\
			<label for="dienbien"><b>Thư ký:</b> ' + dataRow['thuky'] + '</label>\
			</td>\
			</tr>\
			<tr>\
			<td>\
			<label for="ngay_edit">Ngày giờ hiệu lực</label>\
			</td>\
			<td>\
			<label for="ngay_edit">Sửa ngày giờ hiệu lực</label>\
			</td>\
			</tr>\
			<tr>\
			<td><input type="text" value="' + dataRow['NgayGioHieuLuc'] + '" disabled></td>\
			<td><input type="text" style="width: 45px; float: left;" id="time_hieuluc"><input style="float:left" type="text" id="date_hieuluc"></td>\
			<td colspan="2">\
			<label for="dienbien"><b>Bác sỹ:</b> ' + dataRow['bacsy'] + '</label>\
			</td>\
			</tr>\
			</table>\
			<table>\
			<tr>\
			<td>\
			<label for="chandoan"><b>Chẩn đoán</b></label>\
			</td>\
			</tr>\
			<tr>\
			<td colspan="2">\
			' + dataRow['chandoan'] + '\
			</td>\
			</tr>\
			<tr>\
			<td>\
			<label for="dienbien"><b>Diễn biến</b></label>\
			</td>\
			</tr>\
			<tr>\
			<td colspan="2">\
			' + dataRow['dienbien'] + '\
			</td>\
			</tr>\
			<tr>\
			<td>\
			<label for="dienbien"><b>Y lệnh</b></label>\
			</td>\
			</tr>\
			<tr>\
			<td colspan="2">\
			' + dataRow['ylenh'] + '\
			</td>\
			</tr>\
			</table>\
			</div>');
    $('#dialog_suangaygiohieuluc').dialog({
      open: function(e) {
        var ngaygiochidinh = dataRow['Ngaygio'];
        var ngaygiohieuluc = dataRow['NgayGioHieuLuc'];
        // add vao vulue
        if (ngaygiochidinh !== '') {
          $('#time_chidinh').val(ngaygiochidinh.split(' ').shift());
          $('#date_chidinh').val(ngaygiochidinh.split(' ').pop());
        }
        if (ngaygiohieuluc !== '') {
          $('#time_hieuluc').val(ngaygiohieuluc.split(' ').shift());
          $('#date_hieuluc').val(ngaygiohieuluc.split(' ').pop());
        }
        $('button,#date_hieuluc,#date_chidinh').blur();
        $("#date_hieuluc,#date_chidinh").datepicker({
          changeMonth: true,
          changeYear: true,
          dateFormat: 'dd/mm/y'
        });
        $('#time_hieuluc,#time_chidinh').datetimeEntry({
          datetimeFormat: 'H:M',
          spinnerImage: ''
        });
      },
      model: true,
      width: 720,
      height: 394,
      title: 'Chỉnh sửa ngày giờ chỉ định và ngày giờ hiệu lực y lệnh',
      buttons: [{
          id: 'luu_dialog',
          text: 'Chỉnh sửa',
          click: function(e) {
            var data_send = {
              id_todieutrichitiet: window.idtodieutrichitiet,
              ngaygiochidinh: $('#date_chidinh').val() + ' ' + $('#time_chidinh').val(),
              ngaygiohieuluc: $('#date_hieuluc').val() + ' ' + $('#time_hieuluc').val()
            };
            $.post(
              'resource.php?module=<?= $modules ?>&view=<?= $view ?>&action=controller_edit_ngay_giohieuluc',
              data_send).done(function(data) {
              data = $.parseJSON(data);
              if (data['status'] == true) {
                tooltip_message('Chỉnh sửa thành công');
                $("#rowed3").jqGrid("setCell", window.idtodieutrichitiet, "Ngaygio", data[
                  'ngaygiochidinh']);
                $("#rowed3").jqGrid("setCell", window.idtodieutrichitiet, "NgayGioHieuLuc", data[
                  'ngaygiohieuluc']);
                $('#dialog_suangaygiohieuluc').dialog("close");
              } else {
                alert(data['msg']);
              }
            });
          }
        },
        {
          id: 'exit_dialog',
          text: "Thoát",
          click: function(e) {

            $('#dialog_suangaygiohieuluc').dialog("close");
          }
        }
      ]
    });
  });
}
</script>
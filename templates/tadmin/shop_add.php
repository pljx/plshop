﻿<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<?php $this->load->view(TPL_FOLDER."header");?>
<table width="100%" border="0" cellpadding="5" cellspacing="0" >
  <tr>
    <td width="3%" align="left" ><img src="{tpl_path}images/forward.jpg" /></td>
    <td width="97%" align="left" >您现在的位置：<a href="<?php echo my_site_url(CTL_FOLDER.'shop');?>">店铺列表</a> &gt; 添加店铺 </td>
  </tr>
</table>
<fieldset>
  <legend>添加店铺</legend>
  <form action="<?php echo site_url(CTL_FOLDER."shop/save_shop_add");?>" method="post" enctype="multipart/form-data">
    <div class="ui-tx-tips-div">操作流程：填写店铺首页链接-->点击”获取数据”按钮-->点击添加按钮-->完成<br>
      提示：如果无法获取数据，请直接全部手工添加。</div>
    <table width="100%"  border="0" cellpadding="3" cellspacing="0" >
    <tr>
        <td valign="top"><font color="#FF0000">*</font>店铺链接：</td>
          <td><input name="shop_url" id="shop_url" type="text" size="80" datatype="Require" msg="该项必须填写" /> &nbsp; <input type="button" onclick="get_data()" value="获取数据" class="button-style" /> <br />例如：http://yy2001.taobao.com</td>
      </tr>
      <tr>
        <td width="16%" valign="top"><font color="#FF0000">*</font>店铺分类：</td>
        <td width="84%"><select name="cid" dataType="Require" msg="分类必选">
            <option value="">选择分类</option>
            <?php foreach($shop_catalog as $row) {?>
            <option value="<?php echo $row->id;?>"><?php echo $row->cat_name;?></option>
            <?php }?>
          </select>
          &nbsp; <a href="<?php echo my_site_url(CTL_FOLDER.'shop_catalog');?>" style="color:#06F">如果没有分类点击这里创建</a></td>
      </tr>
      <tr>
        <td width="16%" valign="top"><font color="#FF0000">*</font>店铺卖家ID：</td>
        <td width="84%"><input name="sid" type="text" size="20" maxlength="20" dataType="Custom" msg="ID格式有误" regexp="^[1-9]+\d*$" />
          </td>
      </tr>
      <tr>
        <td width="16%" valign="top"><font color="#FF0000">*</font>店铺标题：</td>
        <td width="84%"><input name="title" type="text" size="80" maxlength="100" dataType="Require" msg="该项必须填写" /></td>
      </tr>
      <tr>
        <td valign="top"><font color="#FF0000">*</font>店铺LOGO：</td>
        <td><input type="text" name="pic_path" id="pic_path" size="25" maxlength="255"  />
          <input name="big_pic" type="file" id="big_pic" size="20" dataType="Filter" accept="<?php echo str_replace("|",",",UP_IMAGES_EXT);?>" require="false" msg="图片格式有误" />
          <input type="button" name="sfbtn" class="button-style2" onclick="GetFileDialog('pic_path')" style="width:120px" value="选择图片" />
          <br />
          上传的图片格式必须是：<?php echo UP_IMAGES_EXT;?></td>
      </tr>
      <tr>
          <td>网页标题：</td>
          <td><input name="btitle" type="text" size="50" maxlength="100" value="{title}-{site_title}" /> 标签说明：网站标题{site_title}，店铺标题{title}</td>
        </tr>
      <tr>
        <td valign="top">meta关键词：</td>
        <td><input type="text" name="keyword" maxlength="100" size="80" />
          <br>
          一般不超过100个字符</td>
      </tr>
      <tr>
        <td valign="top">meta描述：</td>
        <td><textarea name="description" cols="80" rows="3" dataType="Limit" max="200" msg="字数不超过200" require="false"></textarea>
          <br>
          一般不超过200个字符</td>
      </tr>
      <tr>
        <td valign="top"><font color="#FF0000">*</font>排序号：</td>
        <td><input name="seqorder" type="text" id="seqorder" maxlength="8" size="4" value="0" datatype="Integer" msg="该项必须填写数字" /></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input type="button" onclick="subForm(this.form,this)" value="添加" class="button-style" />
          &nbsp;&nbsp;
          <input type="button" onclick="document.location.href='<?php echo my_site_url(CTL_FOLDER.'shop');?>'" value="返回" class="button-style2" /></td>
      </tr>
    </table>
  </form>
</fieldset>
<script language="javascript">
function subForm(f,e)
{
	if (!Validator.Validate(f,3)) return false;
	if(document.getElementById('pic_path').value == '' && document.getElementById('big_pic').value == '')
	{
		alert('请上传店铺图片');
		return;
	}
	e.value = '数据处理中..';
	e.disabled = true;
	f.submit();
}

function get_data()
{
	var shop_url = document.getElementById("shop_url").value;
	if ( shop_url == '')
	{
		alert('请填写店铺首页链接');
		return false;
	}
	shop_url = encodeURIComponent(shop_url);
	document.location.href = '<?php echo my_site_url(CTL_FOLDER.'shop/shop_add');?>?shop_url='+shop_url;
}
</script>
<?php $this->load->view(TPL_FOLDER."footer");?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>客户资料总览</title>
<link href="<?php echo base_url()?>assets/css/manage/style.css" type="text/css" rel="stylesheet" />
<style>
#bggreed{ background-color:#6F9;}
.ids a{display:block; width:40px;height:30px;text-decoration:none;text-align:center;line-height:30px;}
.ids a:hover{background-color:#3399FF; color:#FFF;}
.bgl{ background-color:#0CF}
</style>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/datePicker/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/check.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/check_process.js"></script>
<script type="text/javascript">
$(function(){ 
	$('#edit_member_account').attr('src','');
});
function resetForm(){
	var date = new Date();
    var now = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate();
	//重置功能：
	//第一行
	$('#member_name').val(''); 
	$('#member_qq').val(''); 
	$('#member_phone').val(''); 
	$('#member_status').val(''); 
	$('#member_from').val('');
	$('channel').val(); 
	$('#member_id').val('');
	//第二行
	$('#sales_man').val(''); 
	$('#updater').val(''); 
	$('#member_weixin').val(''); 
	$(':radio[name="order_by"]').removeAttr('checked');
	$('#order_by_create_time').attr('checked','checked'); 
	$('#order_by_big').attr('checked','checked'); 
	$('#order_by_little').removeAttr('checked');
	$(':radio[name="expert_qq"]').removeAttr('checked');
	//第三行
	$('#real_account').val(''); 
	$('#account_type').val(''); 
	$('#demo_account').val(''); 
	$('#member_MGM').val(''); 
	$('#qq_addfriend').removeAttr('checked'); 
	$('#weixin_addfriend').removeAttr('checked');
	$('#is_upgrade').val('');
	$('#is_operation').val('');
	//第四行
	$('#time_start').val(now+' 00:00:00'); 
	$('#time_end').val(now+' 23:59:59'); 
	$(':radio[name="time_type"]').removeAttr('checked'); 
	$('#search_by_null').attr('checked','checked'); 
	$('#today_call_start_time').removeAttr('checked'); 
	$('#call_start_time_null').removeAttr('checked'); 
	$('#today_wen_order_time').removeAttr('checked'); 
	$('#key_reser_time').removeAttr('checked');
	$('#re_MGM').removeAttr('checked');
	$('#is_income').removeAttr('checked');      
}
var page = 1;
var member_id = 0;
function editBoxShow(page,member_id){
	$('.graybg').show();
	$('#editBox').show();
	$('#edit_member_account').attr('src',"<?php echo site_url('manage/member_account/edit');?>"+'/'+page+'/'+member_id);
}
function editBoxHide(){
	$('.graybg').hide();
	$('#editBox').hide();
}
</script>
</head>
<body>
<!-- 2016-5-24 -->
<div class="p5" style="min-width:1382px;">
    <div class="mainstyle">
        <form method="post" name="add_memner_account" id="add_member_accounts" action="<?php echo site_url('manage/member_account/add').'/'.$sign.'/'.$page;?>">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td>姓名<span class="member_name  red"></span></td>
                    <td>QQ<span class="member_qq red"></span></td>
                    <td>手机号码1<span class="member_phone  red"></span></td>
                    <td>微信<span class="member_weixin  red"></span></td>
                    <td>状态<span class="member_status  red"></span></td>
					<td>来源<span class="member_from  red"></span></td>
					<td>渠道<span class="channel  red"></span></td>
                    <td>描述<span class="member_info  red"></span><span class="msg  red"></span></td>
                    <td class="mainbbn"></td>
                </tr>
                <tr>
                    <td><input type="text" name="member_name" id="add_member_name" value="Jacky" /></td>
                    <td><input type="text" name="member_qq" id="add_member_qq" value="61222575" /></td>
                    <td><input type="text" name="member_phone" id="add_member_phone" value="13800138000" /></td>
                    <td><input type="text" name="member_weixin" id="add_member_weixin" value="61222575" /></td>
                    <td><?php $status = $this->member_params_model->get_parm_options('状态');?>
                        <select name="member_status" id="add_member_status">
                                <option value="">请选择</option>
                            <?php foreach($status as $k=>$item):?>
                                <option value="<?php echo $item;?>" <?php echo set_select('member_status',$item);?>><?php echo $item;?></option>
                            <?php endforeach;?>
                        </select>
                    </td>
					<td><?php $froms = $this->member_params_model->get_parm_options('来源');?>
                        <select name="member_from" id="add_member_from">
                            <option value="">请选择</option>
                            <?php foreach($froms as $k=>$item):?>
                            <option value="<?php echo $item;?>" <?php echo set_select('member_from',$item);?>><?php echo $item;?></option>
                            <?php endforeach;?>
                        </select>
                    </td>
                    <td><?php $channel = $this->member_params_model->get_parm_options('渠道');?>
                        <select name="channel" id="add_channel">
                            <option value="">请选择</option>
                            <?php foreach($channel as $k=>$item):?>
                            <option value="<?php echo $item;?>" <?php echo set_select('channel',$item);?>><?php echo $item;?></option>
                            <?php endforeach;?>
                        </select>
                    </td>
                    <td><input type="text" name="member_info" id="add_member_info" style="width:330px;" value="abc info" /></td>
                    <td><input type="button" id="add_member_account_submit" value="新增客户" onclick="return main();" /></td>
                </tr>
            </table>
        </form>
    </div>
    <div class="mainstyle">
    	<form action="<?php echo site_url('manage/member_account/index');?>" method="post" id="search_member_account" name="search_member_account">
            <div class="toolbar"><span class="tit pr20">客户记录列表</span><input type="submit" value="查询" /><input type="button" onclick="resetForm()" value="重置" /></div>
            <table cellpadding="0" cellspacing="0">
                <tr class="borderbottom">
                    <td>姓名</td>
                    <td class="borderright"><input type="text" id="member_name" value="<?php echo @$search['member_name'];?>" name="member_name"></td>
                    <td>QQ</td>
                    <td class="borderright"><input type="text" id="member_qq" value="<?php echo @$search['member_qq'];?>" name="member_qq"></td>
                    <td>手机号码</td>
                    <td class="borderright"><input type="text" id="member_phone" value="<?php echo @$search['member_phone'];?>" name="member_phone"></td>
                    <td>状态</td>
                    <td class="borderright">
                    <select name="member_status" id="member_status">
                        <option value="">所有</option>
                        <option value="S1-S5" <?php echo ($search['member_status']=="S1-S5")?"selected='selected'":"";?>>S1-S5</option>
                        <option value="S1-S4" <?php echo ($search['member_status']=="S1-S4")?"selected='selected'":"";?>>S1-S4</option>
                        <option value="S2-S4" <?php echo ($search['member_status']=="S2-S4")?"selected='selected'":"";?>>S2-S4</option>
                        <option value="S3-S4" <?php echo ($search['member_status']=="S3-S4")?"selected='selected'":"";?>>S3-S4</option>
                        <?php echo $this->member_params_model->get_parm_option('状态',$search['member_status']);?>
                    </select>
                    </td>
                   	<td class="borderright">渠道
                        	<select name="channel" id="channel">
                                <option value="">全部</option>
                                <?php echo @$this->member_params_model->get_parm_option('渠道', $search['channel']); ?>
                            </select>
                    </td>
					<td class="borderright">来源
					        <select name="member_from" id="member_from" class="sWidth">
                                <option value="">全部</option>
                                <?php echo @$this->member_params_model->get_parm_option('来源', $search['member_from']); ?>
                            </select>
                    </td>
					<td>ID</td>
					<td><input type="text" id="member_id" value="<?php echo @$search['member_id'];?>" name="member_id"></td>
                </tr>
                <tr class="borderbottom">
                    <td>负责人</td>
                    <td class="borderright">
                        <select name="sales_man" id="sales_man">
                            <option value="">全部</option>
                             <?php echo $this->user_list_model->get_user_id_option($search['sales_man'],$user_status=2);?>
                        </select>
                    </td>
                    <td>修改人</td>
                    <td class="borderright">
                        <select name="updater" id="updater">
                            <option value="">全部</option>
                            <?php echo $this->user_list_model->get_user_id_option($search['updater'],$user_status=2);?>
                        </select>
                    </td>
                    <td class="borderright" colspan="2"><div style="float:left">负责团队</div>
                        <select style="float:right;" name="sales_id">
                            <option value="<?php echo $this->session->userdata['sales_id'];?>">全部</option>
                            <?php echo $this->member_sales_model->sales_option($search['sales_id']);?>
                        </select></td>
                    <td colspan="2" class="borderright">
						<label><input type="radio" name="order_by_sort" id="order_by_big" value="DESC" <?php echo ($search['order_by_sort']=='DESC')?'checked="checked"':"";?> />由大至小</label>
						<label><input type="radio" name="order_by_sort" id="order_by_little" value="ASC" <?php echo ($search['order_by_sort']=='ASC')?'checked="checked"':"";?> />由小至大</label>
                    </td>
                    <td colspan="2" class="borderright">
                    	<label><input type="radio" name="order_by" value="update_time" <?php echo ($search['order_by']=='update_time')?'checked="checked"':"";?> id="order_by_update_time" />修改时间排序</label>
                    	<label><input type="radio" name="order_by" value="create_time" <?php echo ($search['order_by']=='create_time')?'checked="checked"':"";?> id="order_by_create_time" />建立时间排序</label>
                    	<label><input type="radio" name="order_by" value="call_start_time" <?php echo ($search['order_by']=='call_start_time')?'checked="checked"':"";?> id="order_by_call_time" />电销预约排序</label>
					</td>
					<td colspan="2">
						<label><input type="radio" style="margin:0;" name="expert_qq" value="1" 
						<?php echo @($search['expert_qq']==1)?"checked='checked'":"";?> />专家已邀请</label>
						<label><input type="radio" style="margin:0;" name="expert_qq" value="2" 
						<?php echo @($search['expert_qq']==2)?"checked='checked'":"";?> />专家已添加</label>
					</td>
                </tr>
                <tr class="borderbottom">
                    <td>真实账号</td>
                    <td class="borderright"><input type="text" id="real_account" name="real_account" value="<?php if(@$search['real_account'])echo @$search['real_account'];elseif(@$search['rc_real_account']) echo @$search['rc_real_account'];else echo '';?>" /></td>
                    <td>账户类别</td>
                    <td class="borderright">
                        <select name="account_type" id="account_type">
                            <option value="">全部</option>
                            <?php echo @$this->member_params_model->get_parm_option('账户类别',$search['account_type']);?>
                        </select>
                    </td>
                    <td>模拟账号</td>
                    <td class="borderright"><input type="text" id="demo_account" name="demo_account" value="<?php echo @$search['demo_account'];?>"></td>
                    <td>MGM</td>
                    <td class="borderright"><input type="text" id="member_MGM" name="member_MGM" value="<?php echo @$search['member_MGM'];?>"></td>
                    <td colspan="2" class="borderright">
                    	<label><input type="checkbox" name="qq_addfriend" id="qq_addfriend" value="1" 
                    	<?php echo @($search['qq_addfriend']==1)?"checked='checked'":"";?> />未添加QQ</label>
                    	<label><input type="checkbox" name="weixin_addfriend" id="weixin_addfriend" value="1"<?php echo @($search['weixin_addfriend']==1)?"checked='checked'":"";?> />未添加微信</label>
                    	<label style="margin-left:15px">微信 <input type="text" id="member_weixin" value="<?php echo @$search['member_weixin'];?>" name="member_weixin"></label>
                   	</td>
                    <td colspan="2">
	                	 <select name="is_upgrade" id="is_upgrade" style="width:70px; float:left;margin-right: 4px">
	                        <option value="0" >夹升级</option>
	                        <option value="1" >已升级</option>
                   		 </select>
	                	 <select name="is_operation" id="is_operation" style="width:70px;float:left;">
	                        <option value="0" >夹操作</option>
	                        <option value="1" >已操作</option>
                   		 </select>
                    </td>
                </tr>
                <tr>
                    <td>开始时间</td>
                    <td class="borderright"><input id="time_start" type="text" name="time_start" value="<?php echo @($search['time_start'])?$search['time_start']:date('Y-m-d 00:00:00');?>" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" /></td>
                    <td>结束时间</td>
                    <td class="borderright"><input id="time_end" type="text" name="time_end" value="<?php echo @($search['time_end'])?$search['time_end']:date('Y-m-d 23:59:59');?>" onclick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" /></td>
                    <td colspan="4" class="borderright">
                        <label><input type="radio" name="time_type" id="search_by_create_time" value="create_time"<?php echo @($search['time_type']=='create_time')?"checked='checked'":"";?> />建立时间</label>
                        <label><input type="radio" name="time_type" id="search_by_update_time" value="update_time" 
                        <?php echo @($search['time_type']=='update_time')?"checked='checked'":"";?> />修改时间</label>
                        <label><input type="radio" name="time_type" id="search_by_call_start_time" value="call_start_time"<?php echo @($search['time_type']=='call_start_time')?"checked='checked'":"";?> />电销预约</label>
                        <label><input type="radio" name="time_type" id="search_by_wen_order_time" value="wen_order_time"<?php echo @($search['time_type']=='wen_order_time')?"checked='checked'":"";?> />文销预约</label>
                        <label><input type="radio" name="time_type" id="search_by_open_time" value="open_time"<?php echo @($search['time_type']=='open_time')?"checked='checked'":"";?> />开户时间</label>
                        <label><input type="radio" name="time_type" id="search_by_null" value="" <?php echo @($search['time_type']=='')?"checked='checked'":"";?> />不勾选</label>
                    </td>
                    <td colspan="2" class="borderright">
						<label><input type="radio" name="today_call_start_time" id="today_call_start_time" value="1" <?php echo @($search['today_call_start_time']==1)?"checked='checked'":"";?> />当天电销预约</label>
						<label><input type="radio" name="today_call_start_time" id="call_start_time_null" value="2" <?php echo @($search['today_call_start_time']==2)?"checked='checked'":"";?>  />没有电销预约</label>
                        <label><input type="radio" name="today_call_start_time" id="key_reser_time" value="3" <?php echo @($search['today_call_start_time']==3)?"checked='checked'":"";?> />重点预约</label>
                    	<label><input type="checkbox" name="today_wen_order_time" id="today_wen_order_time" value="1" <?php echo @($search['today_wen_order_time']==1)?"checked='checked'":"";?> />当天文销预约</label></td>
					<td colspan="2">
                    	<label><input id="re_MGM" type="checkbox"  name="re_MGM" value="1" />MGM</label>
						<label><input id="is_income" type="checkbox" name="is_income" value="1" />将入金</label>
					</td>
					<td></td>
                </tr>
            </table>
    	</form>
    </div>
    <div class="scrollbar">
        <table width="100%" cellspacing="0">
          <thead class="titlelist">
            <tr>
            	<td style="width:40px; text-align:center;">ID</td>
                <td style="width:36px;">姓名</td>
                <td style="width:80px;">手机号码1</td>
                <td style="width:75px;">QQ1</td>
                <td style="width:25px;padding:0 2px;">添加</td>
                <td style="width:200px;">跟进记录</td>
                <td style="width:40px;">状态</td>
                <td style="width:50px;">负责人</td>
                <td style="width:50px;">建立时间</td>
                <td style="width:45px;">修改人</td>
                <td style="width:50px;">修改时间</td>
                <td style="width:70px;">MT4账户</td>
                <td style="width:50px">帐户类别</td>
                <td style="width:70px;">模拟账户</td>
                <td style="width:125px;">描述</td>
                <td style="width:70px;">电销预约</td>
                <td style="width:70px;">文销预约</td>
            </tr>
          </thead>
          <tbody class="itemlist lh24">
            <?php foreach($result as $item):?>
            <tr>
                <td  class="ids">
                 <a href="javascript:void(0)" onclick="editBoxShow(<?php echo $page.' , '.$item['member_id'];?>)"><?php echo $item['member_id'];?></a>
                </td>
                <td><?php echo $item['member_name'];?></td>
                <td><?php echo $item['member_phone'];?></td>
                <td><?php echo $item['member_qq'];?></td>
                <td align="center"><input type="checkbox" style="margin:0;" disabled="disabled" name="member_qq_addfriend" value="1" <?php echo ($item['member_qq_addfriend']==1)?"checked='checked'":"";?>></td>
                <td class="wrap_tab">
                    <table cellpadding="0" cellspacing="0" class="inside_tab">
                	<?php foreach($this->member_follow_model->get_follow_records($item['member_id']) as $k=>$record):?>
                    <?php if($k > 4) break;?>
                    	<tr <?php if($this->user_list_model->getUserGlobal($record['follower'],"user_limits")==4)
                    		echo "class='backyellow'";elseif($this->user_list_model->getUserGlobal($record['follower'],"user_limits")==2)echo 'class="bgl"';else echo '';?>>
                    	<td width="75"><?php echo $record['follow_time'];?></td>
                    	<td width="50"><?php echo fcutstr($record['follow_type'],0,6,false);?></td>
                    	<td width="80" title="<?php echo $record['follow_info'];?>"><?php echo fcutstr($record['follow_info'],0,11,false);?></td>
                    	</tr>
                    <?php endforeach;?>
                    </table>
                </td>
                <td><?php echo $item['member_status'];?></td>
                <td><?php echo $this->user_list_model->getUserGlobal($item['sales_man']);?></td>
                <td><?php echo $item['create_time'];?></td>
                <td><?php echo $this->user_list_model->getUserGlobal($item['updater']);?></td>
                <td><?php echo $item['update_time'];?></td>
                <td><?php echo $item['real_account'];?></td>
                <td><?php echo $item['account_type'];?></td> 
                <td><?php echo $item['demo_account'];?></td>
                <td title="<?php echo $item['member_info'];?>"><?php echo fcutstr($item['member_info'],0,28,false);?></td>
                <td <?php echo $item['key_reser_time']?"id='bggreed'":'';?> 
                <?php echo (substr($item['call_start_time'],0,10) < date('Y-m-d'))?"class='red'":"";echo (substr($item['call_start_time'],0,10) == date('Y-m-d'))?"class='blue'":"";?>>
                <?php echo str_replace(" ","<br>",$item['call_start_time']);?>
                </td>
                <td <?php echo (substr($item['wen_order_time'],0,10) < date('Y-m-d'))?"class='red'":"";echo (substr($item['wen_order_time'],0,10) == date('Y-m-d'))?"class='blue'":"";?>>
                <?php echo str_replace(" ","<br>",$item['wen_order_time']);?>
                </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    </div>
    <div class="selectbar"></div>
    <div class="toolbar"><?php echo $pages; ?></div>
</div>
<!--修改页面-->
<div class="graybg"> </div>
<div id="editBox">
	<iframe id="edit_member_account" name="edit_member_account" frameborder="0" scrolling="no" src="" height="100%" width="100%"></iframe>
</div>
</body>
</html>

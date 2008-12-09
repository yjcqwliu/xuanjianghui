
var g_blinkid = 0;
var g_blinkswitch = 0;
var g_blinktitle = document.title;
var g_onlineuser = "";
var g_sysmsg_sound = null;
var g_newmsg_sound = null;
var g_app_num = 0;
var g_appnum = 0;
var g_bappmore = false;

function blinkNewMsg()
{
	html1 = "<a href=/msg/ class=n style='margin-top:-5px;'><img src='http://img.kaixin001.com.cn/i/ddtx_y.gif' onmouseover='javascript:xs(4);' border=0></a>";
	html2 = "<a href=/msg/ class=n style='margin-top:-5px;'><img src='http://img.kaixin001.com.cn/i/ddtx_g.gif' onmouseover='javascript:xs(4);' border=0></a>";
	
	$("head_msgdiv").innerHTML = g_blinkswitch % 2 ? html2 : html1;
	
	document.title = g_blinkswitch % 2 ? "【　　　】 - " + g_blinktitle : "【新消息】 - " + g_blinktitle;
	
	g_blinkswitch++;
}

function blinkOnline()
{
	document.title = g_blinkswitch % 2 ? "○" + g_onlineuser + " 上线了 - " + g_blinktitle : "●" + g_onlineuser + " 上线了 - " + g_blinktitle;
	
	g_blinkswitch++;
	
	if (g_blinkswitch > 10)
	{
		stopBlinkNewMsg();
	}
}

function checkNewMsg()
{
	var url = "/home/newmsg.php";
	var pars = "";
	var myAjax = new Ajax.Request(url, {method: "post", parameters: pars, onComplete: function (req) { checkNewMsgShow(req); } });
}

function stopBlinkNewMsg()
{
	if (g_blinkid)
	{
		clearInterval(g_blinkid);
		g_blinkid = 0;
		$("head_msgdiv").innerHTML = "";
		document.title = g_blinktitle;
	}
}

var g_oldmsg = g_oldsysmsg = g_oldbbs = g_oldbbsreply = g_oldcomment = g_oldreply = 0;
function checkNewMsgShow(req)
{
	var r = req.responseText;
	stopBlinkNewMsg();
	setTimeout(checkNewMsg, 60000);
	
	eval ("r="+r);

	var a_msglist = new Array("msg", "sysmsg", "bbs", "bbsreply", "comment", "reply");
	if(r.notice == "1")
	{
		var forbidsound = parseInt(r.forbidsound);
		if (!forbidsound)
		{
			for (i=0; i<a_msglist.length; i++)
			{
				if ($("body_" + a_msglist[i] + "_num"))
				{
					var c = parseInt($("body_" + a_msglist[i] + "_num").innerHTML);
					eval("g_old" + a_msglist[i] + "=c;");
				}
			}

			var newmsg = parseInt(r.msg) + parseInt(r.bbs) + parseInt(r.bbsreply) + parseInt(r.comment) + parseInt(r.reply);
			var sysmsg = parseInt(r.sysmsg);
			
			var newchange = (parseInt(r.msg) - g_oldmsg)
				|| (parseInt(r.bbs) - g_oldbbs)
				|| (parseInt(r.bbsreply) - g_oldbbsreply)
				|| (parseInt(r.comment) - g_oldcomment)
				|| (parseInt(r.reply) - g_oldreply);
			var syschange = (parseInt(r.sysmsg) - g_oldsysmsg);

			for (i=0; i<a_msglist.length; i++)
			{
				eval("g_old" + a_msglist[i] + "=parseInt(r." + a_msglist[i] + ");");
			}

			if (newmsg && newchange)
			{
				if (g_newmsg_sound == null)
				{
					g_newmsg_sound = new SWFObject("http://img.kaixin001.com.cn/i2/newmsg_sound.1.0.swf", "newmsg_sound_swf", "1", "1", "8", "#ffffff", true);
					g_newmsg_sound.addParam("allowscriptaccess", "always");
					g_newmsg_sound.addParam("wmode", "opaque");
					g_newmsg_sound.addParam("menu", "false");
					g_newmsg_sound.addVariable("autoplay","0");
				}
				g_newmsg_sound.write("head_msgsound_div");
			}
			else if (sysmsg && syschange)
			{
				if (g_sysmsg_sound == null)
				{
					g_sysmsg_sound = new SWFObject("http://img.kaixin001.com.cn/i2/sysmsg_sound.1.0.swf", "sysmsg_sound_swf", "1", "1", "8", "#ffffff", true);
					g_sysmsg_sound.addParam("allowscriptaccess", "always");
					g_sysmsg_sound.addParam("wmode", "opaque");
					g_sysmsg_sound.addParam("menu", "false");
					g_sysmsg_sound.addVariable("autoplay","0");
				}
				g_sysmsg_sound.write("head_msgsound_div");
			}
		}
		g_blinkid = setInterval(blinkNewMsg, 1000);
	}
	else if (r.online.length)
	{
		g_blinkswitch = 0;
		g_onlineuser = r.online;
		g_blinkid = setInterval(blinkOnline, 500);
	}
	
	for (i=0; i<a_msglist.length; i++)
	{
		if (!parseInt(r[a_msglist[i]]))
		{
			$("head_" + a_msglist[i] + "_num").innerHTML = "";
			if ($("body_" + a_msglist[i] + "_num"))
			{
				$("body_" + a_msglist[i] + "_num").className = "ql2";
				$("body_" + a_msglist[i] + "_num").innerHTML = "0条新";
			}
		}
		else
		{
			$("head_" + a_msglist[i] + "_num").innerHTML = "(" + r[a_msglist[i]] + ")";
			if ($("body_" + a_msglist[i] + "_num"))
			{
				$("body_" + a_msglist[i] + "_num").className = "cr";
				$("body_" + a_msglist[i] + "_num").innerHTML = r[a_msglist[i]] + "条新";
			}
			
			if (a_msglist[i] == "msg")
			{
				if ('function' == typeof(msg_view_checkNewMsg))
				{
					msg_view_checkNewMsg();
				};
			}
		}
	}
}

function outputHead()
{
	var v_html = 
'<div id="head">'
+'	<div class="hd">'
+'		<div class="h1 wl1" style="margin-top:3px;">'
+'			<div style="padding-left:18px;"><a href="/" class="cf" title="开心网"><img src="http://img.kaixin001.com.cn/i2/kaixinlogo.gif" alt="开心网" width="106" height="36" /></a></div>'
+'		</div>'
+'		<div class="h2">'
+'			<div id="hn1" class="hn_of">'
+'				<div class="hn_tt"><a href="javascript:window.location=\'/home/?t=\' + Math.ceil(Math.random() * 100)" class="n">首页</a></div>'
+'				<div class="hn_sj"><a href="javascript:xs(1);" class="sj"><img src="http://img.kaixin001.com.cn/i/r_sj.gif" width="15" height="20" /></a></div>'
+'				<div class="c"></div>'
+'				<div id="hn1_l" class="hn_l">'
+'					<div><a href="/home/" class="hnm">我的首页</a></div>'
+'					<div class="l1_h">&nbsp;</div>'
+'					<div class="c9 m0_15">我的首页预览：</div>'
+'					<div>'
+'						<a href="/home/?_preview=friend" class="hnm" target=_blank onclick="javascript:hy();">'
+'						<div class="l" style="margin:5px 3px;"><img src="http://img.kaixin001.com.cn/i/small-tri.gif" width="3" height="5" /></div>'
+'						<div class="l"  style="cursor:pointer;">好友访问时</div>'
+'						<div class="c"></div>'
+'						</a>'
+'					</div>'
+'					<div class="mb10">'
+'						<a href="/home/?_preview=other" class="hnm" target=_blank onclick="javascript:hy();" >'
+'						<div class="l"  style="margin:5px 3px;"><img src="http://img.kaixin001.com.cn/i/small-tri.gif" width="3" height="5" /></div>'
+'						<div class="l"  style="cursor:pointer;">陌生人访问时</div>'
+'						<div class="c"></div>'
+'						</a>'
+'					</div>'
+'				</div>'
+'			</div>'
+'			<div id="hn_xx1" class="hn_xx"><img src="http://img.kaixin001.com.cn/i/r_xx13.gif" width="1" height="13" /></div>'
+'			'
+'			<div id="hn2" class="hn_of">'
+'				<div class="hn_tt"><a href="javascript:window.location=\'/friend/?t=\' + Math.ceil(Math.random() * 100)" class="n">好友</a></div>'
+'				<div class="hn_sj"><a href="javascript:xs(2);" class="sj"><img src="http://img.kaixin001.com.cn/i/r_sj.gif" width="15" height="20" /></a></div>'
+'				<div class="c"></div>'
+'				<!--'
+'				<iframe style="position:absolute;z-index:1;width:expression(this.nextSibling.offsetWidth);height:expression(this.nextSibling.offsetHeight);top:expression(this.nextSibling.offsetTop);left:expression(this.nextSibling.offsetLeft);" frameborder="0" ></iframe>'
+'				-->'
+'				<div id="hn2_l" class="hn_l" style="z-index:2">'
+'					<div><a href="/friend/" class="hnm">我的全部好友</a></div>'
+'					<div><a href="/friend/?viewtype=online" class="hnm">当前在线好友</a></div>'
+'					<div><a href="/friend/status.php" class="hnm">好友状态更新</a></div>'
+'					<div><a href="/friend/group.php" class="hnm">好友管理</a></div>'
+'					<div class="l1_h">&nbsp;</div>'
+'					<div><a href="/friend/invite.php" class="hnm">邀请朋友加入</a></div>'
+'					<div><a href="/find/" class="hnm">查找</a></div>'
+'				</div>'
+'			</div>'
+'			<div id="hn_xx2" class="hn_xx"><img src="http://img.kaixin001.com.cn/i/r_xx13.gif" width="1" height="13" /></div>'
+'		'
+'			<div id="hn3" class="hn_of">'
+'				<div class="hn_tt"><a href="javascript:window.location=\'/group/?t=\' + Math.ceil(Math.random() * 100)" class="n">群</a></div>'
+'				<div class="hn_sj"><a href="javascript:xs(3);" class="sj"><img src="http://img.kaixin001.com.cn/i/r_sj.gif" width="15" height="20" /></a></div>'
+'				<div class="c"></div>'
+'				<div id="hn3_l" class="hn_l">'
+'					<div><a href="/group/" class="hnm">我的群</a></div>'
+'					<div><a href="/group/flist.php" class="hnm">好友的群</a></div>'
+'					<div class="l1_h">&nbsp;</div>'
+'					<div><a href="/group/new.php" class="hnm">创建新群</a></div>'
+'					<div><a href="/group/search.php" class="hnm">浏览全部群</a></div>'
+'				</div>'
+'			</div>'
+'			<div id="hn_xx3" class="hn_xx"><img src="http://img.kaixin001.com.cn/i/r_xx13.gif" width="1" height="13" /></div>'
+'		'
+'			<div id="hn4" class="hn_of" style="padding-right:28px;">'
+'				<div class="hn_tt"><a href="javascript:window.location=\'/msg/?t=\' + Math.ceil(Math.random() * 100)" class="n">消息</a></div>'
+'				<div class="hn_sj"><a href="javascript:xs(4);" class="sj"><img src="http://img.kaixin001.com.cn/i/r_sj.gif" width="15" height="20" /></a><span  style="position:absolute;top:5px; left:65px;" id=head_msgdiv></span></div>'
+'				<div class="c"></div>'
+'				<div id="hn4_l" class="hn_l">'
+'					<div><a href="javascript:window.location=\'/msg/inbox.php?t=\' + Math.ceil(Math.random() * 100)" class="hnm">短消息<span style="padding-left:2px;color:red;" id=head_msg_num></span></a></div>'
+'					<div><a href="javascript:window.location=\'/msg/sys.php?t=\' + Math.ceil(Math.random() * 100)" class="hnm"">系统消息<span style="padding-left:2px;color:red;" id=head_sysmsg_num></span></a></div>'
+'					<div class="l1_h">&nbsp;</div>'
+'					<div><a href="javascript:window.location=\'/comment/?t=\' + Math.ceil(Math.random() * 100)" class="hnm">评论<span style="padding-left:2px;color:red;" id=head_comment_num></span></a></div>'
+'					<div><a href="javascript:window.location=\'/comment/send.php?t=\' + Math.ceil(Math.random() * 100)" class="hnm">评论回复<span style="padding-left:2px;color:red;" id=head_reply_num></span></a></div>'
+'					<div><a href="javascript:window.location=\'/comment/uindex.php?t=\' + Math.ceil(Math.random() * 100)" class="hnm">留言板<span style="padding-left:2px;color:red;" id=head_bbs_num></span></a></div>'
+'					<div><a href="javascript:window.location=\'/comment/usend.php?t=\' + Math.ceil(Math.random() * 100)" class="hnm">留言回复<span style="padding-left:2px;color:red;" id=head_bbsreply_num></span></a></div>'
+'				</div>'
+'			</div>'
+'			<div id="hn_xx4" class="hn_xx"></div>'
+'			'
+'			<div class="c"></div>'
+'		</div>'
+'		<div class="h3"><a href="/friend/invite.php" class="ce">邀请</a> ┊ <a href="/set/account.php" class="ce">帐户</a> ┊ <a href="/set/privacy.php" class="ce">隐私</a> ┊ <a href="/login/logout.php" class="ce">退出</a></div>'
+'		<div class="c"></div>'
+'	</div>'
+'</div>'
+'<div id="head_msgsound_div" style="left:0;top:0;position:absolute;"></div>'
+'<div id="main">'
+'	<div class="m1 wl1">'
+'    	<div class="m1t"></div>'
+'    	<div id="app_friend_tip" style="z-index:20000;position:absolute;background:#fff;border:2px solid #F7F7F7;width:160px;height:250px;display:none;">'
+'		</div>';

	document.writeln(v_html);
}

function _outputApp(v_icon, v_link, v_title, v_aid, v_index_num)
{
	v_html = 
'<div class="m15" onmouseover="javascript:if(\'' + v_index_num + '\'==\'1\'){$(\'app_friend_' + v_aid + '\').style.display=\'block\';}" onmouseout="javascript:$(\'app_friend_' + v_aid + '\').style.display=\'none\';">'
+'	<div class="l"><img src="' + v_icon + '" width="28" height="24" align="absmiddle" /> <a href="' + v_link + '" class="sl" title="' + v_title + '" ><b class="f14">' + v_title + '</b></a></div>'
+'	<div class="l" id="app_friend_' + v_aid + '" style="display:none;padding:8px 3px;cursor:pointer;" onclick="javascript:a_appfriend_show(' + v_aid + ' , \'' + v_link + '\' , \'' + v_title + '\');"><img src="http://img.kaixin001.com.cn/i2/xiasanjiao.gif" width="7" height="4" alt="快速查看你所有好友的' + v_title + '内容" align="absmiddle" /></div>'
+'	<div class="c"></div>'
+'</div>';

	return v_html;
}

function outputApp(v_icon, v_link, v_title, v_aid, v_index_num)
{
	document.writeln(_outputApp(v_icon, v_link, v_title, v_aid, v_index_num));
}

function _setApplistHiddenHead()
{
	if (g_app_num==-1) return '';
	g_appnum++;
	if (g_appnum>g_app_num && !g_bappmore)
	{
		g_bappmore = true;
		return '<span id=applistmore style="display:none">';
	}
	return '';
}

function setApplistHiddenHead()
{
	document.writeln(_setApplistHiddenHead());
}

function _setApplistHiddenTail()
{
	if (g_app_num==-1) return '';
	if (g_bappmore)
	{
		return '</span><div id=applistscroll class="tar" style="margin-top:-10px;"><img src="http://img.kaixin001.com.cn/i2/xiala.gif" width="5" align="absmiddle"> <a href="javascript:;" onclick="javascript:showAppmore()" class="sl-gray"  style="text-decoration:none;" title="列出我的全部组件">展开</a>&nbsp;&nbsp;</div>';
	}
	return '';
}

function setApplistHiddenTail()
{
	document.writeln(_setApplistHiddenTail());
}

function outputHead2()
{
	document.write('<div class="tac mb5"><img src="http://img.kaixin001.com.cn/i/index_app.gif" width="120" height="2" /></div><div class="p5 m0_10"><img src="http://img.kaixin001.com.cn/i/index_app_add.gif" width="9" height="9" alt="添加组件" /> <a href="/app/list.php" class="sl-gray" style="text-decoration:none;">添加组件</a></div><div class="p5 m0_10" style="margin-top:-8px;"><img src="http://img.kaixin001.com.cn/i/index_app_set.gif" width="9" height="9" alt="组件设置" /> <a href="/set/appman.php" class="sl-gray" style="text-decoration:none;">组件设置</a></div></div>');
}

function showAppmore()
{
	if ($("applistmore").style.display=="none") 
	{
		$("applistmore").style.display="block";
		$("applistscroll").innerHTML = '<img src="http://img.kaixin001.com.cn/i2/shouqi.gif" width="5" align="absmiddle"> <a href="javascript:;" onclick="javascript:showAppmore()" class="sl-gray"  style="text-decoration:none;">收起</a>&nbsp;&nbsp;';
	}
	else
	{
		$("applistmore").style.display="none";
		$("applistscroll").innerHTML = '<img src="http://img.kaixin001.com.cn/i2/xiala.gif" width="5" align="absmiddle"> <a href="javascript:;" onclick="javascript:showAppmore()" class="sl-gray"  style="text-decoration:none;">展开</a>&nbsp;&nbsp;';
	}
}

function outputAppInfo()
{
	if (g_allapp_num > g_prevapp_num)
	{
		var url = "/app/left.php";
		var pars = "";
		var myAjax = new Ajax.Request(url, {method: "post", parameters: pars, onComplete: function (req) { outputAppInfoAjaxShow(req); } });
	}
}

function outputAppInfoAjaxShow(req)
{
	eval("data="+req.responseText);

	var v_html = '';
	for (var i=0; i<data.length; i++)
	{
		v_html += _setApplistHiddenHead();
		v_html += _outputApp(data[i]["icon"], data[i]["link"], data[i]["title"], data[i]["aid"], data[i]["index_num"]);
	}
	v_html += _setApplistHiddenTail();
	$("head_applist").innerHTML = v_html;
}

function outputTail()
{
	document.writeln('<div class="c"></div>'
+'</div>'
+'<div id="b">'
+'	<div class="b1"><a href="/s/about.html" class="c6" target="_blank">关于我们</a><span>┊</span><a href="/s/contact.html" class="c6" target="_blank">联系方式</a><span>┊</span><a href="/t/feedback.html" class="c6" target="_blank">意见反馈</a><span>┊</span><a href="/s/help.html" class="c6" target="_blank">帮助中心</a>　 &copy; 2008 kaixin001.com 内测版 <a class=c6 href=http://www.miibeian.gov.cn target=_blank>京ICP证080482号</a> </div>'
+'</div>');
}

function buyslave(slaveuid)
{
	if(typeof slaveuid == "undefined")
	{
		return false;
	}
        openWindow('../slave/buy_dialog/'+slaveuid+'?rand='+Math.random(), 460, 460, '购买奴隶');
}

function freeslave(slaveuid)
{
	if(typeof slaveuid == "undefined")
	{
		return false;
	}
        openWindow('../slave/free_dialog/'+slaveuid+'?rand='+Math.random(), 460, 460, '释放奴隶');
}

function freeself()
{
	openWindow('../slave/freeself_dialog?verify='+g_verify+'&rand='+Math.random(), 460, 460, '我要赎身');
}

function discountslave(slaveuid)
{
	if(typeof slaveuid == "undefined")
	{
		return false;
	}
        openWindow('../slave/discount_dialog/'+slaveuid+'?verify='+g_verify+'&rand='+Math.random(), 460, 460, '打折处理');
}

function painslave(slaveuid)
{
	if(typeof slaveuid == "undefined")
	{
		return false;
	}
        openWindow('../slave/pain_dialog/'+slaveuid+'?verify='+g_verify+'&rand='+Math.random(), 460, 460, '整奴隶');
}

function comfortslave(slaveuid)
{
	if(typeof slaveuid == "undefined")
	{
		return false;
	}
        openWindow('../slave/comfort_dialog/'+slaveuid+'?verify='+g_verify+'&rand='+Math.random(), 460, 460, '安抚奴隶');
}

function fawnHost(hostuid)
{
	if(typeof hostuid == "undefined")
	{
		return false;
	}
        openWindow('../slave/fawn_dialog?hostuid='+hostuid+'&verify='+g_verify+'&rand='+Math.random(), 460, 460, '讨好主人');
}

function sysmsg()
{
        openWindow('../slave/set_sysmsg?verify='+g_verify+'&rand='+Math.random(), 460, 460, '设置');
}

function giveslave(slaveuid)
{
	if(typeof slaveuid == "undefined")
	{
		return false;
	}
        openWindow('../slave/give_dialog/'+slaveuid+'?verify='+g_verify+'&rand='+Math.random(), 460, 460, '赠送奴隶');
}

function selslave()
{
        openWindow('../slave/selslave_dialog?rand='+Math.random(), 460, 460, '可买奴隶');
}

function invite()
{
	if(confirm('每邀请一位朋友加入开心网，奖励￥500\n\n\【请注意】\n\n  1、每天最多奖励 ￥5000 \n\n  2、本组件最多奖励 ￥15000 \n\n点击“确定”开始邀请'))
	{
		window.location.href = "/friend/invite.php";
	}
}


function refresh(url)
{
	if(typeof(url) == "undefined")
	{
		url = window.location.href;
		var length = url.length;
		if(url.substr(length-1 , 1) == "#")
		{
			url = url.substr(0 , length-1);
		}
		window.location.href = url;
		
	}
	else
	{
		window.location.href = url;
	}
}
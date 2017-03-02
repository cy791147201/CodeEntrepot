// 自定义ajax
// 参数一 地址
// 参数二 成功函数
// 参数三 失败函数
function ajax(url, fnSucc, fnFaild)
{
	//1.创建Ajax对象
	var oAjax=null;
	
	// window.  避免出错，仅仅是undifind
	if(window.XMLHttpRequest)
	{
		oAjax=new XMLHttpRequest();
	}
	else
	{
		oAjax=new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	//2.连接服务器
	oAjax.open('GET', url, true);
	
	//3.发送请求
	oAjax.send();
	
	//4.接收服务器的返回
	oAjax.onreadystatechange=function ()
	{
		// ajax请求完成
		if(oAjax.readyState==4)	//完成
		{
			// 返回状态码为成功
			if(oAjax.status==200)	//成功
			{
				// 调用成功函数
				fnSucc(oAjax.responseText);
			}
			else
			{
				// 如果失败
				// 存在参数三失败函数的话，调用失败函数
				if(fnFaild)
					fnFaild(oAjax.status);
			}
		}
	};
}
// js完美运动框架
// 获取对象属性
function getStyle(obj, attr)
{
	if(obj.currentStyle)
	{
		return obj.currentStyle[attr];
	}
	else
	{
		return getComputedStyle(obj, false)[attr];
	}
}

// 开始运动
function startMove(obj, json, fn)
{
	// 清除定时器
	clearInterval(obj.timer);
	
	// 设置定时器
	obj.timer=setInterval(function (){
		// 假设所有的属性到达指定
		var bStop=true;		
		// 循环修改属性
		for(var attr in json)
		{
			var iCur=0;
			
			// 如果是透明度的话单独处理
			if(attr=='opacity')
			{
				iCur=parseInt(parseFloat(getStyle(obj, attr))*100);
			}
			else
			{
				iCur=parseInt(getStyle(obj, attr));
			}

			var iSpeed=(json[attr]-iCur)/8;
			iSpeed=iSpeed>0?Math.ceil(iSpeed):Math.floor(iSpeed);

			// 判断如果有属性没有到达指定，设置标志为失败
			if(iCur!=json[attr])
			{
				bStop=false;
			}
			
			// 当杜处理透明度
			if(attr=='opacity')
			{
				obj.style.filter='alpha(opacity:'+(iCur+iSpeed)+')';
				obj.style.opacity=(iCur+iSpeed)/100;
			}
			else
			{
				obj.style[attr]=iCur+iSpeed+'px';
			}
		}
		
		// 判断如果所有的属性都到达指定，所有都为真，清除定时器
		if(bStop)
		{
			clearInterval(obj.timer);
			
			if(fn)
			{
				fn();
			}
		}
	}, 30)
}
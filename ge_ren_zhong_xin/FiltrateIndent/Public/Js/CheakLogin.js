// 检测表单用户信息输入框是否剖正确
function CheckIn()
{
    var oUser = document.form.user.value;
    var oPwd = document.form.pwd.value;
    var oDiv = document.getElementById('hidden');

    if(/^[a-zA-Z\d]{6,11}$/.test(oUser) === false || oUser === '' || /^[a-zA-Z\d]{6,11}$/.test(oPwd) === false || oPwd === ''){
        // alert('请填写正确的用户信息');
        oDiv.style.display = 'block';
        return false;
    } 
}

// 清空提示信息
function ClearNotice()
{
    var oUser = document.getElementsByName('user')[0];
    var oPwd = document.getElementsByName('pwd')[0];
    var oDiv = document.getElementById('hidden');

    // if(oUser && oPwd && oDiv)
    // {
        oUser.onmouseover = oPwd.onmouseover = function()
        {
            oDiv.style.display = 'none';
        }
    // }
}

window.onload = function()
{   
    ClearNotice();
}

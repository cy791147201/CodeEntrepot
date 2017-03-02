window.onload = function()
{
    alert(11);
    GetFileName();
}
// 检测上传文件名
function GetFileName()
{
    alert(111);
    document.getElementById('file').onchange = function () 
    {
        document.getElementById('FileName').innerHTML = this.value;
    };
}
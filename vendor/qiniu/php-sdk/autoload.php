<?php
// 引入鉴权类
use Qiniu\Auth;
// 引入上传类
use Qiniu\Storage\UploadManager;

function classLoader($class)
{
    $path = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $file = __DIR__ . '/src/' . $path . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
}

function qiniu_upload($filePath)
{
    // 需要填写你的 Access Key 和 Secret Key
    $accessKey = '-';
    $secretKey = '-';
    $bucket = '';
// 构建鉴权对象
    $auth = new Auth($accessKey, $secretKey);
// 生成上传 Token
    $token = $auth->uploadToken($bucket);
// 上传到七牛后保存的文件名
    $key = basename($filePath);
// 初始化 UploadManager 对象并进行文件的上传。
    $uploadMgr = new UploadManager();
// 调用 UploadManager 的 putFile 方法进行文件的上传。
    $uploadMgr->putFile($token, $key, $filePath);

    unlink($filePath); //删除本地图片
}


spl_autoload_register('classLoader');

require_once  __DIR__ . '/src/Qiniu/functions.php';

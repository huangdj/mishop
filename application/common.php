<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 引入鉴权类
use Qiniu\Auth;
// 引入上传类
use Qiniu\Storage\UploadManager;

/***
 * 密码处理
 * @param $password
 * @return bool|string
 */
function set_password($password)
{
    return substr(md5($password), 6, 10);
}


/**
 * 截取, 并加上...
 * @param $string
 * @param $size
 * @param bool $dot 是否加上..., 默认true
 * @return string
 */
function sub($string, $size = 10, $dot = true)
{
    $string = strip_tags(trim($string));
    if (strlen($string) > $size) {
        $string = mb_substr($string, 0, $size);
        $string .= $dot ? '...' : '';
        return $string;
    }

    return $string;
}

function upload_qiniu($filePath)
{
    // 需要填写你的 Access Key 和 Secret Key
    $accessKey = env('accessKey');
    $secretKey = env('secretKey');
    $bucket = env('bucket');
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

/***
 * 改变属性
 * @param $model
 * @param $attr
 * @return string
 */
function change_attr($model, $attr)
{
    if ($model->$attr && $model->$attr != "") {
        return '<span class="am-icon-check change_attr" data-attr="' . $attr . '"></span>';
    }

    return '<span class="am-icon-close change_attr" data-attr="' . $attr . '"></span>';
}


/**
 * 微信菜单, 删除空数组
 * @param $buttons
 */
function wechat_menus($request_buttons)
{
    $buttons = [];

    foreach ($request_buttons as $key => $value) {
        if ($value['name'] == "") {
            continue;
        }

        $buttons["$key"] = wechat_key_url($value);

        foreach ($value["sub_button"] as $k => $v) {
            if ($v['name'] == "") {
                continue;
            }
            $buttons["$key"]["sub_button"][] = wechat_key_url($v);
        }
    }
    return $buttons;
}

/**
 * 根据类型,返回url或者key
 * @param $value
 * @return array
 */
function wechat_key_url($value)
{
    $result = [];

    $result['type'] = $value['type'];
    $result['name'] = $value['name'];
    if ($value['type'] == "click") {
        $result['key'] = $value['value'];
    } else {
        $result['url'] = $value['value'];
    }
    return $result;
}

/***
 * 订单状态
 * @param $status
 * @return mixed
 */
function order_status($status)
{
    $info = \think\facade\Config::get('admin.order_status');
    return $info["$status"];
}

//返回成功信息的函数
function success_json($data, $message = '')
{
    $result = [
        'ok' => 1,
        'data' => $data,
        'message' => $message

    ];
    return json($result);
}

//返回错误信息的函数
function error_json($data = '', $message)
{
    $result = [
        'ok' => 0,
        'data' => $data,
        'message' => $message
    ];
    return json($result);
}

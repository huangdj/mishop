<?php

namespace app\auth\controller;

use app\common\model\User;
use think\Controller;
use think\Request;
use think\facade\Session;
use think\facade\Env;

class Qq extends Controller
{
    //登录地址
    public function login()
    {
        $app_id = '101874073';

        $redirect_uri = urlencode('https://mishop.holyzq.com/auth/qq/callback');
        $url = "https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=" . $app_id . "&redirect_uri=" . $redirect_uri . "&scope=get_user_info&state=text";
        $this->redirect($url);
    }

    //授权回调地址
    public function callback($code = null)
    {
        $app_id = '101874073';
        $app_secret = '54a75701ee861e8d79dd26469205f416';
        $my_url = urlencode('https://mishop.holyzq.com/auth/qq/callback');
        $token_url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=" . $app_id . "&redirect_uri=" . $my_url . "&client_secret=" . $app_secret . "&code=" . $code . "";
        //file_get_contents() 把整个文件读入一个字符串中。
        $response = file_get_contents($token_url);

        $params = array();
        //parse_str() 函数把查询字符串（'a=x&b=y'）解析到变量中。
        parse_str($response, $params);
        $graph_url = "https://graph.qq.com/oauth2.0/me?access_token=" . $params['access_token'] . "";
//        dump($graph_url);exit;

        $str = file_get_contents($graph_url);
//         dump($str);die;
        // --->找到了字符串：callback( {"client_id":"YOUR_APPID","openid":"YOUR_OPENID"} )
        // strpos() 函数查找字符串在另一字符串中第一次出现的位置，从0开始
        if (strpos($str, "callback") !== false) {
            $lpos = strpos($str, "(");
            // strrpos() 函数查找字符串在另一字符串中最后一次出现的位置。
            $rpos = strrpos($str, ")");
            //substr(string,start,length) 截取字符串某一位置
            $str = substr($str, $lpos + 1, $rpos - $lpos - 1);
        }
        // json_decode() 函数用于对 JSON 格式-->{"a":1,"b":2,"c":3,"d":4,"e":5}<--的字符串进行解码，并转换为 PHP 变量,默认返回对象
        $user = json_decode($str);
//         dump($user->openid);die;

        //Step4: 调用OpenAPI接口,得到json数据，要转换为数组

        $info = "https://graph.qq.com/user/get_user_info?access_token=" . $params['access_token'] . "&oauth_consumer_key=" . $app_id . "&openid=" . $user->openid . "";
        //加上true，得到数组，否则默认得到对象
        $res = json_decode(file_get_contents($info), true);
//        dump($res);
//        die;
        $re = User::where(array('openid' => $user->openid))->find();
//        dump($re);
//        die;
        //如果没有找到，进行注册
        if (!$re) {
            $res['gender'] = $res['gender'] == "男" ? 1 : 0;
            $result = User::create([
                'openid' => $user->openid,
                'name' => $res['nickname'],
                'image' => $res['figureurl_qq_2'],
                'sex' => $res['gender'],
                'province' => $res['province'],
                'city' => $res['city'],
                'year' => $res['year'],
            ]);

            Session::set('user', $result);
            $this->success('登录成功！', url('/admin/Index/index'));
        } else {
            Session::set('user', $re);
            $this->success('登录成功！', url('/admin/Index/index'));
        }
    }
}
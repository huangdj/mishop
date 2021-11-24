ThinkPHP5.1+微信公众号+vue.js 实现长乐衣品汇

## 功能模块

一、后台

1. 登录、多字段登录，验证码的实现

2. 商品品牌（表名：brand）
   字段：id、name、url、description、is_show、sort
   
   开发方式：使用TP5自带的Db方式开发，无需创建模型，实现增删改查。
   
3. 商品分类（表名：category）
   字段：id、parent_id、name、photo_id、sort 
    
   开发方式：自定义模型，使用TP5封装的ORM来实现数据库的基本操作。
   
4. 项目图片（表名：photo）

   字段：id、image 
   
5. 商品管理（表名：product）

   字段：brand_id、photo_id、name、price、is_top、is_recommend、is_hot、is_new、is_onsale、stock、sort、content、created_at、updated_at  
   
6. 商品分类表，即中间表（表名：category_product）

   字段：category_id、product_id
   
7. 商品相册（表名：product_gallery）  
 
   字段：product_id、img         
   
> 商品与商品分类多对多关系，每个商品可以属于多个分类，每个分类有很多商品

> 每个商品有很多相册，即一对多关系

> 每个商品属于一个品牌，即一对一关系

> 每个商品有一个缩略图，即一对一关系

当商品管理的基本增删改查完成后，还要实现商品的各种搜索，商品属性勾叉的处理，多选删除代码模块优化、品牌和分类首页对应的商品。

8. 商品回收站，直接根据tp5.1文档进行自行开发，这个功能比较简单。

9. 广告分类（表名：advert_category）

   字段：id、name、sort
   
> 此模块页面使用模态框，功能全部使用ajax实现无刷新，注意自动时间戳的用法。

10. 广告管理（表名：advert） 

    字段：id、category_id、title、photo_id、url、sort
    
11. 公众号管理---微信菜单

参考文档：https://github.com/qiqizjl/think-wechat

> 此模块注重tp5模板语法的锻炼，cache 缓存和 try cache 抛出异常的用方法。


12. 开发前台

基础页面功能：广告轮播图、三个焦点图、商品列表、商品详情、加入购物车，购物车数量增减
    
> 首页实现滑动加载更多
    
> 购物车模型封装计算总金额，静态方法的使用

> 购物车设置和获取用户ID等信息。使用tp5.1全局中间件 

(1)、创建中间件：

```php
php think make:middleware Wechat
```  

(2)、设置一个假的用户，并存入session

```php
public function handle($request, \Closure $next)
{
    // 如果没有用户，先设置一个假的用户
    if (!Session::get('wechat.customer')) {
        $customer = \app\common\model\Customer::find(63);
        Session::set('wechat.customer', $customer);
    }

    return $next($request);
}
```

(3)、中间件的使用，在需要调用中间件的控制器中：

```php
protected $middleware = ['Wechat']; // 全局中间件

protected $middleware = [
    'Wechat' => ['except' => ['notify']],   // 排除notify方法，不走中间件
];
```

> 用户默认地址如何设置，使用Session机制

13. 项目与微信对接

在 `index/Controller` 里面创建 `Wechat.php` 控制器，里面创建 `index` 方法，设置自动回复消息：

```php
public function index()
{
    // 先初始化微信
    $app = app('wechat.official_account');
    $app->server->push(function ($message) {
        return '欢迎关注长乐衣品汇， 赶快进入商城逛逛吧~';
    });
    $app->server->serve()->send();
}
```

然后修改中间件代码，直接参考源码，这里不贴出。中间件的逻辑其实就是获取微信授权用户信息，获取到后，把用户信息存入数据库表中，以及存入`session`

以微信测试号为例，打开微信公众号测试平台，填写接口配置信息，配置接口地址和`token`，点击提交，配置成功即可。
这时在浏览器中访问域名显示“请从微信端打开”，即为配置成功。 后台微信菜单管理设置菜单并填写菜单地址。开启 `config/Wechat.php` 里面的`OAuth`配置。 
在微信测试号页面找到 网页授权获取用户基本信息，修改里面的地址，如：`mishop.holyzq.com`
下载并安装微信开发者工具，后期所有调试在此工具中进行。

测试：打开微信，扫描二维码，看到“欢迎关注”即为成功。

14. 完成微信支付

15. 写前台接口，自定义模块和路由，跨域。。前台创建`vue`项目，安装好`axios`即可读取数据。

```php
// 终端命令行切换到前台用户根目录
cnpm install axios --save

// 安装完后，在`main.js`文件中引入`axios`

import axios from 'axios'
Vue.prototype.axios = axios;
```

在欢迎页面测试，接口数据是否能正常读取：

```php
<script>
import HelloWorld from '@/components/HelloWorld.vue'

export default {
  name: 'Home',
  components: {
    HelloWorld
  },
  data() {
    return {

    }
  },
  created() {
    this.init()
  },
  methods: {
    init() {
      //首页数据
      this.axios.get(`https://mishop.holyzq.com/api/home`)
              .then((res) => {
                console.log(res)
              })
    },
  }
}
</script>
```

16. 接口认证
(1)、安装`jwt-auth`包文件，参考文档：https://gitee.com/thans/jwt-auth

```php
composer require thans/tp-jwt-auth   # 安装

php think jwt:create    # 生成jwt.php和.env配置文件
```

(2)、使用方法

在 `route/route.php`文件中写上登录和注册的路由：

```php
Route::post('api/user/login', 'api/User/login')->allowCrossDomain();    // 后面的方法是允许跨域
Route::post('api/user/register', 'api/User/register')->allowCrossDomain();
```

创建对应控制器`User.php`，里面添加登录的方法，代码如下：

```php
use thans\jwt\facade\JWTAuth;

/***
 * 登录接口
 * @param Request $request
 * @return \think\response\Json
 */
public function login(Request $request)
{
    $name = $request->name;
    $password = set_password($request->password);

    if (!$name || !$password) {
        return json(['status' => false, 'message' => '请填写用户名或密码']);
    }

    $user = \app\common\model\User::where(['name'=> $name, 'password'=> $password])->find();

    if (!$user) {
        return json(['status' => false, 'message' => '该用户不存在']);
    }
    $array_user = $user->toArray();  // 把查出来的数据转换成数组
    $token = JWTAuth::builder($array_user);  // 调用JWTAuth认证方法生成token
    return json(['access_token' => $token, 'token_type' => 'Bearer', 'status' => true, 'message' => '登录成功']);
}
```

接下来在需要认证的接口路由中加上路由中间件，这里假如首页需要认证

```php
Route::get('api/home', 'api/Home/index')->allowCrossDomain()->middleware(thans\jwt\middleware\JWTAuth::class); // 首页
```

最后去对应的首页控制的`index`方法里打印用户信息：

```php
public function index()
{
    return JWTAuth::auth();
}

// 取值JWTAuth::auth()['id']
```

前台`vue.js` 中的登录页面去请求登录接口，把获取到的`token`存入`localstorage`里面，前端写拦截器判断客户端的`token`是否存在，不存在就跳到登录页面。















    
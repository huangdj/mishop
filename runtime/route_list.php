Route List
+---------------------------+----------------------------------------+--------+----------------------------------------+--------+
| Rule                      | Route                                  | Method | Name                                   | Domain |
+---------------------------+----------------------------------------+--------+----------------------------------------+--------+
| captcha/<id?>             | \think\captcha\CaptchaController@index | get    | \think\captcha\CaptchaController@index |        |
| backstage/admin           | backstage/Index/index                  | get    | backstage/Index/index                  |        |
| api/home/<id>             | api/Home/show                          | get    | api/Home/show                          |        |
| api/home                  | api/Home/index                         | get    | api/Home/index                         |        |
| api/home/get_products     | api/Home/get_products                  | post   | api/Home/get_products                  |        |
| api/cart                  | api/Cart/store                         | post   | api/Cart/store                         |        |
| api/cart                  | api/Cart/index                         | get    | api/Cart/index                         |        |
| api/cart                  | api/Cart/change_num                    | patch  | api/Cart/change_num                    |        |
| api/cart/<id>             | api/Cart/destroy                       | delete | api/Cart/destroy                       |        |
| api/user/login            | api/User/login                         | post   | api/User/login                         |        |
| api/user/register         | api/User/register                      | post   | api/User/register                      |        |
| backstage/brand           | backstage/brand/index                  | get    | backstage/brand/index                  |        |
| backstage/brand           | backstage/brand/save                   | post   | backstage/brand/save                   |        |
| backstage/brand/create    | backstage/brand/create                 | get    | backstage/brand/create                 |        |
| backstage/brand/<id>/edit | backstage/brand/edit                   | get    | backstage/brand/edit                   |        |
| backstage/brand/<id>      | backstage/brand/read                   | get    | backstage/brand/read                   |        |
| backstage/brand/<id>      | backstage/brand/update                 | put    | backstage/brand/update                 |        |
| backstage/brand/<id>      | backstage/brand/delete                 | delete | backstage/brand/delete                 |        |
+---------------------------+----------------------------------------+--------+----------------------------------------+--------+

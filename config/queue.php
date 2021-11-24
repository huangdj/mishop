<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: yunwuxin <448901948@qq.com>
// +----------------------------------------------------------------------

return [
    'REDIS_CLIENT' => 'predis',
    'REDIS_HOST' => '127.0.0.1',
    'connector' => 'redis'    // 这里默认是sync，是一个同步操作，我需要任务延迟执行，所以配置的redis，当然也可用database
];

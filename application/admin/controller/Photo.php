<?php

namespace app\admin\controller;

class Photo extends Common
{
    /***
     * 上传文件
     */
    public function upload()
    {
        $file = request()->file('image');
        $info = $file->move('./uploads');
        if ($info) {
            // 成功上传后 获取上传信息,上传到本地
//            $result['image_url'] = '/uploads/' . $info->getSaveName();
//            $photo = \app\common\model\Photo::create(['image' => $result['image_url']]);
//            $result['photo_id'] = $photo->id;
//            return $result;

            // 上传到七牛
            $filePath = getcwd() . '/uploads/' . $info->getSaveName();  // 完整路径
            upload_qiniu($filePath); // 调用七牛方法上传
            $result['image_url'] = env('qiniuUrl') . $info->getFilename();
            $photo = \app\common\model\Photo::create(['image' => $result['image_url']]);
            $result['photo_id'] = $photo->id;
            return $result;
        } else {
            // 上传失败获取错误信息
            echo $file->getError();
        }
    }


}

<?php
/** 文件上传 不验证权限
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-04-16
 * Time: 14:48
 */
namespace app\admin\controller;
use app\admin\model\CourseModel;
use think\Controller;
class Upload extends  Controller

{
    /**
     * ajax上传图片
     * return array(view => '图片显示的url', 'value' => '数据库要存储的值')
     */
    public function upload_img()
    {
        //$_FILES,array('width' => 450, 'height' => 450) 缩略图有问题
        uploadImg();
    }

    /**
     * 上传图片 课程相关图片的上传
     * return array(view => '图片显示的url', 'value' => '数据库要存储的值')
     */
    public function courser_img()
    {
        uploadImg('file');
    }
    /**
     * 视频上传
     */
    // todo 视频上传问题
    public function up_video(){
        $file = request()->file('file');
        $static = config('img_url');
        $vedio = '.'.$static.'video';
        if(!is_dir($vedio)){
            mkdir($vedio,0777,true);
        }
        if($file){
            $info = $file->move($vedio);
            if($info){
                $fileName =  $info->getSaveName();
                $fileName = str_replace("\\",'/',$fileName);
                putMsg(1,$fileName);
            }else{
                putMsg(0,'系统错误');
            }
        }
    }
    /**
     * 单文件视频的删除 课程
     */
    public function ajax_del_video(){
        $video = input('param.url_vi');
        $rootUrl = '.'.config('img_url').'video/';
        $url = $rootUrl.$video;
        if(!$video){
            putMsg(0,'系统错误');
        }
        unlink($url);
        putMsg(1,'删除成功');
    }
    /**
     * 图片删除 课程
     */
    public function ajax_del_img(){
        $data = input('param.');
        if(!$data['id']){
            putMsg(0,'系统错误');
        }
        $courseModel = new CourseModel();
        $result = $courseModel->getOne($data['id']);
        $old_img = explode(',',$result['courser_img']);
        $del_img =$data['courser_img'];
        $key = array_search($del_img,$old_img);
        if(is_int($key)){
            unset($old_img[$key]);
            $arr['courser_img'] = implode(',', $old_img);
            $arr['id'] = $result['id'];
            $result = $courseModel->ediDataOne($arr,url('course/index'));
            if($result[0] == 0){
                putMsg(0,'删除失败');
            }
            removeUploadImage(array(
                array($del_img,300,150),
                array($del_img,600,600)
            ));
            putMsg(1,'删除成功');
        }
    }
}
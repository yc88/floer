<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-04-25
 * Time: 16:36
 */
namespace app\wx\controller;
use app\wx\model\CourseModel;
use think\Db;

class Course extends  Common
{
    /**
     * 课程详情数据获取
     */
    public function course_detail(){
        $cid = isset($_REQUEST['cid']) ? intval($_REQUEST['cid']) : null;
        if(!$cid){
            putMsg(0,'系统错误');
        }
        $courseModel = new CourseModel();
        $one = $courseModel->getOneData(array('id'=>$cid),'id,courser_name,courser_img,video_url');
        if($one['video_url']){
            $one['video_url'] = config('img_url').'/video/'.$one['video_url'];
        }
        if(!$one){
            putMsg(0,'系统错误');
        }
      $img = Db::table('fl_course_complete')->alias('s')->where(array('course_id'=>$one['id']))->field('s.id as s_id,s.*')->find();
        $arrImg = explode(',',$one['courser_img']);
        foreach($arrImg as $k => $v ){
            $arrImg[$k] = getImgName($v,600,600);
        }
        $img['graduation_photo'] = getImgName($img['graduation_photo'],1200,600);
        $img['diploma_photo'] = getImgName($img['diploma_photo'],1200,600);
        $img['production_photo'] = getImgName($img['production_photo'],1200,600);
        $img['course_photo'] = getImgName($img['course_photo'],1200,600);
        $img['learn_photo'] = getImgName($img['learn_photo'],1200,600);
        $img['course_detail_photo'] = getImgName($img['course_detail_photo'],1200,600);
        $img['teacher_detail'] = getImgName($img['teacher_detail'],1200,600);
        $one['courser_img'] =$arrImg;
       $arr =  array_merge($img,$one);
        putMsg(1,$arr);
    }
    /**
     * 选择课程  课程选择页面的课程下拉框
     */
    public function course_list(){
        $cid = $_REQUEST['cid'];
        $courseModel = new CourseModel();
        $checkCourse = $courseModel->getOneData(array('id'=>$cid),'id,courser_name,courser_price,depoit_price');
        $where = array('is_publish'=>1);
        $where['id'] = array('neq',$cid);
        $courseList = $courseModel->getList($where,'id,courser_name,courser_price,depoit_price','id ASC');
         array_unshift($courseList,$checkCourse);
        putMsg(1,$courseList);
    }

    /**
     * 获取当前的课程
     */
    public function course_list_one(){
        $cid = $_REQUEST['cid'];
        $courseModel = new CourseModel();
        $checkCourse = $courseModel->getOneData(array('id'=>$cid),'id,courser_name,courser_price,depoit_price');
        putMsg(1,$checkCourse);
    }
}
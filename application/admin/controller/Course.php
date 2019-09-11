<?php
/** 课程管理
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-04-14
 * Time: 17:19
 */
namespace app\admin\controller;


use app\admin\model\CourseCateModel;
use app\admin\model\CourseModel;
use app\admin\model\OrderModel;
use app\admin\model\TeacherModel;
use think\Db;

class Course extends  Base
{
    //课程列表
    public function index(){
        if(request()->isAjax()){
            $param = input('param.');
            $limit = $param['pageSize'];
            $offset = ($param['pageNumber'] - 1) * $limit;
            $where = [];
            $map = [];
            if (!empty($param['searchText'])) {
                $where['courser_name'] = ['like', '%' . $param['searchText'] . '%'];
            }

            $courseModel = new CourseModel();
            $teacherModel = new TeacherModel();
            $courseCateModel = new CourseCateModel();
            $selectResult = $courseModel->getIndexList($where, $offset, $limit,$map);
            foreach($selectResult as $key=>$vo){
                $teacher = $teacherModel->getOne($vo['teacher_id']);
                $vo['begins_time'] = date('Y-m-d H:i:s',$vo['begins_time']);
                $vo['is_publish'] = $vo['is_publish'] == 1 ? '已发布' : '未发布';
                $vo['teacher_id'] = $teacher['name_z'].'('.$teacher['name_z'].')';
                $vo['classify_id'] = $courseCateModel->getOne($vo['classify_id'])['classify_name'];
                $selectResult[$key]['operate'] = showOperate($this->makeButtonCourseAll($vo['id'],'course/coursedetail','course/editcourse','course/delcourse'));
            }
            $return['total'] = $courseModel->getListCount($where);  // 总数据
            $return['rows'] = $selectResult;
            putMsg1(1,$return);
        }
        return $this->fetch();
    }
    //课程详情
    public function coursedetail(){
        $courseCateModel = new CourseCateModel();
        $teacherModel = new TeacherModel();
        $courseModel = new CourseModel();
        $completeModel = Db::table('fl_course_complete');
        $id = input('param.');
        if(!$id){
            $this->error('系统错误');
        }
        $data = objToArray($courseModel->getOne($id));
        $teacher = objToArray($teacherModel->getAll(array('id'=>$data['teacher_id']),'id,name_z,name_y'));
        $classify = objToArray($courseCateModel->getAll(array('id'=>$data['classify_id']),'id,classify_name'));
        $photo = $completeModel->where(array('course_id'=>$id['id']))->find();
        $data['teacher_name'] = $teacher[0]['name_z'].'('.$teacher[0]['name_y'].')';
        $data['classify_name'] = $classify[0]['classify_name'];
        $data['imgarr'] = explode(',',$data['courser_img']);
        if(!empty($course['video_url'])){
            $data['video_type'] = explode(".", $course['video_url'])[1];
        }
            $this->assign([
                'data'=>$data,
                'photo' => $photo
            ]);
        return $this->fetch();
    }
    //添加课程
    public function addCourse(){
        $courseCateModel = new CourseCateModel();
        $teacherModel = new TeacherModel();
        $courseModel = new CourseModel();
        if(request()->isAjax()){
            $data = input('param.');
            $arr['begins_time'] = strtotime($data['startime']); //2018-04-18
            $arr['end_time'] = strtotime($data['endtime']);
            $video = $data['video'];
            if(!$data['classify_id']){
                putMsg(0,'请选择分类');
            }
            if(!$data['courser_name']){
                putMsg(0,'请填写课程名称');
            }
            if($courseModel->checkedNameUnique(array('courser_name'=>$data['courser_name']))){
                putMsg(0,'该名称已经存在');
            }
            if(!$data['courser_num']){
                putMsg(0,'请填写上课人数');
            }
            if(!preg_match('/^[0-9]+(.[0-9]{1,2})?$/', $data['courser_price'])){
                putMsg(0,'请正确输入价格,小数点保留两位');
            }
            if(!preg_match('/^[0-9]+(.[0-9]{1,2})?$/', $data['depoit_price'])){
                putMsg(0,'请正确输入价格,小数点保留两位');
            }
            $arr['classify_id'] = $data['classify_id'];
            $arr['teacher_id'] = $data['teacher_id'];
            $arr['courser_name'] = $data['courser_name'];
            $arr['courser_num'] = $data['courser_num'];
            $arr['courser_price'] = $data['courser_price']; //全额
            $arr['depoit_price'] = $data['depoit_price'];  //定金
            $arr['courser_detail'] = $data['courser_detail'];
            $arr['is_publish'] = $data['is_publish'];
            //视频上传
            if($video){
                $arr['video_url'] = $video;
            }
//            图片上传
            $img_arr = array();
//            课程介绍
            if($data['course_detail_photo']){
                $img_arr['course_detail_photo'] = extendImage($data['course_detail_photo'],'courseImg',array(array('width'=>1200,'height'=>600)));
            }
//            课程大纲
            if($data['learn_photo']){
                $img_arr['learn_photo'] = extendImage($data['learn_photo'],'courseImg',array(array('width'=>1200,'height'=>600)));
            }
//            课程大纲
            if($data['course_photo']){
                $img_arr['course_photo'] = extendImage($data['course_photo'],'courseImg',array(array('width'=>1200,'height'=>600)));
            }
            //导师简介
            if($data['teacher_detail']){
                $img_arr['teacher_detail'] = extendImage($data['teacher_detail'],'courseImg',array(array('width'=>1200,'height'=>600)));
            }
//            学员作品
            if($data['production_photo']){
                $img_arr['production_photo'] = extendImage($data['production_photo'],'courseImg',array(array('width'=>1200,'height'=>600)));
            }
//            学员毕业合照
            if($data['diploma_photo']){
                $img_arr['diploma_photo'] = extendImage($data['diploma_photo'],'courseImg',array(array('width'=>1200,'height'=>600)));
            }
//            学员毕业合照
            if($data['graduation_photo']){
                $img_arr['graduation_photo'] = extendImage($data['graduation_photo'],'courseImg',array(array('width'=>1200,'height'=>600)));
            }

            $imgUrl = array();
            if(isset($data['courser_img'])) {
                foreach ($data['courser_img'] as $k => $v) {
                    if (!empty($v)) {
                        $imgUrl[$k] = extendImage($v, 'courseImg', array(
                            array(
                                'width' => 350,
                                'height' => 180
                            ),
                            array(
                                'width' => 600,
                                'height' => 600
                            ),
                            array(
                                'width' => 1200,
                                'height' => 180
                            ),
                        ));
                    }
                }
            }
            $arr['courser_img'] = implode(',',$imgUrl);
            $arr['addtime'] = time();
            $arr['add_author'] = session('id');
            $result = $courseModel->insertCourse($arr,url('course/index'));
            if($result[0] == 0){
                putMsg(0,$result[1]);
            }
            $course_complete_model = Db::table('fl_course_complete');
            if(isset($img_arr)){
                $img_arr['course_id'] = $result[0];
                $img_arr['addtime'] = time();
                $course_complete_model->insert($img_arr);
            }
            putMsg(1,$result[1]);
        }
        $courseCate = $courseCateModel->getAll('','id,classify_name');
        $teacher = $teacherModel->getAll('','id,name_z,name_y');
        $this->assign([
            'courseCate'=>objToArray($courseCate),
            'teacher'=>objToArray($teacher)
        ]);
        return $this->fetch();
    }
    //编辑课程
    public function editCourse(){
        $id = input('param.id');
        if(!$id){
            $this->error('系统错误');
        }
        $courseCateModel = new CourseCateModel();
        $teacherModel = new TeacherModel();
        $courseModel = new CourseModel();
        $course_complete_model = Db::table('fl_course_complete');
        if(request()->isAjax()){
            $data = input('param.');
            $arr['begins_time'] = strtotime($data['startime']); //2018-04-18
            $arr['end_time'] = strtotime($data['endtime']);
            $video = $data['video'];
            if(!$data['courser_name']){
                putMsg(0,'请填写课程名称');
            }
            $checkedName = $courseModel->checkedNameUnique(array('courser_name'=>$data['courser_name']));
            if($checkedName && $data['id'] != $checkedName['id'] ){
                putMsg(0,'该名称已经存在');
            }
            if(!$data['courser_num']){
                putMsg(0,'请填写上课人数');
            }
            if(!preg_match('/^[0-9]+(.[0-9]{1,2})?$/', $data['courser_price'])){
                putMsg(0,'请正确输入价格,小数点保留两位');
            }
            if(!preg_match('/^[0-9]+(.[0-9]{1,2})?$/', $data['depoit_price'])){
                putMsg(0,'请正确输入价格,小数点保留两位');
            }

            $arr['id'] = $data['id'];
            $arr['classify_id'] = $data['classify_id'];
            $arr['teacher_id'] = $data['teacher_id'];
            $arr['courser_name'] = $data['courser_name'];
            $arr['courser_num'] = $data['courser_num'];
            $arr['courser_price'] = $data['courser_price']; //全额
            $arr['depoit_price'] = $data['depoit_price'];  //定金
            $arr['courser_detail'] = $data['courser_detail'];
            $arr['is_publish'] = $data['is_publish'];
            //视频上传
            if($video){
                $old_url = $courseModel->getOne($arr['id'])['video_url'];
                if($old_url && $video !== $old_url){
                    $rootUrl = '.'.config('img_url').'video/';
                    $url = $rootUrl.$old_url;
                    unlink($url);
                }
                $arr['video_url'] = $video;
            }
//            修改相关的课程 图片
            if(isset($data['complete_id'])){
                $course_complete_model1 = Db::table('fl_course_complete');
                $complete_id = $data['complete_id'];
                $complete_data = $course_complete_model1->where(array('id'=>$complete_id))->find();
                //            图片上传修改
                $img_arr = array();
               $newImg = $newImg1 = $newImg2 = $newImg3 = $newImg4 = $newImg5 = $newImg6 = '';
//            课程介绍
                if($data['course_detail_photo']){
                    $newImg5 = extendImage($data['course_detail_photo'],'courseImg',array(array('width'=>1200,'height'=>600)));
                    $img_arr['course_detail_photo'] = $newImg5;
                }
//            课程大纲
                if($data['learn_photo']){
                    $newImg4 = extendImage($data['learn_photo'],'courseImg',array(array('width'=>1200,'height'=>600)));
                    $img_arr['learn_photo'] = $newImg4;
                }
//            课程大纲
                if($data['course_photo']){
                    $newImg3 = extendImage($data['course_photo'],'courseImg',array(array('width'=>1200,'height'=>600)));
                    $img_arr['course_photo'] = $newImg3;
                }
                //导师简介
                if($data['teacher_detail']){
                    $newImg6 = extendImage($data['teacher_detail'],'courseImg',array(array('width'=>1200,'height'=>600)));
                    $img_arr['teacher_detail'] = $newImg6;
                }
//            学员作品
                if($data['production_photo']){
                    $newImg2 = extendImage($data['production_photo'],'courseImg',array(array('width'=>1200,'height'=>600)));
                    $img_arr['production_photo'] = $newImg2;
                }
//            学员毕业合照
                if($data['diploma_photo']){
                    $newImg1 = extendImage($data['diploma_photo'],'courseImg',array(array('width'=>1200,'height'=>600)));
                    $img_arr['diploma_photo'] = $newImg1;
                }
//            学员毕业合照
                if($data['graduation_photo']){
                    $newImg  = extendImage($data['graduation_photo'],'courseImg',array(array('width'=>1200,'height'=>600)));
                    $img_arr['graduation_photo'] = $newImg;
                }
                $img_arr['addtime'] = time();
                $img_arr['id'] = $complete_id;
                Db::table('fl_course_complete')->update($img_arr);
                if($newImg6){
                    removeUploadImage(array(array($complete_data['teacher_detail'],1200,600)));
                }
                if($newImg5){
                    removeUploadImage(array(array($complete_data['course_detail_photo'],1200,600)));
                }
                if($newImg4){
                    removeUploadImage(array(array($complete_data['learn_photo'],1200,600)));
                }
                if($newImg3){
                    removeUploadImage(array(array($complete_data['course_photo'],1200,600)));
                }
                if($newImg2){
                    removeUploadImage(array(array($complete_data['production_photo'],1200,600)));
                }
                if($newImg1){
                    removeUploadImage(array(array($complete_data['diploma_photo'],1200,600)));
                }
                if($newImg){
                    removeUploadImage(array(array($complete_data['graduation_photo'],1200,600)));
                }
            }
            $imgUrl = array();
            if(isset($data['courser_img'])) {
                if (isset($data['courser_img'])) {
                    foreach ($data['courser_img'] as $k => $v) {
                        if (!empty($v)) {
                            $imgUrl[$k] = extendImage($v, 'courseImg', array(
                                array(
                                    'width' => 350,
                                    'height' => 180
                                ),
                                array(
                                    'width' => 600,
                                    'height' => 600
                                ),
                                array(
                                    'width' => 1200,
                                    'height' => 180
                                ),
                            ));
                        }
                    }
                }
            }
            $sqlImg = $courseModel->getOne($arr['id'])['courser_img'];
            $sqlImg = explode(',',$sqlImg);
            foreach($sqlImg as $k => $v){
                $imgUrl[] = $v;
            }
            $arr['courser_img'] = implode(',',$imgUrl);
            $arr['addtime'] = time();
            $arr['add_author'] = session('id');
            $result = $courseModel->ediDataOne($arr,url('course/index'));
            if($result[0] == 0){
                putMsg(0,$result[1]);
            }
            putMsg(1,$result[1]);
        }
        $courseCate = $courseCateModel->getAll('','id,classify_name');
        $teacher = $teacherModel->getAll('','id,name_z,name_y');
        $course = objToArray($courseModel->getOne($id));
        $image_all = $course_complete_model->where(array('course_id'=>$id))->find();
        $course['imgarr'] = explode(',',$course['courser_img']);
        if(!empty($course['video_url'])){
            $course['video_type'] = explode(".", $course['video_url'])[1];
        }
        $this->assign([
            'courseCate'=>objToArray($courseCate),
            'teacher'=>objToArray($teacher),
            'course'=>$course,
            'image_all'=>$image_all
        ]);
        return $this->fetch();
    }
    //删除课程
    public function delCourse(){
        $id = input('param.');
        $courseModel = new CourseModel();
        $data = $courseModel->getOne($id);
        if(!$data){
            putMsg(0,'系统错误');
        }
        $orderModel = new OrderModel();
        $count = $orderModel->getListCount(array('course_id'=>$id['id']));
        if($count >= 1){
            putMsg(0,'用学员购买了此课程，你最后不删除该课程');
        }
        $courser_img = $data['courser_img'];
        $result = $courseModel->delDataOne($id);
        if($result[0] == 0){
            putMsg(0,$result[1]);
        }
        $courser_img = explode(',',$courser_img);
        foreach($courser_img as $k => $v){
            removeUploadImage(array(
                array($v,350,180),
                array($v,600,600),
                array($v,1200,180),
            ));
        }
        putMsg(1,$result[1]);
    }

    /**
     * 拼装操作按钮
     * @param $id
     * @return array
     */
    private function makeButtonCourseAll($id,$detailUrl,$editUrl,$delUrl)
    {
        return [
            '详情' => [
                'auth' => $detailUrl,
                'href' => url($detailUrl, ['id' => $id]),
                'btnStyle' => 'primary',
                'icon' => 'fa fa-paste'
            ],
            '编辑' => [
                'auth' => $editUrl,
                'href' => url($editUrl, ['id' => $id]),
                'btnStyle' => 'primary',
                'icon' => 'fa fa-paste'
            ],
            '删除' => [
                'auth' => $delUrl,
                'href' => "javascript:roleDel(" .$id .")",
                'btnStyle' => 'danger',
                'icon' => 'fa fa-trash-o'
            ]
        ];
    }

    //课程分类
    public function  courseClassify(){
        if(request()->isAjax()){
            $param = input('param.');
            $limit = $param['pageSize'];
            $offset = ($param['pageNumber'] - 1) * $limit;
            $where = [];
            if (!empty($param['searchText'])) {
                $where['classify_name'] = ['like', '%' . $param['searchText'] . '%'];
            }
            $cate = new CourseCateModel();
            $selectResult = $cate->getIndexList($where, $offset, $limit);
            foreach($selectResult as $key=>$vo){
                $vo['addtime'] = date('Y-m-d H:i:s',$vo['addtime']);
                $selectResult[$key]['operate'] = showOperate(makeButtonAll($vo['id'],'course/editclassify','course/delclassify'));
            }
            $return['total'] = $cate->getListCount($where);  // 总数据
            $return['rows'] = $selectResult;
            putMsg1(1,$return);
        }
        return $this->fetch();
    }

    //添加分类
    public function addClassify(){
        if(request()->isAjax()){
            $data = input('param.');
            $courseCateModel = new CourseCateModel();
            $data['addtime'] = time();
            if(!$data['classify_name']){
                putMsg(0,'请填写分类名称');
            }
            if($courseCateModel->checkedNameUnique(array('classify_name'=>$data['classify_name']))){
                putMsg(0,'该名称已经存在');
            }
            $result = $courseCateModel->insertDataOne($data,url('course/courseClassify'));
            if($result[0] == 0){
                putMsg(0,$result[1]);
            }
            putMsg(1,$result[1]);
        }
        return $this->fetch();
    }

    //编辑分类
    public function editClassify(){
        $id = input('param.id');
        $courseCateModel = new CourseCateModel();
        if(request()->isAjax()){
            $data = input('param.');
            $courseCateModel = new CourseCateModel();
            $data['addtime'] = time();
            if(!$data['classify_name']){
                putMsg(0,'请填写分类名称');
            }
          /*  if(!$data['course_price']){
                putMsg(0,'请输入价格');
            }
            if(!preg_match('/^[0-9]+(.[0-9]{1,2})?$/', $data['course_price'])){
                putMsg(0,'请正确输入价格,小数点保留两位');
            }*/
            $name_is = $courseCateModel->checkedNameUnique(array('classify_name'=>$data['classify_name']));
            if($name_is && $name_is['id'] != $data['id']){
                putMsg(0,'该名称已经存在');
            }
            $result = $courseCateModel->ediDataOne($data,url('course/courseClassify'));
            if($result[0] == 0){
                putMsg(0,$result[1]);
            }
            putMsg(1,$result[1]);
        }
        $this->assign([
            'courseCate' => $courseCateModel->getOne($id)
        ]);
        return $this->fetch();
    }

    //删除分类

    public function delClassify(){
        $id = input('param.id');
        $courseCateModel = new CourseCateModel();
        $courseModel = new CourseModel();
        $number = $courseModel->checkedCateSon($id);
        if($number >= 1 ){
            putMsg(0,'该分类下面还有课程，请重新操作'.$number);
        }
        $result = $courseCateModel->delDataOne($id);
        if($result[0] == 0){
            putMsg(0,$result[1]);
        }
        putMsg(1,$result[1]);
        return $this->fetch();
    }


}
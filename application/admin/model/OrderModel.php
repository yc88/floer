<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-04-18
 * Time: 10:28
 */
namespace app\admin\model;
use think\Db;

class OrderModel extends  CommonModel
{
    protected  $name = 'user_order';

    /**订单组装获取
     * @param null $id
     * @param string $order
     * @return false|\PDOStatement|string|\think\Collection
     */
    public function getOrderExcel($id = null,$order  = 'id DESC, oktime DESC'){
        if(strpos($id,",")){ //多个数据导出
            $result = $this->where(array('id'=>array('in',$id)))->order($order)->select();
            for($i = 0; $i < count($result); $i++){
//                $result[$i]['shop_id'] = getShopField($result[$i]['shop_id'],'shop_name');
//                $result[$i]['seller_id'] = get_user_name($result[$i]['seller_id']); //卖家ID
//                $result[$i]['buyer_id'] =get_user_name($result[$i]['buyer_id']);// 买家
//                $content = '未付款';  //状态
//                switch($result[$i]['status']){
//                    case 1:
//                        $content = '已付款';
//                        break;
//                    case 2:
//                        $content = '已发货';
//                        break;
//                    case 3:
//                        $content = '已收货';
//                        break;
//                    case 4:
//                        $content = '待退货';
//                        break;
//                    case 5:
//                        $content = '已退货';
//                        break;
//                    case 6:
//                        $content = '已完成';
//                        break;
//                    case 7:
//                        $content = '已取消';
//                        break;
//                }
//                $result[$i]['status'] =$content ;
//                $result[$i]['express_id'] = $expressModel->findFirst($result[$i]['express_id'])['name']; //快递信息
//                $result[$i]['add_time'] = date('Y年m月d日 H:i:s',$result[$i]['add_time']);
//                $result[$i]['receive_time'] = date('Y年m月d日 H:i:s',$result[$i]['receive_time']);
//                $result[$i]['pay_time'] = date('Y年m月d日 H:i:s',$result[$i]['pay_time']);
//                $result[$i]['reminder_time'] = date('Y年m月d日 H:i:s',$result[$i]['reminder_time']);
//                $result[$i]['buyer_hidden'] =  $result[$i]['buyer_hidden'] == 1 ? "是":"否";
//                $result[$i]['seller_hidden'] = $result[$i]['seller_hidden'] == 1 ? "是":"否";
//                switch($result[$i]['pay_type']){
//                    case 'weixinpay':
//                        $result[$i]['pay_type'] = '微信支付';
//                        break;
//                    case 'alipay':
//                        $result[$i]['pay_type'] = '支付宝支付';
//                        break;
//                    default:
//                        $result[$i]['pay_type'] = '余额支付';
//                }//付款方式
            }
        }else{ //单数据的导出
            $result = $this->where(array('id'=>$id))->find();
            $courseModel = new CourseModel();
            $residueModel = new ResidueModel();
            $course = $courseModel->getOne(array('id'=>$result['course_id']));
            $result['classify_name'] = Db::table('fl_course_cate')->where(array('id'=>$course['classify_id']))->field('id,classify_name')->find()['classify_name'];
            $user = Db::table('fl_user')->where('id',$result['buy_id'])->field('id,user_name,real_name')->find();
            $result['buy_id'] =$user['user_name'];
            $result['course_id'] = $course['courser_name'];
            $result['oktime'] =date("Y年m月d日 H:i:s",$result['oktime']); //付款时间
            $result['addtime'] =date("Y年m月d日 H:i:s",$result['addtime']); //付款时间
            $result['order_status'] = $result['order_status'] == 1 ? '未付款' : '已付款';
            $result['pay_type'] = $result['pay_type'] == 1 ? '微信支付' : '支付宝支付';
            $result['payment_type']  = $result['payment_type'] == 1 ? '全款':'定金';
            $result['is_del']  = $result['is_del'] == 1 ? '已删除':'未删除';
            $is_full_pay = $residueModel->cheked_is_full_pay($result['order_no']);
            $result['parting'] = $is_full_pay ? '||' : '';
            if($is_full_pay !== false){
                $result['residus_id'] = $is_full_pay['id'];
                $result['residus_buy_id'] = $user['user_name'];
                $result['residus_course_id'] = $course['courser_name'];
                $result['residus_order_no'] = $is_full_pay['order_no'];
                $result['residus_price'] = $is_full_pay['price'];
                $result['residus_total_money'] = $is_full_pay['total_money'];
                $result['residus_user_order_no'] = $is_full_pay['user_order_no'];
                $result['residus_oktime'] = date("Y年m月d日 H:i:s",$is_full_pay['oktime']); //付款时间;
                $result['residus_status'] = $is_full_pay['status'] == 1 ? '未付款' : '已付款';;
                $result['residus_pay_type'] = ($is_full_pay['pay_type'] == 1 ? '微信支付' : ($is_full_pay['pay_type'] == 2 ? '支付宝支付':'线下支付'));
                $result['residus_pay_type_no'] = $is_full_pay['pay_type_no'];
                $result['residus_edit_author'] = '';
                if($is_full_pay['pay_type'] == 3){
                    $result['residus_edit_author'] = Db::table('fl_user_admin')->where('id',$is_full_pay['edit_author'])->field('id,user_name')->find()['user_name'];
                }
            }
        }
        return objToArray($result);
    }

}
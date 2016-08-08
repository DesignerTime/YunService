<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/8/8
 * Time: 15:49
 */
use \LeanCloud\Engine\Cloud;
use \LeanCloud\LeanQuery;
use \LeanCloud\CloudException;
use \LeanCloud\LeanUser;
use \LeanCloud\LeanObject;

Cloud::define("mySginUp2", function($params, $user) {
    $user = new LeanUser();
    $user->setUsername($params['bh']);           // 设置用户名
    $user->setPassword($params['pwd']);     // 设置密码
    $user->set("college",$params['college']);
    $user->set("sex",$params['sex']);
    $user->set("name",$params['name']);
    $user->set("class",$params['mclass']);
    $user->set("petName",$params['petName']);
    $user->set("speciality",$params['speciality']);
    $user->signUp();
    $relation = $user->getRelation("kebiao");
    foreach($params['kebiao'] as $item){

        $query = new LeanQuery("Courses");
        $query->equalTo("keChengHao", $item[1]);
        $query->equalTo("peiYangFangAn", $item[0]);
        $todos = $query->find();
        if(count($todos)==0){

            $course = new LeanObject("Courses");
            $course.set('peiYangFangAn',$item[0]);
            $course.set('keChengHao',$item[1]);
            $course.set('keChengMing',$item[2]);
            $course.set('keXuHao',$item[3]);
            $course.set('xueFen',$item[4]);
            $course.set('keChengShuXing',$item[5]);
            $course.set('kaoShiLeiXing',$item[6]);
            $course.set('teacher',$item[7]);
            $course.set('xiuDuFangShi',$item[8]);
            $course.set('xuanKeZhuangTai',$item[9]);
            $course.set('zhouCi',$item[10]);
            $course.set('xingQi',$item[11]);
            $course.set('jieCi',$item[12]);
            $course.set('jieShu',$item[13]);
            $course.set('xiaoQu',$item[14]);
            $course.set('jiaoXueLou',$item[15]);
            $course.set('jiaoShi',$item[16]);
            $relation->add($course);
        }else{
            $relation->add($todos[0]);
        }

    }
    $user->save();
    return 0;
});
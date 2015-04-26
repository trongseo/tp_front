<?php
Yii::app()->theme = 'user-theme';
class SiteController extends CController {


    public function actionError() {

        $this->pageTitle = "Lỗi truy cập";
        $this->render('error',  array('hsTable'=>''));
    }





}
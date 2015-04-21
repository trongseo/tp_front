<?php
Yii::app()->theme = 'user-theme';
class FrontController extends CController {


    public function actionIntro() {
        $guid_id = '1';
        $data = CommonDB::GetDataRowKeyGuid("aaachung",'1');
        $this->pageTitle = $data["aaatitle"];
        $this->render('intro',  array('hsTable'=>$data));
    }
    public function actionSanPham() {
        $guid_id = '1';

        $datasan_pham_loai_guid = CommonDB::GetAll("Select san_pham_loai_guid,ten_loai from san_pham_loai order by so_thu_tu ",[]);
        $datasp=[];
       if(isset($datasan_pham_loai_guid[0]["san_pham_loai_guid"])){
           $loaisp = $datasan_pham_loai_guid[0]["san_pham_loai_guid"];
           $datasp= CommonDB::GetAll("Select * from san_pham where  san_pham_loai_guid='$loaisp' order by date_create desc ",[]);
       }
      //san pham nay co bao nhieu mau
        $spdautienid='45D2ACE6-D24E-CB65-149C-7A32C24BB3EF';//$datasp[0]["san_pham_guid"];
        $datamausp= CommonDB::GetAll("SELECT * FROM m_color WHERE color_id IN (
                                        SELECT color_id FROM `san_pham_price`
                                        WHERE `san_pham_guid`='$spdautienid' ) ",[]);
       // var_dump($datamausp,$spdautienid);exit();
       $color_id= $datamausp[0]["color_id"];
        //mau dau tien co bao nhieu kich co
        $datakichco= CommonDB::GetAll("SELECT *,'$color_id' AS color_id,'$spdautienid' as san_pham_guid FROM `m_size` WHERE m_size_guid IN (
                                        SELECT m_size_guid FROM `san_pham_price`
                                        WHERE `san_pham_guid`='$spdautienid' AND color_id='$color_id'  )",[]);
var_dump($datamausp,$datakichco);

        $this->render('sanpham',  array('dataloaisp'=>$datasan_pham_loai_guid,'datasp'=>$datasp));
    }

    public function actionAjaxupdate() {
        Yii::app()->theme = '';
        if( isset($_POST['bsubmit'])) {

            $guid_id=$_REQUEST["aaachung_guid"];//luon luon co hidden field
            $queryIn ="Update  aaachung set mo_ta_dai=:mo_ta_dai where aaachung_guid=:aaachung_guid";
            $hsTable="";

            $hsTable["aaachung_guid"]=$guid_id ;
            $hsTable["mo_ta_dai"]=$_REQUEST["mo_ta_dai"] ;
            CommonDB::runSQL($queryIn,$hsTable);
            echo "1";

        }
    }
    public function actionLienHe() {
        $this->pageTitle = "Danh sách liên hệ";
        $query="Select * from lienhe order by date_create desc";
        $data = CommonDB::GetAll($query,[]);
        $this->render('lienhe',  array('data'=>$data));

    }
    public function actionXoalienhe() {
        $lienhe_guid = $_REQUEST["lienhe_guid"];
        $query=" delete from lienhe  where lienhe_guid=:lienhe_guid ";
        $hs["lienhe_guid"]=$lienhe_guid;
        CommonDB::runSQL($query,$hs);
        echo "1";
    }



    public function actionDondathang() {
        $this->pageTitle = "Danh sách đơn đặt hàng";
        $query="Select hinh_dai_dien,ma_sp, dondathang_guid,hoten,email,dienthoai,fax,diachi,tieude,noidung from dondathang,san_pham where dondathang.san_pham_guid=san_pham.san_pham_guid
          order by dondathang.date_create desc";
        $data = CommonDB::GetAll($query,[]);
        $this->render('dondathang',  array('data'=>$data));

    }
    public function actionDondathangDelete() {
        $dondathang_guid = $_REQUEST["dondathang_guid"];
        $query=" delete from dondathang  where dondathang_guid=:dondathang_guid ";
        $hs["dondathang_guid"]=$dondathang_guid;
        CommonDB::runSQL($query,$hs);
        echo "1";
    }



}
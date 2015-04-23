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
//       if(isset($datasan_pham_loai_guid[0]["san_pham_loai_guid"])){
//           $loaisp = $datasan_pham_loai_guid[0]["san_pham_loai_guid"];
//           $datasp= CommonDB::GetAll("Select * from san_pham where  san_pham_loai_guid='$loaisp' order by date_create desc ",[]);
//       }
      //san pham nay co bao nhieu mau
        $spdautienid='45D2ACE6-D24E-CB65-149C-7A32C24BB3EF';//$datasp[0]["san_pham_guid"];


       // var_dump($datamausp,$spdautienid);exit();
      // $color_id= $datamausp[0]["color_id"];
        //mau dau tien co bao nhieu kich co
//        $datakichco= CommonDB::GetAll("SELECT *,'$color_id' AS color_id,'$spdautienid' as san_pham_guid FROM `m_size` WHERE m_size_guid IN (
//                                        SELECT m_size_guid FROM `san_pham_price`
//                                        WHERE `san_pham_guid`='$spdautienid' AND color_id='$color_id'  )",[]);
        //var_dump($datamausp,$datakichco);
        //$dataspshow = $datasp[0];
        $dataspshow = $this->getDetailSP($spdautienid);
        $this->render('sanpham',  array('dataloaisp'=>$datasan_pham_loai_guid,'dataspshow'=>$dataspshow));
    }
    public function getDetailSP($guid_id){
        $datasp= CommonDB::GetDataRowKeyGuid("san_pham",$guid_id);
       $tenloai =  CommonDB::GetDataRowKeyGuid('san_pham_loai',$datasp['san_pham_loai_guid'])   ;
        $datasp['danhmuc']=$tenloai['ten_loai'];
        $datamausp= CommonDB::GetAll("SELECT * FROM m_color WHERE color_id IN (
                                        SELECT color_id FROM `san_pham_price`
                                        WHERE `san_pham_guid`='$guid_id' ) ",[]);
        $datakichco=[];
        if(count($datamausp)>0){
            $color_id= $datamausp[0]['color_id'];

            $datakichco= CommonDB::GetAll("SELECT *,'$color_id' AS color_id,'$guid_id' as san_pham_guid FROM `m_size` WHERE m_size_guid IN (
                                        SELECT m_size_guid FROM `san_pham_price`
                                        WHERE `san_pham_guid`='$guid_id' AND color_id='$color_id' order by  size_text  )",[]);
        }

        return array('datasp'=>$datasp,'datakichco'=>$datakichco,'datamausp'=>$datamausp);
    }
    public function actionAjaxImageColor() {
        Yii::app()->theme = '';
        $san_pham_guid = $_REQUEST["san_pham_guid"];//luon luon co hidden field
        $color_id = $_REQUEST["color_id"];//luon luon co hidden field
        $subquery=" SELECT `image1` FROM `san_pham_hinh`  WHERE `san_pham_guid`='$san_pham_guid' AND `color_guid_id`='$color_id' order by so_thu_tu LIMIT 1
                               ";
        $dataimage= CommonDB::GetAll($subquery,[]);
        echo  json_encode($dataimage);
    }
    public function actionAjaxGetSize() {
        Yii::app()->theme = '';
        $san_pham_guid = $_REQUEST["san_pham_guid"];//luon luon co hidden field
        $color_id = $_REQUEST["color_id"];//luon luon co hidden field
        $datasize= CommonDB::GetAll("   SELECT  size_text, REPLACE( FORMAT(sp_price, 0),',','.') as  sp_price,aa.san_pham_price_guid,color_id FROM m_size a, san_pham_price aa
                           WHERE a.m_size_guid = aa.m_size_guid AND
                         a.`m_size_guid` IN( SELECT m_size_guid FROM san_pham_price
                         WHERE `san_pham_guid`='$san_pham_guid'  AND color_id='$color_id')
                         AND  aa.`san_pham_guid`='$san_pham_guid' AND color_id='$color_id'
                         ORDER BY size_text ",[]);
        echo  json_encode($datasize);
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
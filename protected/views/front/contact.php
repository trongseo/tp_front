
<?php


?>
<form id="registration-form" method="post" onsubmit="return validateForm();" class="form-horizontal" action="index.php?r=front/contact">


    <section class="support">
        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <h5 class="text-center"><strong>CÔNG TY TRÁCH NHIỆM HỮU HẠN TÂN PHÚC</strong></h5>
                        <address class="text-center">
                            <p>Giám đốc điều hành: Larry Page</p>
                            <p><strong><abbr title="address">Trụ sở:</abbr></strong> Mountain View, CA, Hoa Kỳ</p>
                            <p><strong><abbr title="phone">Điện thoại :</abbr></strong> 0123 456 789 - <strong><abbr title="atfaxtribute">Fax :</abbr></strong> 123 545 678</p>
                            <p><strong><abbr title="attribute">Nhà sáng lập:</abbr></strong> Larry Page, Sergey Brin</p>
                            <p><strong><abbr title="website">website :</abbr></strong> <a href="http://kinhtanphuc.com">kinhtanphucom</a></p>

                        </address>
                    </div>
                </div>

                <div class="video-block-detail">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3918.589757644037!2d106.61534400000001!3d10.8426738!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752a3226f9886b%3A0x19a5a86493286df0!2zQW4gU8awxqFuZywgUXXhuq1uIDEyLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1428598893597" width="100%" height="450" frameborder="0" style="border:0"></iframe>
                </div>
                <div class="form-group">
                    <div class="col-md-12 text-center">
                        <h5 class="text-uppercase"><strong>vui lòng điền đầy đủ thông tin dưới đây</strong></h5>
                        <p>(Để chúng tôi có thể liên lạc với quý khách, xin quý khách vui lòng cung cấp đúng thông tin số điện thoại và nội dung. Xin cảm ơn quý khách.)</p>
                    </div>
                </div>

                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="hoten" class="col-sm-2 control-label">Họ tên</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="hoten" id="hoten" placeholder="Họ tên">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control"  name="email" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="dienthoai" class="col-sm-2 control-label">Điện Thoại</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dienthoai" id="dienthoai" placeholder="Điện thoại">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tieude" class="col-sm-2 control-label">Tiêu đề</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="" id="tieude" name="tieude"  placeholder="Tiêu đề">
                        </div> </div>
                    <div class="form-group">
                        <label for="noidung" class="col-sm-2 control-label">Nội dung</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="noidung" name="noidung" rows="3"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" id="btnsave" name="btnsave"  class="btn btn-default" value="Gởi yêu cầu">
                        </div>
                    </div>
                </form>
            </div>
    </section>
    </div>
    <!-- .container -->
</form>

<script>



</script>
<script src="http://malsup.github.com/jquery.form.js"></script>

<script type="text/JavaScript">

    function validateURL(url) {
        var reurl = /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;
        return re.test(url);
    }

    function checkEmpty( objid, textval){
        var title = $("#"+objid).val();
        var reVal=true;
        if (title=="" || title==null) {
            alert("Vui lòng nhập nội dung "+textval+" !");
            $("#"+objid).focus();
            reVal=false;

        }
        return reVal;
    }
//    $(document).on('click', '#btnsave', function () {
//        validateForm();
//    });
    function validateForm()
    {
        // Validate URL
//        var url = $("#frurl").val();
//        if (validateURL(url)) { } else {
//            alert("Please enter a valid URL, remember including http://");return false;
//        }

        // Validate Title
       var resO =  checkEmpty("hoten","[Họ tên]");
       if(resO==false){
           return false;
       }
        var email = $("#fremail").val();
        if ((/(.+)@(.+){2,}\.(.+){2,}/.test(email)) || email=="" || email==null) { } else {
            alert("Email chưa chính xác!");
            $("#email").focus();
            return false;
        }
        resO =  checkEmpty("dienthoai","[Điện thoại]");
        if(resO==false){
            return false;
        }
         resO =  checkEmpty("tieude","[Tiêu đề]");
        if(resO==false){
            return false;
        }
        var title = $("#noidung").val();
        resO =  checkEmpty("noidung","[Nội dung]");
        if(resO==false){
            return false;
        }

        // Validate Email

        return true;
    }
    $(document).ready(function()
    {

        var options = {
            beforeSend: function()
            {


            },
            uploadProgress: function(event, position, total, percentComplete)
            {


            },
            success: function()
            {

                alert("Đã gửi thành công!Hãy gửi emailxxxxxxxxxx");

            },
            complete: function(response)
            {

            },
            error: function()
            {
            }

        };

        $("#registration-form").ajaxForm(options);


    });

</script>
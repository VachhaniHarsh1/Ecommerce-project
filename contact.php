	<!-- Header -->
	<?php
	include 'header.php';
	include "config.php";
	
	if(isset($_REQUEST['btn1']))
	{
		$name=$_REQUEST['name'];
		$email=$_REQUEST['email'];
		$number=$_REQUEST['number'];
		$address=$_REQUEST['address'];
		
		mysqli_query($conn,"insert into inquirydata set name='$name',email='$email',number='$number',address='$address'")or die("Insert inquirey error".mysqli_error($conn));
		
		header('location:index.php');
	}
	?>
	
	<!-- Header Part  End -->
	
	<!-- Center Body -->
	<br>
	
	<div class="container">
        <h4>
            <a href="#collapse" data-toggle="collapse" class="btn btn-outline-success">Our Location</a>
        </h4>
        <div class="collapse" id="collapse">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3691.6122456595886!2d70.75724051442909!3d22.29267354880636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3959cbd2f288f55b%3A0xb95487047aee1f4e!2sNityam%20Webtech!5e0!3m2!1sen!2sin!4v1678681259288!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
       <hr>
       <h4>
        <a href="#inq" data-toggle="collapse" class="btn btn-outline-success">Inquiry</a>
       </h4>
       <hr>
       <div class="collapse" id="inq">
        <form method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="name" id="" placeholder="Enter Your Name" autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="email" name="email" id="" placeholder="Enter Your Email"  autocomplete="off" class="form-control">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="text" name="number" id="" maxlength="10" placeholder="Enter Mobile Number" autocomplete="off" class="form-control">
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12">
                                <textarea name="address" id="" rows="6" class="form-control" autocomplete="off" placeholder="Inquery" /></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <input type="submit" name="btn1" class="btn btn-outline-success">
                    </div>
                </div>
            </div>            
        </form>
       </div>
    </div>

    <!------------Template center part end---------->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
	<!-- End Body -->
<!-- footer -->
	<?php
	include 'footer.php';
	?>

<?php
include("header.php");
?>


<!-- main-area -->
<main class="main-area fix">
    <!-- breadcrumb-area -->
    <?php
include("config.php");
$query = "SELECT * FROM contactbanner";
$result = $conn->query($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id = $row['id'];
    $aimage1 = '../sathyadb/pics/' . $row['image'];
    echo '<div class="breadcrumb__area breadcrumb__bg" data-background="'.$aimage1.'">
        </div>';
    } else {
        echo "No data found in the aboutbanner table.";
    }
    ?>
    <!-- breadcrumb-area-end -->

    <!-- contact-area -->
    <section class="contact__area section-py-120">
        <div class="container">
            <div class="row gutter-24">
                <div class="col-lg-4">
                    <div class="contact__info-wrap">
                        <?php
                                                include("config.php");
                                          $result = $conn->query("SELECT * FROM contactcontent");
                                                         if ($result) {
                                                while ($row = $result->fetch_assoc()) {
                                                    $heading1 = $row['heading1'];
                                                    $heading2= $row['heading2'];
                                                    $heading3 =  $row['heading3'];
                                                    $aimage1 = '../sathyadb/cimages/' . $row['img1'];
                                                    $aimage2 = '../sathyadb/cimages/' . $row['img2'];
                                                    $aimage3 = '../sathyadb/cimages/' . $row['img3'];
                                                 
                                                    ?>
                        <div class="contact__info-item">
                            <div class="contact__info-thumb">
                                <img src="<?php echo $aimage1?>" alt="img">
                            </div>
                            <div class="contact__info-content">
                                <div class="icon">
                                    <i class="renova-map"></i>
                                </div>
                                <div class="content">
                                    <span>Our Location</span>
                                    <h2 class="title"><?php echo $heading1?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="contact__info-item">
                            <div class="contact__info-thumb">
                                <img src="<?php echo $aimage2?>" alt="img">
                            </div>
                            <div class="contact__info-content">
                                <div class="icon">
                                    <i class="renova-map"></i>
                                </div>
                                <div class="content">
                                    <span>Contact Number</span>
                                    <h2 class="title"><?php echo $heading2?></h2>
                                </div>
                            </div>
                        </div>
                        <div class="contact__info-item">
                            <div class="contact__info-thumb">
                                <img src="<?php echo $aimage3?>" alt="img">
                            </div>
                            <div class="contact__info-content">
                                <div class="icon">
                                    <i class="renova-map"></i>
                                </div>
                                <div class="content">
                                    <span>Mail ID</span>
                                    <h2 class="title"><?php echo $heading3?></h2>
                                </div>
                            </div>
                        </div>
                        <?php
                                                }}
                                                ?>
                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- contact-map -->
                    <div class="contact-map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15664.06905436395!2d76.90328148019931!3d11.037331424830995!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba85f4bb5a4f5bf%3A0xfa7b3ce40a4d4439!2sSathya%20Group%20Office!5e0!3m2!1sen!2sin!4v1710327539924!5m2!1sen!2sin"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <!-- contact-map-end -->
                    <div class="contact__form-wrap">
                        <div class="section__title section__title-three mb-40">
                            <span class="sub-title">Get In Touch</span>
                            <h2 class="title">Needs Help? Let’s Get in Touch</h2>
                        </div>
                        <form action="contactmail.php" method="post" class="contact__form">
                            <div class="row gutter-20">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="text" name="name" placeholder="Your Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="email" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                            </div>
                            <div class="form-grp">
                                <input type="text" name="subject" placeholder="Your Subject">
                            </div>
                            <div class="form-grp">
                                <textarea name="message" placeholder="Type Your Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-two">Send Message</button>
                            <p class="ajax-response mb-0"></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area-end -->

</main>
<!-- main-area-end -->

<?php
include("footer.php");
?>
<?php
include("header.php");
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/css/intlTelInput.css" />

<style>
    /* Phone input specific styles */
    .iti {
        width: 100%;
        display: block;
    }

    .iti__selected-flag {
        padding: 0 10px;
    }

    .iti--allow-dropdown .iti__flag-container,
    .iti--separate-dial-code .iti__flag-container {
        width: auto;
    }

    #phone {
        padding-left: 90px !important;
        width: 100% !important;
    }

    .iti__selected-dial-code {
        font-size: 14px;
    }
</style>

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
    $aimage1 = 'sathyadb/pics/' . $row['image'];
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
                                                    if (!empty($row['img1'])) {
                                                        $aimage1 = 'sathyadb/cimages/' . $row['img1'];
                                                    } else { $aimage1 = ""; }
                                                    if (!empty($row['img2'])) {
                                                        $aimage2 = 'sathyadb/cimages/' . $row['img2'];
                                                    } else { $aimage2 = ""; }
                                                    if (!empty($row['img3'])) {
                                                        $aimage3 = 'sathyadb/cimages/' . $row['img3'];
                                                    } else { $aimage3 = ""; }
                                                 
                                                    ?>
                        <div class="contact__info-item">
                            <?php if (!empty($row['img1'])) { ?>
                            <div class="contact__info-thumb">
                                <img src="<?php echo $aimage1?>" style="height: unset;" alt="img">
                            </div>
                            <?php } ?>
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
                            <?php if (!empty($row['img2'])) { ?>
                            <div class="contact__info-thumb">
                                <img src="<?php echo $aimage2?>" alt="img">
                            </div>
                            <?php } ?>
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
                            <?php if (!empty($row['img3'])) { ?>
                            <div class="contact__info-thumb">
                                <img src="<?php echo $aimage3?>" alt="img">
                            </div>
                            <?php } ?>
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
                            <!-- <h2 class="title">Needs Help? Let’s Get in Touch</h2> -->
                        </div>
                        <form id="contactForm" method="post" class="contact__form">
                            <div class="row gutter-20">
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="text" name="name" placeholder="Name*" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-grp">
                                        <input type="text" name="org" placeholder="Name of Organization*" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-grp">
                                <input type="text" name="des" placeholder="Designation*" required>
                            </div>
                            <div class="form-grp">
                                <input type="email" name="email" placeholder="Email Address*" required>
                            </div>
                            <div class="form-grp">
                                <input type="tel" id="phone" name="phone" placeholder="Your Phone*" required>
                            </div>
                            <div class="form-grp">
                                <textarea name="message" rows="4" placeholder="Type Your Message"></textarea>
                            </div>
                            <button type="submit" class="btn btn-two" onclick="showWaitingMessageAndSendRequest(event)">Send Message</button>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/utils.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const phoneInput = document.querySelector("#phone");

        // Initialize intlTelInput
        window.iti = window.intlTelInput(phoneInput, {
            separateDialCode: true,
            initialCountry: "auto",
            geoIpLookup: (success, failure) => {
                fetch("https://ipinfo.io?token=fa3c9e544ceaa1", {
                    headers: { Accept: "application/json" }
                })
                .then(res => res.json())
                .then(data => success(data.country))
                .catch(() => success("in"));
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/utils.js",
        });
    });

    function showWaitingMessageAndSendRequest(e) {
        e.preventDefault();
        // console.log("Form submission started.");

        Swal.fire({
            title: 'Submitting...',
            text: 'Please wait while we process your application.',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        // Prepare form data
        const formData = new FormData();

        const name = document.querySelector("input[name='name']").value;
        const org = document.querySelector("input[name='org']").value;
        const des = document.querySelector("input[name='des']").value;
        const email = document.querySelector("input[name='email']").value;
        const phone = iti.getNumber();
        const message = document.querySelector("textarea[name='message']").value;

        // console.log("Collected form data:", { name, org, des, email, phone, message });

        formData.append("name", name);
        formData.append("org", org);
        formData.append("des", des);
        formData.append("email", email);
        formData.append("phone", phone);
        formData.append("message", message);

        // Send the request
        fetch("sathyadb/Broker.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            // console.log("Received response from server.");
            return response.text();
        })
        .then(text => {
            // console.log("Raw response text:", text);
            try {
                const data = JSON.parse(text);
                // console.log("Parsed response JSON:", data);

                if (data.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Submitted!",
                        html: "Our team will get back to you shortly.",
                        confirmButtonText: "OK"
                    }).then(() => location.reload());
                } else {
                    console.warn("Server returned success: false");
                    showErrorMessage(data.message || "Something went wrong!");
                }
            } catch (err) {
                showErrorMessage("Invalid server response. Please try again later.");
                console.error("Error parsing JSON:", err);
            }
        })
        .catch(error => {
            showErrorMessage("Submission failed. Please check your connection.");
            console.error("Fetch failed:", error);
        });
    }

    function showErrorMessage(message) {
        Swal.fire({
            icon: "error",
            title: "Submission Failed",
            text: message,
            confirmButtonText: "OK"
        });
    }
</script>

<?php
include("footer.php");
?>
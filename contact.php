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
                                                    $link = $row['linkedin'];
                                                    $you = $row['youtube'];
                                                    $wp = $row['whatsapp'];
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
                        <a href="<?= $link ?>" style="color: #fff; background: #000; padding: 10px; border-radius: 2rem; height: 2rem; width: 2rem; margin-right: 15px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-linkedin" viewBox="0 0 16 16">
                                <path d="M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854zm4.943 12.248V6.169H2.542v7.225zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248S2.4 3.226 2.4 3.934c0 .694.521 1.248 1.327 1.248zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016l.016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225z"/>
                            </svg>
                        </a>
                        <a href="<?= $you ?>" style="color: #fff; background: #000; padding: 10px; border-radius: 2rem; height: 2rem; width: 2rem; margin-right: 15px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-youtube" viewBox="0 0 16 16">
                                <path d="M8.051 1.999h.089c.822.003 4.987.033 6.11.335a2.01 2.01 0 0 1 1.415 1.42c.101.38.172.883.22 1.402l.01.104.022.26.008.104c.065.914.073 1.77.074 1.957v.075c-.001.194-.01 1.108-.082 2.06l-.008.105-.009.104c-.05.572-.124 1.14-.235 1.558a2.01 2.01 0 0 1-1.415 1.42c-1.16.312-5.569.334-6.18.335h-.142c-.309 0-1.587-.006-2.927-.052l-.17-.006-.087-.004-.171-.007-.171-.007c-1.11-.049-2.167-.128-2.654-.26a2.01 2.01 0 0 1-1.415-1.419c-.111-.417-.185-.986-.235-1.558L.09 9.82l-.008-.104A31 31 0 0 1 0 7.68v-.123c.002-.215.01-.958.064-1.778l.007-.103.003-.052.008-.104.022-.26.01-.104c.048-.519.119-1.023.22-1.402a2.01 2.01 0 0 1 1.415-1.42c.487-.13 1.544-.21 2.654-.26l.17-.007.172-.006.086-.003.171-.007A100 100 0 0 1 7.858 2zM6.4 5.209v4.818l4.157-2.408z"/>
                            </svg>
                        </a>
                        <a href="https://wa.me/<?= $wp ?>" style="color: #fff; background: #000; padding: 10px; border-radius: 2rem; height: 2rem; width: 2rem; margin-right: 15px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                                <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
                            </svg>
                        </a>
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
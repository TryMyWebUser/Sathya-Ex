<?php
include("header.php");
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/css/intlTelInput.css" />

<style>
    #css-dropdown {
        position: absolute;
        top: 0;
        right: 0;
        left: 0;
        width: 300px;
        height: 42px;
        margin: 100px auto 0 auto;
    }

    .row.gutter-24 {
        margin: 20px 0;
        padding: 20px;
        background-color: #f8f9fa;
        border-radius: 5px;
    }
    .btn-default {
        background-color: #b3dfd9;
        color: white;
        padding: 10px 25px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        transition: all 0.3s;
    }
    .btn-default:hover {
        background-color: #009688;
        transform: translateY(-2px);
        color: #fff;
    }
    .help-block.with-errors {
        color: #dc3545;
        font-size: 0.875em;
        margin-top: 5px;
    }
    .modal-content {
        border-radius: 10px;
        overflow: hidden;
    }
    .modal-header {
        background-color: #b3dfd9;
        color: white;
    }

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

    /* Choices.js multiselect styling */
    .choices {
        margin-bottom: 0;
    }
    .choices__inner {
        min-height: 45px;
        border-radius: 4px;
        border: 1px solid #ced4da;
        background-color: #fff;
    }
    .choices__list--multiple .choices__item {
        background-color: #b3dfd9;
        border: 1px solid #009688;
        color: white;
    }
    .choices__list--multiple .choices__item.is-highlighted {
        background-color: #009688;
    }
    .choices__input {
        margin-bottom: 0;
    }

    .choices__list--dropdown,
    .choices__list[aria-expanded] {
        z-index: 100 !important;
    }
</style>

<!-- main-area -->
<main class="main-area fix">
    <!-- breadcrumb-area -->
    <?php
include("config.php");
$query = "SELECT * FROM prodsubcatban";
$result = $conn->query($query); if ($result->num_rows > 0) { $row = $result->fetch_assoc(); $id = $row['id']; $aimage1 = 'sathyadb/pics/' . $row['image']; echo '
    <div class="breadcrumb__area breadcrumb__bg" data-background="'.$aimage1.'"></div>
    '; } else { echo "No data found in the prodsubcatban table."; } ?>
    <!-- breadcrumb-area-end -->

    <!-- blog-post-area -->
    <!-- blog-post-area -->
    <section class="blog__post-area-three section-py-120">
        <div class="container">
            <div class="row gutter-24">
                <?php
    include("config.php");
    $id = $_GET['id'];
    $categoryQuery = "SELECT * FROM prodsubcat WHERE cat_id = '$id'";
    $categoryResult = $conn->query($categoryQuery); if ($categoryResult->num_rows > 0) { while ($row = $categoryResult->fetch_assoc()) { ?>
                <div class="col-lg-3">
                    <div class="blog__post-item-three">
                        <!-- <a href="anticorrosive.php?id=< ?php echo $row['subcat_id']; ?>"> -->
                        <div class="blog__post-content-three" style="height: 200px; width: 300px;">
                            <p class="title" style="font-size: 20px;"><?php echo $row['subcat_name']; ?></p>
                        </div>
                        <!-- </a> -->
                    </div>
                </div>
                <?php
        }
    } else {
        echo 'No Data Found';
    }
?>
            </div>

            <div class="row gutter-24">
                <h3>For further details on specific products, connect with us by <a href="#" style="color: #2196f3;" data-bs-toggle="modal" data-bs-target="#contactFormModal">click here</a>.</h3>
            </div>
        </div>
    </section>
    <!-- blog-post-area-end -->
    <!-- blog-post-area-end -->

    <!-- Modal Popup Form -->
    <div class="modal fade" id="contactFormModal" tabindex="-1" aria-labelledby="contactFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contactFormModalLabel"><i class="fas fa-envelope me-2"></i> Enquiry Form</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="contactForm" method="POST" class="animate__animated animate__fadeInUp" data-wow-delay="0.4s">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="products">Select Products*</label>
                                <select id="product-choices" name="products[]" multiple>
                                    <?php
                                        include("config.php");
                                        $categoryQuery = "SELECT * FROM category";
                                        $categoryResult = $conn->query($categoryQuery); if ($categoryResult->num_rows > 0) { while ($row = $categoryResult->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['cat_name']; ?>"><?php echo $row['cat_name']; ?></option>
                                    <?php
                                            }
                                        }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <input type="text" name="name" class="form-control" id="name" placeholder="Name*" required />
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <input type="text" name="org" class="form-control" id="org" placeholder="Name of Organization*" required />
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-12 mb-4">
                                <input type="text" name="des" class="form-control" id="designation" placeholder="Designation*" required />
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email Address*" required />
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-6 mb-4">
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Your Phone*" required />
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="form-group col-md-12 mb-4">
                                <textarea name="message" class="form-control" id="message" rows="4" placeholder="Your Message"></textarea>
                                <div class="help-block with-errors"></div>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn-default" onclick="showWaitingMessageAndSendRequest()"><i class="fas fa-paper-plane me-2"></i>Submit</button>
                                <div id="msgSubmit" class="h3 d-none mt-3"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- main-area-end -->

<!-- Add these instead -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Initialize phone input
        const phoneInput = document.querySelector("#phone");
        window.intlTelInput(phoneInput, {
            separateDialCode: true,
            initialCountry: "auto",
            geoIpLookup: function (success, failure) {
                fetch("https://ipinfo.io?token=fa3c9e544ceaa1", {
                    headers: { Accept: "application/json" },
                })
                    .then((response) => response.json())
                    .then((data) => success(data.country))
                    .catch(() => success("in")); // Default to India
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/utils.js",
        });

        // Initialize Choices.js multiselect
        const productSelect = new Choices("#product-choices", {
            removeItemButton: true,
            maxItemCount: 5,
            searchEnabled: true,
            duplicateItemsAllowed: false,
            placeholder: true,
            placeholderValue: "Select products",
            searchPlaceholderValue: "Search products",
            shouldSort: false,
        });

        // Form submission handling
        document.getElementById("contactForm").addEventListener("submit", function (e) {
            e.preventDefault();

            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Processing...';
            submitBtn.disabled = true;

            // Get selected products
            const selectedProducts = productSelect.getValue(true);
            console.log("Selected products:", selectedProducts);

            // Simulate form submission
            setTimeout(() => {
                const msgSubmit = document.getElementById("msgSubmit");
                msgSubmit.className = "h3 text-success mt-3";
                msgSubmit.innerHTML = '<i class="fas fa-check-circle me-2"></i> Your message has been sent successfully!';
                msgSubmit.classList.remove("d-none");

                this.reset();
                productSelect.removeActiveItems();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;

                setTimeout(() => {
                    msgSubmit.classList.add("d-none");
                    bootstrap.Modal.getInstance(document.getElementById("contactFormModal")).hide();
                }, 5000);
            }, 1500);
        });
    });
</script>

<script>
    // Initialize WOW.js for animations
    new WOW().init();

    // Form submission handling
    document.getElementById("contactForm").addEventListener("submit", function (e) {
        e.preventDefault();

        // Show loading state
        const submitBtn = this.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Processing...';
        submitBtn.disabled = true;

        // Simulate form submission (replace with actual AJAX call)
        setTimeout(() => {
            // Show success message
            const msgSubmit = document.getElementById("msgSubmit");
            msgSubmit.className = "h3 text-success mt-3";
            msgSubmit.innerHTML = '<i class="fas fa-check-circle me-2"></i> Your message has been sent successfully!';
            msgSubmit.classList.remove("d-none");

            // Reset form and button
            this.reset();
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;

            // Hide message after 5 seconds
            setTimeout(() => {
                msgSubmit.classList.add("d-none");
                // Close the modal after successful submission
                const modal = bootstrap.Modal.getInstance(document.getElementById("contactFormModal"));
                modal.hide();
            }, 5000);
        }, 1500);
    });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/intlTelInput.min.js"></script>
<script>
    const input = document.querySelector("#phone");
    window.intlTelInput(input, {
        separateDialCode: true,
        initialCountry: "auto",
        geoIpLookup: function (success, failure) {
            fetch("https://ipinfo.io?token=fa3c9e544ceaa1", { headers: { Accept: "application/json" } })
                .then((response) => response.json())
                .then((data) => success(data.country))
                .catch(() => success("us"));
        },
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/utils.js",
    });
</script>

<!-- SweetAlert2 CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    function showWaitingMessageAndSendRequest() {
        Swal.fire({
            title: 'Submitting...',
            text: 'Please wait while we process your application.',
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        });
        sendApplicationRequest();
    }

    function sendApplicationRequest() {
        let submit = document.querySelector(".submit");

        // Create a plain object to hold the form data
        let formDataObject = {
            fullName: document.querySelector("input[name='fullName']").value,
            email: document.querySelector("input[name='email']").value,
            subject: document.querySelector("input[name='subject']").value,
            phoneNumber: document.querySelector("input[name='phone']").value,
            message: document.querySelector("textarea[name='message']").value
        };

        // Log the plain object to make sure it is populated
        console.log("Form data object:", formDataObject);

        // Convert the plain object to FormData
        let formData = new FormData();
        for (let key in formDataObject) {
            if (formDataObject.hasOwnProperty(key)) {
                formData.append(key, formDataObject[key]);
            }
        }

        // Log the FormData object to ensure it is populated
        formData.forEach((value, key) => {
            console.log(`${key}: ${value}`);
        });

        fetch("admin/libs/Broker.class.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            console.log("Response status:", response.status); // Log the status code
            return response.text(); // Get the raw text response for better debugging
        })
        .then(text => {
            console.log("Server response:", text); // Log the raw server response
            try {
                const data = JSON.parse(text); // Try parsing the JSON response
                if (data.success) {
                    showSuccessMessage();
                } else {
                    showErrorMessage(data.message);
                }
            } catch (error) {
                console.error("Error parsing JSON:", error); // Log if JSON parsing fails
                showErrorMessage("An unexpected error occurred. Please try again later.");
            }
        })
        .catch(error => {
            console.error("Fetch error:", error); // Log fetch-related errors
            showErrorMessage("An unexpected error occurred. Please try again later.");
        });
    }


    function showSuccessMessage() {
        Swal.fire({
            icon: "success",
            title: "Contact Form Submitted!",
            html: `<p>Our team will review your application and get back to you.</p>`,
            confirmButtonText: 'OK',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "contact.php";
            }
        });
    }

    function showErrorMessage(message) {
        Swal.fire({
            icon: "error",
            title: "Submission Failed",
            text: message,
            confirmButtonText: 'OK',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "contact.php";
            }
        });
    }
</script>

<?php
include("footer.php");
?>
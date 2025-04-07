<?php include("header.php"); ?>
<?php include("config.php"); ?>

<!-- Styles -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/css/intlTelInput.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />

<style>
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
    }
    .btn-default:hover {
        background-color: #009688;
        color: #fff;
        transform: translateY(-2px);
    }
    .help-block.with-errors { color: #dc3545; font-size: 0.875em; margin-top: 5px; }
    .modal-content { border-radius: 10px; overflow: hidden; }
    .modal-header { background-color: #b3dfd9; color: white; }

    .iti { width: 100%; }
    #phone { padding-left: 90px !important; width: 100% !important; }

    .choices__inner { min-height: 45px; border-radius: 4px; border: 1px solid #ced4da; }
    .choices__list--multiple .choices__item { background-color: #b3dfd9; border: 1px solid #009688; color: white; }
    .choices__list--dropdown, .choices__list[aria-expanded] { z-index: 100 !important; }
</style>

<main class="main-area fix">
    <!-- Breadcrumb Section -->
    <?php
    $result = $conn->query("SELECT * FROM turnsubcatban");
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo '<div class="breadcrumb__area breadcrumb__bg" data-background="sathyadb/pics/' . $row['image'] . '"></div>';
    }
    ?>

    <!-- Product Section -->
    <section class="blog__post-area-three section-py-120">
        <div class="container">
            <div class="row gutter-24">
                <?php
                $id = $_GET['id'];
                $categoryResult = $conn->query("SELECT * FROM turnsubcat WHERE cat_id = '$id'");
                if ($categoryResult->num_rows > 0) {
                    while ($row = $categoryResult->fetch_assoc()) {
                        echo '
                        <div class="col-lg-3">
                            <div class="blog__post-item-three">
                                <div class="blog__post-content-three" style="height: 200px;width: 300px;">
                                    <p class="title" style="font-size:20px;">' . $row['subcat_name'] . '</p>
                                </div>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<p>No Data Found</p>';
                }
                ?>
            </div>

            <div class="row gutter-24">
                <h3>For further details on specific products, connect with us by 
                    <a href="#" style="color: #2196f3;" data-bs-toggle="modal" data-bs-target="#contactFormModal">clicking here</a>.
                </h3>
            </div>
        </div>
    </section>

    <!-- Modal Form -->
    <div class="modal fade" id="contactFormModal" tabindex="-1" aria-labelledby="contactFormModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fas fa-envelope me-2"></i> Enquiry Form</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form id="contactForm" method="POST">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="product-choices">Select Turnkey Solution*</label>
                                <select id="product-choices" name="products[]" multiple>
                                    <?php
                                    $catResult = $conn->query("SELECT * FROM turncategory");
                                    if ($catResult->num_rows > 0) {
                                        while ($row = $catResult->fetch_assoc()) {
                                            echo '<option value="' . $row['cat_name'] . '">' . $row['cat_name'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group col-md-6 mb-4">
                                <input type="text" name="name" class="form-control" placeholder="Name*" required />
                            </div>
                            <div class="form-group col-md-6 mb-4">
                                <input type="text" name="org" class="form-control" placeholder="Name of Organization*" required />
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <input type="text" name="des" class="form-control" placeholder="Designation*" required />
                            </div>
                            <div class="form-group col-md-6 mb-4">
                                <input type="email" name="email" class="form-control" placeholder="Email Address*" required />
                            </div>
                            <div class="form-group col-md-6 mb-4">
                                <input type="tel" id="phone" name="phone" class="form-control" placeholder="Your Phone*" required />
                            </div>
                            <div class="form-group col-md-12 mb-4">
                                <textarea name="message" class="form-control" rows="4" placeholder="Your Message"></textarea>
                            </div>
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn-default" onclick="showWaitingMessageAndSendRequest(event)">
                                    <i class="fas fa-paper-plane me-2"></i>Submit
                                </button>
                                <div id="msgSubmit" class="h3 d-none mt-3"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Scripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/utils.js"></script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const phoneInput = document.querySelector("#phone");
        const iti = window.intlTelInput(phoneInput, {
            separateDialCode: true,
            initialCountry: "auto",
            geoIpLookup: (success, failure) => {
                fetch("https://ipinfo.io?token=fa3c9e544ceaa1", { headers: { Accept: "application/json" } })
                    .then(res => res.json())
                    .then(data => success(data.country))
                    .catch(() => success("in"));
            },
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.17/js/utils.js",
        });

        window.productSelect = new Choices("#product-choices", {
            removeItemButton: true,
            searchEnabled: true,
            placeholderValue: "Select turnkey solution",
        });
    });

    function showWaitingMessageAndSendRequest(e) {
        e.preventDefault();

        console.log("Form submission started...");

        Swal.fire({
            title: 'Submitting...',
            text: 'Please wait while we process your application.',
            allowOutsideClick: false,
            didOpen: () => Swal.showLoading()
        });

        // 1. Get selected products
        const selectedProducts = productSelect.getValue(true);
        console.log("Selected products:", selectedProducts);

        // 2. Prepare form data
        const formData = new FormData();
        selectedProducts.forEach(value => formData.append("products[]", value));

        const name = document.querySelector("input[name='name']").value;
        const org = document.querySelector("input[name='org']").value;
        const des = document.querySelector("input[name='des']").value;
        const email = document.querySelector("input[name='email']").value;
        const phone = document.querySelector("input[name='phone']").value;
        const message = document.querySelector("textarea[name='message']").value;

        formData.append("name", name);
        formData.append("org", org);
        formData.append("des", des);
        formData.append("email", email);
        formData.append("phone", phone);
        formData.append("message", message);

        // 3. Log all form values
        console.log("Form data values:");
        for (let pair of formData.entries()) {
            console.log(`${pair[0]}: ${pair[1]}`);
        }

        // 4. Send request
        fetch("sathyadb/Broker.php", {
            method: "POST",
            body: formData
        })
        .then(response => {
            console.log("Server response received.");
            return response.text();
        })
        .then(text => {
            console.log("Raw response text:", text);

            try {
                const data = JSON.parse(text);
                console.log("Parsed JSON:", data);

                if (data.success) {
                    Swal.fire({
                        icon: "success",
                        title: "Submitted!",
                        html: "Our team will get back to you shortly.",
                        confirmButtonText: "OK"
                    }).then(() => location.reload());
                } else {
                    console.warn("Server responded with error:", data.message);
                    showErrorMessage(data.message);
                }
            } catch (err) {
                console.error("Error parsing JSON response:", err);
                showErrorMessage("An error occurred. Please try again later.");
            }
        })
        .catch(error => {
            console.error("Fetch request failed:", error);
            showErrorMessage("Submission failed. Please check your internet connection.");
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

<?php include("footer.php"); ?>
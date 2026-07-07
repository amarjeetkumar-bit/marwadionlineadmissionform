<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application Form - Marwadi University</title>
    <link rel="icon" type="image/png" href="images/fav.png?v=2">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', Arial, sans-serif;
        }

        :root {
            --primary: #00a2b9;
            --primary-dark: #007d8f;
            --primary-light: #e6f7fa;
        }

        body {
            background: #f4f6fb;
            color: #333;
        }

        /* Header */
        .header {
            background: linear-gradient(90deg, var(--primary), var(--primary-dark));
            padding: 45px 15px 85px;
            text-align: center;
            color: #fff;
        }

        .header h1 {
            font-size: 40px;
            margin-bottom: 12px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .header p {
            font-size: 16;
            opacity: 0.95;
        }

        /* Container */
        .container {
            max-width: 1000px;
            margin: 70px auto;
            padding: 0 15px;
        }

        .form-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
            padding: 40px;
        }

        .form-title {
            font-size: 18px;
            font-weight: 700;
            color: var(--primary-dark);
            margin-bottom: 6px;
            text-align: center;
        }

        .form-subtitle {
            font-size: 12px;
            color: #000;
            margin-bottom: 10px;
            text-align: center;
        }

        /* Form fields */
        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #555;
            margin-bottom: 7px;
        }

        label .req {
            color: #e74c3c;
        }

        input,
        select,
        textarea {
            width: 100%;
            height: 42px;
            padding: 12px 16px;
            border: 1px solid #d6dce8;
            border-radius: 8px;
            font-size: 15px;
            outline: none;
            transition: border-color 0.25s, box-shadow 0.25s;
            background: #fff;
            color: #333;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(0, 162, 185, 0.12);
        }

        textarea {
            height: 40px;
            resize: none;
        }

        /* Grid rows */
        .row-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .row-3 {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 22px;
        }

        /* Button */
        .btn-box {
            text-align: center;
            margin-top: 10px;
        }

        button {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 10px 40px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 8px;
            transition: background 0.25s, transform 0.15s;
        }

        button:hover {
            background: var(--primary-dark);
            transform: translateY(-2px);
        }

        /* Alerts */
        .success {
            background: #d4edda;
            color: #155724;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 22px;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 14px;
            border-radius: 8px;
            margin-bottom: 22px;
        }

        /* Tablet */
        @media (max-width: 991px) {
            .row-3 {
                grid-template-columns: 1fr 1fr;
            }
        }

        /* Mobile */
        @media (max-width: 767px) {
            .header {
                padding: 35px 15px 70px;
            }

            .header h1 {
                font-size: 26px;
            }

            .header p {
                font-size: 13px;
            }

            .form-card {
                padding: 25px 20px;
            }

            .row-2,
            .row-3 {
                grid-template-columns: 1fr;
                gap: 0;
            }

            button {
                width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<!-- <div class="header">
    <h1>Application Form</h1>
    <p>Prospectus | Eligibility | Fees</p>
</div> -->

<div class="container">
    <div class="form-card">
        <h2 class="form-title">Get 100% Free Counseling</h2>
        <p class="form-subtitle">Fill in your details and our team will get in touch with you shortly.</p>
        <?php
            if (isset($_GET['success'])) {
                echo '<div class="success auto-hide">Lead Submitted Successfully.</div>';
            }
            if (isset($_GET['error'])) {
                echo '<div class="error auto-hide">Something Went Wrong.</div>';
            }
        ?>

        <form method="POST" action="submit.php">
            <!-- Row 1: Name + Phone -->
            <div class="row-3">
                <div class="form-group">
                    <!-- <label>Your Name <span class="req">*</span></label> -->
                    <input type="text" name="name" placeholder="Enter your name" oninput="this.value = this.value.replace(/[^a-zA-Z ]/g, '')" required>
                </div>

                <div class="form-group">
                    <!-- <label>Email Address</label> -->
                    <input type="email" name="email" placeholder="Enter your email">
                </div>

                <div class="form-group">
                    <!-- <label>Phone Number <span class="req">*</span></label> -->
                    <input type="text" name="contactno" maxlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '')" placeholder="Enter phone number" required>
                </div>
            </div>

            <!-- Row 2: Email + Course + Study Mode -->
            <div class="row-2">
                <!-- <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email" placeholder="Enter your email">
                </div> -->

                <div class="form-group">
                    <!-- <label>Select Course <span class="req">*</span></label> -->
                    <select name="selectcourse" required>
                        <option value="">Select Course</option>
                        <option value="MBA">MBA</option>
                        <option value="MCA">MCA</option>
                        <option value="M.Sc (Mathematics)">M.Sc (Mathematics)</option>
                        <option value="MA (English)">MA (English)</option>
                        <option value="BCA">BCA</option>
                        <option value="BBA">BBA</option>
                        <option value="B.Com">B.Com</option>
                    </select>
                </div>

                <div class="form-group">
                    <!-- <label>State</label> -->
                    <select name="state" class="form-select">
                        <option value="">Select State</option>
                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chandigarh">Chandigarh</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                        <option value="Delhi">Delhi</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Ladakh">Ladakh</option>
                        <option value="Lakshadweep">Lakshadweep</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Puducherry">Puducherry</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Sikkim">Sikkim</option>
                        <option value="Tamil Nadu">Tamil Nadu</option>
                        <option value="Telangana">Telangana</option>
                        <option value="Tripura">Tripura</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                        <option value="Uttarakhand">Uttarakhand</option>
                        <option value="West Bengal">West Bengal</option>
                    </select>
                </div>
            </div>

            <!-- Row 3: Message (full width) -->
            <div class="form-group">
                <!-- <label>Message</label> -->
                <textarea name="message" placeholder="Write your message here..."></textarea>
            </div>

            <div class="btn-box">
                <button type="submit">Submit Application</button>
            </div>
        </form>
    </div>
</div>


<script>
    setTimeout(function () {
        document.querySelectorAll('.auto-hide').forEach(function (msg) {
            msg.style.transition = 'opacity 0.5s';
            msg.style.opacity = '0';
            setTimeout(function () {
                msg.remove();
            }, 500); // fade out ke baad remove
        });
    }, 10000); // 10 seconds
</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book Appointment</title>
<style>
    body {
        margin: 0;
        font-family: 'Poppins', sans-serif;
        background-color: #fff;
        color: #001f3f;
    }

    .container {
        display: flex;
        min-height: 100vh;
    }

    /* Left Section */
    .left {
        flex: 1;
        background: url('https://images.unsplash.com/photo-1593113597144-1e7c7a7a0e69') center/cover no-repeat;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        padding: 30px;
        text-align: center;
        color: white;
    }
    .left h1 {
        font-size: 2rem;
        margin-bottom: 10px;
        background: rgba(0,0,0,0.5);
        padding: 10px 20px;
        border-radius: 8px;
    }
    .left p {
        font-size: 1rem;
        background: rgba(0,0,0,0.4);
        padding: 8px 15px;
        border-radius: 6px;
    }

    /* Right Section */
    .right {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px;
        background-color: #f9f9f9;
    }
    form {
        background: white;
        padding: 25px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        width: 100%;
        max-width: 450px;
    }
    form h2 {
        margin-bottom: 20px;
        color: navy;
        text-align: center;
    }
    label {
        font-weight: 500;
        display: block;
        margin: 10px 0 5px;
    }
    input, select, textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 15px;
        font-size: 14px;
    }
    input:focus, select:focus, textarea:focus {
        border-color: goldenrod;
        outline: none;
    }
    .agreement {
        display: flex;
        align-items: center;
        font-size: 14px;
        margin-bottom: 15px;
    }
    .agreement input {
        margin-right: 8px;
    }
    button {
        background: goldenrod;
        color: white;
        border: none;
        padding: 12px;
        width: 100%;
        font-size: 16px;
        border-radius: 6px;
        cursor: pointer;
        transition: 0.3s;
    }
    button:hover {
        background: #d4a017;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .container {
            flex-direction: column;
        }
        .left, .right {
            flex: none;
            width: 100%;
            min-height: auto;
        }
        .left {
            padding: 60px 20px;
        }
    }
</style>
</head>
<body>

<div class="container">
    <!-- Left Side -->
    <div class="left">
        <h1>Book Your Lawyer Appointment</h1>
        <p>Professional, Reliable, and Here to Fight for Your Rights</p>
    </div>

    <!-- Right Side -->
    <div class="right">
        <form>
            <h2>Appointment Form</h2>
            <label for="name">Full Name</label>
            <input type="text" id="name" placeholder="Enter your full name" required>

            <label for="email">Email</label>
            <input type="email" id="email" placeholder="Enter your email" required>

            <label for="phone">Phone Number</label>
            <input type="tel" id="phone" placeholder="Enter your phone number" required>

            <label for="address">Address</label>
            <input type="text" id="address" placeholder="Enter your address" required>

            <label for="date">Preferred Date</label>
            <input type="date" id="date" required>

            <label for="time">Preferred Time</label>
            <input type="time" id="time" required>

            <label for="reason">Reason for Appointment</label>
            <textarea id="reason" rows="3" placeholder="Briefly describe your case"></textarea>

            <div class="agreement">
                <input type="checkbox" id="agree" required>
                <label for="agree">I agree to the terms and conditions</label>
            </div>

            <button type="submit">Book Appointment</button>
        </form>
    </div>
</div>

</body>
</html>

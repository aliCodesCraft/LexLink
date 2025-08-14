<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lawyer Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background: #f5f5f5;
      display: flex;
      justify-content: center;
      padding: 20px;
    }

    .profile-container {
      display: flex;
      flex-wrap: wrap;
      background: #fff;
      border-radius: 15px;
      overflow: hidden;
      max-width: 1000px;
      width: 100%;
      box-shadow: 0 8px 25px rgba(0,0,0,0.1);
    }

    /* LEFT PANEL */
    .profile-left {
      flex: 1 1 320px;
      background: linear-gradient(135deg, #1E2A38, #2E3F54);
      color: white;
      padding: 30px 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      text-align: center;
    }

    .profile-left img {
      width: 140px;
      height: 140px;
      border-radius: 50%;
      border: 4px solid white;
      object-fit: cover;
      margin-bottom: 15px;
    }

    .profile-left h2 {
      font-size: 24px;
      font-weight: 600;
    }

    .profile-left p {
      font-size: 14px;
      opacity: 0.85;
    }

    .social-icons {
      margin: 20px 0;
    }

    .social-icons i {
      font-size: 22px;
      margin: 0 8px;
      cursor: pointer;
      transition: 0.3s;
    }

    .social-icons i:hover {
      color: gold;
    }

    .stats {
      display: flex;
      justify-content: center;
      gap: 20px;
      margin-top: auto;
      flex-wrap: wrap;
    }

    .stats div {
      text-align: center;
    }

    .stats h3 {
      font-size: 20px;
      color: gold;
    }

    .stats p {
      font-size: 12px;
      opacity: 0.8;
    }

    /* RIGHT PANEL */
    .profile-right {
      flex: 2 1 600px;
      padding: 30px;
    }

    .about-title {
      color: #1E2A38;
      font-size: 22px;
      font-weight: 600;
      margin-bottom: 15px;
    }

    .profile-right p {
      font-size: 14px;
      line-height: 1.7;
      color: #333;
    }

    /* Ratings */
    .ratings {
      margin: 20px 0;
    }

    .stars {
      color: gold;
      font-size: 20px;
    }

    .rating-value {
      font-size: 14px;
      color: #555;
      margin-left: 8px;
    }

    /* Reviews Section */
    .reviews {
      margin-top: 25px;
    }

    .review {
      background: #f9f9f9;
      padding: 12px 15px;
      border-left: 4px solid gold;
      margin-bottom: 12px;
      border-radius: 5px;
    }

    .review strong {
      color: #1E2A38;
    }

    /* Rating Form */
    .rating-form {
      margin-top: 20px;
      background: #f4f4f4;
      padding: 15px;
      border-radius: 10px;
    }

    .rating-form h4 {
      margin-bottom: 10px;
      color: #1E2A38;
    }

    .rating-input {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .rating-input input, .rating-input textarea, .rating-input select {
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      width: 100%;
    }

    .rating-input select {
      max-width: 120px;
    }

    .submit-rating {
      background: gold;
      color: #1E2A38;
      border: none;
      padding: 8px 14px;
      border-radius: 20px;
      cursor: pointer;
      font-size: 14px;
      margin-top: 8px;
    }

    .submit-rating:hover {
      background: #d4af37;
    }

    /* Book Button */
    .book-btn {
      background: gold;
      color: #1E2A38;
      border: none;
      padding: 10px 22px;
      border-radius: 25px;
      cursor: pointer;
      font-size: 14px;
      transition: 0.3s;
      margin: 20px 0;
    }

    .book-btn:hover {
      background: #d4af37;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
      .profile-container {
        flex-direction: column;
      }

      .profile-left, .profile-right {
        padding: 20px;
      }

      .profile-left img {
        width: 120px;
        height: 120px;
      }

      .stats {
        gap: 15px;
      }
    }

    @media (max-width: 480px) {
      .profile-left h2 {
        font-size: 20px;
      }
      .about-title {
        font-size: 18px;
      }
      .profile-right p {
        font-size: 13px;
      }
    }

    @media (max-width: 320px) {
      body {
        padding: 10px;
      }
      .profile-left img {
        width: 100px;
        height: 100px;
      }
      .book-btn {
        width: 100%;
        font-size: 13px;
        padding: 8px 10px;
      }
    }
  </style>
</head>
<body>

  <div class="profile-container">
    <!-- LEFT -->
    <div class="profile-left">
      <img src="https://via.placeholder.com/150" alt="Lawyer Photo">
      <h2>Johnathan Reed</h2>
      <p>Criminal Defense Attorney</p>
      
      <div class="social-icons">
        <i class="ri-facebook-fill"></i>
        <i class="ri-twitter-fill"></i>
        <i class="ri-linkedin-fill"></i>
        <i class="ri-mail-fill"></i>
      </div>

      <div class="stats">
        <div>
          <h3>120+</h3>
          <p>Cases Won</p>
        </div>
        <div>
          <h3>85%</h3>
          <p>Win Rate</p>
        </div>
        <div>
          <h3>15+</h3>
          <p>Years Exp.</p>
        </div>
      </div>
    </div>

    <!-- RIGHT -->
    <div class="profile-right">
      <h3 class="about-title">ABOUT</h3>
      <p>
        Johnathan Reed is an experienced criminal defense attorney with over 15 years of legal practice.
        Specializing in defending clients in high-profile criminal cases, Johnathan has a reputation for 
        thorough preparation, persuasive courtroom presence, and an unwavering commitment to justice.
      </p>

      <!-- Book Appointment -->
      <button class="book-btn">Book Appointment</button>

      <!-- Reviews -->
      <div class="ratings">
        <div class="stars">
          ★★★★☆
          <span class="rating-value">(4.2 / 5 from 320 reviews)</span>
        </div>
      </div>

    </div>
  </div>

  <div class="reviews">
    <div class="review"><strong>Sarah M.</strong>: "Professional, sharp, and incredibly supportive through my case."</div>
    <div class="review"><strong>David L.</strong>: "Won my case against all odds. Highly recommend!"</div>
    <div class="review"><strong>Maria K.</strong>: "Explained every step clearly. I felt confident in court."</div>
    <div class="review"><strong>Ahmed R.</strong>: "A true professional who knows the law inside out."</div>
    <div class="review"><strong>Lisa P.</strong>: "His negotiation skills are unmatched. Saved me from heavy penalties."</div>
    <div class="review"><strong>James B.</strong>: "Trustworthy and reliable. I’d hire him again without hesitation."</div>
  </div>

  <!-- Add Rating Form -->
  <div class="rating-form">
    <h4>Leave a Rating</h4>
    <form class="rating-input">
      <input type="text" placeholder="Your Name" required>
      <select required>
        <option value="">Stars</option>
        <option>★★★★★</option>
        <option>★★★★☆</option>
        <option>★★★☆☆</option>
        <option>★★☆☆☆</option>
        <option>★☆☆☆☆</option>
      </select>
      <textarea rows="3" placeholder="Your Comment" required></textarea>
      <button type="submit" class="submit-rating">Submit</button>
    </form>
  </div>

</body>
</html>

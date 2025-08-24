<?php
// Page title
$title = "Lawyers";

// Include auth, DB & header
include_once("includes/utils/auth.php");
include_once("includes/layouts/header.php");
include_once("includes/config/config.php");
?>

<!-- Search Filter Section -->
<?php
// Get search inputs from URL
$searchCity = $_GET['city'] ?? '';
$searchCategory = $_GET['category'] ?? '';

// Fetch all categories & cities
$categoryResult = mysqli_query($connection, "SELECT * FROM categories");
$cityResult = mysqli_query($connection, "SELECT * FROM cities");

// Base query to get active lawyers
$getLawyers = "
    SELECT lawyers.*, categories.category_name, cities.city_name
    FROM lawyers
    INNER JOIN categories ON lawyers.lawyer_category = categories.category_id
    INNER JOIN cities ON lawyers.lawyer_city = cities.city_id
    WHERE lawyers.lawyer_status = 'active'
";

// Apply filters
if ($searchCity) $getLawyers .= " AND cities.city_id = " . intval($searchCity);
if ($searchCategory) $getLawyers .= " AND lawyers.lawyer_category = " . intval($searchCategory);

// Execute query
$lawyerData = mysqli_query($connection, $getLawyers);
?>

<!-- Heading -->
<div class="hiw-heading-v2">
    <h2>Our Lawyers</h2>
    <p>Find and connect with the right lawyer for your needs.</p>
</div>

<!-- Search Filter Form -->
<div class="container my-4">
    <form method="GET" action="">
        <div class="search-filters">
            <!-- City Dropdown -->
            <select name="city">
                <option value="">All Cities</option>
                <?php foreach ($cityResult as $city) { ?>
                    <option value="<?php echo $city['city_id'] ?>" <?php echo $searchCity == $city['city_id'] ? 'selected' : '' ?>>
                        <?php echo $city['city_name'] ?>
                    </option>
                <?php } ?>
            </select>

            <!-- Category Dropdown -->
            <select name="category">
                <option value="">All Categories</option>
                <?php foreach ($categoryResult as $cat) { ?>
                    <option value="<?php echo $cat['category_id'] ?>" <?php echo $searchCategory == $cat['category_id'] ? 'selected' : '' ?>>
                        <?php echo $cat['category_name'] ?>
                    </option>
                <?php } ?>
            </select>

            <button type="submit">Search</button>
        </div>
    </form>
</div>

<!-- Lawyer Cards -->
<div class="container py-5">
    <div class="row g-4">
        <?php if (mysqli_num_rows($lawyerData) > 0): ?>
            <?php foreach ($lawyerData as $lawyer): ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="profile-card">
                        <!-- Profile Image -->
                        <div class="image">
                            <img src="lawyer/lawyer_assets/uploads/profilepic/<?php echo $lawyer['lawyer_picture'] ?>" alt="" class="profile-img" />
                        </div>
                        <!-- Name & Job -->
                        <div class="text-data">
                            <span class="name"><?php echo $lawyer['lawyer_name'] ?></span>
                            <span class="job"><?php echo $lawyer['category_name'] ?> | <?php echo $lawyer['city_name'] ?></span>
                        </div>
                        <!-- Rating -->
                        <div class="media-buttons rating">
                            <i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <!-- Profile button -->
                        <div class="buttons">
                            <a href="lawyer-profile.php?ID=<?php echo $lawyer['lawyer_id'] ?>" class="button">View Profile</a>
                        </div>
                        <!-- Analytics -->
                        <div class="analytics">
                            <div class="data"><i class="ri-heart-fill"></i><span class="number">60k</span></div>
                            <div class="data"><i class="ri-chat-1-fill"></i><span class="number">20k</span></div>
                            <div class="data"><i class="ri-share-forward-fill"></i><span class="number">12k</span></div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <p>No lawyers found.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php
// Include footer
include_once("includes/layouts/footer.php");
?>

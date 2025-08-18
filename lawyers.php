<?php
// Include authentication file
include_once("includes/utils/auth.php");

// Include header layout
include_once("includes/layouts/header.php");

// Include database configuration
include_once("includes/config/config.php");
?>

<!--Search Filter Section  -->
<?php
// Get search inputs from URL (city and category), default to empty if not set
$searchCity = isset($_GET['city']) ? $_GET['city'] : '';
$searchCategory = isset($_GET['category']) ? $_GET['category'] : '';

// Get all categories for dropdown
$categoryQuery = "SELECT * FROM categories";
$categoryResult = mysqli_query($connection, $categoryQuery);

// Get all cities for dropdown
$cityQuery = "SELECT * FROM cities";
$cityResult = mysqli_query($connection, $cityQuery);

// Base query to get active lawyers
$getLawyers = "
    SELECT lawyers.*, categories.category_name, cities.city_name
    FROM lawyers
    INNER JOIN categories ON lawyers.lawyer_category = categories.category_id
    INNER JOIN cities ON lawyers.lawyer_city = cities.city_id
    WHERE lawyers.lawyer_status = 'active'
";

// Apply city/category filters if provided by user
if (!empty($searchCity)) {
    $getLawyers .= " AND cities.city_id = " . intval($searchCity);
}
if (!empty($searchCategory)) {
    $getLawyers .= " AND lawyers.lawyer_category = " . intval($searchCategory);
}

// Executing getLawyers Query
$lawyerData = mysqli_query($connection, $getLawyers);
?>


<!-- Heading -->
<div class="hiw-heading-v2">
    <h2>Our Lawyers</h2>
    <p>Find and connect with the right lawyer for your needs.</p>
</div>

<!-- Search Filter -->
<div class="container my-4">
    <form method="GET" action="">
        <div class="search-filters">
            <!-- City Dropdown -->
            <select name="city">
                <option value="">All Cities</option>
                <?php foreach ($cityResult as $city) { ?>
                    <option value="<?php echo $city['city_id']; ?>"
                        <?php if ($searchCity == $city['city_id']) echo 'selected'; ?>>
                        <?php echo $city['city_name']; ?>
                    </option>
                <?php } ?>
            </select>

            <!-- Category Dropdown -->
            <select name="category">
                <option value="">All Categories</option>
                <?php
                foreach ($categoryResult as $cat) { ?>
                    <option value="<?php echo $cat['category_id']; ?>"
                        <?php if ($searchCategory == $cat['category_id']) echo 'selected'; ?>>
                        <?php echo $cat['category_name']; ?>
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

        <!-- Check if any lawyers found using mysqli_num_rows -->
        <?php if (mysqli_num_rows($lawyerData) > 0) {
            foreach ($lawyerData as $lawyer) { ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="profile-card">
                        <div class="image">
                            <img src="lawyer/assets/lawyer_uploads/<?php echo $lawyer['lawyer_picture']; ?>" alt="" class="profile-img" />
                        </div>
                        <div class="text-data">
                            <span class="name"><?php echo $lawyer['lawyer_name']; ?></span>
                            <span class="job"><?php echo $lawyer['category_name']; ?> | <?php echo $lawyer['city_name']; ?></span>
                        </div>
                        <div class="media-buttons rating">
                            <i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i><i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <div class="buttons">
                            <a href="lawyer-profile.php?ID=<?php echo $lawyer['lawyer_id']; ?>" class="button">View Profile</a>
                        </div>
                        <div class="analytics">
                            <div class="data"><i class="ri-heart-fill"></i><span class="number">60k</span></div>
                            <div class="data"><i class="ri-chat-1-fill"></i><span class="number">20k</span></div>
                            <div class="data"><i class="ri-share-forward-fill"></i><span class="number">12k</span></div>
                        </div>
                    </div>
                </div>
            <?php }
        } else { ?>
            <div class="col-12">
                <p class="text-center">No lawyers found.</p>
            </div>
        <?php } ?>
    </div>
</div>

<?php include_once("includes/layouts/footer.php"); ?>
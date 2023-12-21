<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plant Sliders</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: space-around;
        }

        .swiper-container {
            width: 45%;
            /* Adjust the width as needed */
            padding: 20px;
        }

        .swiper-slide {
            text-align: center;
            padding: 20px;
            box-sizing: border-box;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body>
    <div class="swiper-container">
        <div class="swiper-wrapper">
            <?php
            include("../connection.php");
            $sql = "select * from typemenu order by type_id";
            $result = mysqli_query($con, $sql);
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <div class="swiper-slide">
                    <a href="typemenu.php?type_id=<?php echo $row["type_id"]; ?>">
                        <form action="typemenu.php" method="post">
                            <input type="hidden" name="type_id" value="<?php echo $row["type_id"]; ?>">
                            <button type="submit" class="card-link">
                                <img src="../images/ข้าวมันไก่.jpg" alt="Plant 6" class="w-[150px] h-[100px] mx-auto">
                            </button>
                            <p class="text-white"><?php echo $row["type_name"]; ?></p>
                        </form>
                    </a>
                </div>
            <?php
            }
            ?>
        </div>
        <!-- Add Pagination -->
        <!-- <div class="swiper-pagination"></div> -->
        <!-- Add Navigation -->
        <!-- <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> -->
    </div>

    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    </script>




    <!-- 

    <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://via.placeholder.com/250x250" alt="Plant 6">
                <h3>Unique Tree</h3>
                <p>Outdoor Tree</p>
            </div>
        </div>
    </div> -->




    <!-- <div class="swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://via.placeholder.com/250x250" alt="Plant 4">
                <h3>Another Plant</h3>
                <p>Indoor/Outdoor</p>
            </div>
            <div class="swiper-slide">
                <img src="https://via.placeholder.com/250x250" alt="Plant 5">
                <h3>New Plant</h3>
                <p>Outdoor Plant</p>
            </div>
            <div class="swiper-slide">
                <img src="https://via.placeholder.com/250x250" alt="Plant 6">
                <h3>Unique Tree</h3>
                <p>Outdoor Tree</p>
            </div>
            Add more slides as needed
        </div>
        Add Pagination
        <div class="swiper-pagination"></div>
        Add Navigation
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div> -->


</body>

</html>
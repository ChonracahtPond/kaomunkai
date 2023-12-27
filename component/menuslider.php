<?php
session_start();
if ($_SESSION['Userlevel'] != 'M') {  //check session

  Header("Location: logout.php"); //ไม่พบผู้ใช้กระโดดกลับไปหน้า login form 

} else { ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <style>
        .owl-carousel {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* .owl-item {
            width: auto;
         
        }

        .owl-carousel img {
            width: 100%;
            height: auto;
           
        }

      
        .itemok {
            font-size: 50px;
            font-family: sans-serif;
            background-color: limegreen;
            width: 250px;
        } */

        /* .itemok-big {
            width: 500px;
        } */
    </style>
</head>

<body>

    <!-- <div class="owl-carousel">
        <div class="itemok">your content 111</div>
        <div class="itemok itemok-big">your content 222</div>
        <div class="itemok">your content 333</div>
    </div> -->


    <div class="owl-carousel h-[500px]" style="display: flex; flex-wrap: wrap; justify-content: center;">
      <?php
      include("../connection.php");
      $sql = "select * from typemenu order by type_id";
      $result = mysqli_query($con, $sql);
      while ($row = mysqli_fetch_array($result)) {
      ?>
        <div class="my-5 mx-2">
          <div class="col-sm-6 col-md-6 item">
            <form action="typemenu.php" method="post">
              <input type="hidden" name="type_id" value="<?php echo $row["type_id"]; ?>">
              <button type="submit" class="card-link">
                <img class="w-48 h-32 mx-auto rounded-md" src="../images/ข้าวมันไก่.jpg" alt="Food Image">
              </button>
              <p class="category text-white text-center mt-2"><?php echo $row["type_name"]; ?></p>
            </form>
          </div>
        </div>
      <?php
      }
      ?>
    </div>









    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.owl-carousel').owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoWidth: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true,
                fallbackEasing: 'linear'
            });
        });
    </script>

</body>

</html>
<?php } ?>
<?php session_start(); ?>
<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <title>Form Login</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    .bg {
      background-image: url("../images/bg.png");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      /* justify-content: center; */
    }
  </style>
</head>

<body class="bg">

  <!-- <form name="frmlogin" method="post" action="login.php" class=" text-white">
    <p> </p>
    <p><b> Login Form </b></p>
    <p> ชื่อผู้ใช้ :
      <input type="text" user_id="Username" required name="Username" placeholder="Username">
    </p>
    <p>รหัสผ่าน :
      <input type="password" user_id="Password" required name="Password" placeholder="Password">
    </p>
    <p>
      <button type="submit">Login</button>
      &nbsp;&nbsp;
      <button type="reset">Reset</button>
      <br>
    </p>
  </form> -->


  <!-- Container -->
  <div class="container mx-auto my-auto">
    <div class="flex justify-center px-6 my-12">
      <!-- Row -->
      <div class="w-full xl:w-3/4 lg:w-11/12 flex">
        <!-- Col -->
        <div class="w-full h-auto bg-[#B6F7C1] hidden lg:block lg:w-1/2 bg-cover rounded-l-lg ">
          <img src="../images/logo.png" alt="" class=" mx-auto my-20">
        </div>




        <!-- Col -->
        <div class="w-full lg:w-1/2 bg-[#373640] p-5 rounded-lg lg:rounded-l-none ">
          <h3 class="pt-4 text-2xl text-center text-[#B6F7C1]">เข้าสู่ระบบ</h3>
          <form class="px-8 pt-6 pb-8 mb-4  rounded" name="frmlogin" method="post" action="login.php">
            <div class="mb-4">
              <label class="block mb-2 text-sm font-bold text-[#B6F7C1]" for="username">
                ชื่อผู้ใช้
              </label>
              <input class="w-full px-3 py-2 text-sm leading-tight text-[#373640] border rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="text" user_id="Username" required name="Username" placeholder="Username" />
            </div>
            <div class="mb-4">
              <label class="block mb-2 text-sm font-bold text-[#B6F7C1]" for="password">
                รหัสผ่าน
              </label>
              <input class="w-full px-3 py-2 mb-3 text-sm leading-tight text-[#373640] border  rounded shadow appearance-none focus:outline-none focus:shadow-outline" type="password" user_id="Password" required name="Password" placeholder="Password" />

            </div>
            <!-- <div class="mb-4">
              <input class="mr-2 leading-tight" type="checkbox" id="checkbox_id" />
              <label class="text-sm" for="checkbox_id">
                Remember Me
              </label>
            </div> -->
            <div class="mb-6 text-center">
              <button class="w-full px-4 py-2 font-bold text-[#373640] bg-[#B6F7C1] rounded-full hover:bg-green-700 focus:outline-none focus:shadow-outline" type="submit">
                เข้าสู่ระบบ
              </button>
            </div>
            &nbsp;&nbsp;
            <button type="reset" class=" text-[#B6F7C1]">เคลียรหัสผ่าน</button>
            <!-- <hr class="mb-6 border-t" />
            <div class="text-center">
              <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="#">
                Create an Account!
              </a>
            </div>
            <div class="text-center">
              <a class="inline-block text-sm text-blue-500 align-baseline hover:text-blue-800" href="#">
                Forgot Password?
              </a>
            </div> -->
          </form>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
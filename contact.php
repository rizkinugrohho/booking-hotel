<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require("./include/links.php"); ?>
    <title>RN Hotel - Conatact</title>
</head>

<body class="bg-light">
    <!-- Header -->
    <?php require("./include/header.php"); ?>

    <div class="my-5 px-4">
        <h2 class="fw-bold new-font text-center">Contact Us</h2>
        <div class="hor-line bg-dark"></div>
        <p class="text-center mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem, cum <br> modi harum
            soluta molestias voluptatem quos perspiciatis officiis eius beatae?</p>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4">
                <div class="bg-white rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="320px" src="https://awsimages.detik.net.id/visual/2023/09/06/google-maps-ktt-asean_169.png?w=650" style="border:0;" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                    <h5>Address</h5>
                    <a href="https://maps.app.goo.gl/9BKWfiSJa7rXaaJU6" target="_blank" class="d-inline-block text-decoration-none text-dark mb-2">
                        <i class="bi bi-geo-alt-fill"></i> XYZ, Jakarta, Indonesia
                    </a>
                    <h5 class="mt-4">Call Us</h5>
                    <a href="#" class="d-inline-block mb-2 text-decoration-none text-dark">
                        <i class="bi bi-telephone-fill"></i>+628123456789
                    </a>
                    <h5 class="mt-4">Email Address</h5>
                    <a href="#" class="d-inline-block text-decoration-none text-dark">
                        <i class="bi bi-envelope-fill"></i> rizkynhg@gmail.com
                    </a>

                    <h5 class="mt-4">Follow Us</h5>

                    <a href="#" class="d-inline-block text-dark fs-5 me-2">
                        <i class="bi bi-twitter me-1"></i>
                    </a>

                    <a href="#" class="d-inline-block text-dark fs-5 me-2">
                        <i class="bi bi-facebook me-1"></i>
                    </a>
                    <a href="#" class="d-inline-block text-dark fs-5">
                        <i class="bi bi-instagram me-1"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 px-4">
                <div class="bg-white rounded shadow p-4">
                    <form action="" method="post">
                        <h5 class="text-center">Send a Message</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input type="text" name="name" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email Address</label>
                            <input type="email" name="email" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input type="text" name="subject" class="form-control shadow-none" required>
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea class="form-control shadow-none" name="message" rows="5" style="resize: none;" required></textarea>
                        </div>
                        <button type="submit" name="send" class="btn text-white custom-bg mt-3">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <?php
    // if (isset($_POST['send'])) {
    //     $filter_data = filteration($_POST);

    //     $query = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?, ?, ?, ?)";
    //     $values = [$filter_data['name'], $filter_data['email'], $filter_data['subject'], $filter_data['message']];
    //     $result = insert($query, $values, "ssss");

    //     if ($result == 1) {
    //         alert('success', 'Mail Sent Successfully');
    //     } else {
    //         alert('error', 'Message Sent Failed!');
    //     }
    // }
    ?> -->

    <!-- Footer -->
    <?php require("./include/footer.php"); ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - The Wear House</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body class="bg-gray-50">


    <main class="container mx-auto px-4 py-12">
        <!-- Hero Section -->
        <section class="bg-indigo-600 text-white rounded-xl p-8 mb-12 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Contact Us</h1>
            <p class="text-xl">We’re here to help! Get in touch with The Wear House team.</p>
        </section>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white p-8 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold mb-6">Send Us a Message</h2>
                <?php
                $successMessage = '';
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $name = htmlspecialchars(trim($_POST['name']));
                    $email = htmlspecialchars(trim($_POST['email']));
                    $subject = htmlspecialchars(trim($_POST['subject']));
                    $message = htmlspecialchars(trim($_POST['message']));

                    // For demonstration, we are just showing a success message
                    // In production, you can send an email using mail() function
                    if (!empty($name) && !empty($email) && !empty($subject) && !empty($message)) {
                        $successMessage = "Thank you, $name! Your message has been received.";
                    } else {
                        $successMessage = "Please fill in all fields.";
                    }
                }
                ?>
                <?php if ($successMessage): ?>
                    <p class="mb-4 text-green-600 font-semibold"><?= $successMessage ?></p>
                <?php endif; ?>
                <form action="" method="POST" class="space-y-4">
                    <div>
                        <label class="block text-gray-700 mb-1" for="name">Name</label>
                        <input type="text" name="name" id="name" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1" for="email">Email</label>
                        <input type="email" name="email" id="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1" for="subject">Subject</label>
                        <input type="text" name="subject" id="subject" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required>
                    </div>
                    <div>
                        <label class="block text-gray-700 mb-1" for="message">Message</label>
                        <textarea name="message" id="message" rows="5" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500" required></textarea>
                    </div>
                    <button type="submit" class="bg-indigo-600 text-white px-6 py-3 rounded-lg font-medium hover:bg-indigo-700 transition duration-300">Send Message</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="bg-white p-8 rounded-xl shadow-md">
                <h2 class="text-2xl font-bold mb-6">Contact Information</h2>
                <p class="text-gray-700 mb-4"><strong>Address:</strong> 123 Fashion Street, New York, NY 10001</p>
                <p class="text-gray-700 mb-4"><strong>Email:</strong> support@thewearhouse.com</p>
                <p class="text-gray-700 mb-4"><strong>Phone:</strong> +1 (555) 123-4567</p>
                <p class="text-gray-700 mb-4"><strong>Working Hours:</strong> Mon-Fri 9:00 AM - 6:00 PM</p>

                <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-indigo-600 hover:text-indigo-800" target="_blank"><i data-feather="facebook"></i></a>
                    <a href="#" class="text-indigo-600 hover:text-indigo-800" target="_blank"><i data-feather="instagram"></i></a>
                    <a href="#" class="text-indigo-600 hover:text-indigo-800" target="_blank"><i data-feather="twitter"></i></a>
                    <a href="#" class="text-indigo-600 hover:text-indigo-800" target="_blank"><i data-feather="linkedin"></i></a>
                </div>
            </div>
        </div>
    </main>


    <script>
        feather.replace();
    </script>
</body>
</html>

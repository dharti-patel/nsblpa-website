<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

    if (empty($name) || empty($email) || empty($message)) {
        $error = "All fields are required. Please go back and fill out the form.";
    }
} else {
    header("Location: contact.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>NSBLPA - Contact Confirmation</title>
  <link rel="stylesheet" href="assets/styles.css" />
</head>
<body>
  <header class="site-header">
    <div class="container flex-between">
        <h1 class="logo">
            <a href="index.html">NSBLPA</a>
        </h1>

        <div class="mobile-menu" id="mobileMenu">
            &#x22EE;
        </div>

        <nav class="nav" id="navMenu">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="ownership.html">Ownership</a></li>
            <li><a href="teams.html">Teams</a></li>
            <li><a href="apps.html">Apps</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
        </nav>
    </div>
  </header>

  <main class="container">
    <section class="contact-confirmation">
      <?php if(isset($error)): ?>
        <div class="message error">
          <h2>Oops!</h2>
          <p><?= $error ?></p>
          <a href="contact.html" class="btn">Go Back</a>
        </div>
      <?php else: ?>
        <div class="message success">
          <h2>Thank You, <?= $name ?>!</h2>
          <p>Your message has been received successfully.</p>
          <div class="message-details">
            <p><strong>Email:</strong> <?= $email ?></p>
            <p><strong>Message:</strong><br><?= nl2br($message) ?></p>
          </div>
          <a href="contact.html" class="btn">Back to Contact Page</a>
        </div>
      <?php endif; ?>
    </section>
  </main>

  <!-- Footer -->
  <footer class="site-footer">
    <div class="container">
      <p>&copy; 2025 NSBLPA. All rights reserved.</p>
    </div>
  </footer>
  <script src="assets/scripts.js"></script>
</body>
</html>

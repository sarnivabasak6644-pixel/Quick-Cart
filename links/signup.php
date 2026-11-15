<?php
include __DIR__ . '/../database/config.php';
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="theme-color" content="#681920" />
    <title>Create an account | Quick Cart</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet" />

    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Playball&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="<?= BASE_URL ?>css/style.css" />
    <link rel="stylesheet" href="<?= BASE_URL ?>css/login.css" />
</head>

<body class="login-page">
    <main class="login-layout">

        <section class="login-welcome" aria-labelledby="welcome-title">

            <a class="login-brand" href="<?= BASE_URL ?>index.php" aria-label="Quick Cart home">
                <span class="login-brand-icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                </span>
                <span>Quick Cart</span>
            </a>

            <div class="welcome-copy">
                <p class="welcome-eyebrow">Welcome to the neighborhood</p>
                <h1 id="welcome-title">Make room for<br />your next favorite.</h1>
                <p class="welcome-description">
                    Create an account to save your favorites and make checkout a little
                    easier next time.
                </p>
            </div>

            <div class="welcome-note">
                <i class="fa-solid fa-heart" aria-hidden="true"></i>
                <span>Thoughtful finds for everyday living</span>
            </div>

            <span class="welcome-orbit welcome-orbit-one" aria-hidden="true"></span>
            <span class="welcome-orbit welcome-orbit-two" aria-hidden="true"></span>

        </section>

        <section class="login-content" aria-labelledby="signup-title">

            <a class="back-home" href="<?= BASE_URL ?>index.php">
                <i class="fa-solid fa-arrow-left" aria-hidden="true"></i>
                Back to store
            </a>

            <div class="login-card">

                <div class="login-heading">
                    <p class="login-script">Join Quick Cart</p>
                    <h2 id="signup-title">Create your account</h2>
                    <p>Fill in your details to get started.</p>
                </div>

                <form class="login-form" action="#" method="post">

                    <!-- Full name -->
                    <div class="form-field">
                        <label for="full-name">Full name</label>

                        <div class="input-wrap">
                            <i class="fa-regular fa-user" aria-hidden="true"></i>

                            <input
                                id="full-name"
                                name="name"
                                type="text"
                                placeholder="Your name"
                                autocomplete="name"
                                maxlength="100"
                                required />
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-field">
                        <label for="email">Email address</label>

                        <div class="input-wrap">
                            <i class="fa-regular fa-envelope" aria-hidden="true"></i>

                            <input
                                id="email"
                                name="email"
                                type="email"
                                placeholder="you@example.com"
                                autocomplete="email"
                                required />
                        </div>
                    </div>

                    <!-- Mobile number -->
                    <div class="form-field">
                        <label for="mobile">Mobile number (Optional)</label>

                        <div class="input-wrap">
                            <i class="fa-solid fa-phone" aria-hidden="true"></i>

                            <input
                                id="mobile"
                                name="mobile"
                                type="tel"
                                placeholder="+91 9876543210"
                                autocomplete="tel"
                                inputmode="tel"
                                maxlength="16" />
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-field">
                        <label for="password">Password</label>

                        <div class="input-wrap">
                            <i class="fa-solid fa-lock" aria-hidden="true"></i>

                            <input
                                id="password"
                                name="password"
                                type="password"
                                placeholder="At least 8 characters"
                                autocomplete="new-password"
                                minlength="8"
                                required />
                        </div>
                    </div>

                    <!-- Confirm password -->
                    <div class="form-field">
                        <label for="confirm-password">Confirm password</label>

                        <div class="input-wrap">
                            <i class="fa-solid fa-lock" aria-hidden="true"></i>

                            <input
                                id="confirm-password"
                                name="confirm-password"
                                type="password"
                                placeholder="Enter your password again"
                                autocomplete="new-password"
                                minlength="8"
                                required />
                        </div>
                    </div>

                    <!-- Terms -->
                    <label class="remember-me" for="terms">
                        <input
                            id="terms"
                            name="terms"
                            type="checkbox"
                            required />

                        <span>I agree to the terms and privacy policy</span>
                    </label>

                    <button class="login-submit" type="submit">
                        Create account
                        <i class="fa-solid fa-arrow-right" aria-hidden="true"></i>
                    </button>

                </form>

                <p class="signup-prompt">
                    Already have an account?
                    <a href="<?= BASE_URL ?>links/login.php">Sign in</a>
                </p>

            </div>

            <p class="login-legal">
                Your details stay yours. We use them to support your account.
            </p>

        </section>
    </main>
</body>

</html>

<?php
    include_once('header.php')
?>

    <main>
        <section class="section login-section">
            <div class="container">
                <div class="wrapper form">
                    <h2 class="h2">Вхід</h2>
                    <form action="inc/signin.php" method="post">
                        <div class="input-container">
                        <input name="email" type="email" required class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="input-container">
                        <input name="pass" type="password" required class="form-control" id="password" placeholder="Пароль">
                        </div>
                        <button type="submit" class="btn btn-submit">Увійти</button>
                        <p>Ще не зареєстровані?</p>
                        <a href="registration.php" class="btn btn-submit">Зареєструватись</a>
                    </form>
                </div>
            </div>
        </section>
    </main>

<?php
    include_once('footer.php')
?>

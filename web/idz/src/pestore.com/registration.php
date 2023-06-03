<?php
    include_once('header.php')
?>

    <main>
        <section class="section login-section">
            <div class="container">
                <div class="wrapper form">
                    <h2 class="h2">Реєстрація</h2>
                    <form action="inc/signup.php" method="post">
                        <div class="input-container">
                            <input type="name" name="user_name" required class="form-control" id="name" placeholder="Ім'я">
                        </div>
                        <div class="input-container">
                        <input type="email" name="user_email" required class="form-control" id="email" placeholder="Email">
                        </div>
                        <div class="input-container">
                        <input type="password" name="user_pass" required class="form-control" id="password" placeholder="Пароль">
                        </div>
                        <button type="submit" class="btn btn-submit">Зареєструватись</button>
                        <p>Вже зареєстровані?</p>
                        <a href="login.php" class="btn btn-submit">Увійти</a>
                    </form>
                </div>
            </div>
        </section>
    </main>

<?php
    include_once('footer.php')
?>

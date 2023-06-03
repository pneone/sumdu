<?php
  session_start();
  if(!$_SESSION['user']['admin']){
    header('Location: ../index.php');
  }
  include_once('header.php');
  require_once 'inc/connect.php';
    
  $query = mysqli_query($connect, "SELECT * FROM `global_options`");
  $query = mysqli_fetch_assoc($query);
    


    
    
?>

    <main>
        <section class="section login-section">
            <div class="container products admin wrapper">
                <div class="sidebar">
                    <div class="settings">
                        <div class="tab-item">
                            <button id="global-tab" class="btn btn-white btn-admin active-tab">Налаштування</button>
                        </div>
                        <div class="tab-item">
                            <button id="products-tab" class="btn btn-white btn-admin ">Товари</button>
                        </div>
                        <div class="tab-item">
                            <button id="add-tab" class="btn btn-white btn-admin">Додавання товару</button>
                        </div>
                    </div>
                </div>

                <div class="content">

                    <div class="tab-content active-tab-content" id="global-tab-content">
                        
                        <form action="inc/update-site-info.php" method="post" >
                            <div class="input-container">
                                <input type="text" name="page_title" id="page_title" placeholder="Заголовок Сайту" value="<?php echo $query['page_title']; ?>" >
                            </div>
                            <div class="input-container">
                                <textarea type="text" name="about_info" id="about_info" placeholder="Коротка інформація про сайт" ><?php echo $query['about_info']; ?></textarea>
                            </div>
                            <div class="input-container">
                                <input type="text" name="faceproduct" id="faceproduct" placeholder="Faceproduct" value="<?php echo $query['faceproduct']; ?>" >
                            </div>
                            <div class="input-container">
                                <input type="text" name="twitter" id="twitter" placeholder="Twitter" value="<?php echo $query['twitter']; ?>">
                            </div>
                            <div class="input-container">
                                <input type="text" name="linkedin" id="linkedin" placeholder="Linkedin " value="<?php echo $query['linkedin']; ?>" >
                            </div>
                            <div class="input-container">
                                <input type="text" name="instagram" id="instagram" placeholder="Instagram" value="<?php echo $query['instagram']; ?>" >
                            </div>
                            <div class="input-container">
                                <input type="text" name="youtube" id="youtube" placeholder="YouTube" value="<?php echo $query['youtube']; ?>" >
                            </div>
                            <div class="input-container">
                                <input type="text" name="email" id="email" placeholder="Email" value="<?php echo $query['email']; ?>" >
                            </div>
                            <div class="input-container">
                                <input type="text" name="phone" id="phone" placeholder="Телефон" value="<?php echo $query['phone']; ?>" >
                            </div>


                            <button type="submit" class="btn btn-green btn-submit">Зберегти</button>
                        </form>

                    </div>
                    <div class="tab-content" id="products-tab-content">
                        <table class="form-container table">
                            <thead>
                              <tr>
                                <th scope="col">Назва товару</th>
                                <th scope="col">Ціна товару</th>
                                <th scope="col">Тип товару</th>
                                <th scope="col">Опис</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = mysqli_query($connect, "SELECT * FROM `products`");

                                $query = mysqli_fetch_all($query, MYSQLI_ASSOC);
                                foreach($query as $product){
                              
                                  ?>
                
                                  <tr class="product-row">
                                    <form action="inc/update-product.php" method="post">
                                      <input type="hidden" name="id" value="<?php echo $product['product_id']; ?>">
                                      <td >
                                        <div class="input-container">
                                          <input type="title" name="title" class="form-control" id="title" value="<?php echo $product['product_title']; ?>" placeholder="Назва книги" disabled>
                                        </div>  
                                      </td>
                                      <td>
                                        <div class="input-container">
                                          <input type="price" name="price" class="form-control" value="<?php echo $product['product_price']; ?>" id="price" placeholder="Ціна" disabled>
                                        </div>
                                      </td>
                                      <td>
                                        <div class="input-container">
                                          <input type="type" name="type" class="form-control" value="<?php echo $product['product_type']; ?>" id="type" placeholder="Тип" disabled>
                                        </div>
                                      </td>
                                      
                                      <td>
                                        <div class="input-container">
                                          <textarea name="text" id="text" class="form-control"placeholder="Коротка Інформація" disabled ><?php echo $product['product_info']; ?></textarea>
                                        </div>
                                      </td>
                                      <td class="buttons">
                                        <div class="btn btn-edit">
                                        <i class="fa-solid fa-pen"></i>
                                        </div>
                                      </td>
                                      <td class="buttons">
                                        <button type="submit" class="btn btn-save"><i class="fa-solid fa-cloud-arrow-up"></i></i></button>
                                      </td>
                                    </form>
                                    <form action="inc/delete-product.php" method="post">
                                      <input type="hidden" name="id" value="<?php echo $product['product_id']; ?>">
                                      <td class="buttons">
                                        
                                      <button type="submit" class="btn btn-remove">
                                      <i class="fa-solid fa-trash"></i>
                                      </button>
                                      </td>
                                    </form>
                                  </tr>
                                  <?php
                                }
                              ?>
              
                            </tbody>
                          </table>
                    </div>
                    <div class="tab-content" id="add-tab-content">
                        <form action="inc/add-product.php" method="post" enctype="multipart/form-data">
                            <div class="input-container">
                              <input name="title" type="title" class="form-control" id="title" placeholder="Назва товару">
                            </div>
                            <div class="input-container">
                              <input name="type" type="title" class="form-control" id="type" placeholder="Тип товару">
                            </div>
                            <div class="input-container">
                              <input name="image" class="form-control form-control-lg" id="formFile" type="file" accept=".img, .png, .jpg" placeholder="Обеірть зображення">
                            </div>
                            <div class="input-container">
                              <input name="price" type="price" class="form-control" id="price" placeholder="Ціна">
                            </div>
                            <div class="input-container">
                              <textarea name="text" id="text" class="form-control"placeholder="Іноформація про товар" ></textarea>
                            </div>
                            <button type="submit" class="btn btn-green btn-submit">Додати товар</button>
                          </form>
                    </div>

                </div>

            </div>
        </section>
    </main>

    <?php
    include_once('footer.php')
?>

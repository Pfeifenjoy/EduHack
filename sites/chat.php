<?php
$c = new Chat();
$d = $c->getChatById($_GET['id']);
$chatMessages = $c->getChatMessages($_GET['id']);

var_dump($chatMessages);

?><section class="chat-background">
          <div class="container">
            <div class="chat">
                <div class="col-md-9" id="messageDisplay" >
                  <!--<div class="col-md-12 post clear">
                    <div class="col-md-2">
                      <div class="user1 user-data">
                        <img src="img/login_bild.png" alt="Benutzerbild" />
                        <a href="">Username</a>
                      </div>
                    </div>

                    <div class="col-md-10 content">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
                  </div>
                </div> -->
                  
                <!-- <div class="col-md-12 post clear">
                    <div class="col-md-10 content">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
                  </div>
                  
                  <div class="col-md-2">
                      <div class="user2 user-data">
                        <img src="img/login_bild.png" alt="Benutzerbild" />
                        <a href="">Username</a>
                      </div>
                    </div>
                </div> -->
                    <!--
                  
                  <div class="col-md-12 post clear">
                    <div class="col-md-2">
                      <div class="user1 user-data">
                        <img src="img/login_bild.png" alt="Benutzerbild" />
                        <a href="">Username</a>
                      </div>
                    </div>

                    <div class="col-md-10 content">
                        Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
                  </div>
                </div> -->
                  
                </div>

                <div class="col-md-3 side">
                  <div class="headline">
                    <h1><?php echo $d['chat_title'];?></h1>
                    <ul class="hashtags">
                      <li><a href="">#hashtag1</a></li>
                      <li><a href="">#hashtag2</a></li>
                      <li><a href="">#hashtag3</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
        </section>
      <section id="reply">
        <div class="container">
          <div class="col-md-12">
              <input type="text" class="form-control" placeholder="Schreibe deine Antwort">
                <span class="input-group-btn">
                    <button class="btn btn-default yellow" type="button">Absenden</button>
                </span>
            
            <input class="btn btn-primary" type="" value="Problemlösung abschließen" />
              
            </div>
          </div>
      </section>

<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WEB 3</title>
    <link rel="stylesheet" href="style.css" />
  </head>

  <body>
      <div class="box-root padding-top--24 flex-flex flex-direction--column" style="flex-grow: 1;">
        <div class="formbg-outer">
          <div class="formbg">
            <div class="formbg-inner padding-horizontal--48">
              <span class="padding-bottom--15" style="text-align: center; color: black"><b>Заполните форму</b></span>
              <form id="stripe-login" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">

                <ul style="margin-center: 0px; margin-bottom: 20px; color: <?php
                if($rez==0){
                  echo "red";
                }
                else{
                  echo "green";
                }
                ?>;">
                  <?php
                  if($rez==0){
                    foreach($error as $cout2){
                      echo "<li>$cout2</li>";
                    }
                  }else{
                    echo "Данные отправлены!";
                  }
                  ?>
                </ul>

                <div class="field padding-bottom--24">
                  <label for="name">Имя</label>
                  <input class="pole" type="text" name="name" value="<?php echo "$name";?>">
                </div>

                <div class="field padding-bottom--24">
                  <label for="email">Email</label>
                  <input class="pole" type="email" name="email" value="<?php echo "$email";?>"/>
                </div>

                <div class="field padding-bottom--24">
                  <label>Год рождения</label>
                  <a style="white-space: nowrap;">
                    <select id="year" name="year" size="1" style="display: inline; border-radius: 5px;" ></select>
                  </a>
                  <script>
                    var objSel = document.getElementById("year");
                    var c = 0;
                    for (var i = 2023; i >= 1920; i--) {
                      objSel.options[c] = new Option(i, i);
                      c++;
                    }
                    document.getElementById('year').querySelectorAll('option')[2023-Number(<?php
                      echo $year;
                    ?>)].selected = true;;
                  </script>
                </div>

                <div class="field padding-bottom--24" style="height: 75px;">
                  <label >Пол:</label>
                  <a>Мужской<input type="radio" name="pol" class="radio" style="margin-left: 5px" value="Мужской" 
                      <?php
                      if($gender=="Мужской"){
                        echo "checked";
                      }
                      ?>/>
                  </a>
                  <a style="margin-left: 20px">Женский<input type="radio" name="pol" class="radio" style="margin-left: 5px" value="Женский"
                    <?php
                      if($gender=="Женский"){
                        echo "checked";
                      }
                    ?>/>
                  </a>
                </div>

                

                <div class="field padding-bottom--24" style="height: 75px;">
                  <label>Кол-во конечностей персонажа:</label>
                  <a
                    >2 <input type="radio" name="kol" value="2"
                    <?php
                    if($kol=="2"){
                      echo "checked";
                    }
                    ?>
                  /></a>
                  <a style="margin-left: 18px"
                    >4 <input type="radio" name="kol" value="4"
                    <?php
                    if($kol=="4"){
                      echo "checked";
                    }
                    ?>
                  /></a>
                  <a style="margin-left: 18px"
                    >6 <input type="radio" name="kol" value="6"
                    <?php
                    if($kol=="6"){
                      echo "checked";
                    }
                    ?>
                    /></a>
                  <a style="margin-left: 18px"
                    >8 <input type="radio" name="kol" value="8"
                    <?php
                    if($kol=="8"){
                      echo "checked";
                    }
                    ?>
                  /></a>
                </a>
                </div>

                <div class="field padding-bottom--24">
                  <label>Укажите сверхспособности:</label>
                  <a>
                    <select
                      name="superpowers[]"
                      style="
                        display: inline;
                        width: 180px;
                        overflow-y: hidden;
                        height: 72px;
                        border-radius: 5px;
                      "
                      multiple="multiple"
                    >
                      <option value="Бессмертие" style="padding:3px;" <?php
                      if(!empty($superpowers)){
                        foreach($superpowers as $cout){
                          if($cout =="Бессмертие"){
                            echo "selected";
                          }
                        }
                      }
                      ?>>Бессмертие</option>
                      <option value="Невидимость" style="padding:3px;" <?php
                      if(!empty($superpowers)){
                        foreach($superpowers as $cout){
                          if($cout =="Невидимость"){
                            echo "selected";
                          }
                        }
                      }
                      ?>>
                       Невидимость
                      </option>
                      <option value="Левитация" style="padding:3px;" <?php
                      if(!empty($superpowers)){
                        foreach($superpowers as $cout){
                          if($cout =="Левитация"){
                            echo "selected";
                          }
                        }
                      }
                      ?>>Левитация</option>
                    </select>
                  </a>
                </div>

                <div class="field padding-bottom--24">
                  <label>Биография</label>
                  <textarea rows="3" name="biography" maxlength="255"><?php
                    echo $biography;
                  ?></textarea>
                </div>
              
                <div class="field field-checkbox padding-bottom--24 flex-flex align-center">
                  <label for="checkbox">
                    <input type="checkbox" name="ok">С правилами ознакомлен.
                  </label>
                </div>

                <div class="field padding-bottom--24">
                  <input class="pole" type="submit" value="Отправить"/>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </body>
</html>

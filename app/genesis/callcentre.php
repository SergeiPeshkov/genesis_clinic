<!-- <?php
   require '/callcentre/bootstrap.php';
   ?>
<div class="row justify-content-center">
   <div class="col-10">
      <table class="table">
         <thead>
            <tr>
               <th>#</th>
               <th>Имя</th>
               <th>Email</th>
               <th>Зарегистрирован</th>
               <th>Телефон</th>
               <th>Статус</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            <?php
               $users = getUsersList();
               ?>
            <?php if(!empty($users)): ?>
            <?php foreach($users as $user): ?>
            <tr>
               <th scope="row"><?= $user['id'] ?></th>
               <td><?= $user['name'] ?></td>
               <td><?= $user['email'] ?></td>
               <td><?= $user['created_at'] ?></td>
               <td><?= $user['phone'] ?></td>
               <td>
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Ожидание</label>
                     <div class="col-sm-8">
                        <select class="form-control" name="country[]">
                           <option value="Ожидание">Ожидание</option>
                           <option value="На обработке">На обработке</option>
                           <option value="Не дозвонились">Не дозвонились</option>
                           <option value="Обработано">Обработано</option>
                           <option value="Спам">Спам</option>
                        </select>
                     </div>
                  </div>
               </td>
               <td>
                  <button type="button" class="btn btn-outline-danger btn-sm">Удалить</button>

               </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
         </tbody>
      </table>
      <div id="accordion" role="tablist" aria-multiselectable="true">
  <div class="card mb-5">
    <div class="card-header" role="tab" id="headingOne">
      <h5 class="mb-0">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Обработанные заявки (200)
          
        </a>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
      <div class="card-block">
      <table class="table">
         <thead>
            <tr>
               <th>#</th>
               <th>Имя</th>
               <th>Email</th>
               <th>Зарегистрирован</th>
               <th>Телефон</th>
               <th>Статус</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            <?php
               $users = getUsersList();
               ?>
            <?php if(!empty($users)): ?>
            <?php foreach($users as $user): ?>
            <tr>
               <th scope="row"><?= $user['id'] ?></th>
               <td><?= $user['name'] ?></td>
               <td><?= $user['email'] ?></td>
               <td><?= $user['created_at'] ?></td>
               <td><?= $user['phone'] ?></td>
               <td>
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Ожидание</label>
                     <div class="col-sm-8">
                        <select class="form-control" name="country[]">
                           <option value="Ожидание">Ожидание</option>
                           <option value="На обработке">На обработке</option>
                           <option value="Не дозвонились">Не дозвонились</option>
                           <option value="Обработано">Обработано</option>
                           <option value="Спам">Спам</option>
                        </select>
                     </div>
                  </div>
               </td>
               <td>
                  <button type="button" class="btn btn-outline-danger btn-sm">Удалить</button>
                  <br>
                  Обработал: Доля.М.А
               </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
         </tbody>
      </table>      
   </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" role="tab" id="headingTwo">
      <h5 class="mb-0">
        <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Спам/мусор/неверный номер (120)
        </a>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="card-block">
      <table class="table">
         <thead>
            <tr>
               <th>#</th>
               <th>Имя</th>
               <th>Email</th>
               <th>Зарегистрирован</th>
               <th>Телефон</th>
               <th>Статус</th>
               <th></th>
            </tr>
         </thead>
         <tbody>
            <?php
               $users = getUsersList();
               ?>
            <?php if(!empty($users)): ?>
            <?php foreach($users as $user): ?>
            <tr>
               <th scope="row"><?= $user['id'] ?></th>
               <td><?= $user['name'] ?></td>
               <td><?= $user['email'] ?></td>
               <td><?= $user['created_at'] ?></td>
               <td><?= $user['phone'] ?></td>
               <td>
                  <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Ожидание</label>
                     <div class="col-sm-8">
                        <select class="form-control" name="country[]">
                           <option value="Ожидание">Ожидание</option>
                           <option value="На обработке">На обработке</option>
                           <option value="Не дозвонились">Не дозвонились</option>
                           <option value="Обработано">Обработано</option>
                           <option value="Спам">Спам</option>
                        </select>
                     </div>
                  </div>
               </td>
               <td>
                  <button type="button" class="btn btn-outline-danger btn-sm">Удалить</button>
                  <br>
                  Обработал: Доля.М.А
               </td>
            </tr>
            <?php endforeach; ?>
            <?php endif; ?>
         </tbody>
      </table>         </div>
    </div>
  </div>

</div>
   </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="/callcentre/assets/js/form.js"></script> -->

<h1>11</h1>
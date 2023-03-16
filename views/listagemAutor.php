<h1>Listagem de Autores</h1>
 <a class="btn btn-primary" href="<?php echo APP.'autor/novo'; ?>">Novo</a>
 <table class="table table-bordered table-striped">
   <thead>
     <tr>
       <th>ID</th>
       <th>Nome</th>
       <th>Email</th>
       <th></th>
       <th></th>
     </tr>
   </thead>
   <tbody>
     <?php
       foreach ($autores as $autor) {
          $pathEditar = APP.'autor/editar';
          $pathExcluir = APP.'autor/excluir';

          echo "
          <tr>
            <td>{$autor['id']}</td>
            <td>{$autor['nome']}</td>
            <td>{$autor['email']}</td>
            <td><a class='btn btn-primary' href='$pathEditar/{$autor['id']}'>+</a></td>
            <td><a class='btn btn-danger' href='$pathExcluir/{$autor['id']}'>-</a></td>
          </tr>
          ";
       }
      ?>

   </tbody>
 </table>

<?php 
include('php.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CRUD</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="./style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="./javascript.js"></script>
  
  <body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Agenda <b>Eletrônica</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addUser" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Cadastrar</span></a>
						<a href="#deleteUser" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Deletar</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
                        <th>id</th>
                        <th>Name</th>
                        <th>Descrição</th>
						<th>Início</th>
                        <th>Término</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
				<?php while($dado = mysqli_fetch_assoc($result)) { ?>
                <tbody>
                    <tr>
						<td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
						</td>
                        <td><?php echo $dado['id']; ?></td>
                        <td><?php echo $dado['nome']; ?></td>
						<td><?php echo $dado['Descrição']; ?></td>
                        <td><?php echo $dado['Inicio']; ?></td>
                        <td><?php echo $dado['Termino']; ?></td>
                        <td><?php echo $dado['status']; ?></td>
                        <td>
                            <a href="#editUser" data-id="<?php echo "{$dado['id']}, {$dado['nome']}, {$dado['Descrição']}, {$dado['Inicio']}, {$dado['Termino']}, {$dado['status']}";?>" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Editar">&#xE254;</i></a>
                            <a href="#deleteUser" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Deletar">&#xE872;</i></a>
                        </td>
                    </tr> 
                </tbody>
				<?php } ?> 
            </table>
			<div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item active"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
	<!-- Edit Modal HTML -->
	<div id="addUser" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="cadastro.php">
					<div class="modal-header">						
						<h4 class="modal-title">Cadastro de Usuário</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nome</label>
							<input type="text" class="form-control" name="cad_nome" required>
						</div>
						<div class="form-group">
							<label>Descrição</label>
							<textarea class="form-control" name="cad_descricao" required></textarea>
						</div>
						<div class="form-group">
							<label>Inicio</label>
							<input type="text" class="form-control" name="cad_inicio" required>
						</div>
						<div class="form-group">
							<label>Termino</label>
							<input type="text" class="form-control" name="cad_termino" required>
						</div>
						<div class="form-group">
							<label>status</label>
							<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="cad_status" required>
								<option selected>Selecione</option>
								<option value="pendente">pendente</option>
								<option value="andamento">andamento</option>
								<option value="concluído">concluído</option>
							</select>
						</div>				
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-success" value="Adicionar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit Modal HTML -->
	<div id="editUser" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form method="POST" action="editarUser.php">
					<div class="modal-header">						
						<h4 class="modal-title">Editar Usuário</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
						<input type="text" id="id" name="id"/>
						<?php
							if(isset($_POST['id'])){
								$id = $_POST['id'];
							}
							echo $id;
						?>
					<div class="modal-body">					
						<div class="form-group">
							<label>Nome</label>
							<input type="text" class="form-control" id="nome" name="nome" required>
						</div>
						<div class="form-group">
							<label>Descrição</label>
							<textarea class="form-control" name="descricao" required></textarea>
						</div>
						<div class="form-group">
							<label>Inicio</label>
							<input type="text" class="form-control" name="inicio" required>
						</div>
						<div class="form-group">
							<label>Termino</label>
							<input type="text" class="form-control" name="termino" required>
						</div>
						<div class="form-group">
							<label>status</label>
							<select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="status" required>
								<option selected>Selecione</option>
								<option value="pendente">pendente</option>
								<option value="andamento">andamento</option>
								<option value="concluído">concluído</option>
							</select>
							<input type="hidden" id="meuid" name="id" value=""/>
						</div>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-info" value="Salvar">
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteUser" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">						
						<h4 class="modal-title">Deletar Usuário</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<p>Tem certeza que deseja excluir este usuário?</p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancelar">
						<input type="submit" class="btn btn-danger" value="Deletar">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<?php include("includes/page-top.php"); ?>

<div class="container mt-5">
  <div class="card p-4 shadow-sm">
    <h4 class="text-center mb-4">Cadastro de Usuário</h4>

    <form id="formCadastro">
      <div class="row mb-3">
        <div class="col-md-4">
          <label for="nome" class="form-label">Nome</label>
          <input type="text" id="nome" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label for="email" class="form-label">Email</label>
          <input type="email" id="email" class="form-control" required>
        </div>
        <div class="col-md-4">
          <label for="telefone" class="form-label">Telefone</label>
          <input type="text" id="telefone" class="form-control" required>
        </div>
      </div>

      <div class="text-center">
        <button type="submit" class="btn btn-success px-4">Salvar</button>
      </div>
    </form>

    <div id="listaUsuarios" class="mt-4"></div>
  </div>
</div>

<script>
  const form = document.getElementById('formCadastro');
  const lista = document.getElementById('listaUsuarios');

  form.addEventListener('submit', function (e) {
    e.preventDefault();

    const nome = document.getElementById('nome').value.trim();
    const email = document.getElementById('email').value.trim();
    const telefone = document.getElementById('telefone').value.trim();

    if (!nome || !email || !telefone) return;

    // Cria o elemento visual
    const div = document.createElement('div');
    div.classList.add('p-3', 'mt-2', 'rounded', 'bg-light', 'text-secondary', 'd-flex', 'justify-content-between', 'align-items-center');
    div.innerHTML = `
      <div>
        <strong>${nome}</strong><br>
        ${email}<br>
        ${telefone}
      </div>
      <div>
        <button class="btn btn-sm btn-warning me-2 editar">Editar</button>
        <button class="btn btn-sm btn-success confirmar">Confirmar</button>
      </div>
    `;

    // Botão editar
    div.querySelector('.editar').addEventListener('click', function () {
      document.getElementById('nome').value = nome;
      document.getElementById('email').value = email;
      document.getElementById('telefone').value = telefone;
      div.remove();
    });

    // Botão confirmar
    div.querySelector('.confirmar').addEventListener('click', function () {
      div.classList.remove('bg-light', 'text-secondary');
      div.classList.add('bg-success', 'text-white');
      this.remove(); // remove o botão confirmar
      div.querySelector('.editar').remove(); // remove o botão editar
    });

    lista.appendChild(div);
    form.reset();
  });
</script>

<?php include("includes/page-bottom.php"); ?>

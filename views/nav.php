<?php
use App\Services\Auth;
?>
<?php if(isset($hideNav)) return ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= URL ?>">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-bank"           viewBox="0 0 16 16">
        <path d="m8 0 6.61 3h.89a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v7a.5.5 0 0 1 .485.38l.5 2a.498.498 0 0 1-.485.62H.5a.498.498 0 0 1-.485-.62l.5-2A.501.501 0 0 1 1 13V6H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 3h.89L8 0ZM3.777 3h8.447L8 1 3.777 3ZM2 6v7h1V6H2Zm2 0v7h2.5V6H4Zm3.5 0v7h1V6h-1Zm2 0v7H12V6H9.5ZM13 6v7h1V6h-1Zm2-1V4H1v1h14Zm-.39 9H1.39l-.25 1h13.72l-.25-1Z"/>
        </svg> 
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link fw-bold fs-4" href="<?= URL ?>sort/d/D">Sąskaitų sąrašas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fw-bold fs-4" href="<?= URL ?>list/create">Naujas klientas</a>
        </li>
      </ul>
      <span class="navbar-text fs-4">
        <?php if(Auth::get()->isAuth()) : ?>
          <span>Dirba: <span style="color: blue"><?= Auth::get()->getNAme() ?></span></span>
            <form class="logout" action="<?= URL ?>logout" method="post">
              <button type="submit">logout</button>
            </form>
          <?php else : ?>
            <a class="nav-link" href="<?= URL ?>login">login</a>
        <?php endif ?>  
      </span>
    </div>
  </div>
</nav>
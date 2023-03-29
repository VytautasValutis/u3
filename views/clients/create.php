<?php
use App\Services\AccNum;
use App\Services\PersCode;
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8 ">
    <div class="card mt-5">
        <div class="card-header">
            <h1>Naujas klientas</h1>
        </div>
            <div class="card-body">
                <form action="<?= URL ?>list/create" method="post">
                    <div class="mb-3">
                        <label class="form-label fs-4">Kliento vardas</label>
                        <input type="text" class="form-control" name="name" value="<?= $name ?? ''?>">
                        <div class="form-text">Vatotojo vardas: min 3 simboliai</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Kliento pavardė</label>
                        <input type="text" class="form-control" name="surname" value="<?= $surname ?? '' ?>">
                        <div class="form-text">Vartotojo pavardė: min 3 simboliai</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Kliento asmens kodas   <span class="fs-6 fst-italic">pvz:  <?= PersCode::get()->putRandCode() ?></span></label>
                        <input type="text" class="form-control" name="persCode" value="<?= $persCode ?? ""?>">
                        <div class="form-text">Vartotojo asmens kodas</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Kliento sąskaita</label>
                        <input readonly type="text" class="form-control" name="accNum" value="<?= $accNum ?? AccNum::get()->accNr() ?>">
                        <div class="form-text">Vartotojo sąskaitos nr. <span style="color: red">Keisti negalima</span></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Patvirtinti</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
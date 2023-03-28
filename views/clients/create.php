<?php
use App\Services\AccNum;
?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8 ">
    <div class="card mt-5">
        <div class="card-header">
            <h1>Naujas klientas</h1>
        </div>
            <div class="card-body">
                <form action="<?= URL ?>clients/create" method="post">
                    <div class="mb-3">
                        <label class="form-label fs-4">Kliento vardas</label>
                        <input type="text" class="form-control" name="name">
                        <div class="form-text">Vatotojo vardas: min 3 simboliai</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Kliento pavardė</label>
                        <input type="text" class="form-control" name="surname">
                        <div class="form-text">Vartotojo pavardė: min 3 simboliai</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Kliento asmens kodas</label>
                        <input type="text" class="form-control" name="persCode">
                        <div class="form-text">Vartotojo asmens kodas</div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4">Kliento sąskaita</label>
                        <input readonly type="text" class="form-control" name="accNum" value="<?= AccNum::get() ->accNr() ?>">
                        <div class="form-text">Vartotojo sąskaitos nr. <span style="color: red">Keisti negalima</span></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Patvirtinti</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
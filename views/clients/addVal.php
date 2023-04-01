<?php
use App\Services\AccNum;
use App\Services\PersCode;

    // echo'<pre>';
    // print_r($data);
    // print_r($client);
    // die;

?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-8 ">
    <div class="card mt-5">
        <div class="card-header lentele-bg">
            <h1>Pridėti lėšų</h1>
        </div>
            <div class="card-body">
                <form action="<?= URL ?>list/addVal/<?= $client['id'] ?>" method="post">
                    <div class="mb-3">
                        <label class="form-label fs-4 w-auto">Kliento vardas</label>
                        <input readonly type="text" class="form-control w-50 d-inline-block float-end" name="name" value="<?= $client['name'] ?? ''?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4 w-auto">Kliento pavardė</label>
                        <input readonly type="text" class="form-control w-50 d-inline-block float-end" name="surname" value="<?= $client['surname'] ?? '' ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4 w-auto">Kliento asmens kodas</label>
                        <input readonly type="text" class="form-control w-50 d-inline-block float-end" name="persCode" value="<?= $client['persCode'] ?? ""?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4 w-auto">Kliento sąskaita</label>
                        <input readonly type="text" class="form-control w-50 d-inline-block float-end" name="accNum" value="<?= $client['accNum'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4 w-auto">Kliento sąskaitos likutis</label>
                        <input readonly type="text" class="form-control w-50 d-inline-block float-end" name="value" value="<?= $client['value'] ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fs-4 w-auto">Nurodykite pridedamų lėšų kiekį</label>
                        <input type="text" class="form-control w-50 d-inline-block float-end" name="addValue" value="0">
                    </div>
                    <button type="submit" class="btn btn-primary">Patvirtinti</button>
                </form>
            </div>
        </div>
    </div>
  </div>
</div>
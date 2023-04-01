<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">
                    <a href="<?= URL ?>sort/<?= $sortOld ?>/A" style="text-decoration: none;">
                    # <span style="color: red;"><?= $a_sort ?></span></a></th>
                <th scope="col">A.k.</th>
                <th scope="col">Vardas</th>
                <th scope="col">
                    <a href="<?= URL ?>sort/<?= $sortOld ?>/D" style="text-decoration: none;">
                    Pavardė <span style="color: red;"><?= $d_sort ?></span></a></th>
                <th scope="col">
                    <a href="<?= URL ?>sort/<?= $sortOld ?>/E" style="text-decoration: none;">
                    Lėšos <span style="color: red;"><?= $e_sort ?></span></a></th>
            </tr>
        </thead>
        <tbody>
<?php foreach($clients as $v) : ?>            
            <tr>
                <th scope="row"><?= $v['accNum'] ?></th>
                <td><?= $v['persCode'] ?></td>
                <td><?= $v['name'] ?></td>
                <td><?= $v['surname'] ?></td>
                <td><b><?= $v['value'] ?></b></td>
                <td>
                    <form action="<?= URL ?>list/addVal/<?= $v['id'] ?>" method="post">
                    <button type="submit" class="btn btn-outline-success">Prideti lėšų</button>
                    </form>
                </td>
                <td>
                    <form action="<?= URL ?>list/remVal/<?= $v['id'] ?>" method="post">
                    <button type="submit" class="btn btn-outline-primary">Nuskaičiuoti lėšas</button>
                    </form>
                </td>
                <td>
                    <form action="<?= URL ?>list/delete/<?= $v['id'] ?>" method="post">
                    <button type="submit" class="btn btn-outline-danger">Pašalinti sąskaitą</button>
                    </form>
                </td>
            </tr>
<?php endforeach ?>            
        </tbody>
    </table>
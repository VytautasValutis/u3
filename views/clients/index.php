<table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">
                    <a href="<?= URL ?>u3/list/<?= $sortOld ?>/A" style="text-decoration: none;">
                    # <span style="color: red;"><?= $a_sort ?></span></a></th>
                <th scope="col">A.k.</th>
                <th scope="col">Vardas</th>
                <th scope="col">
                    <a href="<?= URL ?>u3/list/<?= $sortOld ?>/D" style="text-decoration: none;">
                    Pavardė <span style="color: red;"><?= $d_sort ?></span></a></th>
                <th scope="col">
                    <a href="<?= URL ?>u3/list/<?= $sortOld ?>/E" style="text-decoration: none;">
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
                    <a type="button" class="btn btn-outline-success" href="./prideti.php?id=<?= $v['id'] ?>">Prideti lėšų</a>
                </td>
                <td>
                    <a type="button" class="btn btn-outline-primary" href="./nuskaiciuoti.php?id=<?= $v['id'] ?>">Nuskaičiuoti lėšas</a>
                </td>
                <td>
                    <form action="./pasalinti.php?id=<?= $v['id'] ?>" method="post">
                    <button type="submit" class="btn btn-outline-danger">Pašalinti sąskaitą</button>
                    </form>
                </td>
            </tr>
<?php endforeach ?>            
        </tbody>
    </table>
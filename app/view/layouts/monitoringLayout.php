<div class="container" style="width: 500px">
    <h2>Готовы отвечать</h2>
    <table class="table">
        <thead>
        <tr>
            <th>name</th>
            <th>State</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($result[usersReady] as $key) { ?>
            <tr>
                <td><?php echo $key->name ?></td>
                <td><?php echo $key->state ?></td>
            </tr>
        <?php } ?>



        </tbody>
    </table>
    <table class="table">
        <h2>Список оценок</h2>

        <thead>
        <tr>
            <th>name</th>
            <th>mark</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($result[usersMark] as $key) { ?>
            <tr>
                <td><?php echo $key->name ?></td>
                <td><?php echo $key->mark ?></td>
            </tr>
        <?php } ?>



        </tbody>
    </table>
</div>

<table class="table rounded rounded-3">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Mobile</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Batch Name</th>
            <th scope="col">Visit</th>
        </tr>
    </thead>
    <tbody class="table-group-divider overflow-auto">

        <?php
        $getStudentDataGet = $pdo->prepare("SELECT * FROM student INNER JOIN batch ON student.batch_batchId = batch.batchId INNER JOIN attendingstatus ON student.attendingStatus_id = attendingstatus.id WHERE verifyed = '1' ");
        $getStudentDataGet->execute();
        $getStudentData = $getStudentDataGet->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows

        $numberCount = 1;
        foreach ($getStudentData as $row) {


            ?>
            <tr class="table-info">
                    <th scope="row">
                        <?php echo $numberCount; ?>
                    </th>
                    <td>
                        <?php echo $row['mobile']; ?>
                    </td>
                    <td>
                        <?php echo $row['firstName']; ?>
                    </td>
                    <td>
                        <?php echo $row['lastName']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['statusName']; ?>
                    </td>
                    <td>
                        <?php echo $row['batchName']; ?>
                    </td>
                    <td>
                        <button type="button" class="admin-button-1" onclick="gotoStudentProfile('<?php echo $row['mobile']; ?>');">Go Profile</button>
                    </td>
                </tr>
            <?php

            $numberCount = $numberCount + 1;
        }
        ?>
    </tbody>
</table>
<table class="table rounded rounded-3">

    <thead>
        <tr>
            <th scope="col">Unit ID</th>
            <th scope="col">Unit Name</th>
            <th scope="col">Unit Grade</th>
            <th scope="col">EDIT</th>

        </tr>
    </thead>
    <tbody class="table-group-divider overflow-auto">

        <?php
        $getSubjectData = $pdo->prepare("SELECT * FROM subjecttitle ");
        $getSubjectData->execute();
        $SubjectData = $getSubjectData->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows

        $numberCount = 1;
        foreach ($SubjectData as $row) {

        ?>
            <tr class="table-success">
                <td>
                    <?php echo $row['id']; ?>
                </td>
                <td>
                    <?php echo $row['titleName']; ?>
                </td>
                <td>
                    <?php echo $row['grade']; ?>
                </td>
                <td>
                    <button class="admin-button-1" onclick="loadSubjectData('<?php echo $row['id']; ?>');">EDIT SUBJECT</button>
                </td>
            </tr>

        <?php
            $numberCount = $numberCount + 1;
        }
        ?>
    </tbody>
</table>
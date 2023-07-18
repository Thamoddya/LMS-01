<?php


$getSubjecttitle = $pdo->prepare("SELECT * FROM `subjecttitle`");
$getSubjecttitle->execute();
$getSubjecttitleResult = $getSubjecttitle->fetchAll();

if (count($getSubjecttitleResult) > 0) {
    foreach ($getSubjecttitleResult as $row) {

?>
        <div class="cource-block-two col-lg-4 col-md-6 col-sm-12">
            <div class="inner-box">
                <div class="image">
                    <a href="unitVideos.student.php?titleID=<?php echo $row['id'] ?>"><img src="../assets/images/resource/YT thumbmail.jpg" alt=""></a>
                </div>
                <div class="lower-content">
                    <h5><a href="unitVideos.student.php?titleID=<?php echo $row['id'] ?>"><?php echo $row['titleName'] ?></a></h5>
                    <div class="text"><?php echo $row['subjectText'] ?>.</div>
                    <div class="clearfix">
                        <div class="pull-left">
                            <div class="students">10</div>
                        </div>
                        <div class="pull-right">
                            <div class="hours">Neel Prasanna</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php


    }
} else {
    echo "No matching records found.";
}
?>
<div class="col-12">
  <h5>UPLOAD VIDEO</h5>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 form-group">
  <select class="form-select border-primary" aria-label="Default select example" id="videoType">
    <option value="0" selected>Public Video</option>
    <option value="1">Private Video</option>
  </select>
</div>

<div class="col-lg-6 col-md-6 col-sm-12 form-group">
  <select class="form-select border-primary" aria-label="Default select example" id="videoUnit">
    <?php
    $getUnitData = $pdo->prepare("SELECT * FROM subjecttitle");
    $getUnitData->execute();
    $unitDataRows = $getUnitData->fetchAll(PDO::FETCH_ASSOC);

    foreach ($unitDataRows as $unitData) {
    ?>
      <option value="<?php echo $unitData['id'] ?>">
        <?php echo $unitData['titleName'] ?>
      </option>
    <?php
    }
    ?>
  </select>
</div>

<div class="input-group mb-3 mt-1">
  <label class="input-group-text" for="inputGroupFile01">Video Name</label>
  <input type="text" class="form-control" id="uploadVideoName">
</div>

<div class="input-group mb-3 mt-1">
  <label class="input-group-text" for="inputGroupFile01">Upload</label>
  <input type="file" class="form-control" id="video" accept=".mp4">
</div>
<div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
  <div class="progress-bar" style="width: 0%">0%</div>
</div>
</div>
<button class="theme-btn mt-2 btn-style-three" onclick="UploadVideo();">Upload Video<i class="fa fa-angle-right"></i></button>

<div class="row mt-3">

  <div class="col-lg-6 col-md-6 col-sm-12 form-group">
    <select class="form-select border-primary" aria-label="Default select example" id="gotSelectedSubject" onchange="selectedUnit();">
      <option value="0">Select unit</option>
      <?php
      $getUnitData = $pdo->prepare("SELECT * FROM subjecttitle");
      $getUnitData->execute();
      $unitDataRows = $getUnitData->fetchAll(PDO::FETCH_ASSOC);

      foreach ($unitDataRows as $unitData) {
      ?>
        <option value="<?php echo $unitData['id'] ?>">
          <?php echo $unitData['titleName'] ?>
        </option>
      <?php
      }
      ?>
    </select>
  </div>

  <div class="col-lg-6 col-md-6 col-sm-12 form-group">
    <select class="form-select border-primary" aria-label="Default select example" id="loadVideoData" onchange="openVideoLink()">

    </select>
  </div>

  <div class="col-12 mt-1">
    <div class="col-12 mt-1">
      <video id="UnitVideoLink" class="video-js vjs-default-skin col-12" controls preload="auto" height="500" width="100%" data-setup='{
                              }'>
        <source id="videoSource" src="./videos/NEELICT TV advertisements.mp4" type="video/mp4" />
      </video>

    </div>
  </div>

  <div class="col-12 mt-2">
    <div class="row">
      <hr>
      <div class="col-12">
        <h6>Private Videos</h6>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
        <select class="form-select border-primary" aria-label="Default select example" id="loadPrivateVideoData">
        </select>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
        <select class="form-select border-primary" id="loadPrivateVideoDataVithVideo">
        </select>
      </div>
    </div>
    <button class="theme-btn mt-2 btn-style-three" onclick="addPrivateVideoToBatch();">Assign
      Video To Batch</button>
  </div>
  <div class="col-12 mt-2">
    <div class="row">
      <hr>
      <div class="col-12">
        <h6>Private Videos</h6>
      </div>
      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
        <select class="form-select border-primary" aria-label="Default select example" id="getPrivatevideoData" onchange="loadVideosToBatch();">
          <?php
          $getBatchDataforVideo = $pdo->prepare('SELECT * FROM batch');
          $getBatchDataforVideo->execute();
          while ($getBatchDataforVideoData = $getBatchDataforVideo->fetch(PDO::FETCH_ASSOC)) {
          ?>
            <option value="<?php echo $getBatchDataforVideoData['batchId']; ?>"><?php echo $getBatchDataforVideoData['batchName']; ?></option>
          <?php
          }
          ?>
        </select>
      </div>

      <div class="col-lg-6 col-md-6 col-sm-12 form-group">
        <select class="form-select border-primary" id="loadBatchhasVideoData">
        </select>
      </div>
    </div>
    <button class="theme-btn mt-2 btn-style-three" onclick="UnassignBatchToVideo();">Unassign Video From batch</button>
  </div>
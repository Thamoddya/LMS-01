<div class="row">
    <div class="col-12 mt-2">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="inputPassword6" class="col-form-label">Student Mobile</label>
            </div>
            <div class="col-auto">
                <input type="number" class="form-control" id="studentMobile" aria-labelledby="passwordHelpInline" oninput="getMobileSuggestions()" list="mobileSuggestions">
                <datalist id="mobileSuggestions"></datalist> <!-- Add this datalist element -->
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" onclick="gotoStudentProfile($('#studentMobile').val());">Profile</button>
            </div>
        </div>

    </div>
    <div class="title-box mt-4">
        <h5>Unverified Students</h5>
    </div>
    <div class="col-12 mt-3 overflow-auto ">
        <?php
        include_once "./admin.layouts/main.studentTable1.php";
        ?>
    </div>
    <div class="title-box mt-4">
        <h5>Verified Students</h5>
    </div>
    <div class="col-12 mt-3 overflow-auto">
        <?php
        include_once "./admin.layouts/main.studentTable2.php";
        ?>
    </div>

</div>
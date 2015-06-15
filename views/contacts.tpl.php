<div class="row padding-a-bit">
    <div>
        <h1><?= $title ?></h1>
        <p class="text-muted">We look forward to hearing from you!</p>
        <p>info@my.company</p>
        <div class="col-md-4">
            <form action="" method="post">
                <div class="form-group">
                  <label for="inputName">Name</label>
                  <input type="text" class="form-control" id="inputName" name="inputName" placeholder="Enter Name">
                </div>
                <div class="form-group">
                  <label for="inputLastName">Last Name</label>
                  <input type="text" class="form-control" id="inputLastName" name="inputLastName" placeholder="Enter Last Name">
                </div>
                <div class="form-group">
                  <label for="inputEmail">Email Address</label>
                  <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email">
                </div>
                <div class="form-group">
                  <label for="inputComments">Comments</label>
                  <textarea class="form-control" id="inputComments" name="inputComments" rows="3"></textarea>
                  <p class="help-block">Example block-level help text here.</p>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" id="inputNewsletter" name="inputNewsletter"> Add me to your Newsletter
                  </label>
                </div>
                <button type="submit" class="btn btn-default" name="submitForm">Submit</button>
          </form>
        </div>
    </div>
    <div class="col-sm-6 pull-right" id="map"></div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=visualization,places"></script>
<script src="js/map.js"></script>
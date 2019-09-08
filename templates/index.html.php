<?php include_once 'inc/header.php' ?>
      <div class="jumbotron pt-5">
        <h1>Find A Job</h1>
          <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <select name="category" class="form-control">
                <option selected disabled>Choose..</option>
                <?php foreach($categories as $category):?>
                  <option value="<?php echo $category->id; ?>">
                    <?php echo $category->name; ?>
                  </option>
                <?php endforeach; ?>
            </select>
            <br>
            <button type="submit" class="btn btn-lg btn-primary">FIND</button>
          </form>
      </div>
      <h2><?php echo $title; ?></h2>
    <?php foreach($jobs as $job): ?>
      <div class="row marketing">
        <div class="col-md-10">
          <h4><?php echo $job->job_title; ?></h4>
          <p><?php echo $job->description; ?></p>
        </div><!-- col-md-10" -->

        <div class="col-md-2">
            <a href="job.php?id=<?php echo $job->id; ?>" class="btn btn-success">View</a>
        </div><!-- col-md-2 -->
      </div><!-- row marketing -->
    <?php endforeach;?>
<?php include_once 'inc/footer.php' ?>
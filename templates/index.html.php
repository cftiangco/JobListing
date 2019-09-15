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
            <button type="submit" class="btn btn-lg btn-success">FIND</button>
          </form>
      </div>
      <h2><?php echo $title; ?></h2>
    <?php foreach($jobs->result as $job): ?>
      <div class="row marketing" style="border:1px solid #f7f7f7;padding:10px;background-color: #f7f7f7">
        <div class="col-md-10 market">
          <h4 style="font-weight:bold;"><?php echo $job->job_title; ?></h4>
          <h6 style="color:#4B4B4B;"><?php echo $job->company; ?></h6>
          <p><?php echo $job->location; ?></p>
          <p id="job-description"><?php echo truncate($job->description,120); ?></p>

          <a href="job.php?id=<?php echo $job->id; ?>">Review this Job</a>
          <small style="display:block" class="pt-1">Posted <?php echo custome_date_format($job->created_at); ?></small>
          
        </div><!-- col-md-10" -->

        <div class="col-md-2">
            <!--
            <a href="job.php?id=<?php echo $job->id; ?>" class="btn btn-success">View</a>
            -->
        </div><!-- col-md-2 -->
      </div><!-- row marketing -->
    <?php endforeach;?>

    <div class="row" >
        <div class="col-md-10">
          <?php if(isset($_GET['category'])): ?>
            <ul class="pagination justify-content-center">
              <li class="page-item <?php if($jobs->page == 1) echo 'disabled'; ?>"><a class="page-link" href="index.php?page=<?= $jobs->previous ?>">Previous</a></li>
              <?php for($i = 1;$i <= $jobs->pages; $i++):?>
                <li class="page-item"><a class="page-link" href="index.php?category=<?= $category->id ?>&page=<?= $i ?>"><?= $i ?></a></li>
              <?php endfor;?>
              <li class="page-item <?php if($jobs->page == $jobs->pages) echo 'disabled'; ?>"><a class="page-link" href="index.php?category=<?= $category->id;?>&page=<?= $jobs->next ?>">Next</a></li>
            </ul>
          <?php else: ?>
            <ul class="pagination justify-content-center">
              <li class="page-item <?php if($jobs->page == 1) echo 'disabled'; ?>"><a class="page-link" href="index.php?page=<?= $jobs->previous ?>">Previous</a></li>
              <?php for($i = 1;$i <= $jobs->pages; $i++):?>
                <li class="page-item"><a class="page-link" href="index.php?page=<?= $i ?>"><?= $i ?></a></li>
              <?php endfor;?>
              <li class="page-item <?php if($jobs->page == $jobs->pages) echo 'disabled'; ?>"><a class="page-link" href="index.php?page=<?= $jobs->next ?>">Next</a></li>
          </ul>
          <?php endif; ?>
      </div>
    </div>

<?php include_once 'inc/footer.php' ?>
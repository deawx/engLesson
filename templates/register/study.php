<?php include( '/../webs/header.php'); ?>
<div class="row">
  <div class="col-md-12">
      <?php foreach ($this->data->course as $key => $video) :?>
          <h2><?=$video['video_name']?></h2>
          <p><?=$video['video_detail']?></p>
          <video width="320" height="240" controls>
          <source src="videos/<?=$video['video_path']?>" type="video/mp4">
        </video>
        <hr>
      <?php endforeach ;?>
  </div>
</div>
<?php include('/../webs/footer.php'); ?>
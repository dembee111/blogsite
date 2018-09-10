<div class="slidersection templete clear">
        <div id="slider">
          <?php
              $query = "SELECT * FROM slider order by id limit 5";
              $slider = $db->select($query);
              if ($slider) {
                $i=0;
                while ($result = $slider->fetch_assoc()) { ?>
                   <a href="#"><img src="dashboard/<?php echo $result['image']; ?>" alt="nature 1" title="<?php echo $result['title']; ?>"  height="280" width="960" /></a>
                <?php } }  ?>


        </div>

</div>
